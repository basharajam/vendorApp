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
        $data = $this->taxonomy_service->categories();
        return view('supplier.taxonomies.index')
                ->with('data',$data)
                ->with('categories',$data)
                ->with('type','product_cat');
    }

    public function tags(){
        $data = $this->taxonomy_service->tags();
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
        $request->merge(['taxonomy' => $request->type]);
        if($request->type=="product_cat"){
            $this->taxonomy_service->storeCategory($request);
        }
        else{
            $this->taxonomy_service->store($request);

        }
        return redirect()->back();
    }

    public function update($term_taxonomy_id,Request $request){
        //save
        $this->taxonomy_service->update($request,$term_taxonomy_id);
        return redirect()->back();
    }

    public function delete($term_taxonomy_id){
        return $this->taxonomy_service->delete($term_taxonomy_id);
    }
}