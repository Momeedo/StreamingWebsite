<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Channel;
use App\Game;

class HomeController extends Controller
{
    public function index () {
      $channels = Channel::all();
      $time_now = date("Y-m-d H:i:s");
      $to = date("Y-m-d H:i:s", strtotime('+2 day'));
      $games = Game::whereBetween('start_date', [$time_now , $to])->get();
      return view('front.home', ['channels' => $channels, 'games' => $games]);
    }
    public function privacy () {
      return view('front.privacy-policy');
    }
}
