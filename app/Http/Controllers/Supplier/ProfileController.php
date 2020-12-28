<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Supplier\ISupplierService;
use App\Http\Requests\Supplier\StoreSupplierRequest;
use App\Models\Supplier;
use App\Services\TermTaxonomy\ITermTaxonomyService;
use App\Models\Province;
use App\Models\City;

class ProfileController extends Controller
{
    private $supplier_service ,$taxonomy_service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ISupplierService $supplier_service,ITermTaxonomyService $taxonomy_service)
    {
        $this->middleware('auth');
        $this->supplier_service = $supplier_service;
        $this->taxonomy_service = $taxonomy_service;
    }
    public function profile(){
        $supplier=$this->supplier_service->view(\Auth::user()->userable_id);
        $categories = $this->taxonomy_service->categories();
        $provinces = Province::all();
        $cities = City::all();
        return view('supplier.profile.index')
                ->with('supplier',$supplier)
                ->with('profile',\Auth::user()->userable)
                ->with('categories',$categories)
                ->with('provinces',$provinces)
                ->with('cities',$cities);
    }


    public function update(Request $request){
        $this->supplier_service->update($request,$request->id);
        \Session::flash('message',"تمت العملية بنجاح");
            \Session::flash('status',true);
        return redirect()->back();
    }
}
