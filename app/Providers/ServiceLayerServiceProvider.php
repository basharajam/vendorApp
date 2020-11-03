<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\User\IUserService;
use App\Services\User\UserService;

//namespaces


class ServiceLayerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(
    IUserService::class,
    UserService::class
);

//add bindings

    }
}
