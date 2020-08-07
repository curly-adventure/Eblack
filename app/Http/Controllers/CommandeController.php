<?php

namespace App\Http\Controllers;

use App\Commande;
use App\AchatProduit;
use App\Mail\AlertOrderCancel;
use App\StatusCommande;
use App\Mail\OrderCancelled;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $commande = Auth::user()->commandes();

        //dd($commande);
        return view('client.commandes.index', compact('commande'));
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
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function show(Commande $commande)
    {
        $client = Auth::user();
        $articles = AchatProduit::all()->where('achat_id', $commande->id);
        $nbre_article = count($articles);

        $adresse_client = \App\Adresse::where('client_id', $client->id)->first();
        $commune = \App\Commune::where('id', $adresse_client->commune_id)->first();
        $ville_client = \App\Ville::where('id', $commune->ville_id)->first()->nom;
        $commune_client = $commune->nom;


        return view(
            'client.commandes.details',
            compact('commande', 'articles', 'nbre_article', 'adresse_client', 'ville_client', 'commune_client')
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function edit(Commande $commande)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Commande $commande)
    {
        $commande->update([
            'canceled' => true,
            'status_id' => "4",
            'updated_at' => now(),
            'deleted_at' => now()
            ]);
        $client = Auth::user();
        $adresse = \App\Adresse::where('client_id', $client->id)->first();
        $commune = \App\Commune::where('id', $adresse->commune_id)->first();
        $ville_id = \App\Ville::where('id', $commune->ville_id)->first()->id;
        Mail::to($client->email)->send(new OrderCancelled($commande->id,$adresse->id,$ville_id,$commune->id,$commande->soustotal));
        Mail::to("virtus225one@gmail.com")->send(new AlertOrderCancel($commande->id));
        toast("commande annuler","success");
        $commande = Auth::user()->commandes();
        return redirect()->route('client.commandes', compact('commande'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Commande  $commande
     * @return \Illuminate\Http\Response
     */
    public function destroy(Commande $commande)
    {
        
    }
}
