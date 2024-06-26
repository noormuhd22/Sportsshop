<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller; 
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Userlogged;
use Illuminate\Support\Facades\Hash; 
use App\Http\Middleware\IsUser;
class UserController extends Controller
{



    public function showloginpage(){
        return view('Userlogin.userlogin');
    }



    public function userLogin(Request $request)
    {
       
        $email = $request->input('email');
        $password = $request->input('password');
       
        
        $user = Userlogged::where('email', $email)->first();
    
      
if ($user && Hash::check($password,$user->password)) {

            //   $request->session()->put('user',$user->id);
              $request->session()->put('user', [
                'id' => $user->id,
                'name' => $user->name
            ]);
            
            return redirect()->intended('/home');
        }
    
     
        return back()->withErrors([
            'password' => 'Username and Password are Incorrect.',
        ]);
    }




    public function userSignuppage(){
         return view('Userlogin.usersignup');
    }

    
public function userSignup(request $request){
    $request -> validate([
       
       'name' => 'required|regex:/^[a-zA-Z]+(?:\s[a-zA-Z]+)*$/|max:255',
       'email' => 'required|email|max:255|unique:userloggeds',
       'password' => 'required|min:8',
       'mobile' => 'required|numeric|unique:userloggeds',
    ]);
DB::beginTransaction();
try{
    $userlogin = new Userlogged;
    $userlogin->name =$request->name;
    $userlogin->email=$request->email;
    $userlogin->password= Hash::make($request->password);
    $userlogin->mobile=$request->mobile;
    $userlogin->save();
   DB::commit();
return redirect('/userloginpage')->with('success', 'User created successfully!');
}catch(\Exception $e){

    DB::rollback();
    return back()->withErrors(['error' => 'An error occurred while signing up. Please try again.']);
}

    }
}
