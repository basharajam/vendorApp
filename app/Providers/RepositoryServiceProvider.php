<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\UserRepository;
use App\Models\User;

use App\Repositories\SupplierRepository;
use App\Models\Supplier;

use App\Repositories\SupportRequestRepository;
use App\Models\SupportRequest;

use App\Repositories\PostRepository;
use App\Models\WP\Post;

use App\Repositories\TermTaxonomyRepository;
use App\Models\WP\TermTaxonomy;

use App\Repositories\OrderItemRepository;
use App\Models\WP\OrderItem;

use App\Repositories\SupplierManagerRepository;
use App\Models\SupplierManager;

//namespaces



class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
            $this->app->bind('App\Repositories\UserRepository', function (Application $app) {
            return new UserRepository(
                $app->make(User::class)
            );
    });

        $this->app->bind('App\Repositories\SupplierRepository', function (Application $app) {
            return new SupplierRepository(
                $app->make(Supplier::class)
            );
    });

        $this->app->bind('App\Repositories\SupportRequestRepository', function (Application $app) {
            return new SupportRequestRepository(
                $app->make(SupportRequest::class)
            );
    });

        $this->app->bind('App\Repositories\PostRepository', function (Application $app) {
            return new PostRepository(
                $app->make(Post::class)
            );
    });

        $this->app->bind('App\Repositories\TermTaxonomyRepository', function (Application $app) {
            return new TermTaxonomyRepository(
                $app->make(TermTaxonomy::class)
            );
    });

        $this->app->bind('App\Repositories\OrderItemRepository', function (Application $app) {
            return new OrderItemRepository(
                $app->make(OrderItem::class)
            );
    });

        $this->app->bind('App\Repositories\SupplierManagerRepository', function (Application $app) {
            return new SupplierManagerRepository(
                $app->make(SupplierManager::class)
            );
    });

    //add bindings







    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
