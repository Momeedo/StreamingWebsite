<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic as Image;
use App\Game;
use App\Team;
use App\Channel;
use App\Competition;
use App\Location;

class TeamController extends Controller
{
    public function index () {
      $teams = Team::orderBy('country', 'asc')->orderBy('name', 'asc')->get();
      $time_now = date("Y-m-d H:i:s");
      $from = date("Y-m-d H:i:s", strtotime('-8 hours'));
      $to = date("Y-m-d H:i:s", strtotime('+8 hours'));
      $games = Game::whereBetween('start_date', [$from, $to])->get();
      
      $teams_with_a_game_now = array();
      foreach ($games as $game) {
          if (($game->start_date < $time_now) && ($time_now < $game->end_date)){
              array_push($teams_with_a_game_now, $game->team_a_id);
              array_push($teams_with_a_game_now, $game->team_b_id);
          }
      }
      return view('dashboard.teams', ['teams' => $teams, 'teams_with_a_game_now' => $teams_with_a_game_now]);
    }
    
    public function create(){
        return view('dashboard.add-team');
    }
    
    public function store(Request $request){
        request()->validate([
        'name' => 'required',
        'country' => 'required',
        'logo' => 'required'
        ]);
        
        $all = $request->all();
        $team = new Team;
        $team->name = $all['name'];
        $team->country = $all['country'];
        
        $logo = $request->file('logo');
        $file_name = 'team_'.$team->name.'_'.uniqid();
        Storage::putFileAs('uploads/logos', $logo, $file_name);
        Image::make($logo)->fit(500,500)->encode('png', 70)->save('uploads/logos/'.$file_name.'.png');
        $team->logo = $file_name.'.png';
        $team->save();
        return redirect('manage/teams')->withErrors(['msg', 'The Message']);
    }

    public function remove (Request $request) {
      $id = $request->get('id');
      $team = Team::find($id);
      Game::where('team_a_id', $id)->delete();
      Game::where('team_b_id', $id)->delete();
      if($team->delete()){
                File::delete('uploads/logos/'.$team->logo);
				return response()->json(['result' => 'success', 'code' => 200]);
				}else{
				return response()->json(['result' => 'fail', 'code' => 400]);
			}
    }
    
    public function edit($id) {
        $team = Team::find($id);
        return view('dashboard.edit-team')->with('team', $team);;
        
    }
    
    public function update(Request $request, $id){
        request()->validate([
        'name' => 'required',
        'country' => 'required'
        ]);
        
        $team = Team::find($id);
        $team->name = $request->name;
        $team->country = $request->country;
        
        $logo = $request->file('logo');
        if ($logo){
            $file_name = 'team_'.$team->name.'_'.uniqid();
            File::delete('uploads/logos/'.$team->logo);
            Storage::putFileAs('uploads/logos', $logo, $file_name);
            Image::make($logo)->fit(500,500)->encode('png', 70)->save('uploads/logos/'.$file_name.'.png');
            $team->logo = $file_name.'.png';
        }
        $team->save();
        return redirect('manage/teams')->withErrors(['msg', 'The Message']);
        
    }
}
