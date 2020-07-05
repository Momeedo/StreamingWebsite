<?php

namespace App\Http\Controllers\Dashboard;
	
use App\Http\Controllers\Controller;
use DB;
use App\Game;
use App\ChannelGames;
use App\Team;
use App\Channel;
use App\Competition;
use App\Location;
use Carbon\Carbon;


use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index () {
      $games = Game::all();
      $time_now = date("Y-m-d H:i:s");
      
      $games_with_a_game_now = array();
      $games_with_a_game_completed = array();
      foreach ($games as $game) {
          if (($game->start_date < $time_now) && ($time_now < $game->end_date)){
              array_push($games_with_a_game_now, $game->id);
          }
          else if ($game->end_date < $time_now)
          {
              array_push($games_with_a_game_completed, $game->id);
          }
      }
      return view('dashboard.games', ['games' => $games, 'games_with_a_game_now' => $games_with_a_game_now, 'games_with_a_game_completed' => $games_with_a_game_completed]);
    }
    
    public function create(){
        $teams_a = Team::orderBy('name', 'asc')->pluck('name', 'id');
        $teams_b = Team::orderBy('name', 'asc')->pluck('name', 'id');
        $channels = Channel::orderBy('name', 'asc')->pluck('name', 'id');
        $competitions = Competition::orderBy('name', 'asc')->pluck('name', 'id');
        $locations = Location::orderBy('name', 'asc')->pluck('name', 'id');

        return view('dashboard.add-game', array('teams_a' => $teams_a, 'teams_b' => $teams_b, 'channels' => $channels, 'competitions' => $competitions, 'locations' => $locations));
    }
    public function edit($id) {
        $game = Game::find($id);
        $teams_a = Team::orderBy('name', 'asc')->pluck('name', 'id');
        $teams_b = Team::orderBy('name', 'asc')->pluck('name', 'id');
        $channels = Channel::orderBy('name', 'asc')->pluck('name', 'id');
        $competitions = Competition::orderBy('name', 'asc')->pluck('name', 'id');
        $locations = Location::orderBy('name', 'asc')->pluck('name', 'id');

        return view('dashboard.edit-game', array('teams_a' => $teams_a, 'teams_b' => $teams_b, 'channels' => $channels, 'competitions' => $competitions, 'locations' => $locations))->with('game', $game);
        
    }
    public function save(Request $request) {
        request()->validate([
        'startDate' => 'required',
        'channel_id_list' => 'required'
        ]);
      $game = new Game;
      $game->team_a_id = $request->get('team_a_id');
      $game->team_b_id = $request->get('team_b_id');
      $game->competition_id = $request->get('competition_id');
      $game->location_id = $request->get('location_id');
      $game->round = $request->get('round');
      $game->start_date = Carbon::parse($request->get('startDate'))->format('Y-m-d H:i:s');
        //Check if endDate is filled, if not then add 2 hours to startDate
        if ($request->get('endDate'))
        {
            $game->end_date = Carbon::parse($request->get('endDate'))->format('Y-m-d H:i:s');
        }
        else
        {
            $game->end_date = Carbon::parse($request->get('startDate'))->addHour(2)->format('Y-m-d H:i:s');
        }
        if ($game->save())
        {
            $id = $game->id;
            $channels = $request->get('channel_id_list');

            foreach($channels as $channel) {
                $channel_game = new ChannelGames;
                $channel_game->game_id = $id;
                $channel_game->channel_id = $channel;
                $channel_game->save();
            }
        }
    
      return redirect('manage/games')->withErrors(['msg', 'The Message']);
    }
    
    public function update(Request $request, $id){  
        request()->validate([
        'startDate' => 'required',
        'channel_id_list' => 'required'
        ]);
      $game = Game::find($id);
      $game->team_a_id = $request->get('team_a_id');
      $game->team_b_id = $request->get('team_b_id');
      $game->competition_id = $request->get('competition_id');
      $game->location_id = $request->get('location_id');
      $game->round = $request->get('round');
      $game->start_date = Carbon::parse($request->get('startDate'))->format('Y-m-d H:i:s');
        //Check if endDate is filled, if not then add 2 hours to startDate
        if ($request->get('endDate'))
        {
            $game->end_date = Carbon::parse($request->get('endDate'))->format('Y-m-d H:i:s');
        }
        else
        {
            $game->end_date = Carbon::parse($request->get('startDate'))->addHour(2)->format('Y-m-d H:i:s');
        }
        if ($game->save())
        {
            $id = $game->id;
            //$game->channels()->detach();
            $saved_channels = $game->channels;
            foreach($saved_channels as $saved_channel) {
                ChannelGames::where('game_id', $id)->delete();
            }    
            $channels = $request->get('channel_id_list');

            foreach($channels as $channel) {
                $channel_game = new ChannelGames;
                $channel_game->game_id = $id;
                $channel_game->channel_id = $channel;
                $channel_game->save();
            }
        }
        return redirect('manage/games')->withErrors(['msg', 'The Message']);
        
    }
    public function remove (Request $request) {
      $id = $request->get('id');
      $game = Game::find($id);
      $saved_channels = $game->channels; 
      foreach($saved_channels as $saved_channel) {
            ChannelGames::where('game_id', $id)->delete();
      }
      if($game->delete()){
				return response()->json(['result' => 'success', 'code' => 200]);
				}else{
				return response()->json(['result' => 'fail', 'code' => 400]);
			}
    }
}