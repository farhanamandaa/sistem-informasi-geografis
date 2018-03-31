<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Locations\LocationsRepo;
use App\Repositories\Locations\LocationsInterfaces;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(LocationsInterfaces::class, LocationsRepo::class);
    }
}
