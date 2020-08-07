<?php

namespace App\Http\Controllers;

use App\Produits;
use App\Mail\Demande;
use App\Models\Sliders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class IndexController extends Controller
{
    function home(){
        //dd(Auth()->user()->id);
        //$products=Product::with('categories')->paginate(6);

        //$new_prod=Produits::inRandomOrder()->take(8)->get();
        
        $new_prod=Produits::orderBy('created_at','DESC')->take(8)->get();
        $pop_prod=Produits::inRandomOrder()->take(8)->get();

        return view('index',compact('new_prod','pop_prod'));
    }
    public function demande(){
        request()->validate([
            'nom' => ['required'],
            'tel' => ['required'],
            'detail' => ['required'],
        ]);
        $nom=request()->input('nom');
        $tel=request()->input('tel');
        $detail=request()->input('detail');
        //dd($nom,$tel,$detail);
        Mail::to("virtus225one@gmail.com")->send(new Demande($nom,$tel,$detail));
        return redirect()->back()->with('toast_success','message envoyé !');
    }
    
}
