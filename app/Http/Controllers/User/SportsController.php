<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;

class SportsController extends Controller
{
    //
    public function index(){
       
        return view('Usersports.index');
    }
}
