<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerController extends Controller
{
    public function volunteer(){
        $volunteers=Volunteer::paginate(5);
        return view('backend.pages.volunteer.volunteer',compact('volunteers'));
    }

    public function volunteer_create(){
        return view('backend.pages.volunteer.create');
    }

    public function volunteer_store(Request $request){

       // $request->validate([
            //'name'=>'required',
            //'email'=>'required',
            //'phone'=>'required|max:11',
            //'address'=>'required'
       // ]);

        Volunteer::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "address"=>$request->address
        ]);
        return redirect()->route('volunteer');
    }

    public function volunteer_delete($id){
        Volunteer::find($id)->delete();
        return redirect()->route('volunteer');
    }

    public function volunteer_edit($id){
        $volunteer=Volunteer::find($id);
        return view('backend.pages.volunteer.edit',compact('volunteer'));
    }

    public function volunteer_update(Request $request, $id){
        $volunteer=Volunteer::find($id);
        $volunteer->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "address"=>$request->address
        ]);
        return redirect()->route('volunteer');
    }

    public function volunteer_view($id){
        $volunteer=volunteer::find($id);
        return view('backend.pages.volunteer.view',compact('volunteer'));
    }
}
