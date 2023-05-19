<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\VolunteerToCrisis;
use App\Models\Crisis;
use App\Models\User;
use App\Models\Volunteer;
use Illuminate\Http\Request;

class VolunteerTocrisisController extends Controller
{
    public function volunteer_to_crisis(){
        $volunteertocri=VolunteerToCrisis::paginate(20);
        return view('backend.pages.volunteertocrisis.volunteertocrisis',compact('volunteertocri'));
    }

    public function volunteertocrisis_create(){
        $crys=Crisis::all();
        $volunteer=User::where('role','volunteer')->get();
        return view('backend.pages.volunteertocrisis.create',compact('crys','volunteer'));
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
        toastr()->success('A volunteer assigned to crisis successfully.');
        return redirect()->route('volunteertocrisis');
    }

    public function volunteertocrisis_delete($id){
        VolunteerToCrisis::find($id)->delete();
        toastr()->success('A volunteer unassigned from crisis successfully.');
        return redirect()->route('volunteertocrisis');

    }

    public function volunteertocrisis_edit($id){
        $volunteertocri=VolunteerToCrisis::find($id);
        $crys=Crisis::all();
        $volunteer=User::where('role','volunteer')->get();

        // dd($volunteertocri);
        return view('backend.pages.volunteertocrisis.edit',compact('volunteertocri','crys','volunteer'));
    }

    public function volunteertocrisis_update(Request $request, $id){

        $request->validate([
            'crisis_id'=>'required',
            'volunteer_id'=>'required'
        ]);

        $volunteertocris=VolunteerToCrisis::find($id);
        $volunteertocris->update([
            'crisis_id'=>$request->crisis_id,
            'volunteer_id'=>$request->volunteer_id
        ]);
        toastr()->success('Updated successfully.');
        return redirect()->route('volunteertocrisis');
    }

    public function volunteertocrisis_view($id){
        $volunteertocrisis=VolunteerToCrisis::find($id);
        return view('backend.pages.volunteertocrisis.view',compact('volunteertocrisis'));
    }
}
