<?php

namespace App\Providers;

use App\Http\Resources\PharmacistRessource;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        PharmacistRessource::withoutWrapping();
        //
    }
}
