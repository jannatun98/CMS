<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Donation;
use Illuminate\Http\Request;

class DonationController extends Controller
{
    public function donation(){
        $donation=Donation::paginate(5);
        return view('backend.pages.donation.donation',compact('donation'));
    }

    public function donation_create(){
        return view('backend.pages.donation.create');
    }

    public function donation_store(Request $request){


        $request->validate([
            'crisis_id'=>'required',
            'donor_id'=>'required',
            'donate_amount'=>'required',
            'payment_method'=>'required|min:1',
            'transaction_id'=>'required',
        ]);


        Donation::create([
            "crisis_id"=>$request->crisis_id,
            "donor_id"=>$request->donor_id,
            "donate_amount"=>$request->donate_amount,
            "payment_method"=>$request->payment_method,
            "transaction_id"=>$request->transaction_id,
        ]);
        return redirect()->route('donation');

    }

    public function donation_delete($id){
        Donation::find($id)->delete();
        return redirect()->route('donation');
    }

    public function donation_edit($id){
        $donation=Donation::find($id);
        return view('backend.pages.crisistypes.edit',compact('donation'));
    }

    public function crisis_update(Request $request, $id){

        $donation=Donation::find($id);
        $donation->update([
            "crisis_id"=>$request->crisis_id,
            "donor_id"=>$request->donor_id,
            "donate_amount"=>$request->donate_amount,
            "payment_method"=>$request->amount_need,
            "transaction_id"=>$request->transaction_id,
        ]);
        return redirect()->route('donation');

    }

    public function donation_view($id){
        $donate=Donation::find($id);
        return view('backend.pages.donation.view',compact('donate'));

    }


}
