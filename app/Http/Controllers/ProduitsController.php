<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produits;
use App\ImagesProduit;
class ProduitsController extends Controller
{
  
    function shop(){
        $products=Produits::paginate(8);
        return view('frontend.pages.shop_grid',compact('products'));
    }
    
    /*function detail($nom,$id){
        $produit=Produits::where('id',$id)->first();
        $images=ImagesProduit::all()->where('produits_id',$id);
        return view('frontend.pages.detail',compact('produit','images'));
    }*/
    

}
