<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function postlogin(Request $request){
        if (Auth::attempt($request->only('username','password'))) {
            return redirect('admin/dashboard');
        }
        return redirect('login');
    }

    public function logout(){
        Auth::logout();
        return redirect('login');
    } 
}
