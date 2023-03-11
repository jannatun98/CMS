<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VolunteerToCrisis;
use Illuminate\Http\Request;

class VolunteerTocrisisController extends Controller
{
    public function volunteer_to_crisis(){
        $volunteertocri=VolunteerToCrisis::paginate(5);
        return view('backend.pages.volunteertocrisis.volunteertocrisis',compact('volunteertocri'));
    }

    public function volunteertocrisis_create(){
        return view('backend.pages.volunteertocrisis.create');
    }

    public function volunteertocrisis_store(Request $request){
        $request->validate([
            'crisis_id'=>'required',
            'volunteer_id'=>'required'
        ]);

        VolunteerToCrisis::create([
            "crisis_id"=>$request->crisis_id,
            "volunteer_id"=>$request->volunteer_id
        ]);
        return redirect()->route('volunteertocrisis');
    }

    public function volunteertocrisis_delete($id){
        VolunteerToCrisis::find($id)->delete();
        return redirect()->route('volunteertocrisis');

    }

    public function volunteertocrisis_edit($id){
        $volunteertocri=VolunteerToCrisis::find($id);
        return view('backend.pages.volunteertocrisis.edit',compact('volunteertocri'));
    }

    public function volunteertocrisis_update(Request $request, $id){
        $volunteertocris=VolunteerToCrisis::find($id);
        $volunteertocris->update([
            "crisis_id"=>$request->crisis_id,
            "volunteer_id"=>$request->volunteer_id
        ]);
        return redirect()->route('volunteertocrisis');
    }

    public function volunteertocrisis_view($id){
        $volunteertocrisis=VolunteerToCrisis::find($id);
        return view('backend.pages.volunteertocrisis.view',compact('volunteertocrisis'));
    }
}
