<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Location;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    public function location(){
       $locations=Location::paginate(5);
        return view('backend.pages.location.location',compact('locations'));

    }

    public function location_create(){
        return view('backend.pages.location.create');
    }

    public function location_store(Request $request){

        $request->validate([
            'location_name'=>'required',
            'location_address'=>'required'
        ]);


        Location::create([
            "name"=>$request->location_name,
            "address"=>$request->location_address,
        ]);

        toastr()->success('Location added successfully.');
       
        return redirect()->route('location');
    }

    public function location_delete($id){
        Location::find($id)->delete();
        toastr()->success('Location deleted successfully.');
        return redirect()->back();
    }


    public function location_edit($id){
        $locations=Location::find($id);
        return view('backend.pages.location.edit',compact('locations'));
    }


    public function location_update(Request $request ,$id){

        $request->validate([
            'location_name'=>'required',
            'location_address'=>'required'
        ]);

        $locations=Location::find($id);
        $locations->update([
            'name'=>$request->location_name,
            'address'=>$request->location_address,
        ]);
        toastr()->success('Location updated successfully.');
        return redirect()->route('location');
    }

    public function location_view($id){
        $locations=Location::find($id);
        return view('backend.pages.location.view',compact('locations'));
    }

}
