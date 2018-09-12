<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{

    public function home(){
      $messages = [
        ['id'=> 1,'content'=>'Este es mi primer mensaje','image'=>'https://picsum.photos/420/320?image=0'],
        ['id'=> 2,'content'=>'Este es mi segundo mensaje','image'=>'https://picsum.photos/420/320?image=1'],
        ['id'=> 3,'content'=>'Hola a todos!','image'=>'https://picsum.photos/420/320?image=2'],
        ['id'=> 4,'content'=>'Este es mi ultimo jaja','image'=>'https://picsum.photos/420/320?image=3']
      ];
      return view('welcome',['messages' => $messages]);
      // return view('welcome',['messages' => []]);
    }
}
