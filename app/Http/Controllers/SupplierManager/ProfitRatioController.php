<?php

namespace App\Http\Controllers\SupplierManager;

use App\Http\Controllers\Controller;
use App\Services\ProfitRatio\IProfitRatioService;
use App\Services\TermTaxonomy\ITermTaxonomyService;
use Illuminate\Http\Request;

class ProfitRatioController extends Controller
{
    //

    private $taxonomy_service,$profit_ratio_service;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(IProfitRatioService $profit_ratio_service,ITermTaxonomyService $taxonomy_service)
    {
        $this->middleware('auth');
        $this->taxonomy_service = $taxonomy_service;
        $this->profit_ratio_service = $profit_ratio_service;
    }

    public function index(){
        $ratios = $this->profit_ratio_service->getProfitRatios(\Auth::user()->userable->id)->get();
        $categories = $this->taxonomy_service->categories();

        return view('supplier_manager.profit_ratio.index')
                ->with('categories',$categories)
                ->with('ratios',$ratios);
    }
    public function update(Request $request){
        return  $this->profit_ratio_service->store($request);
    }
}
