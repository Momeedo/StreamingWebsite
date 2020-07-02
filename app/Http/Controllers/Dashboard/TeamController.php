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
      $teams = Team::all();
      return view('dashboard.teams', ['teams' => $teams]);
    }
    
    public function create(){
        return view('dashboard.add-team');
    }
    
    public function store(Request $request){
        request()->validate([
        'name' => 'required',
        'country' => 'required',
        ]);
        
        $all = $request->all();
        $team = new Team;
        $team->name = $all['name'];
        $team->country = $all['country'];
        
        $logo = $request->file('logo');
        $file_name = 'team_'.$team->name.'_'.uniqid();
        Storage::putFileAs('uploads/logos', $logo, $file_name);
        Image::make($logo)->fit(400,400)->encode('png', 70)->save('uploads/logos/'.$file_name.'.png');
        $team->logo = $file_name.'.png';
        $team->save();
        return redirect('manage/teams');
    }

    public function remove (Request $request) {
      $id = $request->get('id');
      $team = Team::find($id);
      Game::where('team_a_id', $id)->delete();
      Game::where('team_b_id', $id)->delete();
      if($team->delete()){
				return response()->json(['result' => 'success', 'code' => 200]);
				}else{
				return response()->json(['result' => 'fail', 'code' => 400]);
			}
    }
}
