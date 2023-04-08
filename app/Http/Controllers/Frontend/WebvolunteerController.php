<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Volunteer;
use App\Models\Volunteersregistration;
use Illuminate\Http\Request;

class WebvolunteerController extends Controller
{
    public function volunteersignup(Request $request){
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'email'=>'required|unique:users',
            'phone'=>'required|digits:11',
            'password'=>'required|digits:8'
        ]);

        Volunteersregistration::create([
            'name'=>$request->name,
            'image'=>$request->image,
            'address'=>$request->address,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>bcrypt($request->password),
            'role'=>'volunteer'
        ]);
        toastr()->success('Signed up successfully.');
        return redirect()->back();
    }
    

    public function volunteerview($id){
        $volun=Volunteer::find($id);
        return view('frontend.pages.volunteerview',compact('volun'));
    }

   
}
