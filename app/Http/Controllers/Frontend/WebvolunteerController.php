<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Crisis;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\Location;
use App\Models\User;
use App\Models\Volunteer;
use App\Models\Volunteersregistration;
use App\Models\VolunteerToCrisis;
use Illuminate\Http\Request;

class WebvolunteerController extends Controller
{
    public function volunteersignup(Request $request){
        $request->validate([
            'name'=>'required|unique:users',
            'address'=>'required',
            'email'=>'required|unique:users',
            'phone'=>'required|digits:11',
            'password'=>'required|digits:8'
        ]);

        User::create([
            'name'=>$request->name,
            'image'=>$request->image,
            'address'=>$request->address,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'password'=>bcrypt($request->password),
            'role'=>'volunteer',
            'status'=>'pending'
        ]);
        toastr()->success('Signed up successfully as a volunteer.');
        return redirect()->back();
    }

    
    

    public function volunteerview($id){
        $volun=User::find($id);
        return view('frontend.pages.volunteerview',compact('volun'));
    }

   
    public function volunteertocrisis(){
        $voluntocrisis=VolunteerToCrisis::all();
        return view('frontend.pages.volunteertocrisis',compact('voluntocrisis'));
    }
    

    public function expenseform(){
        $expen=ExpenseCategory::all();
        $volun=User::all();
        $cris=Crisis::all();
        return view('frontend.pages.expenses',compact('expen','volun', 'cris'));
    }

    public function expenseformsubmit(Request $request){
        $request->validate([
            'crisis_id'=>'required',
            'expense_category_id'=>'required',
            'expense_title'=>'required',
            'amount'=>'required|numeric|gt:0',
            'details'=>'required',
        ]);

        Expense::create([
            "crisis_id"=>$request->crisis_id,
            "expense_category_id"=>$request->expense_category_id,
            "volunteer_id"=>auth()->user()->id,
            "name"=>auth()->user()->name,
            "expense_title"=>$request->expense_title,
            "amount"=>$request->amount,
            "details"=>$request->details,
            
        ]);
        toastr()->success('Expense added successfully.');
        return redirect()->route('f.home');
    }
}
