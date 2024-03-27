<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ActionController extends Controller
{

    public function cart(){

        return view('user.cart');
    }
}
