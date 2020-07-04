<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Illuminate\Support\Arr;
use Stripe\PaymentIntent;
use Gloudemans\Shoppingcart\Facades\Cart;
use DateTime;
use App\Commande;
use Illuminate\Support\Facades\Session;
class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $client=\Auth::user();
        $adresse_client =\App\Adresse::where('client_id', $client->id)->first();
       if ($adresse_client) {
        $commune = \App\Commune::where('id',$adresse_client->commune_id)->first();
        $ville_client = \App\Ville::where('id',$commune->ville_id)->first()->nom;
        $commune_client=$commune->nom;
       }else {
        $commune_client=null;
        $ville_client=null;
       }
        
        return view("checkout.index",[
            'client' => $client,
            'adresse_client' =>$adresse_client,
            'commune_client' => $commune_client,
            'ville_client' =>$ville_client,
            ]);
    }

    public function stripe()
    {
        if (Cart::count()<=0) {
            return redirect()->route('produits.index');
        }
        Stripe::setApiKey('sk_test_51GvMrEIC4FQuwivkb3niidtGPvpXN047Tu3a8jgoBtkwcsZRKTxhL49CcSMw5QhQ9JxUiM2Q1LoU6kf13uYZqGIM00SNK21NSZ');
        $intent = PaymentIntent::create([
            'amount' => round(Cart::total()),
            'currency' => 'usd',
          ]);
          //dd($intent);
          $clientSecret=Arr::get($intent,'client_secret');
        return view("checkout.check_stripe",[
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
        }
    }

    public function thankyou()
    {
        return Session::has('success') ? view('checkout.thankyou') : redirect()->route('produits.index');
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
