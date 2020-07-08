<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Request;
Use App\Game;
Use App\Channel;
use Cookie;


class ChannelController extends Controller
{
    public function channel ($id) {
      $channel = Channel::findOrFail($id);
        if ($channel->stauts == true)
        {
          $this->createViewLog($id);
          $channelLink = 'https://stream.tn/streamplay/'.$channel->link;
          $moreChannels = Channel::all()->where('language', $channel->language)->random(4);
          return view('front.channel-page', ['moreChannels' => $moreChannels, 'channel' => $channel, 'link' => $channelLink]);
        }
        else
        {
          abort(404);
        }
    }
    
		public function createViewLog($id) {
			Cookie::queue('nfoot_cookie_enabled', true, 2628000);
			if ((Cookie::has('nfoot_cookie_enabled')) && (!(Cookie::has((string)$id))))
			{
				if ((strpos(Request::header('User-Agent'), 'facebook') == false) && (strtolower(strpos(Request::header('User-Agent'), 'google')) == false))
				{
					$viewedChannel = Channel::where('id', $id);
					$viewedChannel->increment('views');
				}
				Cookie::queue((string)$id, true, 0.15);
			}
		}
}
