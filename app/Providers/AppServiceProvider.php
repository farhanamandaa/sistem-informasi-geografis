<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Locations\LocationsRepo;
use App\Repositories\Locations\LocationsInterfaces;
use App\Repositories\Categories\CategoriesRepo;
use App\Repositories\Categories\CategoriesInterfaces;


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
        $this->app->singleton(CategoriesInterfaces::class, CategoriesRepo::class);
    }
}
