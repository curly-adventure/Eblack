<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Produits;
class WishlistController extends Controller
{
    
    public function index()
    {
        $client=\Auth::user();
        return view('client.favoris',[
            'client'=>$client,
            'wishlist'=>$client->wishlist('default'),
        ]);
    }

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
        $client=\Auth::user();
        $produit=Produits::find($request->produit_id);
        $exist=false;
        foreach ($client->wishlist('default') as $prod) {
            if ($prod->nom == $produit->nom) $exist=true; }
        if($exist) {$client->unwish($produit, 'default'); return back()->with('toast_success','article supprimer des favoris !');}
        else {$client->wish($produit); return back()->with('toast_success','article ajouté aux favoris !');}
        //dd(count($client->wishlist('default')));
    }

    public function destroy(Produits $produit)
    {
        \Auth::user()->unwish($produit, 'default');
        return back()->with('toast_success','article supprimer !');
    }
  
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
    
}
