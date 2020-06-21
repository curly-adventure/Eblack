<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produits;
use App\SousCategories;
use App\Categories;
class ProduitsController extends Controller
{
  
    function index(){
        
        if (request()->categorie and !request()->souscategorie) {
            
            $products = Produits::where('categorie_id', request()->categorie)->orderBy('created_at','DESC')->paginate(8);
            $titre = Categories::find(request()->categorie)->nom;
            $lien=array($titre=>"produits.index");
        
        }
        elseif(request()->souscategorie and request()->categorie){
            $products = Produits::where('sous_categorie_id', request()->souscategorie)
                        ->where('categorie_id', request()->categorie)
                        ->orderBy('created_at','DESC')->paginate(8);
            $titre = SousCategories::find(request()->souscategorie)->nom;
            $lien=array(
                Categories::find(request()->categorie)->nom=>"produits.index",
                $titre=>"produits.index");
            } 
        else {
            $products=Produits::orderBy('created_at','DESC')->paginate(8);
            $titre = "Tous Les Produits";
            $lien=array("tout les produits"=>"produits.index");
        }
        return view('frontend.pages.shop_grid',compact('products','titre','lien'));
    }
    
    function show(Produits $produit){
        $id_categ = $produit->categorie_id;
        $autres_produits = Produits::where('categorie_id', $id_categ)->paginate(10);
        return view('frontend.pages.details',compact('produit','autres_produits'));
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
        $titre="";
        $lien=array(
            "tout les produits"=>"produits.index",
            "$q"=>'produits.index');
        return view('frontend.pages.recherche')->with(['products'=>$products,'titre'=>$titre,'lien'=>$lien]);
    }
    public function trie($mot_cle)
    {
        if ($mot_cle=="new") {
            $products=Produits::orderBy('created_at','DESC')->paginate(8);
            $titre="Nouveautés";
            $lien=array(
                "tout les produits"=>"produits.index",
                "nouveautés"=>'produits.index');
           }
        elseif ($mot_cle=="popular") {
            $products=Produits::inRandomOrder()->paginate(8);
            $titre="Produits Populaire";
            $lien=array(
                "tout les produits"=>"produits.index",
                "populaires"=>'produits.index');
            
        }
        return view('frontend.pages.shop_grid',compact('products','titre','lien'));
    }

}
