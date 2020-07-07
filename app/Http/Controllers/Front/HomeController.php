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
      $channels_header = Channel::orderBy('views', 'desc')->where('stauts', true)->get();
      $channels = Channel::orderBy('name', 'asc')->where('stauts', true)->get();
      $time_now = date("Y-m-d H:i:s");
      $from = date("Y-m-d H:i:s", strtotime('-4 hours'));
      $to = date("Y-m-d H:i:s", strtotime('+2 day'));
      $games = Game::whereBetween('start_date', [$from , $to])->get();
      return view('front.home', ['channels' => $channels, 'channels_header' => $channels_header ,'games' => $games]);
    }
    public function privacy () {
      return view('front.privacy-policy');
    }
}
