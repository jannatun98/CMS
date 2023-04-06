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
        
        $fileName=null;
        if($request->hasFile('image'))
        {
           
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }        

       $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required|numeric|digits:11',
            'address'=>'required',
            
       ]);

        Volunteer::create([
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "address"=>$request->address,
            "image"=>$fileName,
        ]);
        toastr()->success('Volunteer added successfully.');
        return redirect()->route('volunteer');
    }

    public function volunteer_delete($id){
        Volunteer::find($id)->delete();
        toastr()->success('Volunteer deleted successfully.');
        return redirect()->route('volunteer');
    }

    public function volunteer_edit($id){
        $volunteer=Volunteer::find($id);
        return view('backend.pages.volunteer.edit',compact('volunteer'));
    }

    public function volunteer_update(Request $request, $id){

        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required|numeric|digits:11',
            'address'=>'required',
            
       ]);

        $volunteer=Volunteer::find($id);

        $fileName=$volunteer->image;
        if($request->hasFile('image'))
        {
            $fileName=date('Ymdhmi').'.'.$request->file('image')->getClientOriginalExtension();
            $request->file('image')->storeAs('/uploads',$fileName);
        }        

        $volunteer->update([
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "address"=>$request->address,
            "image"=>$fileName,
        ]);
        toastr()->success('Volunteer updated successfully.');
        return redirect()->route('volunteer');
    }

    public function volunteer_view($id){
        $volunteer=volunteer::find($id);
        return view('backend.pages.volunteer.view',compact('volunteer'));
    }
}
