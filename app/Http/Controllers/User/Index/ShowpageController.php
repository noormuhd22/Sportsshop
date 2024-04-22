<?php

namespace App\Http\Controllers\User\Index;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\categories;
use App\Models\Cart;
use Illuminate\Http\Request;

class ShowpageController extends Controller
{
    

    Public function viewHome(Request $request)  {
        $products = Product::where('status', 0)->get(); 
$user = $request->session()->get('user')['name'];
return view('user.userhome', ['products' => $products,'user'=>$user]);


}
Public function viewCategory(){
    $categories = categories::all(); 
return view('user.categories', ['categories' => $categories]);
}

public function viewContactus(){
    return view('user.contactus');
}

public function viewProducts(Request $request){
    $products = Product::where('status', 0)->get();
$user = $request->session()->get('user')['id'];
return view('user.products',['products'=>$products,'user' => $user]);
}

public function viewCart(Request $request){
    $user = session('user')['id'];
$cart = Cart::where('userid', $user)->get();
return view('user.cart', ['cart' => $cart,'user' => $user]);
}
public function viewAboutus(){
    return view('user.aboutus');
}

public function cartCount(Request $request){
     $user = $request->session()->get('user')['id'];
 $cartCount = Cart::where('userid', $user)->count();
  // Assuming you have a method to get the cart count
 //response sent through ajax
return response()->json(['count' => $cartCount]);
}
    }

