<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class WebvolunteerController extends Controller
{
    public function volunteerview($id){
        $volun=Volunteer::find($id);
        return view('frontend.pages.volunteerview',compact('volun'));
    }
}
