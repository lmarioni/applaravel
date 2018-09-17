<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Http\Requests\CreateMessageRequest;

class MessagesController extends Controller
{
    public function show(Message $message){
      //ir a buscar el message por idea
      //$message = Message::find($id); si como parametro le recibo un $id me anda esto..
      // una view de un message

      return view('messages.show',[
        'message' => $message,
      ]);
    }

    // public function create(Request $request){
    //   //dd($request);
    //   $this->validate($request, [
    //     'message' => ['required','max:160']
    //   ],[
    //     'message.required' => 'Por favor escribe un mensaje',
    //     'message.max' => 'El msaje no puede superar los 160 caracteres'
    //   ]);
    //
    //   return 'Creado!';
    // }

    public function create(CreateMessageRequest $request){
      $user = $request->user();

      $message = Message::create([
        'user_id' => $user->id,
        'content' => $request->input('message'),
        'image' => 'https://lorempixel.com/600/338?'.mt_rand(0,1000)
      ]);
    //  dd($message);
      return redirect('/messages/'.$message->id);
    }
}
