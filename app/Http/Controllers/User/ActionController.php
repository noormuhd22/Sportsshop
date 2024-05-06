<?php

namespace App\Http\Controllers\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Message; 
use Illuminate\Http\Request;
use App\Models\cart;
use App\Models\product;
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
        return redirect('/cartview')->with('error', 'Product already exists in the cart')->with('buttonText', $request->buttonText);    } else {
      
        $productid = $request->productId;
        $product = Product::where('id', $productid)->first();

        $cart = new Cart;
        $cart->productid = $productid;
        $cart->userid = $request->userid;
        $cart->name = $product->name;
        $cart->price = $product->price;
        $cart->image = $product->image;

        $cart->save();
    }

    
    return redirect()->back()->with('success', 'Product added successfully');

}

    



public function deleteCart(request $request){

   
            $id = $request->productId;
           
            $cart = Cart::where('id', $id)->first();
            if ($cart) {
                $cart->delete();
          
                return redirect()->back()->with('success', 'Product deleted successfully');

            } else {
                
                return response()->json(['error' => 'Item not found'], 404);
            }
     
    }
    


    public function updateQuantity(Request $request)
    {
        $productId = $request->input('productId');
    $newQuantity = $request->input('quantity');
    
        // Update the quantity of the product in the cart table
        $cartItem = Cart::where('productid',$productId)->first();
        if ($cartItem) {
            $cartItem->quantity = $newQuantity;
            $cartItem->save();
            return response()->json(['success' => true, 'message' => 'Quantity updated successfully']);
        } else {
            return response()->json(['success' => false, 'message' => 'Product not found in the cart']);
        }
    }
    

public function checkout(Request $request){
    
    $user = $request->session()->get('user')['id'];

    // Fetch only the cart items associated with the logged-in user
    $cart = Cart::where('userid', $user)->get();



    return view('user.checkout',['cart' => $cart,'user' => $user]);
}


public function buynowCheckout(Request $request){

$user = $request->session()->get('user')['id'];
$productid = $request->input('productId');

$product = product::where('id',$productid)->get();

return view('user.buynow',['product'=>$product,'user'=>$user]);

}

}