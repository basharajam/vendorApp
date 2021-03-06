<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use SmsTo;
use App\Models\User;
class OTPController extends Controller
{
    use AuthenticatesUsers;
    //
    //page to enter the sent opt code
    public function index(Request $response){
        return view('auth.otp');
    }
    public function sendOtp(Request $request){
        $user = \Auth::user();
        if ( isset($request->mobile_number) ||($user &&  $user->mobile)) {
            $otp = rand(100000, 999999);
            $messages = [
                [
                    'to' => $request->mobile_number ??  $user->mobile,
                    'message'=>"Welcome To Alyaman Vendor System Please verify your number by typing this code : ".$otp,
                ]
            ];
          SmsTo::setMessages($messages)->setSenderId('Alyaman')->sendSingle();
            \Session::put('OTP',$otp);
            \Session::put('UserID',$request['user_id']);
            return view('auth.otp')
                    ->with('otp',$otp)
                    ->with('mobile_number',$request->mobile_number)
                    ->with('user_id',$request->user_id);
        }
        return \Route::sendToRoute($request, 'login');

    }

    public function verifyOtp(Request $request){
        $enteredOtp = $request->otp;
        $OTP = \Session::get('OTP');
        $user_id =$request->user_id;
        if($OTP == $enteredOtp){
            $user = User::where('id',$user_id)->first();
            if($user){
                $user->update([
                    'mobile_verified_at'=>now()
                ]);
                \Session::forget('OTP');
                \Session::forget('UserID');
                \Session::flash('message',"تم التسجيل بنجاح الرجاء تسجيل الدخول");
                \Session::flash('status',true);
                \Auth::login($user);
                return redirect()->route('supplier.home');
            }
            else{
                \Session::flash('message',"لقد قمت بادخال رمز خاطئ");
                    \Session::flash('status',false);
                    return \Route::sendToRoute($request, 'auth.sendOTP');

                }
            }
        return \Route::sendToRoute($request, 'auth.sendOTP');
    }
}

