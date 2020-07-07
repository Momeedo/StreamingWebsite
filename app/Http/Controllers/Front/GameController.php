<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index () {
      $from = date("Y-m-d H:i:s", strtotime('-2 day'));
      $to = date("Y-m-d H:i:s", strtotime('+2 day'));
      $games = Game::whereBetween('start_date', [$from , $to])->get();
      return view('front.games', ['games' => $games]);
    }
}
