<?php

namespace App\Http\Controllers\SupplierManager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\StoreProductRequest;
use App\Models\Supplier;
use App\Models\WP\Option;
use App\Models\WP\PostMeta;
use Illuminate\Http\Request;
use App\Models\WP\TermTaxonomy;
use App\Services\Post\IPostService;
use App\Services\TermTaxonomy\ITermTaxonomyService;
use Symfony\Component\HttpKernel\Event\RequestEvent;
class ProductController extends Controller
{
    //
    private $post_service,$term_taxonomy_service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IPostService  $post_service,
                                ITermTaxonomyService $term_taxonomy_service
                               )
    {
        $this->middleware('auth');
        $this->post_service=$post_service;
        $this->term_taxonomy_service = $term_taxonomy_service;
    }

    public function index(){
        $products = $this->post_service->get_products_for_supplier_manager(\Auth::user()->userable_id);

        return view('supplier.products.index')
                ->with('products',$products);
    }
    public function view(Supplier $supplier){
        $products = $this->post_service->get_products_for_supplier($supplier->user->wordpress_user->ID);

        return view('supplier.products.index')
                ->with('supplier',$supplier)
                ->with('products',$products)
                ;
    }

}
