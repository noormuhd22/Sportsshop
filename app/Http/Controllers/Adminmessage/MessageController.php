<?php

namespace App\Http\Controllers\Adminmessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Message; 
class MessageController extends Controller
{
    //

    public function viewMessage(){
        $message = message::all();
return view('message',['message'=>$message]);
    }

    public function viewTest(Request $request){
         dd($request->session()->all());
    }

    public function viewadminhome(){
        return view('welcome');
}
}
