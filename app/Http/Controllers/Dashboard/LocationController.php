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

class LocationController extends Controller
{
    public function index () {
      $locations = Location::orderBy('name', 'asc')->get();
      return view('dashboard.locations', ['locations' => $locations]);
    }
    
    public function create(){
        return view('dashboard.add-location');
    }
    
    public function store(Request $request){
        request()->validate([
        'name' => 'required',
        'country' => 'required',
        'town' => 'required',
        'image' => 'required'
        ]);
        
        $all = $request->all();
        $location = new Location;
        $location->name = $all['name'];
        $location->country = $all['country'];
        $location->town = $all['town'];
        
        $image = $request->file('image');
        $file_name = 'location_'.$location->name.'_'.uniqid();
        Storage::putFileAs('uploads/locations', $image, $file_name);
        Image::make($image)->encode('png', 70)->save('uploads/locations/'.$file_name.'.png');
        $location->image = $file_name.'.png';
        $location->save();
        return redirect('manage/locations')->withErrors(['msg', 'The Message']);
    }
    public function remove (Request $request) {
      $id = $request->get('id');
      $location = Location::find($id);
      Game::where('location_id', $id)->delete();
      if($location->delete()){
                File::delete('uploads/locations/'.$location->image);
				return response()->json(['result' => 'success', 'code' => 200]);
				}else{
				return response()->json(['result' => 'fail', 'code' => 400]);
			}
    }
    public function edit($id) {
        $location = Location::find($id);
        return view('dashboard.edit-location')->with('location', $location);;
        
    }
    
    public function update(Request $request, $id){
        request()->validate([
        'name' => 'required',
        'country' => 'required',
        'town' => 'required'
        ]);
        
        $location = Location::find($id);
        $location->name = $request->name;
        $location->country = $request->country;
        $location->town = $request->town;
        
        $image = $request->file('image');
        if ($image){
            $file_name = 'location_'.$location->name.'_'.uniqid();
            File::delete('uploads/locations/'.$location->image);
            Storage::putFileAs('uploads/locations', $image, $file_name);
            Image::make($image)->encode('png', 70)->save('uploads/locations/'.$file_name.'.png');
            $location->image = $file_name.'.png';
        }
        $location->save();
        return redirect('manage/locations')->withErrors(['msg', 'The Message']);
        
    }
}
