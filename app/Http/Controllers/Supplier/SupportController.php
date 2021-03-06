<?php

namespace App\Http\Controllers\Supplier;

use App\Events\SupportStored;
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
        
        return view('supplier.support.create');
    }

    // public function store(StoreSupportRequest $request){

    //     return $request->all();
    //     try{


    //        $support =  $this->support_request_service->store($request);
    //         \Session::flash('message',"شكرا لتواصلك مع اليمان ,سيتم الرد على أستفسارك خلال 24 ساعة");
    //         \Session::flash('status',true);
    //         \Session::flash('where','support');
    //         event(new SupportStored($support));
    //     }
    //     catch(Exception $ex){
    //             \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
    //             \Session::flash('status',false);
    //             return "error";
    //     }



    //      return redirect()->route('supplier.home');

    // }

    public function store(Request $request){

        try{


           $support =  $this->support_request_service->store($request);
            \Session::flash('message',"شكرا لتواصلك مع اليمان ,سيتم الرد على أستفسارك خلال 24 ساعة");
            \Session::flash('status',true);
            \Session::flash('where','support');
            return event(new SupportStored($support));
        }
        catch(Exception $ex){
                \Session::flash('message',"لقد حدث خطأ ما , الرجاء المحاولة لاحقاً");
                \Session::flash('status',false);
                return "error";
        }

         return redirect()->route('supplier.home');

    }
}
