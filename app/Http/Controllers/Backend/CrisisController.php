<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Crisis;
use Illuminate\Http\Request;

class CrisisController extends Controller
{
    public function crisis(){
        $crisis=Crisis::all();
        return view('backend.pages.crisis.crisis',compact('crisis'));
    }

    public function crisis_create(){
        return view('backend.pages.crisis.create');
    }

    public function crisis_store(Request $request){
        Crisis::create([
            'name'=>$request->name,
            'location'=>$request->location,
            'crisistype'=>$request->crisis_type,
            'date'=>$request->date,

        ]);
        return redirect()->route('crisis');

    }
}
