<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use Carbon\Carbon;
use App\Game;
use App\Team;
use App\Channel;
use App\Tags;
use App\Competition;
use App\Location;

class ChannelController extends Controller
{
    public function index () {
      $channels = Channel::all();
      $time_now = date("Y-m-d H:i:s");
      $from = date("Y-m-d H:i:s", strtotime('-8 hours'));
      $to = date("Y-m-d H:i:s", strtotime('+8 hours'));
      $games = Game::whereBetween('start_date', [$from, $to])->get();
      
      $channels_with_a_game_now = array();
      foreach ($games as $game) {
          if (($game->start_date < $time_now) && ($time_now < $game->end_date)){
              $game_channels = $game->channels;
              foreach($game_channels as $game_channel){
                array_push($channels_with_a_game_now, $game_channel->id);
              }
          }
      }
      return view('dashboard.channels', ['channels' => $channels, 'channels_with_a_game_now' => $channels_with_a_game_now]);
    }
    public function remove (Request $request) {
      $id = $request->get('id');
      $channel = Channel::find($id);
      /*
      $saved_tags = $channel->tags; 
      foreach($saved_tags as $saved_tag) {
            ChannelTags::where('channel_id', $id)->delete();
      }
      */
      if($channel->delete()){
				return response()->json(['result' => 'success', 'code' => 200]);
				}else{
				return response()->json(['result' => 'fail', 'code' => 400]);
			}
    }
    public function create(){
        $tags = Tags::orderBy('id', 'asc')->pluck('name', 'id');

        return view('dashboard.add-channel', array('tags' => $tags));
    }
    public function store(Request $request) {
        request()->validate([
        'name' => 'required',
        'country' => 'required',
        'language' => 'required',
        'link' => 'required',
        'logo' => 'required',
        'banner' => 'required'
        ]);
      $channel = new Channel;
      $channel->link = $request->get('link');
      $channel->country = $request->get('country');
      $channel->language = $request->get('language');
      $channel->name = $request->get('name');
        if (!($request->get('is-active')))
        {
            $channel->stauts = 0;
        }
        
        $logo = $request->file('logo');
        $file_name = 'channel_logo_'.$channel->name.'_'.uniqid();
        Storage::putFileAs('uploads/channels', $logo, $file_name);
        Image::make($logo)->encode('png', 70)->save('uploads/channels/'.$file_name.'.png');
        $channel->logo = $file_name.'.png';
        
        $banner = $request->file('banner');
        $file_name = 'channel_banner_'.$channel->name.'_'.uniqid();
        Storage::putFileAs('uploads/channels', $banner, $file_name);
        Image::make($banner)->encode('png', 70)->save('uploads/channels/'.$file_name.'.jpeg');
        $channel->banner = $file_name.'.jpeg';
        
        $channel->save();
        
        return redirect('manage/channels')->withErrors(['msg', 'The Message']);

        /*
        if ($channel->save())
        {
            $id = $channel->id;
            $tags = $request->get('tags_id_list');

            foreach($tags as $tag) {
                //check if tag exists
                $t = Tags::find($tag);
                //if not, create it
                if ($t == null)
                    {
                        $new_tag = new Tags;
                        $new_tag->name = $tag;
                    }
                $channel_tag = new ChannelTags;
                $channel_tag->channel_id = $id;
                $channel_tag->tags_id = $tag;
                $channel_tag->save();
            }
        }
        */
    }
    public function edit($id) {
        $channel = Channel::find($id);
        return view('dashboard.edit-channel')->with('channel', $channel);;
        
    }
    public function update(Request $request, $id){
        request()->validate([
        'name' => 'required',
        'country' => 'required',
        'language' => 'required',
        'link' => 'required'
        ]);
        
          $channel = Channel::find($id);
          $channel->link = $request->get('link');
          $channel->country = $request->get('country');
          $channel->language = $request->get('language');
          $channel->name = $request->get('name');
        if (!($request->get('is-active')))
        {
            $channel->stauts = 0;
        }
        
        $logo = $request->file('logo');
        if($logo)
        {
        $file_name = 'channel_logo_'.$channel->name.'_'.uniqid();
        File::delete('uploads/channels/'.$channel->logo);
        Storage::putFileAs('uploads/channels', $logo, $file_name);
        Image::make($logo)->encode('png', 70)->save('uploads/channels/'.$file_name.'.png');
        $channel->logo = $file_name.'.png';
        }
        
        $banner = $request->file('banner');
        if ($banner)
        {
        $file_name = 'channel_banner_'.$channel->name.'_'.uniqid();
        File::delete('uploads/channels/'.$channel->banner);
        Storage::putFileAs('uploads/channels', $banner, $file_name);
        Image::make($banner)->encode('png', 70)->save('uploads/channels/'.$file_name.'.jpeg');
        $channel->banner = $file_name.'.jpeg';
        }
        
        $channel->save();

        return redirect('manage/channels')->withErrors(['msg', 'The Message']);
        
    }
}
