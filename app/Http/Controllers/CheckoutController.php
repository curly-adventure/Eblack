<?php

namespace App\Http\Controllers;


use App\Achats;
use App\Commande;
use App\Produits;
use Carbon\Carbon;
use Stripe\Stripe;
use App\Mail\Ordered;
use App\Mail\NewOrder;
use App\Models\Produit;
use Stripe\PaymentIntent;
use App\Mail\ProduitAlert;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Models\Tarif_livraisons;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use RealRashid\SweetAlert\Facades\Alert;
use Gloudemans\Shoppingcart\Facades\Cart;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function infoAdr()
    {
        if (Cart::count() <= 0) {
            return redirect()->route('produits.index');
        }
        $client = Auth::user();
        $adresse_client = \App\Adresse::where('client_id', $client->id)->first();
        if ($adresse_client) {
            $commune = \App\Commune::where('id', $adresse_client->commune_id)->first();
            $ville_client = \App\Ville::where('id', $commune->ville_id)->first()->nom;
            $commune_client = $commune->nom;
        } else {
            $commune_client = null;
            $ville_client = null;
        }
        if(request()->session()->has('coupon')){ $total=floatval(Cart::subtotal()) - request()->session()->get('coupon')['remise'];
        } else{ $total=Cart::subtotal(); }
        return view("checkout.info1", [
            'client' => $client,
            'adresse_client' => $adresse_client,
            'commune_client' => $commune_client,
            'ville_client' => $ville_client,
            'total' =>$total,
        ]);
    }

    public function storeAdr(Request $request)
    {
        $client = Auth::user();
        $commune = \App\Commune::where('nom', request()->input('commune'))->first();
        $adresse_client = \App\Adresse::where('client_id', $client->id)->first();
        DB::table('clients')
            ->where('id', $client->id)
            ->update([
                'nom' => request()->input('nom'),
                'prenom' => request()->input('prenom'),
                'email' => request()->input('email'),
                'numero' => request()->input('numero'),
            ]);

        if ($adresse_client) {

            DB::table('adresses')
                ->where('id', $client->id)
                ->update([
                    'commune_id' => $commune->id,
                    'description' => request()->input('adresse'),
                ]);
        } else {
            DB::table('adresses')->insert([
                'client_id' => $client->id,
                'commune_id' => $commune->id,
                'description' => request()->input('adresse'),
            ]);
        }
        $tarif=Tarif_livraisons::frais($commune->id);
        if(request()->session()->has('coupon')){ $total=(floatval(Cart::subtotal()) - request()->session()->get('coupon')['remise'])+$tarif;
        } else{ $total=Cart::subtotal()+$tarif; }
        return view('checkout.info2', [
            "numero" => $client->numero,
            "adresse" => request()->input('adresse'),
            "commune" => request()->input('commune'),
            'commune_id' => $commune->id,
            "ville" => request()->input('ville'),
            "tarif" => $tarif,
            "total"=>$total,
        ]);
    }

    public function infoPaie()
    {
        
        $commune = \App\Commune::find(request()->commune_id);
        $tarif=Tarif_livraisons::frais($commune->id);
        if(request()->session()->has('coupon')){ $total=(floatval(Cart::subtotal()) - request()->session()->get('coupon')['remise'])+$tarif;
        } else{ $total=Cart::subtotal()+$tarif; }
        return view('checkout.info3',[
            'commune_id' => $commune->id,
            "tarif" => $tarif,
            "total"=>$total,
        ]);
    }

    public function storePaie(Request $request)
    {
        // Vérification du stock
        $items = Cart::Content();
        foreach($items as $row) {
            $product = Produits::findOrFail($row->id);
            //dd($row->qty);
            if($product->quantite < $row->qty) {
                Alert::error('Nous sommes désolés mais le produit "' . $row->name . '" ne dispose pas d\'un stock suffisant pour satisfaire votre demande. Il ne nous reste plus que ' . $product->quantite . ' exemplaires disponibles.');
                return back();
            }
            if($product->quantite <= 5) {
             
                Mail::to("virtus225one@gmail.com")->send(new ProduitAlert($product->id));
                 
            }
        }
        $methode = request()->input('methode');
        $client = Auth::user();
        $adresse = \App\Adresse::where('client_id', $client->id)->first();
        if(request()->session()->has('coupon')){
            $soustotal=floatval(Cart::subtotal()) - request()->session()->get('coupon')['remise'];
             $total=$soustotal+Tarif_livraisons::frais($adresse->commune_id);
        } else{ 
            $soustotal=Cart::subtotal();
            $total=$soustotal+Tarif_livraisons::frais($adresse->commune_id); }
        $num_achat = Achats::max_num() + 1;
        if ($methode === "paiement_livraison") {
            DB::table('achats')->insert([
                'num_achat' => $num_achat,
                'montant' => floatval($total),
                'soustotal'=>floatval($soustotal),
                'quantite' => Cart::count() ,
                'client_id' => $client->id,
                'adresse_id' => $adresse->id,
                'methode_paiement' => "paiement cash à la livraison",
                "created_at" => Carbon::now(), "updated_at" => now()
            ], true);
            $achat_id = Commande::where('num_achat', $num_achat)->first()->id;
            $nbre_personnaliser=0;
            foreach (Cart::content() as $produit) {
                DB::table('achat_produits')->insert([
                    'achat_id' => $achat_id,
                    'produit_id' => $produit->model->id,
                    'nom' => $produit->model->nom,
                    'prix' => $produit->model->prix_vente,
                    'quantite' => $produit->qty,
                    "created_at" => Carbon::now(), "updated_at" => now()
                ]);
                if($produit->model->personnalisable){
                    
                    if(DB::select("select * from produit_personnaliser where produit_id = ?",[$produit->model->id])){
                        $nbre_personnaliser+=1;
                    }
                }
                
            }
            $this->updateStock();
            Cart::destroy();

        
        Mail::to("virtus225one@gmail.com")->send(new NewOrder($achat_id,$nbre_personnaliser));       
        
        $commune = \App\Commune::where('id', $adresse->commune_id)->first();
        $ville_id = \App\Ville::where('id', $commune->ville_id)->first()->id;

        Mail::to($client->email)->send(new Ordered($achat_id,$adresse->id,$ville_id,$commune->id,$soustotal));}
        request()->session()->forget('coupon');
        return view('checkout.merci', ['num' => $num_achat] );
    }

    public function updateStock(){
        foreach (Cart::content() as $item) {
            $produit=Produit::find($item->model->id);
            $produit->update([
                'quantite' => $produit->quantite - $item->qty,
            ]);
        }
    }
    public function stripe()
    {
        if (Cart::count() <= 0) {
            return redirect()->route('produits.index');
        }
        Stripe::setApiKey('sk_test_51GvMrEIC4FQuwivkb3niidtGPvpXN047Tu3a8jgoBtkwcsZRKTxhL49CcSMw5QhQ9JxUiM2Q1LoU6kf13uYZqGIM00SNK21NSZ');
        $intent = PaymentIntent::create([
            'amount' => round(Cart::total()),
            'currency' => 'usd',
        ]);
        //dd($intent);
        $clientSecret = Arr::get($intent, 'client_secret');
        return view("checkout.check_stripe", [
            'clientSecret' => $clientSecret
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        $data = $request->json()->all();
        dd($data['num']);

        /* $data = $request->json()->all();
        $commande = new Commande();

        $commande->id_paiement = $data['paymentIntent']['id'];
        $commande->montant = $data['paymentIntent']['amount'];

        $commande->paiement_created_at = (new DateTime())
            ->setTimestamp($data['paymentIntent']['created'])
            ->format('Y-m-d H:i:s');

        $produits = [];
        $i = 0;

        foreach (Cart::content() as $produit) {
            $produits['product_' . $i][] = $produit->model->nom;
            $produits['product_' . $i][] = $produit->model->prix_achat;
            $produits['product_' . $i][] = $produit->qty;
            $i++;
        }

        $commande->produits = serialize($produits);
        $commande->client_id = Auth()->user()->id;
        $commande->save();
        
        if ($data['paymentIntent']['status'] === 'succeeded') {
            Cart::destroy();
            Session::flash('success', 'Votre commande a été traitée avec succès.');
            return response()->json(['success' => 'Payment Intent Succeeded']);
        } else {
            return response()->json(['error' => 'Payment Intent Not Succeeded']);
        }*/
    }

    public function thankyou()
    {

        return Session::has('success') ? view('checkout.mercci') : redirect()->route('produits.index');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
