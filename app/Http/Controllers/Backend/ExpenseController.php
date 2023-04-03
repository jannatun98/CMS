<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\Volunteer;
use App\Models\Crisis;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
     public function expense(){
        $expenses=Expense::paginate(5);
        return view('backend.pages.expense.expense',compact('expenses'));
    }

    public function expense_create(){
        $expen=ExpenseCategory::all();
        $volun=Volunteer::all();
        $cris=Crisis::all();
        return view('backend.pages.expense.create',compact('expen','volun', 'cris'));
    }
    public function expense_store(Request $request){
        $request->validate([
            'crisis_id'=>'required',
            'expense_category_id'=>'required',
            'volunteer_id'=>'required',
            'expense_title'=>'required',
            'details'=>'required',
        ]);

        Expense::create([
            "crisis_id"=>$request->crisis_id,
            "expense_category_id"=>$request->expense_category_id,
            "volunteer_id"=>$request->volunteer_id,
            "expense_title"=>$request->expense_title,
            "details"=>$request->details,
            
        ]);
        toastr()->success('Expense added successfully.');
        return redirect()->route('expense');
    }

    public function expense_delete($id){
        Expense::find($id)->delete();
        toastr()->success('Expense deleted successfully.');
        return redirect()->route('expense');
    }

    public function expense_edit($id){
        $expense=Expense::find($id);
        $expen=ExpenseCategory::all();
        $volun=Volunteer::all();
        $cris=Crisis::all();
        return view('backend.pages.expense.edit',compact('expense','expen','volun','cris'));
    }

    public function expense_update(Request $request, $id){
        $expense=Expense::find($id);
        $expense->update([
            "crisis_id"=>$request->crisis_id,
            "expense_category_id"=>$request->expense_category_id,
            "volunteer_id"=>$request->volunteer_id,
            "expense_title"=>$request->expense_title,
            "details"=>$request->details,

        ]);
        toastr()->success('Expense updated successfully.');
        return redirect()->route('expense');
    }

    public function expense_view($id){
        $expense=Expense::find($id);
        return view('backend.pages.expense.view',compact('expense'));
    }
}
