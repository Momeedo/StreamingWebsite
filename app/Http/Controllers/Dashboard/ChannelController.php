<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Game;
use App\Team;
use App\Channel;
use App\Competition;
use App\Location;

class ChannelController extends Controller
{
    public function index () {
      $channels = Channel::all();
      return view('dashboard.channels', ['channels' => $channels]);
    }
    
    public function create(){
        return view('dashboard.add-channel');
    }
}
