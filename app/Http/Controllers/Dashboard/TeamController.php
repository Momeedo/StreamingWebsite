<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Game;
use App\Team;
use App\Channel;
use App\Competition;
use App\Location;

class TeamController extends Controller
{
    public function index () {
      $teams = Team::all();
      return view('dashboard.teams', ['teams' => $teams]);
    }
    
    public function create(){
        return view('dashboard.add-team');
    }
}
