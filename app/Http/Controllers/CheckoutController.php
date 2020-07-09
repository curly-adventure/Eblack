<?php

namespace App\Http\Controllers;

use App\Achats;
use DateTime;
use App\Commande;
use Carbon\Carbon;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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

        return view("checkout.info1", [
            'client' => $client,
            'adresse_client' => $adresse_client,
            'commune_client' => $commune_client,
            'ville_client' => $ville_client,
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
        return view('checkout.info2', [
            "numero" => $client->numero,
            "adresse" => request()->input('adresse'),
            "commune" => request()->input('commune'),
            "ville" => request()->input('ville'),
        ]);
    }

    public function infoPaie()
    {
        return view('checkout.info3');
    }

    public function storePaie(Request $request)
    {
        $methode = request()->input('methode');
        $client = Auth::user();
        $montant = Cart::total();
        $adresse = \App\Adresse::where('client_id', $client->id)->first();
        $num_achat = Achats::max_num() + 1;
        if ($methode === "paiement_livraison") {
            DB::table('achats')->insert([
                'num_achat' => $num_achat,
                'montant' => floatval($montant),
                'quantite' => Cart::count() ,
                'client_id' => $client->id,
                'adresse_id' => $adresse->id,
                'methode_paiement' => "paiement cash à la livraison",
                "created_at" => Carbon::now(), "updated_at" => now()
            ], true);
            $achat_id = Commande::where('num_achat', $num_achat)->first()->id;
            foreach (Cart::content() as $produit) {
                DB::table('achat_produits')->insert([
                    'achat_id' => $achat_id,
                    'produit_id' => $produit->model->id,
                    'nom' => $produit->model->nom,
                    'prix' => $produit->model->prix_achat,
                    'quantite' => $produit->qty,
                    "created_at" => Carbon::now(), "updated_at" => now()
                ]);
            }
            Cart::destroy();
            Session::flash('success', 'Votre commande a été traitée avec succès.');
        }

        return view('checkout.merci', ['num' => $num_achat]);
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
