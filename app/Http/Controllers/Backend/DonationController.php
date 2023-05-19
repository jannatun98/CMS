<?php

namespace App\Http\Controllers\Backend;


use App\Models\Donor;
use App\Models\Crisis;
use App\Models\Donation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class DonationController extends Controller
{
    public function donation()
    {
        $donor = User::all();
        $donation = Donation::paginate(20);
        return view('backend.pages.donation.donation', compact('donation', 'donor'));
    }

    public function donation_create()
    {
        $crisis = Crisis::all();
        $donor = Donor::all();
        return view('backend.pages.donation.create', compact('crisis', 'donor'));
    }

    public function donation_store(Request $request)
    {
        // dd('ok');

        $request->validate([
            'crisis_id' => 'required',
            'donor_id' => 'required',
            // 'donate_amount' => 'required|min:3',
            'payment_method' => 'required',
            'transaction_id' => 'required|unique|numeric|min:12|max:18',
        ]);


        Donation::create([
            "crisis_id" => $request->crisis_id,
            "donor_id" => $request->donor_id,
            "name" => $request->name,
            "donate_amount" => $request->donate_amount,
            "payment_method" => $request->payment_method,
            "transaction_id" => $request->transaction_id,
        ]);
        toastr()->success('Donation created successfully.');
        return redirect()->route('donation');
    }

    // public function donation_delete($id){
    //     Donation::find($id)->delete();
    //     return redirect()->route('donation');
    //     toastr()->success('Donation deleted successfully.');
    // }

    // public function donation_edit($id){
    //     $donation=Donation::find($id);
    //     $crisis=Crisis::all();
    //     $donor=Donor::all();
    //     return view('backend.pages.donation.edit',compact('donation','crisis','donor'));
    // }

    // public function donation_update(Request $request, $id){

    //     $request->validate([
    //         'crisis_id'=>'required',
    //         'donor_id'=>'required',
    //         'donate_amount'=>'required|min:3',
    //         'payment_method'=>'required',
    //         'transaction_id'=>'required',
    //     ]);



    //     $donation=Donation::find($id);

    //     $donation->update([
    //         "crisis_id"=>$request->crisis_id,
    //         "donor_id"=>$request->donor_id,
    //         "donate_amount"=>$request->donate_amount,
    //         "payment_method"=>$request->payment_method,
    //         "transaction_id"=>$request->transaction_id,
    //     ]);
    //     toastr()->success('Donation updated successfully.');
    //     return redirect()->route('donation');

    // }

    public function donation_view($id)
    {

        $donate = Donation::find($id);
        return view('backend.pages.donation.view', compact('donate'));
    }

    public function report()
    {
        return view('backend.pages.report.donations');
    }

    public function report_search(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'from_date'    => 'required|date',
            'to_date'      => 'required|date|after:from_date',
        ]);

        if($validator->fails())
        {
            toastr()->error('From date and to date required and to date should greater then from date.');
            return redirect()->back();
        }

        $from=$request->from_date;
       $to=$request->to_date;

       $donations=Donation::whereBetween('created_at', [$from, $to])->get();
        return view('backend.pages.report.donations',compact('donations'));
    }
}
