<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produits;
use App\SousCategories;
use App\Categories;
use App\Models\Marque;

class ProduitsController extends Controller
{

    function index()
    {
        //dd(request()->categorie);
        //dd(url()->full());
        if (request()->souscategorie and request()->categorie) {
            switch(request()->input('trie')){
                case 1:
                     $products = Produits::where('sous_categorie_id', request()->souscategorie)
                                                    ->where('categorie_id', request()->categorie)
                                        ->orderBy('created_at', 'DESC')->paginate(8);
                    break;
                case 2:
                    $products = Produits::where('sous_categorie_id', request()->souscategorie)
                                                    ->where('categorie_id', request()->categorie)
                                        ->orderBy('prix_vente', 'ASC')->paginate(8);
                    break;
                case 3:
                    $products = Produits::where('sous_categorie_id', request()->souscategorie)
                                        ->where('categorie_id', request()->categorie)
                                        ->orderBy('prix_vente', 'DESC')->paginate(8);
                    break;
                default:
                    $products = Produits::where('sous_categorie_id', request()->souscategorie)
                                        ->where('categorie_id', request()->categorie)
                                        ->paginate(8);
                    break;
            }
            $titre = SousCategories::find(request()->souscategorie)->nom;
            $lien = array(
                Categories::find(request()->categorie)->nom => "produits.index",
                $titre => "produits.index"
            );
        } 
        elseif (request()->categorie) {

            switch(request()->input('trie')){
                case 1:
                     $products = Produits::where('categorie_id', request()->categorie)
                                        ->orderBy('created_at', 'DESC')->paginate(8);
                    break;
                case 2:
                    $products = Produits::where('categorie_id', request()->categorie)
                                        ->orderBy('prix_vente', 'ASC')->paginate(8);
                    break;
                case 3:
                    $products = Produits::where('categorie_id', request()->categorie)
                                        ->orderBy('prix_vente', 'DESC')->paginate(8);
                    break;
                default:
                    $products = Produits::where('categorie_id', request()->categorie)
                                        ->paginate(8);
                    break;
            }
            $titre = Categories::find(request()->categorie)->nom;
            $lien = array($titre => "produits.index");
        } 
        elseif (request()->souscategorie) {
            switch(request()->input('trie')){
                case 1:
                     $products = Produits::where('sous_categorie_id', request()->souscategorie)
                                        ->orderBy('created_at', 'DESC')->paginate(8);
                    break;
                case 2:
                    $products = Produits::where('sous_categorie_id', request()->souscategorie)
                                        ->orderBy('prix_vente', 'ASC')->paginate(8);
                    break;
                case 3:
                    $products = Produits::where('sous_categorie_id', request()->souscategorie)
                                        ->orderBy('prix_vente', 'DESC')->paginate(8);
                    break;
                default:
                    $products = Produits::where('sous_categorie_id', request()->souscategorie)
                                        ->paginate(8);
                    break;
            }
            $titre = Souscategories::find(request()->souscategorie)->nom;
            $lien = array($titre => "produits.index");
        } 
        elseif (request()->marque) {
            switch(request()->input('trie')){
                case 1:
                     $products = Produits::where('marque_id', request()->marque)
                                        ->orderBy('created_at', 'DESC')->paginate(8);
                    break;
                case 2:
                    $products = Produits::where('marque_id', request()->marque)
                                        ->orderBy('prix_vente', 'ASC')->paginate(8);
                    break;
                case 3:
                    $products = Produits::where('marque_id', request()->marque)
                                        ->orderBy('prix_vente', 'DESC')->paginate(8);
                    break;
                default:
                    $products = Produits::where('marque_id', request()->marque)
                                        ->paginate(8);
                    break;
            }
            $titre = Marque::find(request()->marque)->nom;
            $lien = array($titre => "produits.index");
        } 
        else {
            switch(request()->input('trie')){
                case 1:
                     $products = Produits::orderBy('created_at', 'DESC')->paginate(8);
                    break;
                case 2:
                    $products = Produits::orderBy('prix_vente', 'ASC')->paginate(8);
                    break;
                case 3:
                    $products = Produits::orderBy('prix_vente', 'DESC')->paginate(8);
                    break;
                default:
                    $products = Produits::paginate(8);
                    break;
            }
            $titre = "Tous Les Produits";
            $lien = array("tout les produits" => "produits.index");
        }
        return view('produits.index', compact('products', 'titre', 'lien'));
    }

    function show(Produits $produit)
    {
        $categorie = Categories::find($produit->categorie_id);
        $sous_categorie = SousCategories::find($produit->sous_categorie_id);
        $autres_produits = Produits::where('categorie_id', $categorie->id)->paginate(10);
        $stock = $produit->quantite == 0 ? "Indisponible" : "Disponible";

        $lien = array(
            $categorie->nom => "produits.index",
            $sous_categorie->nom => "produits.index",
            $produit->nom => "produits.show"
        );

        return view('produits.details', compact('produit', 'autres_produits', 'lien', 'stock', 'categorie', 'sous_categorie'));
    }

    public function search()
    {
        $q = request()->input('q');
        request()->validate([
            'q' => 'required|min:3'
        ]);
        $products = Produits::where('nom', 'like', "%$q%")
            ->orWhere('description', 'like', "%$q%")
            ->paginate(8);
        $titre = "";
        $lien = array(
            "tout les produits" => "produits.index",
            "$q" => 'produits.index'
        );
        return view('produits.recherche')->with(['products' => $products, 'titre' => $titre, 'lien' => $lien]);
    }
    public function trie($mot_cle)
    {
        if ($mot_cle == "new") {
            $products = Produits::orderBy('created_at', 'DESC')->paginate(8);
            $titre = "Nouveautés";
            $lien = array(
                "tout les produits" => "produits.index",
                "nouveautés" => 'produits.index'
            );
        } elseif ($mot_cle == "popular") {
            $products = Produits::inRandomOrder()->paginate(8);
            $titre = "Produits Populaire";
            $lien = array(
                "tout les produits" => "produits.index",
                "populaires" => 'produits.index'
            );
        }
        return view('produits.index', compact('products', 'titre', 'lien'));
    }
}
