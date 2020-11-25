<?php

namespace App\Providers;

use App\Models\Supplier;
use App\Models\SupplierManager;
use App\Observers\SupplierObserver;
use App\Observers\SupplierManagerObserver;
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
        //
        Supplier::observe(SupplierObserver::class);
        SupplierManager::observe(SupplierManagerObserver::class);
    }
}
