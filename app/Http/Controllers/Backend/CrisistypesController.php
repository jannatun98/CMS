<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Crisis;
use App\Models\Crisistypes;
use Illuminate\Http\Request;

class CrisistypesController extends Controller
{
    public function crisistypes(){
        $crisistypes=Crisistypes::paginate(3);
        return view('backend.pages.crisistypes.crisistypes',compact('crisistypes'));

    }

    public function crisistypes_create(){
        return view('backend.pages.crisistypes.create');
    }

    public function crisistypes_store(Request $request){

        $request->validate([
            'name'=>'required',
            'status'=>'required'
        ]);

        Crisistypes::create([
            "name"=>$request->name,
            "status"=>$request->status,

        ]);
        toastr()->success('Crisis type added successfully.');
        return redirect()->route('crisis.types');

    }

    public function crisistypes_delete($id){
        Crisistypes::find($id)->delete();
        toastr()->success('Crisis type deleted successfully.');
        return redirect()->route('crisis.types');
    }

    public function crisistypes_edit($id){
        $critypes=Crisistypes::find($id);
        return view('backend.pages.crisistypes.edit',compact('critypes'));
    }

    public function crisistypes_update(Request $request, $id){
        $crisistypes=Crisistypes::find($id);

        $crisistypes->update([
            "name"=>$request->name,
            "status"=>$request->status,
        ]);
        toastr()->success('Crisis type updated successfully.');
        return redirect()->route('crisis.types');
    }

    public function crisistypes_view($id){
        $crisistypes=Crisistypes::find($id);
        return view('backend.pages.crisistypes.view',compact('crisistypes'));

    }


}
