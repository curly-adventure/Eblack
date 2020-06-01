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
route::get('/shop','ProduitsController@shop');
route::get('/connexion',function(){
    return view('frontend/pages/connexion');
});
route::get('/inscription',function(){
    return view('frontend/pages/inscription');
});
Route::get('/detail', function() {
    return view('frontend/pages/details');
  })->name('detail');

Route::get('/test',function(){
  return view('test');
});
Route::any('{catchall}', function() {
    return 'Cette page n\'existe pas !';
  })->where('catchall', '.*');
