<?php

namespace App\Http\Controllers;

use App\Conversation;
use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    //
    public function store(Request $request){
        $conversation_id=$request->conversation_id;
        if(!isset($conversation_id) && $conversation_id==null){
            $conversation=Conversation::create([
                'trip_id'=>$request->trip_id
            ]);
            $conversation_id=$conversation->id;

        }
        $mensaje=Message::create([
            'conversation_id'=>$conversation_id,
            'mensaje'=>$request->mensaje,
            'user_id'=>auth()->user()->id

        ]);

        return back()->with("mensaje", 'Se envío correctamente el mensaje');

    }
}
