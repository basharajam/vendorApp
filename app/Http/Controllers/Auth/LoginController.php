<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
   // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**overrid login  method */
    public function login(Request $request){
        $this->validateLogin($request);

        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        
      
        if ($this->attemptLogin($request)) {

            return $this->sendLoginResponse($request);
        }

       

  


        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }




    protected function validateLogin(Request $request)
    {
        $messages = [
            'cred.required' => 'Email or username cannot be empty',
            'password.required' => 'Password cannot be empty',
        ];

        $request->validate([
            'cred' => 'required|string',
            'password' => 'required|string',
        ], $messages);
    }


    public function redirectTo()
    {
        $user = \Auth::user();
        if($user->hasRole(\App\Constants\UserRoles::SUPPLIER)){
            return  RouteServiceProvider::SUPPLIER_HOME;
        }
        else if($user->hasRole(\App\Constants\UserRoles::SUPPLIERMANAGER)){
            return "/supplier_manager/home";
        }
        else{
            return  "/supplier_manager/home";
        }
        // dd($user->hasRole(\App\Constants\UserRoles::SUPPLIERMANAGER));
    }

    
    public function username()
{

 
     $login = request()->input('cred');

     $field = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
     request()->merge([$field => $login]);


     return $field;
}

}
