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



    public function index($type){
        $categories = $this->taxonomy_service->categories();
        return view('supplier.taxonomies.index')
                ->with('categories',$categories)
                ->with('type',$type);
    }

    public function store(Request $request){
        //save
        $this->taxonomy_service->storeCategory($request);
        return redirect()->back();
    }
}
