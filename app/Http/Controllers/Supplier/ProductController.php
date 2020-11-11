<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\StoreProductRequest;
use Illuminate\Http\Request;
use App\Models\WP\TermTaxonomy;
use App\Services\Post\IPostService;

class ProductController extends Controller
{
    private $post_service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IPostService  $post_service)
    {
        $this->middleware('auth');
        $this->post_service=$post_service;
    }

    public function index(){
        return view('supplier.products.index');
    }

    public function create(){
        $categories = TermTaxonomy::categories()->get();
        return view('supplier.products.create')
                ->with('categories',$categories);
    }

    public function store(StoreProductRequest $request){

        return $this->post_service->store_product($request);
    }
}
