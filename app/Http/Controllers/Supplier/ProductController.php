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

    public function addedit($id=0){


        $categories = $this->term_taxonomy_service->categories();
        $attributes =$this->term_taxonomy_service->attributes(\Auth::user()->userable->id);
        $product = null;
        if($id!=0)
        {
            $product = $this->post_service->find_product_for_supplier($id,\Auth::user()->wordpress_user->ID);
        }

        return view('supplier.products.addedit')
                ->with('categories',$categories)
                ->with('attributes',$attributes)
                ->with('product',$product);
    }

    public function store(Request $request){
        $product = null;
        try{
            if(!isset($request->request_type)){
                if($request->post_id == 0)
                    $product =  $this->post_service->store_product($request);
                else{
                    $product =  $this->post_service->update_product($request,$request->post_id);
                }
                $product =  $this->post_service->store_product_general($request,$product->ID);
                $product =  $this->post_service->store_product_inventory($request,$product->ID);
                $product =  $this->post_service->store_product_shipping($request,$product->ID);
                $product =  $this->post_service->store_product_attributes($request,$product->ID);

            }else{
                switch($request->request_type){
                    case "categories":
                        $product =  $this->post_service->store_product_categories($request,$request->post_id);
                    break;
                }

            }

            \Session::flash('message',"تمت العملية بنجاح");
            \Session::flash('status',true);
        }
        catch(Exception $ex){
            \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
            \Session::flash('status',false);
        }

        //TOOD Add toaster
        return redirect()->route('supplier.products.create',$product->ID ?? $request->post_id  ??  0);
    }

    public function delete(int $id){
        try{
                \Session::flash('message',"تمت العملية بنجاح");
                \Session::flash('status',true);
                return $this->post_service->delete($id);
            }
        catch(Exception $ex){
                \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
                \Session::flash('status',false);
                return "error";
        }
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
        $taxonomy =TermTaxonomy::where('term_taxonomy_id',$request->term_taxonomy_id)->first();
        return view('supplier.products.components.product_form.attribute_selector')
        ->with('taxonomy',$taxonomy->taxonomy)
        ->with('terms',$taxonomy->terms)
        ->with('selected_terms',collect());
    }

    public function getTaxonomyTerms(Request $request){
        $taxonomy =TermTaxonomy::where('term_taxonomy_id',$request->term_taxonomy_id)->first();
        return $taxonomy->terms;
    }
    public function storeVariation(Request $request){
        try{
            \Session::flash('message',"تمت العملية بنجاح");
            \Session::flash('status',true);
            $product = $this->post_service->store_product_variation($request);
        }
        catch(Exception $ex){
            \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
            \Session::flash('status',false);
    }
        return redirect()->back();
    }
    public function storeVariationMeta(Request $request){
        try{
            \Session::flash('message',"تمت العملية بنجاح");
            \Session::flash('status',true);
            $product= $this->post_service->store_product_general($request,$request->post_id);
            $product =  $this->post_service->store_product_inventory($request,$request->post_id);
            $product =  $this->post_service->store_product_shipping($request,$request->post_id);
        }
        catch(Exception $ex){
            \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
            \Session::flash('status',false);
    }

        return redirect()->route('supplier.products.create',$request->post_parent  ??  0);
    }
}
