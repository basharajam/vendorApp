<?php

namespace App\Http\Controllers\SupplierManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WP\TermTaxonomy;
use App\Services\TermTaxonomy\ITermTaxonomyService;
use App\Http\Requests\TaxonomyRequest;
use App\Services\Supplier\ISupplierService;

class TaxonomyController extends Controller
{
    private $taxonomy_service,$supplier_service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ITermTaxonomyService  $axonomy_service,ISupplierService $supplier_service)
    {
        $this->middleware('auth');
        $this->taxonomy_service=$axonomy_service;
        $this->supplier_service = $supplier_service;
    }

    public function getEditModal(Request $request){
        $categories = $this->taxonomy_service->categories();
        $taxonomy = TermTaxonomy::where('term_taxonomy_id',$request->term_taxonomy_id)->first();
        $suppliers = $this->supplier_service->getSuppliersForManager(\Auth::user()->userable_id);
        return view('supplier_manager.taxonomies.components.edit_modal')
        ->with('taxonomy',$taxonomy)
        ->with('type',$request->type)
        ->with('categories',$categories)
        ->with('suppliers',$suppliers);

    }

    public function store(TaxonomyRequest $request){
        //save
        try{
            $request->merge(['taxonomy' => $request->type]);
            if($request->type=="product_cat"){
                $this->taxonomy_service->storeCategory($request,$request->supplier_id);
            }
            else{
                $this->taxonomy_service->store($request,$request->supplier_id);
            }
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
            $this->taxonomy_service->update($request,$term_taxonomy_id);
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
