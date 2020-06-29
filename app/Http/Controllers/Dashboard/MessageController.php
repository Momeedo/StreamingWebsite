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
}
