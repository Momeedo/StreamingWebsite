<?php

namespace App\Http\Controllers\Dashboard;
	
use App\Http\Controllers\Controller;
use DB;
use App\Game;
use App\Team;


use Illuminate\Http\Request;

class GameController extends Controller
{
    //
    public function index () {
      $games = Game::all();
      return view('dashboard.games', ['games' => $games]);
    }
    
    /*
    public function new(){
      $team_list = Team::all()->pluck('title', 'title');
			return view('dashboard.add-game', ['teams' => $team_list]);
    }
    */
    
    public function create(){
        $teams = Team::orderBy('name', 'asc')->pluck('name', 'id');
        $teams->prepend('', '');
        return view('dashboard.add-game', array('teams' => $teams));
    }
    /*
    public function autocomplete(Request $request)
    {
       $query = $request->input('query');
        $data = Team::select("name")
                ->where("name","LIKE","%{$query}%")
                ->get();
        // return response()->json($data);
        echo "hi";
    }
    */
}
