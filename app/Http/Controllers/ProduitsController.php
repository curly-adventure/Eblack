<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Produits;
use App\SousCategories;
use App\Categories;
use App\Models\Marque;
use App\Models\Produit;

class ProduitsController extends Controller
{

    function index()
    {
        //dd(request()->categorie);
        //dd(url()->full());
        if (request()->souscategorie and request()->categorie) {
            switch (request()->input('trie')) {
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
                case 4:
                    $products = Produits::where('sous_categorie_id', request()->souscategorie)
                        ->where('categorie_id', request()->categorie)
                        ->where('personnalisable', 1)
                        ->paginate(8);
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
        } elseif (request()->categorie) {

            switch (request()->input('trie')) {
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
                case 4:
                    $products = Produits::where('categorie_id', request()->categorie)
                        ->where('personnalisable', 1)
                        ->paginate(8);
                    break;
                default:
                    $products = Produits::where('categorie_id', request()->categorie)
                        ->paginate(8);
                    break;
            }
            $titre = Categories::find(request()->categorie)->nom;
            $lien = array($titre => "produits.index");
        } elseif (request()->souscategorie) {
            switch (request()->input('trie')) {
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
                case 4:
                    $products = Produits::where('sous_categorie_id', request()->categorie)
                        ->where('personnalisable', 1)
                        ->paginate(8);
                    break;
                default:
                    $products = Produits::where('sous_categorie_id', request()->souscategorie)
                        ->paginate(8);
                    break;
            }
            $titre = Souscategories::find(request()->souscategorie)->nom;
            $lien = array($titre => "produits.index");
        } elseif (request()->personnalisable) {

            switch (request()->input('trie')) {
                case 1:

                    $products = Produits::where('personnalisable', 1)
                        ->orderBy('created_at', 'DESC')->paginate(8);
                    break;
                case 2:
                    $products = Produits::where('personnalisable', 1)
                        ->orderBy('prix_vente', 'ASC')->paginate(8);
                    break;
                case 3:
                    $products = Produits::where('personnalisable', 1)
                        ->orderBy('prix_vente', 'DESC')->paginate(8);
                    break;
                case 4:
                    $products = Produits::where('personnalisable', 1)
                        ->where('personnalisable', 1)
                        ->paginate(8);
                    break;
                default:
                    $products = Produits::where('personnalisable', 1)
                        ->paginate(8);
                    break;
            }

            $titre = "Personnalisable";
            $lien = array($titre => "produits.index");
        } else {
            switch (request()->input('trie')) {
                case 1:
                    $products = Produits::orderBy('created_at', 'DESC')->paginate(8);
                    break;
                case 2:
                    $products = Produits::orderBy('prix_vente', 'ASC')->paginate(8);
                    break;
                case 3:
                    $products = Produits::orderBy('prix_vente', 'DESC')->paginate(8);
                    break;
                case 4:
                    $products = Produits::orderBy('prix_vente', 'DESC')
                        ->where('personnalisable', 1)
                        ->paginate(8);
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
    function personnalise(Produits $produit)
    {
        $categorie = Categories::find($produit->categorie_id);
        $sous_categorie = SousCategories::find($produit->sous_categorie_id);
        $autres_produits = Produits::where('personnalisable', 1)->paginate(10);
        $stock = $produit->quantite == 0 ? "Indisponible" : "Disponible";
        $lien = array(
            "personnalisable" => "produits.index",
            $produit->nom => "produits.show"
        );
        return view('produits.personnalise', compact('produit', 'lien', 'autres_produits', 'stock', 'categorie', 'sous_categorie'));
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
    public function personnalisable()
    {

        return view('produits.personnalisable');
    }
}
