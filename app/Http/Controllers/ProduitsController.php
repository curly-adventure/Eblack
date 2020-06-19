<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produits;
use App\ImagesProduit;
class ProduitsController extends Controller
{
  
    function index(){
        if (request()->categorie) {
            $products = Produits::where('categorie_id', request()->categorie)->orderBy('created_at','DESC')->paginate(8);
        } else {
            $products=Produits::orderBy('created_at','DESC')->paginate(8);
        }
        //
        return view('frontend.pages.shop_grid',compact('products'));
    }
    
    function show(Produits $produit){
        
        return view('frontend.pages.details',compact('produit'));
    }
    
    public function search()
    {
        $q=request()->input('q');
        request()->validate([
            'q'=> 'required|min:3'
        ]);
        $products=Produits::where('nom','like',"%$q%")
                  ->orWhere('description','like',"%$q%")
                  ->paginate(8);
        return view('frontend.pages.recherche')->with('products',$products);
    }

}
