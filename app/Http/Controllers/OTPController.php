<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SmsTo;
class OTPController extends Controller
{
//    use SmsTo;
    //
    //page to enter the sent opt code
    public function index(Request $response){
        return view('auth.opt');
    }
    public function sendOtp(Request $request){
        $user = \Auth::user();
        if ( isset($user->mobile) && $user->mobile_verified_at ==null ) {
            $otp = rand(100000, 999999);
            $messages = [
                [
                    'to' => $user->mobile,
                    'message'=>"Welcome To Alyaman Vendor System Please verify your number by typing this code : ".$otp,

                ]
            ];
            SmsTo::setMessages($messages)->sendSingle();
            return view('auth.otp');
        }
    }

    public function verifyOtp(Request $request){
        $response = array();
        $enteredOtp = $request->otp;
        $OTP = $request->session()->get('OTP');
        $user = \Auth::user();
        if($user){
            if($OTP === $enteredOtp){
                        $user->update([
                            'mobile_verified_at'=>now()
                        ]);
                        Session::forget('OTP');
                        $response['error'] = 0;
                        $response['isVerified'] = 1;
                        $response['loggedIn'] = 1;
                        $response['message'] = "Your Number is Verified.";
            }
            else{
                $response['error'] = 1;
                $response['isVerified'] = 0;
                $response['loggedIn'] = 1;
                $response['message'] = "OTP does not match.";
            }
        }
        return $response;
    }
}

