<?php

namespace App\Http\Controllers\Backend;


use App\Models\Donor;
use App\Models\Crisis;
use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DonationController extends Controller
{
    public function donation(){
        $donation=Donation::paginate(5);
        return view('backend.pages.donation.donation',compact('donation'));
    }

    public function donation_create(){
        $crisis=Crisis::all();
        $donor=Donor::all();
        return view('backend.pages.donation.create',compact('crisis','donor'));
    }

    public function donation_store(Request $request){

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
        toastr()->success('Donation created successfully.');
        return redirect()->route('donation');

    }

    public function donation_delete($id){
        Donation::find($id)->delete();
        return redirect()->route('donation');
        toastr()->success('Donation deleted successfully.');
    }

    public function donation_edit($id){
        $donation=Donation::find($id);
        $crisis=Crisis::all();
        $donor=Donor::all();
        return view('backend.pages.donation.edit',compact('donation','crisis','donor'));
    }

    public function donation_update(Request $request, $id){

        $request->validate([
            'crisis_id'=>'required',
            'donor_id'=>'required',
            'donate_amount'=>'required|min:3',
            'payment_method'=>'required',
            'transaction_id'=>'required',
        ]);



        $donation=Donation::find($id);

        $donation->update([
            "crisis_id"=>$request->crisis_id,
            "donor_id"=>$request->donor_id,
            "donate_amount"=>$request->donate_amount,
            "payment_method"=>$request->payment_method,
            "transaction_id"=>$request->transaction_id,
        ]);
        toastr()->success('Donation updated successfully.');
        return redirect()->route('donation');

    }

    public function donation_view($id){
       
        $donate=Donation::find($id);
        return view('backend.pages.donation.view',compact('donate'));

    }


}
