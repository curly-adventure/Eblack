<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class IndexController extends Controller
{
    function home(){
        //dd($products);
        //$products=Product::with('categories')->paginate(6);

        $new_prod=Product::inRandomOrder()->take(8)->get();
        $pop_prod=Product::take(8)->get();
        return view('frontend.pages.index',compact('new_prod','pop_prod'));
    }
    
}
