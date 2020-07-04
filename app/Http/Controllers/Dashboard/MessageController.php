<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;

class MessageController extends Controller
{
    public function index () {
      $messages = Message::all();
      return view('dashboard.messages', ['messages' => $messages]);
    }
    public function remove (Request $request) {
      $id = $request->get('id');
      $message = Message::find($id);
      if($message->delete()){
				return response()->json(['result' => 'success', 'code' => 200]);
				}else{
				return response()->json(['result' => 'fail', 'code' => 400]);
			}
    }
    public function read (Request $request) {
      $id = $request->get('id');
      $message = Message::find($id);
      $message->is_read = 1;
      if($message->save()){
				return response()->json(['result' => 'success', 'code' => 200]);
				}else{
				return response()->json(['result' => 'fail', 'code' => 400]);
			}
    }
}
