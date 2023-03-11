<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Crisis;
use Illuminate\Http\Request;

class CrisisController extends Controller
{
    public function crisis(){
        $crisis=Crisis::paginate(3);
        return view('backend.pages.crisis.crisis',compact('crisis'));
    }

    public function crisis_create(){
        $crisis=Crisis::all();
        return view('backend.pages.crisis.create', compact('crisis'));
    }

    public function crisis_store(Request $request){

        $fileName=null;
        if($request->hasFile('image'))
        {
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }

        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'location'=>'required',
            'amount_need'=>'required|min:1',
            'amount_raised'=>'required',
            'crisistype_id'=>'required',
            'from_date'=>'required',
            'to_date'=>'required',
            'volunteer_id'=>'required',
            'image'=>'required'
        ]);


        Crisis::create([
            "name"=>$request->name,
            "description"=>$request->description,
            "location"=>$request->location,
            "amount_need"=>$request->amount_need,
            "amount_raised"=>$request->amount_raised,
            "crisistype_id"=>$request->crisistype_id,
            "from_date"=>$request->from_date,
            "to_date"=>$request->to_date,
            "volunteer_id"=>$request->volunteer_id,
            "image"=>$fileName,

        ]);
        return redirect()->route('crisis');

    }

    public function crisis_delete($id){
        Crisis::find($id)->delete();
        return redirect()->route('crisis');

    }

    public function crisis_edit($id){
        $cri=Crisis::find($id);
        return view('backend.pages.crisis.edit',compact('cri'));
        
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
            "location"=>$request->location,
            "amount_need"=>$request->amount_need,
            "amount_raised"=>$request->amount_raised,
            "crisistype_id"=>$request->crisistype_id,
            "from_date"=>$request->from_date,
            "to_date"=>$request->to_date,
            "volunteer_id"=>$request->volunteer_id,
            "image"=>$fileName,
        ]);
        return redirect()->route('crisis');

    }

    public function crisis_view($id){
        $crisis=Crisis::find($id);
        return view('backend.pages.crisis.view',compact('crisis'));

    }
}
