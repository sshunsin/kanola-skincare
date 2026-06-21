<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function loginForm(){
        return view('auth.login');
    }

    public function login(Request $request){
        if(auth()->attempt($request->only('email','password'))){
            return redirect('/dashboard');
        }
        return back()->with('error','Login gagal');
    }

    public function logout(){
        auth()->logout();
        return redirect('/login');
    }
}