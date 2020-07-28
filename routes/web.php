<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

route::get('/test',function(){
  return view('test');
});
route::get('/', 'IndexController@home')->name('accueil');

/*vue produits*/
route::get('/shop', 'ProduitsController@index')->name('produits.index');
route::get('/recherche', 'ProduitsController@search')->name('produits.recherche');
route::get('/shop/{mot_cle}', 'ProduitsController@trie')->name('produits.trie');
Route::get('produits/{produit}/details', [
  'as' => 'produits.show',
  'uses' => 'ProduitsController@show',
]);


/* route panier*/
Route::get('/panier', "PanierController@index")->name('panier.index');
Route::post('/panier/ajouter', "PanierController@store")->name('panier.store');
Route::patch('/panier/{rowId}/{qte}', "PanierController@update")->name('panier.update');
Route::delete('/panier/{rowId}', "PanierController@destroy")->name('panier.supprime');
Route::post('/coupon', "PanierController@storeCoupon")->name('panier.store.coupon');
Route::delete('/coupon', "PanierController@destroyCoupon")->name('panier.supprime.coupon');
/*Route::get('videpanier',function(){
    Cart::destroy();
    return redirect()->route('produits.index');
  });*/

//route social connexion
Route::get('/auth/redirect/{provider}', 'SocialController@redirect');
Route::get('/callback/{provider}', 'SocialController@callback');

/*route checkout proteger par le middleware auth*/
Route::group(['middleware' => ['auth']], function () {
  Route::get("/paiement/info/adresse", "CheckoutController@infoAdr")->name("paiement.info.adresse");
  Route::post("/paiement/info/adresse", "CheckoutController@storeAdr")->name("paiement.store.adresse");
  Route::get("/paiement/info/methode-paiement", "CheckoutController@infoPaie")->name("paiement.info.methodepaie");
  Route::post("/paiement/info/methode-paiement", "CheckoutController@storePaie")->name("paiement.store.methodepaie");
  //Route::get("/paiement/stripe","CheckoutController@stripe")->name("paiement.stripe");
  //Route::post("/paiement/index","CheckoutController@store")->name("paiement.store");
  Route::get("/paiement/merci", "CheckoutController@thankyou")->name("paiement.thankyou");
});

Auth::routes();
Route::group(['middleware' => ['auth']], function () {
  Route::get('/client/index', 'HomeController@index')->name('home');
  Route::get('/client/home', 'HomeController@index');
  Route::get('/client/editer/info', 'HomeController@editInfoShow')->name('client.editer_info');
  Route::get('/client/editer/adresse', 'HomeController@editAdrShow')->name('client.editer_adresse');
  Route::post('/client/editer/info', 'HomeController@updateInfo')->name('client.updateInfo');
  Route::post('/client/editer/adresse', 'HomeController@updateAdr')->name('client.updateAdr');
  Route::get('/client/change-password', 'ChangePasswordController@index')->name("client.change_passe");
  Route::post('/client/change-password', 'ChangePasswordController@store')->name('client.change.password');
  Route::post('/client/wishlist/ajouter', "WishlistController@store")->name('wishlist.store');
  Route::get('/client/wishlist/', "WishlistController@index")->name('wishlist.show');
  Route::delete('/client/wishlist/{produit}', "WishlistController@destroy")->name('wishlist.supprime');
  Route::get('/client/commandes', 'CommandeController@index')->name('client.commandes');
  Route::get('/client/commande/details/{commande}', 'CommandeController@show')->name('client.commande.details');
  Route::get('/client/commandes/{commande}', 'CommandeController@update')->name('client.commande.supprimer');
});

Route::get('/enregistrement',function(){
return view('forms');
});
/*route pour les lien inexistant*/
Route::any('{catchall}', function () {
  return 'Cette page n\'existe pas !';
})->where('catchall', '.*');
