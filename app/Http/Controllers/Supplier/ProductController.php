<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\StoreProductRequest;
use Illuminate\Support\Facades\Validator;
use App\Models\WP\Option;
use App\Models\WP\Post;
use App\Models\WP\PostMeta;
use App\Models\Property;
use Illuminate\Http\Request;
use App\Models\WP\TermTaxonomy;
use App\Models\WP\TermRelation;
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

        $user0=\Auth::user()->username;
        $categories = $this->term_taxonomy_service->categories_and_sub(\Auth::user()->userable_id);
        $main_categories = $this->term_taxonomy_service->categories();
        $tags = $this->term_taxonomy_service->tags(\Auth::user()->userable_id);
        $attributes =$this->term_taxonomy_service->attributes(\Auth::user()->userable_id);
        $product = null;
        $props=Property::where('PropUser',$user0)->orderBy('created_at','desc')->get();
       
        
        
        if($id!=0)
        {
            $product = $this->post_service->find_product_for_supplier($id,\Auth::user()->wordpress_user->ID);
            
        }


        //By Blaxk 

        //Set Properties Values To 0
        $getProp=Property::where('PropUser',$user0)->where('PropStatus',1)->update(['PropStatus'=>0]);

        
   
        return view('supplier.products.addedit')
                ->with('categories',$categories)
                ->with('attributes',$attributes)
                ->with('main_categories',$main_categories)
                ->with('tags',$tags)
                ->with('product',$product)
                ->with('props',$props);
    }

    public function store(Request $request){
        set_time_limit(0);
        //By Blaxk 



     
                

        $product = null;
        try{
             if(!isset($request->request_type)){
              


                $ProdType =$request->input('product_type');
        
                if(!empty($ProdType) && $ProdType ==="variable"){
        
                    //,"product_type":"variable","post_id":"0","supplier_name":"Blaxk","post_author":"0","post_title":"xxxxxxxxxxxxxxxxxxxxxx","post_content":"xxxxxxxxxxxxxxxxxxx"}
                    $validate = Validator::make(request()->all(), [
                        'product_type'=>'required',
                        'post_id'=>'required|integer',
                        'supplier_name'=>"required",
                        'post_author'=>'required|integer',
                        'post_title'=>'required|min:6',
                        'post_content'=>'required|min:6',
        
                    ]);
        
                    if ($validate->fails()) {
                        
        
                        \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
                        return redirect()->back();
                    }
        
                }
                elseif(!empty($ProdType)  && $ProdType ==="simple"){
        
                    //validate (simple) Inputs
                    $validate = Validator::make(request()->all(), [
                        'product_type'=>'required',
                        'post_id'=>'required|integer',
                        'al_supplier_name'=>"required",
                        'post_author'=>'required|integer',
                        'post_title'=>'required|min:6',
                        'post_content'=>'required|min:6',
                        '_regular_price'=>'required|integer',
                        '_sale_price'=>'integer|nullable',
                        'al_thickness'=>'max:120|nullable',
                        'al_printing'=>'max:120|nullable',
                        'al_size'=>'max:120|nullable',
                        'al_added'=>'max:120|nullable',
                        'al_more_info'=>'max:120|nullable',
                        'al_color'=>'max:120|nullable',
                        '_sku'=>'max:120|nullable',
                        '_stock_status'=>'required',
                        '_wc_min_qty_product'=>'integer|nullable',
                        '_wc_max_qty_product'=>'integer|nullable',
                        'al_carton_qty'=>'required|integer',
                        'al_price_for'=>'required',
                        'al_price_for_desc'=>'required|integer',
                        'al_mix_of_package'=>'required|integer',
                        '_weight'=>'nullable|integer',
                        'al_cbm'=>'nullable|integer',
                        'al_days_to_delivery'=>'required|integer',
                        'supplierU'=>'required'
                    ]);
        
                    if ($validate->fails()) {
                        
                        \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
                        return redirect()->back();
                    }
                }
        
                else{
              
                    \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
                    return redirect()->back();
                }
                /// end 
                
                if($request->post_id == 0){
                    $product =  $this->post_service->store_product($request);
                    $this->post_service->store_gallery($request,$product->ID);
                }
                else{
                    $product =  $this->post_service->update_product($request,$request->post_id);
                }
                $this->post_service->store_product_general($request,$product->ID);
                $this->post_service->store_product_inventory($request,$product->ID);
                $this->post_service->store_product_shipping($request,$product->ID);
                $this->post_service->store_product_attributes_relation($request,$product->ID);
                $this->post_service->store_product_categories($request,$request->post_id);
                $this->post_service->store_product_tags($request,$request->post_id);
                $username=$request->input('supplierU');
                $this->post_service->save_product_props($product->ID,$username,$request);
                \Session::flash('message',"تمت العملية بنجاح");
                \Session::flash('status',true);
                if($request->post_id == 0 && $request->product_type=='simple'){
                 return redirect()->route('supplier.products.create',0);
                }
                return redirect()->route('supplier.products.create',$product->ID);

            }else{
                switch($request->request_type){
                    case "gallery":
                         $this->post_service->store_gallery($request,$request->post_id);
                    break;
                }

            }

        //By Blaxk 

        //Set Properties Values To 0
        $user0=\Auth::user()->username;
        $getProp=Property::where('PropUser',$user0)->where('PropStatus',1)->update(['PropStatus'=>0]);

        //

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
        $product =  $this->post_service->store_product_attributes($request,$request->post_id);
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
        //By Blaxk 
        //Set Properties Values To 0
        $getProp=Property::where('PropUser',$user0)->where('PropStatus',1)->update(['PropStatus'=>0]);

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


    public function AddAttr(Request $request)
    {
        $PostParent=$request->post_parent;
        $PostAuthor=$request->post_author;
        $attr=$request->attributes_values;

        //Check attribute is Unique
        $ChildProds=$this->post_service->get_product_variation($PostAuthor,$PostParent);
        $CheckTaxonomy=TermRelation::where('term_taxonomy_id',$attr)->whereIn('object_id',$ChildProds->pluck('ID'))->count();

        if($CheckTaxonomy !== 0 ){

            return response()->json(['success'=>false,'message'=>'exists','prods'=>null], 400);
        }

        //save product variation
        
        try {

            $this->post_service->store_product_variation($request);

            //get variation posts
            $prods=$this->post_service->get_product_variation($PostAuthor,$PostParent);
            $parnt=Post::where('ID',$PostParent)->first();
            return response()->json(['success'=>true,'message'=>'Saved','prods'=>$prods,'parent'=>$parnt], 201);


        } catch (Exception $ex) {
            
            return response()->json(['success'=>false,'message'=>'Wrong','prods'=>null], 400);

        }
    }


        public function DelPostMeta(Request $request)
        {
            //validate Inputs 
            $validate = Validator::make(request()->all(), [
                'MetaIdI'=>'required',
            ]);

            if ($validate->fails()) {
                return response()->json(['success'=>false,'message'=>'validate','props'=>null], 400);
            }


            //Chcek Postmeta 
            $CheckPostMeta=PostMeta::where('meta_id',$request->input('MetaIdI'))->first();

            if(!empty($CheckPostMeta)){

                try {
                        //Delete Post meta
                        $CheckPostMeta->delete();

                        //get properties 
                        $user0=\Auth::user()->username;
                        $getProps=Property::where('PropUser',$user0)->orderBy('created_at','desc')->get();

                        return response()->json(['success'=>true,'message'=>'success','props'=>$getProps], 200 );

                } catch (Exception $ex) {
                    
                    return response()->json(['success'=>false,'message'=>'fail','props'=>null], 400);

                }
   
            }

            else{
                return response()->json(['success'=>false,'message'=>'fail','props'=>null], 400);
            }



        }
        
        
    
}
