<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function loginStore(Request $request){
        //dd($request->all());
        $cradentials = $request->except("_token");
        if(auth()->attempt($cradentials)){
            return redirect()->route('home');
        }

    }

    public function logout(){
        Auth::logout();
        return redirect()->back()->with('message', 'Logout Successful.');
    }
}
