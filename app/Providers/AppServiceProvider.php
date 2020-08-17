<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadViewsFrom(resource_path('views/vendor/sweetalert'), 'sweetalert');

        \Debugbar::disable();
        Route::resourceVerbs([
            'edit' => 'modification',
            'create' => 'creation',
            'login' => 'connexion',
        ]);
    }
}
