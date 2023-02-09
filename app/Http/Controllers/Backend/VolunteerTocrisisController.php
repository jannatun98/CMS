<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VolunteerTocrisisController extends Controller
{
    public function volunteer_to_crisis(){
        return view('backend.pages.volunteertocrisis');
    }
}
