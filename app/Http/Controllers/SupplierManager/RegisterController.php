<?php

namespace App\Http\Controllers\SupplierManager;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\StoreSupplierRequest;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Services\SupplierManager\ISupplierManagerService;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;
    private $supplier_manager_service ;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ISupplierManagerService $supplier_manager_service)
    {
        $this->middleware('guest');
        $this->supplier_manager_service = $supplier_manager_service;
    }


    /**
     * returns view for new supplier account
     */
    public function register(){
        return view('auth.register-supplier-manager');
    }

    public function create(StoreSupplierRequest $request){
        try{
           $manager =  $this->supplier_manager_service->store($request);
            \Session::flash('message',"تم انشاء الحساب بنجاح ");
            \Session::flash('status',true);
            \Auth::login($manager->user);
            return redirect()->route('supplier_manager.home');
        }
        catch(Exception $ex){
                \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
                \Session::flash('status',false);
                return "error";
        }
        return redirect()->route('login');
   }


}
