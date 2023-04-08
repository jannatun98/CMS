<?php

namespace App\Http\Controllers\Frontend;
use App\Models\User;
use App\Models\Donation;
use App\Models\Donor;
use App\Http\Controllers\Controller;
use App\Models\Crisis;
use App\Models\Crisistypes;
use App\Models\Location;
use App\Models\Volunteer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FronthomeController extends Controller
{
    public function profile()
    {
        return view('frontend.pages.profile');
    } 

    public function updateProfile(Request $request)
    {
       //validation

        $user=User::find(auth()->user()->id);
        $user->update([
           'name'=>$request->name,
           'address'=>$request->address,
        ]);

        toastr()->success('User profile updated.');
        return redirect()->route('f.home');
    }

    public function donatenowform(){
        $crisis=Crisis::all();
        $donor=Donor::all();
        return view('frontend.pages.donatenow',compact('crisis','donor'));
    }

    public function donatenowsubmit(Request $request){
        $request->validate([
            'crisis_id'=>'required',
            'donor_id'=>'required',
            'donate_amount'=>'required|min:3',
            'payment_method'=>'required',
            'transaction_id'=>'required',
        ]);


        Donation::create([
            "crisis_id"=>$request->crisis_id,
            "donor_id"=>$request->donor_id,
            "donate_amount"=>$request->donate_amount,
            "payment_method"=>$request->payment_method,
            "transaction_id"=>$request->transaction_id,
        ]);
        toastr()->success('Donation submitted.');
        return redirect()->route('f.home');
    }

    public function crisistypesview($id){
        $crisistypes=Crisistypes::find($id);
        return view('frontend.pages.crisistypesview',compact('crisistypes'));
    }

    public function locationview($id){
        $location=Location::find($id);
        return view('frontend.pages.locationview',compact('location'));
    }

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
        return redirect()->route('f.home');
    }

    public function changelanguage($lang){
        session()->put('language',$lang);
        return redirect()->back();
    }

}