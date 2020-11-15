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
        $products = $this->post_service->get_products_for_supplier(\Auth::user()->wordpress_user->ID);

        return view('supplier.products.index')
                ->with('products',$products);
    }

    public function create(){
        $categories = TermTaxonomy::categories()->get();

        return view('supplier.products.create2')
                ->with('categories',$categories)
                ->with('product',null);
    }
    public function edit(int $id){

        $product = $this->post_service->find_product_for_supplier($id,\Auth::user()->wordpress_user->id);
        $categories = TermTaxonomy::categories()->get();
        return view('supplier.products.edit')
                ->with('categories',$categories)
                ->with('product',$product);

    }

    public function store(StoreProductRequest $request){
        $product =  $this->post_service->store_product($request);
        //TOOD Add toaster
        return redirect()->route('supplier.products.index');
    }
    public function update(Request $request,$post_id){
        $product =  $this->post_service->update_product($request,$post_id);
        //TOOD Add toaster
        return redirect()->route('supplier.products.index');
    }
    public function delete(int $id){
        return $this->post_service->delete($id);
    }

    public function getForm($type){
        $categories = TermTaxonomy::categories()->get();
        switch($type){
            case \ProductTypes::SIMPLE:
                $product =null;
                return view('supplier.products.components.simple_product',compact('categories','product'));
            break;
            case \ProductTypes::VARIABLE:
                return view('supplier.products.components.variable_product');
            break;
        }
    }
}
