<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function about(){
      $var = array(
        'autor' => 'Lucas Marioni',
        'email' => 'lucasmarionilm@gmail.com'
      );
        return view('about',$var);
    }
}
