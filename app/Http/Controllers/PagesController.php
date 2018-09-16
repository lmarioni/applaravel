<?php

namespace App\Http\Controllers;

Use App\Message;
use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function home(){
      //$messages = Message::all();
      $messages = Message::paginate(10);
      //dd($messages);
      return view('welcome',['messages' => $messages]);
      // return view('welcome',['messages' => []]);
    }
}
