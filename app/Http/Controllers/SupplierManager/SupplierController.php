<?php

namespace App\Http\Controllers\SupplierManager;

use App\Http\Controllers\Controller;
use App\Services\Supplier\ISupplierService;
use Illuminate\Http\Request;
use App\Http\Requests\Supplier\StoreSupplierRequest;
use App\Models\Supplier;

class SupplierController extends Controller
{

    private $supplier_service ;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ISupplierService $supplier_service)
    {
        $this->middleware('auth');
        $this->supplier_service = $supplier_service;
    }
    public function index(){
        $suppliers = $this->supplier_service->getSuppliersForManager(\Auth::user()->id);
        return view('supplier_manager.suppliers.index')
                ->with('suppliers',$suppliers);
    }
    public function create(){
        return view("supplier_manager.suppliers.create");
    }
    public function store(StoreSupplierRequest $request){
        $this->supplier_service->store($request);
        return redirect()->route('supplier_manager.suppliers.index');
    }

    public function edit($id){
        $supplier=$this->supplier_service->view($id);
        return view("supplier_manager.suppliers.edit")
                ->with('supplier',$supplier);
    }

    public function update(Request $request){
        $this->supplier_service->update($request,$request->id);
        return redirect()->route('supplier_manager.suppliers.index');
    }
    
    public function delete($id){
        return $this->supplier_service->delete($id);
    }
}
