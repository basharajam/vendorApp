<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WP\TermTaxonomy;
use App\Services\TermTaxonomy\ITermTaxonomyService;

class TaxonomyController extends Controller
{
    private $taxonomy_service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ITermTaxonomyService  $axonomy_service)
    {
        $this->middleware('auth');
        $this->taxonomy_service=$axonomy_service;
    }

    public function getEditModal(Request $request){
        $categories = $this->taxonomy_service->categories();
        $taxonomy = TermTaxonomy::where('term_taxonomy_id',$request->term_taxonomy_id)->first();
        return view('supplier.taxonomies.components.edit_modal')
        ->with('taxonomy',$taxonomy)
        ->with('type',$request->type)
        ->with('categories',$categories);
    }

    public function categories(){
        $data = $this->taxonomy_service->categories_and_sub(\Auth::user()->userable->id);
        $categories = $this->taxonomy_service->categories();
        return view('supplier.taxonomies.index')
                ->with('data',$data)
                ->with('categories',$categories)
                ->with('type','product_cat');
    }

    public function tags(){
        $data = $this->taxonomy_service->tags(\Auth::user()->userable->id);
        return view('supplier.taxonomies.index')
                ->with('data',$data)
                ->with('type','product_tag');
    }
    public function index($type){
        $categories = $this->taxonomy_service->categories();
        return view('supplier.taxonomies.index')
                ->with('categories',$categories)
                ->with('type',$type);
    }

    public function store(Request $request){
        //save
        try{
            $request->merge(['taxonomy' => $request->type]);
            if($request->type=="product_cat"){
                $this->taxonomy_service->storeCategory($request,\Auth::user()->userable->id);
            }
            else{
                $this->taxonomy_service->store($request,\Auth::user()->userable->id);

            }
            \Session::flash('message',"تمت العلية بنجاح");
            \Session::flash('status',true);
        }
        catch(Exception $ex){
                \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
                \Session::flash('status',false);
                return "error";
        }

        return redirect()->back();
    }

    public function update($term_taxonomy_id,Request $request){
        //save
        try{
            $this->taxonomy_service->update($request,$term_taxonomy_id);
            \Session::flash('message',"تمت العلية بنجاح");
            \Session::flash('status',true);
        }
        catch(Exception $ex){
                \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
                \Session::flash('status',false);
                return "error";
        }
        return redirect()->back();
    }

    public function delete($term_taxonomy_id){
        return $this->taxonomy_service->delete($term_taxonomy_id);
    }
}
