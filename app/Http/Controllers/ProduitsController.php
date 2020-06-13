<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produits;
use App\ImagesProduit;
class ProduitsController extends Controller
{
  
    function index(){
        $products=Produits::paginate(8);
        return view('frontend.pages.shop_grid',compact('products'));
    }
    
    function show(Produits $produit){
        
        return view('frontend.pages.details',compact('produit'));
    }
    

}
