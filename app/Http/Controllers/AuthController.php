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
            toastr()->success('Successfully logged in.');
            return redirect()->route('home');
        }

    }

    public function logout(){
        Auth::logout();
        toastr()->success('Successfully logged out.');
        return redirect()->back();
    }
}
