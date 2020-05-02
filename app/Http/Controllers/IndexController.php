<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Products;

class IndexController extends Controller
{
    function home(){
        //dd($products);
        //$products=Product::with('categories')->paginate(6);

        $new_prod=Products::inRandomOrder()->take(8)->get();
        $pop_prod=Products::take(8)->get();
        return view('frontend.pages.index',compact('new_prod','pop_prod'));
    }
    function shop(){
        
        return view('frontend.pages.shop_grid');
    }
}
