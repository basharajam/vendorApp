<?php

namespace App\Http\Controllers\SupplierManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SupplierManager\ISupplierManagerService;

class ProfileController extends Controller
{
    private $supplier_manager_service ;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ISupplierManagerService $supplier_manager_service)
    {
        $this->supplier_manager_service = $supplier_manager_service;
    }

    public function update(Request $request){
        $this->supplier_manager_service->update($request,$request->id);
        return redirect()->back();
    }
}
