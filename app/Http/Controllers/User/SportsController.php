<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller; 
use App\Models\product;
use Illuminate\Http\Request;

class SportsController extends Controller
{
    //
    public function index(Request $request){
        $user = $request->session()->get('user')['id'];
        $products = product::where('categoryname','football')->get();
        return view('Usersports.index',['products'=>$products,'user'=>$user]);
    }
}
