<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Game;
use App\Team;
use App\Channel;
use App\Competition;
use App\Location;

class LocationController extends Controller
{
    public function index () {
      $locations = Location::all();
      return view('dashboard.locations', ['locations' => $locations]);
    }
    
    public function create(){
        return view('dashboard.add-location');
    }
}
