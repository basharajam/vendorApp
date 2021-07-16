<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
     //protected $redirectTo = RouteServiceProvider::HOME;

     //By-Blaxk fix Worng Redirection When Succes Verified
     public function redirectTo()
     {
         $user = \Auth::user();
         if($user->hasRole(\App\Constants\UserRoles::SUPPLIER)){
             return  RouteServiceProvider::SUPPLIER_HOME;
         }
         else if($user->hasRole(\App\Constants\UserRoles::SUPPLIERMANAGER)){
             return RouteServiceProvider::SUPPLIER_MANAGER_HOME;
         }
         else{
            return RouteServiceProvider::SUPPLIER_HOME;
         }
         // dd($user->hasRole(\App\Constants\UserRoles::SUPPLIERMANAGER));
     }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }
}
