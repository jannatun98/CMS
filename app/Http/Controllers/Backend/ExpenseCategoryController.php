<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ExpenseCategory;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    public function expense_category(){
        $expensecats=ExpenseCategory::paginate(20);
        return view('backend.pages.expensecategory.expensecategory',compact('expensecats'));
    }

    public function expensecategory_create(){
        return view('backend.pages.expensecategory.create');
    }

    public function expensecategory_store(Request $request){

        $request->validate([
            'name'=>'required',
            'status'=>'required',
            'description'=>'required'
        ]);

        ExpenseCategory::create([
            "name"=>$request->name,
            "status"=>$request->status,
            "description"=>$request->description,
        ]);
        toastr()->success('Expense category added successfully.');
        return redirect()->route('expense.category');
    }

    public function expensecategory_delete($id){
        ExpenseCategory::find($id)->delete();
        toastr()->success('Expense category deleted successfully.');
        return redirect()->route('expense.category');
    }

    public function expensecategory_edit($id){
        $expensecat=ExpenseCategory::find($id);
        return view('backend.pages.expensecategory.edit',compact('expensecat'));
    }

    public function expensecategory_update(Request $request,$id){

        $request->validate([
            'name'=>'required',
            'status'=>'required',
            'description'=>'required'
        ]);

        $expense=ExpenseCategory::find($id);
        $expense->update([
            "name"=>$request->name,
            "status"=>$request->status,
            "description"=>$request->description,
        ]);
        toastr()->success('Expense category deleted successfully.');
        return redirect()->route('expense.category');
    }


    public function expensecategory_view($id){
        $expensecat=ExpenseCategory::find($id);
        return view('backend.pages.expensecategory.view',compact('expensecat'));
    }
    
}
