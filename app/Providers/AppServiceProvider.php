<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use View;
use App\Association;
use Illuminate\Support\Facades\Schema;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer( 'includes.navbar', function ($view) {
            $view->with('assoDiminutifs', Association::diminutif());
        });

        View::composer( 'layouts.front', function ($view) {
            $view->with('assoDiminutifs', Association::diminutif());
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
