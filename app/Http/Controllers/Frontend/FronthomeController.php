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
        $user=User::find(auth()->user()->id);
        return view('frontend.pages.profile',compact('user'));
    } 

    public function updateProfile(Request $request)
    {
       //validation
       
       $request->validate([
        'name'=>'required',
        'email'=>'required|email',
        'address'=>'required',
        'date_of_birth'=>'after:01/01/1943|before:01/01/1998',
        'gender'=>'required',
        'phone'=>'required|numeric|digits:11',

    ]);

        $user=User::find(auth()->user()->id);

        $fileName=null;
        $fileName=$user->image;
        if($request->hasFile('image'))
        {
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        } 

        $user->update([

            
           'name'=>$request->name,
           'address'=>$request->address,
           "image"=>$fileName,
           "date_of_birth"=>$request->date_of_birth,
           "gender"=>$request->gender,
           "phone"=>$request->phone,

        ]);

        toastr()->success('User profile updated.');
        return redirect()->route('f.home');
    }

    public function donatenowform($id){
        $crisis=Crisis::find($id);
        $donor=Donor::all();
        return view('frontend.pages.donatenow',compact('crisis','donor'));
    }

    public function donatenowsubmit(Request $request,$id){
        $request->validate([
            'donate_amount'=>'required|min:3',
            'payment_method'=>'required',
            'transaction_id' => 'required|numeric|digits:12',
        ]);

        // dd($request->all());

        Donation::create([
            "crisis_id"=>$id,
            "donor_id"=>auth()->user()->id,
            "name"=>auth()->user()->name,
            "donate_amount"=>$request->donate_amount,
            "payment_method"=>$request->payment_method,
            "transaction_id"=>$request->transaction_id,
        ]);
        $crisis=Crisis::find($id);
        $crisis->increment('amount_raised',$request->donate_amount);
        toastr()->success('Donation submitted.');
        return redirect()->route('f.home');
    }

    public function crisistypesview($id){
        $crisistypes=Crisistypes::find($id);
        return view('frontend.pages.crisistypesview',compact('crisistypes'));
    }

    // public function locationview($id){
    //     $location=Location::find($id);
    //     return view('frontend.pages.locationview',compact('location'));
    // }

    public function fhome(){
        $cri=Crisis::where('to_date', '>=', now())->get();
        $volunteer=User::where('status', 'accepted')->get();
        $totalvol=User::where('status', 'accepted')->get()->count();
        $totaldon=User::where('role', 'donor')->get()->count();
        return view ('frontend.fixed.home',compact('cri','volunteer','totalvol','totaldon'));
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
            'password'=>'required|digits:8',
    
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