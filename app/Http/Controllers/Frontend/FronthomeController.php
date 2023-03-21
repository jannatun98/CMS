<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FronthomeController extends Controller
{
    public function fhome(){
        return view ('frontend.fixed.home');
    }

    public function changelanguage($lang){
        session()->put('language',$lang);
        return redirect()->back();
    }
}