<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Symfony\Component\VarDumper\VarDumper;


class ForgotPasswordController extends Controller
{
   public function forgetPassword(){
    return view('auth.forgetPassword');
   } 
   public function forgetPasswordPost(Request $request){
    $request->validate([
        'email' =>'email|required|exists:users',
    ]);
    $token = Str::random(64);
    DB::table('password_reset_tokens')->insert([
        'email' => $request->email,
        'token' => $token,
        'created_at' => Carbon::now(),
    ]);
    Mail::send('emails.forgetPassword',['token'=> $token],function($message) use ($request){
        $message->to($request->email);
        $message->subject("reset password");

    });
    return redirect()->route('forgetPassword')->with('success','check your email');
   }

   public function resetPassword($token){

    return view('auth.newPassword',compact('token'));
   }

   public function resetPasswordPost(Request $request){
    $request->validate([
        'email' => 'required|email|exists:users',
        'Newpassword' => 'required|string|min:8',
        'Confirmepassword' =>'required',
    ]);

    $updatePassword = DB::table('password_reset_tokens')
        ->where([
            'email' => $request->email,
            'token' => $request->token,
        ])->first();
        

    if(!$updatePassword){
        return redirect()->route('reset_password')->with('error','Invalid token');
    }

    if($request->Newpassword !== $request->Confirmepassword){
        return redirect()->route('reset_password')->with('error','Passwords do not match');
    }

    User::where('email', $request->email)
        ->update(['password' => Hash::make($request->Newpassword)]);

    DB::table('password_reset_tokens')
        ->where('email', $request->email)
        ->delete();

    return redirect()->route('login.create')->with('success','Your password has been updated');
}

  


   }
    
    

