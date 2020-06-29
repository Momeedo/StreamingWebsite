<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Game;
use App\Team;
use App\Channel;
use App\Competition;
use App\Location;

class CompetitionController extends Controller
{
    public function index () {
      $competitions = Competition::all();
      return view('dashboard.competitions', ['competitions' => $competitions]);
    }
    
    public function create(){
        return view('dashboard.add-competition');
    }
}
