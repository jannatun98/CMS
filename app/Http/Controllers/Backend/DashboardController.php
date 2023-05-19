<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Crisis;
use App\Models\Donation;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $totalcrisis=Crisis::all()->count();
        $totaldon=Donation::all()->count();
        $totalvol=User::where('status', 'accepted')->get()->count();
        $totaldonor=User::where('role', 'donor')->get()->count();
        return view('backend.pages.dashboard',compact('totalcrisis','totaldon','totalvol','totaldonor'));
    }
}
