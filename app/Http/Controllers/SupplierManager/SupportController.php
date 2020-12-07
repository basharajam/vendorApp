<?php

namespace App\Http\Controllers\SupplierManager;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSupportRequest;
use App\Services\SupportRequest\ISupportRequestService;
use Illuminate\Http\Request;
class SupportController extends Controller
{
    protected $support_request_service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ISupportRequestService $support_request_service)
    {
        $this->middleware('auth');
        $this->support_request_service= $support_request_service;
    }

    public function viewForm(){
        return view('supplier_manager.support.create');
    }

    public function store(StoreSupportRequest $request){
         $this->support_request_service->store($request);
        toaster()->add('Your Request was sent sucessfully');
         return redirect()->route('supplier.home');

    }
}
