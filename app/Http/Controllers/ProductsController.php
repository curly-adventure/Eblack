<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductsController extends Controller
{
  
    function shop(){
        $products=Product::with('categories')->paginate(8);
        return view('frontend.pages.shop_grid',compact('products'));
    }
    

}
