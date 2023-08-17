<?php

namespace App\Http\Controllers;

use App\Events\SendPrivateMessage;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function sendMessage(){
        $message = request('message');
        $user = request('user_id');
        $data = ["message"=>$message, "recepientUserId"=>$user, "senderUserId"=>auth()->user()->id,];
        broadcast(new SendPrivateMessage($data));
        return response()->json([
            'code'=>200,
            'data' => [
                'message'=> 'Message event triggered',
                'user'=> $user
            ]
           ]);
    }


}
