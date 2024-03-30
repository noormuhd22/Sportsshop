<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Message; 
use Illuminate\Http\Request;
use App\Models\cart;
class ActionController extends Controller
{

public function submitForm(request $request){
    
    
        $request->validate([
            'email' => 'required|email|max:255', 
            'mobile' => 'required|numeric',
            'message' => 'required'
        ]);
    
        DB::beginTransaction(); 
        try {
        
            $message = new Message;
            $message->email = $request->email;
            $message->mobile = $request->mobile;
            $message->message = $request->message;
            $message->save();
    
            DB::commit(); 
    
        
            return redirect('/contactus')->with('success', 'Message sent successfully');
        } catch (\Exception $e) { 
            DB::rollback(); 
            return redirect()->back()->withErrors(['error' => 'An error occurred']);
        }
    
    
}






    public function cart(Request $request) {
        
        $existingCart = Cart::where('userid', $request->userid)
        ->where('productid', $request->productId)
        ->first();
    
        if ($existingCart) {
         
            $existingCart->quantity += 1; 
            $existingCart->save();
        } else {
          
            $cart = new Cart;
            $cart->productid = $request->productId;
            $cart->name = $request->name;
            $cart->price = $request->price;
            $cart->image = $request->image;
            $cart->userid = $request->userid;
            $cart->quantity = 1; 
            $cart->save();
        }
    
        return redirect('/products')->with('success', 'Product added successfully');
    }
    



public function deleteCart(request $request){

   
            $id = $request->productId;
           
            $cart = Cart::where('id', $id)->first();
            if ($cart) {
                $cart->delete();
          
              return redirect('/cart')->with('success','product deleted successfully');
            } else {
                
                return response()->json(['error' => 'Item not found'], 404);
            }
     
    }
    




public function updateQuantity(Request $request)
{
    $productId = $request->input('productId');
    $newQuantity = $request->input('quantity');

    // Update the quantity of the product in the cart table
    $cartItem = Cart::where('id', $productId)->first();
    if ($cartItem) {
        $cartItem->quantity = $newQuantity;
        $cartItem->save();
        return redirect('/cart');
    } else {
        return response()->json(['success' => false, 'message' => 'Product not found in the cart']);
    }
}

public function checkout(Request $request){
  


    return view('user.checkout');
}
}