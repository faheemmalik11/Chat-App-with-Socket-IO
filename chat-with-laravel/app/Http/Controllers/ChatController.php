<?php

namespace App\Http\Controllers;

use App\Events\SendPrivateMessage;
use Illuminate\Http\Request;

class ChatController extends Controller
{
    public function sendMessage(){
        $message = request('message');
        $user = request('user_id');
        $data = ["message"=>$message, "user"=>$user];
        broadcast(new SendPrivateMessage($data));
    }
}
