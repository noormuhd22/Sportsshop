<?php

namespace App\Http\Controllers\Adminmessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message; 
use App\Models\order;
use App\Models\userlogged;
class MessageController extends Controller
{
    //

    public function viewMessage(){
        $message = message::all();
return view('message.message',['message'=>$message]);
    }

    public function viewTest(Request $request){
         dd($request->session()->all());
    }

    public function viewadminhome(){
        $order = order::all()->count();
        $user =userlogged::all()->count();
        return view('message.welcome',['order'=>$order,'user' => $user]);
}
}
