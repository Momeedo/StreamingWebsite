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

    public function save(Request $request) {
      $game = new Game;
      $game->team_a_id = $request->get('team_a_id');
      $game->team_b_id = $request->get('team_b_id');
      $game->competition_id = $request->get('competition_id');
      $game->location_id = $request->get('location_id');
      $game->round = $request->get('round');
      $game->start_date = $request->get('startDate');
      $game->end_date = $request->get('endDate');
      $game->save();

      return redirect('manage/games');
    }
}
