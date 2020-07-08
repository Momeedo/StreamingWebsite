<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use GeoIP;
use App\Message;

class ContactController extends Controller
{
    public function index () {
      $user = auth()->user();
      return view('front.contact', ['user' => $user]);
    }
    public function store(Request $request){
        request()->validate([
        'username' => 'required',
        'email' => 'required',
        'subject' => 'required'
        ]);
        
        $all = $request->all();
        $message = new Message;
        $message->username = $all['username'];
        $message->email = $all['email'];
        $message->type = $all['type'];
        $message->message = $all['subject'];
        
        $message->ip = $request->ip();
        $message->country = GeoIP::getLocation($request->ip())->getAttribute('country');
        
        $message->save();
        return redirect('/contact')->withErrors(['Message sent!', 'The Message']);
    }
}
