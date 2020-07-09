<?php

namespace App\Http\Controllers;

use App\AchatProduit;
use App\Commande;
use App\StatusCommande;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
            compact('commande', 'articles', 'nbre_article', 'status', 'adresse_client', 'ville_client', 'commune_client')
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
        $commande = Auth::user()->commandes();
            toast("commande annuler","success");
        return view('client.commandes.index', compact('commande'));
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
