<?php

namespace App\Http\Controllers\SupplierManager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\SupplierManager\ISupplierManagerService;
use App\Services\User\IUserService;

class ProfileController extends Controller
 {
    private $supplier_manager_service ;
    private $user_service ;
    /**
    * Create a new controller instance.
    *
    * @return void
    */

    public function __construct( ISupplierManagerService $supplier_manager_service, IUserService $user_service ) {
        $this->supplier_manager_service = $supplier_manager_service;
        $this->user_service = $user_service;
    }

    public function profile() {
        $supplier_manager = $this->supplier_manager_service->view( \Auth::user()->userable_id );
        return view( 'supplier_manager.profile.index' )
        ->with( 'user', \Auth::user() )
        ->with( 'supplier_manager', $supplier_manager );
    }

    public function update( Request $request ) {
        //var_dump($request->request);
        $this->supplier_manager_service->update( $request, $request->id );
        $user = \Auth::user();
        $user->name = $request->name;
        $user->save();
        //$this->user_service->update( $user, $user->id );
        return redirect()->back();
    }
}
