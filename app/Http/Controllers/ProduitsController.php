<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produits;

class ProduitsController extends Controller
{
  
    function shop(){
        $products=Produits::with('categories')->paginate(8);
        return view('frontend.pages.shop_grid',compact('products'));
    }
    

}
