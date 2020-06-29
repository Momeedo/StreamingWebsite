<?php

namespace App\Http\Controllers\Dashboard;
	
use App\Http\Controllers\Controller;
use DB;
use App\Game;
use App\Team;
use App\Channel;
use App\Competition;
use App\Location;


use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index () {
      $games = Game::all();
      return view('dashboard.games', ['games' => $games]);
    }
    
    public function create(){
        $teams_a = Team::orderBy('name', 'asc')->pluck('name', 'id');
        $teams_b = Team::orderBy('name', 'asc')->pluck('name', 'id');
        $channels = Channel::orderBy('name', 'asc')->pluck('name', 'id');
        $competitions = Competition::orderBy('name', 'asc')->pluck('name', 'id');
        $locations = Location::orderBy('name', 'asc')->pluck('name', 'id');
        return view('dashboard.add-game', array('teams_a' => $teams_a, 'teams_b' => $teams_b, 'channels' => $channels, 'competitions' => $competitions, 'locations' => $locations));
    }
}
