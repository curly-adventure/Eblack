<?php

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix'     => config('backpack.base.route_prefix', 'admin'),
    'middleware' => [
        config('backpack.base.web_middleware', 'web'),
        config('backpack.base.middleware_key', 'admin'),
    ],
    'namespace'  => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('category', 'CategoryCrudController');
    Route::crud('villes', 'VillesCrudController');
    Route::crud('communes', 'CommunesCrudController');
    Route::crud('achats', 'AchatsCrudController');
    Route::crud('souscategorie', 'SouscategorieCrudController');
    //Route::crud('images', 'ImagesCrudController');
    //Route::crud('adresse', 'AdresseCrudController');
    Route::crud('reduction', 'ReductionCrudController');
    Route::crud('marque', 'MarqueCrudController');
    Route::crud('produit', 'ProduitCrudController');
    Route::crud('clients', 'ClientsCrudController');
    Route::crud('administrators', 'AdministratorsCrudController');
}); // this should be the absolute last line of this file