<?php

namespace App\Http\Controllers;
use App\Models\Userlogged;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //

    public function index(Request $request){
       
        $userid = $request->session()->get('user')['id'];

        $profile = Userlogged::where('id',$userid)->first();


        return view('profile.index',['profile'=>$profile]);
    }

    public function update(Request $request){
           
      $request->validate([

        'name' => 'required|string|max:255',
        'mobile' => 'required|string|max:12',
        'email' => 'required|email|max:255',

      ]);

      $user = userlogged::findorfail($request->session()->get('user')['id']);
      $user->name = $request->name;
      $user->mobile = $request->mobile;
      $user->email = $request->email;
      $user->save();
      return redirect()->back()->with('success', 'Profile updated successfully!');
        return view('profile.index');
    }
}
