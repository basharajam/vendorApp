<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use App\Http\Requests\Supplier\StoreSupplierRequest;
use App\Models\City;
use App\Models\Province;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Services\Supplier\ISupplierService;
use App\Services\TermTaxonomy\ITermTaxonomyService;
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
    protected $supplier_service,$taxonomy_service;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(ISupplierService $supplier_service ,ITermTaxonomyService $taxonomy_service)
    {
        $this->middleware('guest');
        $this->supplier_service= $supplier_service;
        $this->taxonomy_service = $taxonomy_service;
    }


    /**
     * returns view for new supplier account
     */
    public function register(){
        $categories = $this->taxonomy_service->categories();
        $provinces = Province::all();
        $cities = City::all();
        return view('auth.register-supplier')
        ->with('categories',$categories)
        ->with('provinces',$provinces)
        ->with('cities',$cities);
    }

    public function create(StoreSupplierRequest $request){


        //validate Inputs 
        $validate = Validator::make(request()->all(), [
            'role'=>'required',
            'ischinese'=>'required',
            'first_name'=>'required',
            'last_name'=>'required',
            'national_number'=>'integer',
            'username'=>'required|min:6',
            'password'=>'required|min:6',
            'password_confirmation'=>'required|min:6',
            'day'=>'required|integer',
            'month'=>'required|integer',
            'year'=>'required|integer',
            'email'=>'required',
            'mobile_number_without_code'=>'required|integer',
            'mobile_number'=>'required',
            'company_name'=>'required',
            'bank_account_number'=>'required|integer',
            'bank_account_owner_name'=>'required'


        ]);

        if ($validate->fails()) {
            \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
            \Session::flash('status',false);
            return redirect()->back();
        }

        
        try{
            $supplier = $this->supplier_service->store($request);
            request()->merge(['user_id'=>$supplier->user->id]);
            \Session::flash('message',"تم تسجيل الحساب بنجاح");
            \Session::flash('status',true);
             //return \Route::sendToRoute($request, 'auth.sendOTP');
            \Auth::login($supplier->user);
            return redirect()->route('supplier.home');
        }
        catch(Exception $ex){
                \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
                \Session::flash('status',false);
                return redirect()->back();
        }


    }
}
