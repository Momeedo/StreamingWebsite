<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Channel;
use App\Game;
use App\ChannelGames;

class HomeController extends Controller
{
    public function index () {
      $channels = Channel::orderBy('views', 'desc')->get();
      $time_now = date("Y-m-d H:i:s");
      $from = date("Y-m-d H:i:s", strtotime('-4 hours'));
      $to = date("Y-m-d H:i:s", strtotime('+2 day'));
      $games = Game::whereBetween('start_date', [$from , $to])->get();
      return view('front.home', ['channels' => $channels, 'games' => $games]);
    }
    public function privacy () {
      return view('front.privacy-policy');
    }
}
