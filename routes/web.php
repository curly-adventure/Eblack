<?php

use Illuminate\Support\Facades\Route;


route::get('/','IndexController@home')->name('accueil');

/*vue produits*/
route::get('/shop','ProduitsController@index')->name('produits.index');
route::get('/recherche','ProduitsController@search')->name('produits.recherche');
route::get('/shop/{mot_cle}','ProduitsController@trie')->name('produits.trie');
Route::get('produits/{produit}/details', [
  'as'=>'produits.show',
  'uses'=> 'ProduitsController@show',
]);


  /* route panier*/
  Route::get('/panier', "PanierController@index")->name('panier.index');
  Route::post('/panier/ajouter', "PanierController@store")->name('panier.store');
  Route::patch('/panier/{rowId}/{qte}', "PanierController@update")->name('panier.update');
  Route::delete('/panier/{rowId}', "PanierController@destroy")->name('panier.supprime');
  /*Route::get('videpanier',function(){
    Cart::destroy();
    return redirect()->route('produits.index');
  });*/

//route social connexion
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

/*route checkout proteger par le middleware auth*/
Route::group(['middleware' => ['auth']],function(){
Route::get("/paiement","CheckoutController@index")->name("paiement.index");
Route::get("/paiement/stripe","CheckoutController@stripe")->name("paiement.stripe");
Route::post("/paiement/stripe","CheckoutController@store")->name("paiement.store");
Route::get("paiement/merci","CheckoutController@thankyou")->name("paiement.thankyou");
});
  
Auth::routes();
Route::group(['middleware' => ['auth']],function(){
Route::get('/client/index', 'HomeController@index')->name('home');
Route::get('/client/editer/info', 'HomeController@editInfoShow')->name('client.editer_info');
Route::get('/client/editer/adresse', 'HomeController@editAdrShow')->name('client.editer_adresse');
Route::post('/client/editer/info', 'HomeController@updateInfo')->name('client.updateInfo');
Route::post('/client/editer/adresse', 'HomeController@updateAdr')->name('client.updateAdr');
Route::get('/client/change-password', 'ChangePasswordController@index')->name("client.change_passe");
Route::post('/client/change-password', 'ChangePasswordController@store')->name('client.change.password');
Route::post('/client/wishlist/ajouter', "WishlistController@store")->name('wishlist.store');
Route::get('/client/wishlist/', "WishlistController@index")->name('wishlist.show');
Route::delete('/client/wishlist/{produit}', "WishlistController@destroy")->name('wishlist.supprime');

});

/*route pour les lien inexistant*/
Route::any('{catchall}', function() {
    return 'Cette page n\'existe pas !';
  })->where('catchall', '.*');