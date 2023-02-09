<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CrisistypesController extends Controller
{
    public function crisistypes(){
        return view('backend.pages.crisistypes');

    }
}
