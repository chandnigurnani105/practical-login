<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\User;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;



class AuthManager extends Controller
{
    //

    function login()
    {
        return view('login');
    }

    function registration()
    {
    return view('registration');

    }


    function loginPost(Request $request)
    {
        
       $validate = $request->validate([
          'email'=> 'required',
          'password'=>'required'
       ]);

    

        $credentials = $request->only('email','password');
        if(Auth::attempt($credentials)) {
         return redirect()->intended(route('home'));

        }
        return redirect(route('login'))->with("error", "Login details are not valid");
       

    }

    public function dashboard()
    {
        if(Auth::check()){
            return view('dashboard');
        }
  
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    function registrationPost(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'mobile'=>'required',
            'email'=> 'required|email|unique:users',
            'password'=>'required'
        ]);

       $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'mobile' => $request->mobile,
            'password'=>Hash::make($request->password),

         ]);
        if(!$user)
        {
            return redirect(route('registration'))->with("error", "Registration not successful");

        }
        //auth()->login($user);
         return redirect(route('login'))->with('success',"Register successfully");


       
    }

    function logout()
    {
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }

}
