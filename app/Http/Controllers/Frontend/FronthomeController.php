<?php

namespace App\Http\Controllers\Frontend;
use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Crisis;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FronthomeController extends Controller
{
    public function fhome(){
        $cri=Crisis::all();
        $volunteer=Volunteer::all();
        $totalvol=Volunteer::get()->count();
        return view ('frontend.fixed.home',compact('cri','volunteer','totalvol'));
    }

    public function signup(Request $request){

        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required|digits:8'
        ]);
     

        // $valid=Validator::make($request->all(),[
        //     'name'=>'required',
        //     'email'=>'required|email|unique:users',
        //     'password'=>'required|digits:8'

        // ]);
      
        // if($valid->fails()){
        //     toastr()->error('Something went wrong.');
        //     return redirect()->back();
        // }
        
        //dd($request->all());
        User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
            'role'=>'donor'
        ]);
        toastr()->success('Signed up successfully.');
        return redirect()->back();
    }

    public function login(Request $request){
        $request->validate([ 
            'email'=>'required|email',
            'password'=>'required|digits:8'
        ]);

        $credentials=$request->except('_token');
        if(auth()->attempt($credentials)){
            toastr()->success('Login success');
            return redirect()->back();
        }
        toastr()->error('Invalid information');
        return redirect()->back();
    }

    public function logout(){
        auth()->logout();
        toastr()->success('Logout success');
        return redirect()->back();
    }

    public function changelanguage($lang){
        session()->put('language',$lang);
        return redirect()->back();
    }

}