<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Models\User;

class UserCtrl extends Controller
{
    
    public function login_view(){
        return view('login');
    }

    public function login(Request $request){
        // $user  = User::where([['email','=',$request->email],['otp','=',$request->otp]])->first();
        $user  =User::where([['email','=',$request->email],['otp','=',$request->otp]])->get()->last();
        $data = User::all();
        // dd($otp);
        if($user){
            return view('dashboard',['data'=>$data]);
            // auth()->login($user, true);
            // User::where('email','=',$request->email)->update(['otp' => null]);
            // $accessToken = auth()->user()->createToken('authToken')->accessToken;

            // return response(["status" => 200, "message" => "Success", 'user' => auth()->user(), 'access_token' => $accessToken]);
        }
        else{
            return redirect('/login')->with('status', 'Please try again !');
        }
    }

    public function otp_send(Request $request){ 
        // echo $request->user_id; 
        $user_email = $request->user_id;
        $otp = rand(1000,9999);
        $data = ['name'=>'Papun','email'=>$user_email,'otp'=>$otp];
        $user['to'] = $user_email = $request->user_id;

        Mail::send('mail_template',$data, function($message) use ($user){
          $message ->to($user['to']);
          $message ->subject('Your One Time Password');
        }); 

        $user_datas = new User();
        $user_datas->name = 'Papun';
        $user_datas->email = $user_email;
        // $user_datas->email_verified_at = '';
        $user_datas->remember_token = '';
        $user_datas->password = '123';
        $user_datas->otp = $otp;
        $user_datas->save();
        
    }

    public function resend_otp(Request $request){ 
        // echo $request->user_id; 
        $user_email = $request->user_id;
        $otp = rand(1000,9999);
        $data = ['name'=>'Papun','email'=>$user_email,'otp'=>$otp];
        $user['to'] = $user_email = $request->user_id;

        Mail::send('mail_template',$data, function($message) use ($user){
          $message ->to($user['to']);
          $message ->subject('Your One Time Password');
        }); 

        $user_datas = new User();
        $user_datas->name = 'Papun';
        $user_datas->email = $user_email;
        // $user_datas->email_verified_at = '';
        $user_datas->remember_token = '';
        $user_datas->password = '123';
        $user_datas->otp = $otp;
        $user_datas->save();
        
    }
}
