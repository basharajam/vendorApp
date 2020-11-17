<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\StoreProductRequest;
use Illuminate\Http\Request;
use App\Models\WP\TermTaxonomy;
use App\Services\Post\IPostService;
use App\Services\TermTaxonomy\ITermTaxonomyService;
use Symfony\Component\HttpKernel\Event\RequestEvent;

class ProductController extends Controller
{
    private $post_service,$term_taxonomy_service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IPostService  $post_service,ITermTaxonomyService $term_taxonomy_service)
    {
        $this->middleware('auth');
        $this->post_service=$post_service;
        $this->term_taxonomy_service = $term_taxonomy_service;
    }

    public function index(){
        $products = $this->post_service->get_products_for_supplier(\Auth::user()->wordpress_user->ID);

        return view('supplier.products.index')
                ->with('products',$products);
    }

    public function create($id=0){
        
        $categories = TermTaxonomy::categories()->get();
        $attributes =$this->term_taxonomy_service->attributes();
        $product = null;
        if($id!=0)
        {
            $product = $this->post_service->find_product_for_supplier($id,\Auth::user()->wordpress_user->ID);
        }

        return view('supplier.products.create2')
                ->with('categories',$categories)
                ->with('attributes',$attributes)
                ->with('product',$product);
    }
    public function edit(int $id){
        $product = $this->post_service->find_product_for_supplier($id,\Auth::user()->wordpress_user->id);
        $categories = TermTaxonomy::categories()->get();
        return view('supplier.products.edit')
                ->with('categories',$categories)
                ->with('product',$product);

    }

    public function store(Request $request){
        $product =  $this->post_service->store_product($request);
        //TOOD Add toaster
        return redirect()->route('supplier.products.create',$product->ID);
    }

    public function storeGeneral(Request $request){
        $product =  $this->post_service->store_product_general($request,$request->post_id);
        //TOOD Add toaster
        return redirect()->route('supplier.products.create',$product->ID);
    }
    public function storeInventory(Request $request){
        $product =  $this->post_service->store_product_inventory($request,$request->post_id);
        //TOOD Add toaster
        return redirect()->route('supplier.products.create',$product->ID);
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
    public function getAttributeSelector(Request $request){
        $taxonomy = TermTaxonomy::where('term_taxonomy_id',$request->term_taxonomy_id)->first();
        return view('supplier.products.components.product_form.attribute_selector')->with('taxonomy',$taxonomy);
    }
}
