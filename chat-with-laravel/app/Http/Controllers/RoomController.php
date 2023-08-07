<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Models\Channel;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Channel $channel){
        $members = $channel->users;
        return view('room', compact('members','channel'));
    }

    public function sendMessage(){
       $message = request('message');
       $channel = Channel::findorFail(request('channel'));

       $data = ["message"=>$message, "channel"=>$channel, "user"=>auth()->user()];
       broadcast(new SendMessage($data));
       return response()->json([
        'code'=>200,
        'message'=> 'event triggered',
       ]);
    }
}
