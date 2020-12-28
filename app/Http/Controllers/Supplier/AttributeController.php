<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WP\TermTaxonomy;
use App\Services\TermTaxonomy\ITermTaxonomyService;


class AttributeController extends Controller
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

    public function index(){
        $type="attributes";
        $data = $this->taxonomy_service->attributes(\Auth::user()->userable->id);
        return view('supplier.attributes.index')
                ->with('data',$data)
                ->with('type',$type);
    }
    public function getEditModal(Request $request){
        $categories = $this->taxonomy_service->categories();
        $taxonomy = TermTaxonomy::where('term_taxonomy_id',$request->term_taxonomy_id)->first();
        return view('supplier.attributes.components.edit_attribute')
        ->with('taxonomy',$taxonomy)
        ->with('type',$request->type)
        ->with('categories',$categories);
    }
    public function getAddTerm(Request $request){
        $categories = $this->taxonomy_service->categories();

        return view('supplier.attributes.components.term_modal')
        ->with('type',$request->type)
        ->with('taxonomy_type',$request->type)
        ->with('categories',$categories);
    }


    public function store(Request $request){
        try{

            $type="pa_".$request->name;
            $request->merge(['taxonomy' => $type]);
            $this->taxonomy_service->store($request,\Auth::user()->userable->id);
            \Session::flash('message',"تمت العملية بنجاح");
            \Session::flash('status',true);
        }
        catch(Exception $ex){
                \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
                \Session::flash('status',false);
                return "error";
        }

        return redirect()->back();
    }
    public function storeTerm(Request $request){
        try{
            $this->taxonomy_service->store($request,\Auth::user()->userable->id);
            \Session::flash('message',"تمت العملية بنجاح");
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
            $request->merge(['taxonomy' => "pa_".$request->name]);
            $this->taxonomy_service->updateAttribute($request,$term_taxonomy_id);
            \Session::flash('message',"تمت العملية بنجاح");
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
