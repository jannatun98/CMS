<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Donor;
use Illuminate\Http\Request;

class DonorController extends Controller
{
    public function donor(){
        $donors=Donor::paginate(5);
        return view('backend.pages.donor.donor',compact('donors'));
    }

    public function donor_create(){
        return view('backend.pages.donor.create');
    } 

    public function donor_store(Request $request){

            // dd($request->all());
        $request->validate([
            'name'=>'required',
            'address'=>'required',
            'age'=>'required|numeric|min:20',
            'gender'=>'required',
            'phone'=>'required|numeric|digits:11',
        ]);

         $fileName=null;
         if($request->hasFile('image'))
         {
             $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
             $request->file('image')->storeAs('/uploads',$fileName);
         }        

        Donor::create([
            "name"=>$request->name,
            "address"=>$request->address,
            "age"=>$request->age,
            "gender"=>$request->gender,
            "phone"=>$request->phone,
            "image"=>$fileName,
        ]);
        toastr()->success('Donor added successfully.');
        return redirect()->route('donor');
    }

    public function donor_delete($id){
        Donor::find($id)->delete();
        toastr()->success('Donor deleted successfully.');
        return redirect()->route('donor');
        
    }

    public function donor_edit($id){
        $donor=Donor::find($id);
        return view('backend.pages.donor.edit',compact('donor'));
    }

    public function donor_update(Request $req,$id){
        $donor=Donor::find($id);

        $fileName=$donor->image;
      
        if($req->hasFile('image'))
        {
            $fileName=date('Ymdhmi').'.'.$req->file('image')->getClientOriginalExtension();
            $req->file('image')->storeAs('/uploads',$fileName);
        }

        $donor->update([
            "name"=>$req->name,
            "address"=>$req->address,
            "age"=>$req->age,
            "gender"=>$req->gender,
            "phone"=>$req->phone,
            "image"=>$fileName,
        ]);
        toastr()->success('Donor updated successfully.');
        return redirect()->route('donor');
    }

    public function donor_view($id)
    
    {
        $donor=Donor::find($id);
        return view('backend.pages.donor.view',compact('donor'));
    }
}
