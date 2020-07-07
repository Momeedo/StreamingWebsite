<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Game;
Use App\Channel;


class ChannelController extends Controller
{
    //Test Purposes
    public function channel ($id) {
      $channel = Channel::findOrFail($id);
      $channelLink = 'https://stream.tn/embed-'.$channel->link.'.html';
      $moreChannels = Channel::all()->where('language', $channel->language)->random(4);
      return view('front.channel-page', ['moreChannels' => $moreChannels, 'channel' => $channel, 'link' => $channelLink]);
    }
}
