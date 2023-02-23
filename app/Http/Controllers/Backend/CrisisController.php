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
        return view('backend.pages.crisis.create');
    }

    public function crisis_store(Request $request){

        $fileName=null;
        if($request->hasFile('image'))
        {
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }

        $request->validate([
            "name"=>'required',
            "location"=>'required',
            "crisis_type"=>'required',
            "date"=>'required',
            "image"=>'required'
        ]);


        Crisis::create([
            "name"=>$request->name,
            "location"=>$request->location,
            "crisis_type"=>$request->crisis_type,
            "date"=>$request->date,
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
            "location"=>$request->location,
            "crisis_type"=>$request->crisis_type,
            "date"=>$request->date,
        ]);
        return redirect()->route('crisis');

    }

    public function crisis_view($id){
        $crisis=Crisis::find($id);
        return view('backend.pages.crisis.view',compact('crisis'));

    }
}
