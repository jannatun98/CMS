<?php

namespace App\Http\Controllers\Backend;

use toastr;
use App\Models\Crisis;
use App\Models\Volunteer;
use App\Models\Crisistypes;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\User;
use App\Models\VolunteerToCrisis;

class CrisisController extends Controller
{
    public function crisis(){
        $crisis=Crisis::paginate(20);
        return view('backend.pages.crisis.crisis',compact('crisis'));
    }

    public function crisis_create(){
        $crisis=Crisistypes::all();
        $volunteers=VolunteerToCrisis::all();
        $locate=Location::all();
        return view('backend.pages.crisis.create', compact('volunteers','crisis','locate'));

        
    }

    public function crisis_store(Request $request){

        
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'location_id'=>'required',
            'amount_need'=>'required|numeric|gt:0',
            'crisistype_id'=>'required',
            'from_date'=>'required',
            'to_date'=>'required|after:from_date',
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
            "amount_raised"=>0,
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
        $volunteers=VolunteerToCrisis::all();
        $locate=Location::all();
        return view('backend.pages.crisis.edit', compact('volunteers','crisis','cri','locate'));
       
        
    }

    public function crisis_update(Request $request, $id){
        // $request->validate([
        //     'name'=>'required',
        //     'description'=>'required',
        //     'location_id'=>'required',
        //     'amount_need'=>'required|numeric|gt:0',
        //     // 'amount_raised'=>'required|numeric|gt:0|lt:amount_need',
        //     'crisistype_id'=>'required',
        //     'from_date'=>'required',
        //     'to_date'=>'required|after:from_date',
        //     'image'=>'required'
        // ]);

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
            "amount_raised"=>0,
            "crisistype_id"=>$request->crisistype_id,
            "from_date"=>$request->from_date,
            "to_date"=>$request->to_date,
            "image"=>$fileName,
        ]);
        $crisis->update();
        toastr()->success('Crisis updated successfully.');
        return redirect()->route('crisis');

    }

    public function crisis_view($id){
        $crisis=Crisis::find($id);
        $volunteer=User::where('role','volunteer')->get();
        return view('backend.pages.crisis.view',compact('crisis','volunteer'));

    }

    public function crisis_volunteer(Request $request, $id){
        // dd($request->all());
        foreach($request->volunteer_id as $v_id)
        {
            VolunteerToCrisis::create([
                'crisis_id'=>$id,
                'volunteer_id'=>$v_id
            ]);
        }
        return redirect()->route('volunteertocrisis');
    }
}
