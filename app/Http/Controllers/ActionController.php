<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cart;
class ActionController extends Controller
{

    public function cart(Request $request) {
        
        $existingCart = Cart::where('id', $request->productId)->first();
    
        if ($existingCart) {
         
            $existingCart->quantity += 1; 
            $existingCart->save();
        } else {
          
            $cart = new Cart;
            $cart->id = $request->productId;
            $cart->name = $request->name;
            $cart->price = $request->price;
            $cart->image = $request->image;
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
                // Handle case where cart item is not found
                return response()->json(['error' => 'Item not found'], 404);
            }
     
    }
    

}


