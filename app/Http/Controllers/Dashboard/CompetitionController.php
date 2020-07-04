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

class CompetitionController extends Controller
{
    public function index () {
      $competitions = Competition::all();
      $time_now = date("Y-m-d H:i:s");
      $from = date("Y-m-d H:i:s", strtotime('-8 hours'));
      $to = date("Y-m-d H:i:s", strtotime('+8 hours'));
      $games = Game::whereBetween('start_date', [$from, $to])->get();
      
      $competitions_with_a_game_now = array();
      foreach ($games as $game) {
          if (($game->start_date < $time_now) && ($time_now < $game->end_date)){
              array_push($competitions_with_a_game_now, $game->competition_id);
          }
      }
      return view('dashboard.competitions', ['competitions' => $competitions, 'competitions_with_a_game_now' => $competitions_with_a_game_now]);
    }
    
    public function create(){
        return view('dashboard.add-competition');
    }
    public function store(Request $request){
        request()->validate([
        'name' => 'required',
        'country' => 'required',
        'sport' => 'required',
        'type' => 'required',
        'logo' => 'required'
        ]);
        
        $all = $request->all();
        $competition = new Competition;
        $competition->name = $all['name'];
        $competition->country = $all['country'];
        $competition->sport = $all['sport'];
        $competition->type = $all['type'];
        
        $logo = $request->file('logo');
        $file_name = 'competition_'.$competition->name.'_'.uniqid();
        Storage::putFileAs('uploads/competitions', $logo, $file_name);
        Image::make($logo)->encode('png', 70)->save('uploads/competitions/'.$file_name.'.png');
        $competition->logo = $file_name.'.png';
        $competition->save();
        return redirect('manage/competitions')->withErrors(['msg', 'The Message']);
    }
    public function remove (Request $request) {
      $id = $request->get('id');
      $competition = Competition::find($id);
      Game::where('competition_id', $id)->delete();
      if($competition->delete()){
                File::delete('uploads/competitions/'.$competition->logo);
				return response()->json(['result' => 'success', 'code' => 200]);
				}else{
				return response()->json(['result' => 'fail', 'code' => 400]);
			}
    }
    public function edit($id) {
        $competition = Competition::find($id);
        return view('dashboard.edit-competition')->with('competition', $competition);;
        
    }
    public function update(Request $request, $id){
        request()->validate([
        'name' => 'required',
        'country' => 'required',
        'sport' => 'required',
        'type' => 'required'
        ]);
        
        $competition = Competition::find($id);
        $competition->name = $request->name;
        $competition->country = $request->country;
        $competition->sport = $request->sport;
        $competition->type = $request->type;
        
        $logo = $request->file('logo');
        if ($logo){
            $file_name = 'competition_'.$competition->name.'_'.uniqid();
            File::delete('uploads/competitions/'.$competition->logo);
            Storage::putFileAs('uploads/competitions', $logo, $file_name);
            Image::make($logo)->encode('png', 70)->save('uploads/competitions/'.$file_name.'.png');
            $competition->logo = $file_name.'.png';
        }
        $competition->save();
        return redirect('manage/competitions')->withErrors(['msg', 'The Message']);
        
    }
}
