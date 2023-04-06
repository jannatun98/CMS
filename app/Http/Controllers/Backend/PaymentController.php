<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
   public function payment(){
    $payments=Payment::paginate(5);
    return view('backend.pages.payment.payment',compact('payments'));
   }

   public function payment_create(){
    return view('backend.pages.payment.create');
   }

   public function payment_store(Request $request){
    $request->validate([
        'payment_method'=>'required',
        'payment_status'=>'required',
   ]);

   Payment::create([
    "payment_method"=>$request->payment_method,
    "payment_status"=>$request->payment_status
   ]);
   toastr()->success('Payment added successfully.');
   return redirect()->route('payment');

 }

 public function payment_delete($id){
   Payment::find($id)->delete();
   toastr()->success('Payment deleted successfully');
   return redirect()->route('payment');
 }

 public function payment_edit($id){
   $pay=Payment::find($id);
   return view('backend.pages.payment.edit',compact('pay'));
 }

 public function payment_update(Request $request, $id){

  $request->validate([
    'payment_method'=>'required',
    'payment_status'=>'required',
]);

   $payment=Payment::find($id);
   $payment->update([
    "payment_method"=>$request->payment_method,
    "payment_status"=>$request->payment_status
   ]);
   toastr()->success('Payment updated successfully');
   return redirect()->route('payment');
 }

 public function payment_view($id){
   $pays=Payment::find($id);
   return view('backend.pages.payment.view',compact('pays'));
 }

}
