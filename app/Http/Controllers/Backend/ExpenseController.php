<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
     public function expense(){
        $expenses=Expense::paginate(5);
        return view('backend.pages.expense.expense',compact('expenses'));
    }

    public function expense_create(){
        return view('backend.pages.expense.create');
    }
    public function expense_store(Request $request){
        $request->validate([
            'expense_category_id'=>'required',
            'volunteer_id'=>'required',
            'expense_title'=>'required',
            'details'=>'required',
        ]);

        Expense::create([
            "expense_category_id"=>$request->expense_category_id,
            "volunteer_id"=>$request->volunteer_id,
            "expense_title"=>$request->expense_title,
            "details"=>$request->details,

        ]);
        return redirect()->route('expense');
    }

    public function expense_delete($id){
        Expense::find($id)->delete();
        return redirect()->route('expense');
    }

    public function expense_edit($id){
        $expense=Expense::find($id);
        return view('backend.pages.expense.edit',compact('expense'));
    }

    public function expense_update(Request $request, $id){
        $expense=Expense::find($id);
        $expense->update([
            "expense_category_id"=>$request->expense_category_id,
            "volunteer_id"=>$request->volunteer_id,
            "expense_title"=>$request->expense_title,
            "details"=>$request->details,

        ]);
        return redirect()->route('expense');
    }

    public function expense_view($id){
        $expense=Expense::find($id);
        return view('backend.pages.expense.view',compact('expense'));
    }
}
