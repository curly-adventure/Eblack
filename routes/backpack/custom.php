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
    Route::get('/achats/{id}', 'AchatsCrudController@show');
    // Update Order Status
	Route::post('achats/mise-a-jour', ['as' => 'updateOrderStatus', 'uses' => 'AchatsCrudController@updateStatus']);
    Route::crud('souscategorie', 'SouscategorieCrudController');
    //Route::crud('images', 'ImagesCrudController');
    //Route::crud('adresse', 'AdresseCrudController');
    Route::crud('reduction', 'ReductionCrudController');
    Route::crud('marque', 'MarqueCrudController');
    Route::crud('produit', 'ProduitCrudController');
    Route::crud('clients', 'ClientsCrudController');
    Route::crud('administrators', 'AdministratorsCrudController');
    Route::get('charts/weekly-users', 'Charts\WeeklyUsersChartController@response');
    Route::crud('tarif_livraisons', 'Tarif_livraisonsCrudController');
    Route::crud('sliders', 'SlidersCrudController');
    Route::get('charts/achats', 'Charts\AchatsChartController@response');
    Route::get('charts/count', 'Charts\CountChartController@response');
    Route::crud('marge', 'MargeCrudController');
    Route::crud('promotion', 'PromotionCrudController');
}); // this should be the absolute last line of this file