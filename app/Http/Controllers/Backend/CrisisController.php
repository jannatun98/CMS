<?php

namespace App\Http\Controllers\Backend;

use toastr;
use App\Models\Crisis;
use App\Models\Volunteer;
use App\Models\Crisistypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location;

class CrisisController extends Controller
{
    public function crisis(){
        $crisis=Crisis::paginate(3);
        return view('backend.pages.crisis.crisis',compact('crisis'));
    }

    public function crisis_create(){
        $crisis=Crisistypes::all();
        $volunteers=Volunteer::all();
        $locate=Location::all();
        return view('backend.pages.crisis.create', compact('volunteers','crisis','locate'));

        
    }

    public function crisis_store(Request $request){

        
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'location_id'=>'required',
            'amount_need'=>'required|numeric|gt:0',
            'amount_raised'=>'required|numeric|gt:0|lt:amount_need',
            'crisistype_id'=>'required',
            'from_date'=>'required',
            'to_date'=>'required|after:from_date',
            'volunteer_id'=>'required',
            'image'=>'required'
        ]);

     
        $fileName=null;
        if($request->hasFile('image'))
        {
           
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }


        Crisis::create([
            "name"=>$request->name,
            "description"=>$request->description,
            "location_id"=>$request->location_id,
            "amount_need"=>$request->amount_need,
            "amount_raised"=>$request->amount_raised,
            "crisistype_id"=>$request->crisistype_id,
            "from_date"=>$request->from_date,
            "to_date"=>$request->to_date,
            "volunteer_id"=>$request->volunteer_id,
            "image"=>$fileName,

        ]);
        toastr()->success('Crisis added successfully.');
        return redirect()->route('crisis');

    }

    public function crisis_delete($id){
        Crisis::find($id)->delete();
        toastr()->success('Crisis deleted successfully.');
        return redirect()->route('crisis');

    }

    public function crisis_edit($id){
        $cri=Crisis::find($id);
        $crisis=Crisistypes::all();
        $volunteers=Volunteer::all();
        $locate=Location::all();
        return view('backend.pages.crisis.edit', compact('volunteers','crisis','cri','locate'));
       
        
    }

    public function crisis_update(Request $request, $id){
        $crisis=Crisis::find($id);
        $fileName=$crisis->image;
        if($request->hasFile('image'))
        {
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }

        $crisis->update([
            "name"=>$request->name,
            "description"=>$request->description,
            "location_id"=>$request->location_id,
            "amount_need"=>$request->amount_need,
            "amount_raised"=>$request->amount_raised,
            "crisistype_id"=>$request->crisistype_id,
            "from_date"=>$request->from_date,
            "to_date"=>$request->to_date,
            "volunteer_id"=>$request->volunteer_id,
            "image"=>$fileName,
        ]);
        toastr()->success('Crisis updated successfully.');
        return redirect()->route('crisis');

    }

    public function crisis_view($id){
        $crisis=Crisis::find($id);
        return view('backend.pages.crisis.view',compact('crisis'));

    }
}
