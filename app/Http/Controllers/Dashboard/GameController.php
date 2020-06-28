<?php

namespace App\Http\Controllers\Dashboard;
	
use App\Http\Controllers\Controller;
use DB;
use App\Game;


use Illuminate\Http\Request;

class GameController extends Controller
{
    //
    public function index () {
      $games = Game::all();
      return view('dashboard.games', ['games' => $games]);
    }
}
