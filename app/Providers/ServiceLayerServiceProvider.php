<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use App\Services\User\IUserService;
use App\Services\User\UserService;


use App\Services\Supplier\ISupplierService;
use App\Services\Supplier\SupplierService;


use App\Services\SupportRequest\ISupportRequestService;
use App\Services\SupportRequest\SupportRequestService;


use App\Services\Post\IPostService;
use App\Services\Post\PostService;


use App\Services\TermTaxonomy\ITermTaxonomyService;
use App\Services\TermTaxonomy\TermTaxonomyService;


use App\Services\OrderItem\IOrderItemService;
use App\Services\OrderItem\OrderItemService;


use App\Services\SupplierManager\ISupplierManagerService;
use App\Services\SupplierManager\SupplierManagerService;


use App\Services\ProfitRatio\IProfitRatioService;
use App\Services\ProfitRatio\ProfitRatioService;

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

            $this->app->bind(
                ISupplierService::class,
                SupplierService::class
            );

            $this->app->bind(
    ISupportRequestService::class,
    SupportRequestService::class
);

$this->app->bind(
    IPostService::class,
    PostService::class
);

$this->app->bind(
    ITermTaxonomyService::class,
    TermTaxonomyService::class
);

$this->app->bind(
    IOrderItemService::class,
    OrderItemService::class
);

$this->app->bind(
    ISupplierManagerService::class,
    SupplierManagerService::class
);

$this->app->bind(
    IProfitRatioService::class,
    ProfitRatioService::class
);

//add bindings








    }
}
