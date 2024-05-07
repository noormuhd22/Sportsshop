<?php

namespace App\Http\Controllers\Adminlogin;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash; 
use App\Models\loggeduser;
use Illuminate\Support\Facades\DB;


class AuthController extends Controller
{
    public function showsignup(){
        return view('Adminlogin.signup');
    }


    public function loginpage(){
        return view('Adminlogin.login');
    }

    
    public function signup(Request $request)
    {
        $request->validate([
            'name' => 'required|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/|max:255',
            'email' => 'required|email|max:255|unique:loggedusers',
            'password' => 'required|min:8',
            'mobile' => 'required|numeric'
        ]);
    
  
        DB::beginTransaction();
    
        try {
            $user = new LoggedUser;
            $user->name = $request->name;
            $user->email = $request->email;
            $user->mobile = $request->mobile;
            $user->password = Hash::make($request->password);
            $user->save();
    
            DB::commit();
    
            // Redirect after successful signup
            return redirect('/admin')->with('success', 'User created successfully!');
        } catch (\Exception $e) {
            // Rollback transaction if an exception occurs
            DB::rollback();
    
            // Redirect back with error message
            return back()->withErrors(['error' => 'An error occurred while signing up. Please try again.']);
        }
    }
    
    public function login(Request $request)
    {
       
        $email = $request->input('email');
        $password = $request->input('password');
       
        
        $user = loggeduser::where('email', $email)->first();
    
      
        if ($user && Hash::check($password, $user->password)) {

            $request->session()->put('admin',1);
            
            return redirect()->intended('/welcome');
        }
    
     
        return back()->withErrors([
            'password' => 'Username and Password are Incorrect.',
        ]);
    }
    public function logout(Request $request){
      $request->session()->forget('admin');
    return view('Adminlogin.login');
    
    }
}
     