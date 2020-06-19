<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

route::get('/','IndexController@home');

/*vue produits*/
route::get('/shop','ProduitsController@index')->name('produits.index');
Route::get('produits/{produit}/details', [
  'as'=>'produits.show',
  'uses'=> 'ProduitsController@show',
]);

/* route panier*/
Route::get('/panier', "PanierController@index")->name('panier.index');
Route::post('/panier/ajouter', "PanierController@store")->name('panier.store');
Route::patch('/panier/{rowId}', "PanierController@update")->name('panier.update');
Route::delete('/panier/{rowId}', "PanierController@destroy")->name('panier.supprime');
Route::get('videpanier',function(){
  Cart::destroy();
  return redirect()->route('produits.index');
});

/*route checkout*/
//Route::get("/paiement","CheckoutController@index")->name("paiement.index");
Route::get("/paiement/stripe","CheckoutController@stripe")->name("paiement.stripe");
Route::post("/paiement/stripe","CheckoutController@store")->name("paiement.store");
Route::get("paiement/merci","CheckoutController@thankyou")->name("paiement.thankyou");

/*route connexion inscription*/
route::get('/connexion',function(){
    return view('frontend/pages/connexion');
});
route::get('/inscription',function(){
    return view('frontend/pages/inscription');
});
  
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::get('/test',function(){
  return view('test');
});

/*route pour les lien inexistant*/
Route::any('{catchall}', function() {
    return 'Cette page n\'existe pas !';
  })->where('catchall', '.*');

