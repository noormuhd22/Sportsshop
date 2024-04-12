<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use App\Models\Order;
use App\Models\orderitems;
use App\Models\Cart;
use App\Models\Product;
use Razorpay\Api\Api;

class PaymentController extends Controller
{

    public function paymentSuccess()
    {
        return view('user.paymentsuccess');
    }




    
    public function paymentProcess(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        
        try {
            $input = $request->all();
        
            if (count($input) && !empty($input['razorpay_payment_id'])) {
                $payment = $api->payment->fetch($input['razorpay_payment_id']);
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
        
                $amount = $response['amount'] / 100; // Actual amount
        
                $payment = Payment::create([
                    'r_payment_id' => $response['id'],
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'user_email' => $response['email'],
                    'amount' => $amount,
                    'json_response' => json_encode((array)$response)
                ]);
            }
        
            // Process order data within a database transaction
            \DB::transaction(function () use ($request) {
                $userId = $request->session()->get('user');
        
                $order = new Order;
                $order->userid = $userId;
                $order->name =$request->input('name');
                $order->address = $request->input('address');
                $order->state = $request->input('state');
                $order->city = $request->input('city');
                $order->pincode = $request->input('pincode');
                $order->mobile = $request->input('mobile');
                $order->paymentid = $request->input('payment_id');
                $order->totalprice = $request->input('totalprice');
                $order->added_date = now();
                $order->save();
        
                // Create order items
                $cartItems = Cart::where('userid', $userId)->get();
                $userId = $request->session()->get('user');
                foreach ($cartItems as $cartItem) {
                    $orderItem = new orderitems;
                    $orderItem->order_id = $order->id;
                    $orderItem->userid =  $userId;
                    $orderItem->productname =$cartItem->name;
                    $orderItem->productid = $cartItem->productid;
                    $orderItem->quantity = $cartItem->quantity;
                    $orderItem->price = $cartItem->price;
                    $orderItem->image =$cartItem->image;
                   
                    $orderItem->save();
                }
        
                // Update cart to mark products as ordered
                Cart::where('userid', $userId)->delete();
            });
            
            return view('user.paymentsuccess');
            

        } catch (\Exception $e) {
            \Log::error($e);
            // Handle error appropriately
            return redirect()->back()->with('error', 'An error occurred while processing your payment.');
        }
    }
    

//buynow- paymentprocess
    public function buynowpaymentProcess(Request $request)
    {
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));
        
        try {
            $input = $request->all();
        
            if (count($input) && !empty($input['razorpay_payment_id'])) {
                $payment = $api->payment->fetch($input['razorpay_payment_id']);
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
        
                $amount = $response['amount'] / 100; // Actual amount
        
                $payment = Payment::create([
                    'r_payment_id' => $response['id'],
                    'method' => $response['method'],
                    'currency' => $response['currency'],
                    'user_email' => $response['email'],
                    'amount' => $amount,
                    'json_response' => json_encode((array)$response)
                ]);
            }
        
            // Process order data within a database transaction
            \DB::transaction(function () use ($request) {
                $userId = $request->session()->get('user');
        
                $order = new Order;
                $order->userid = $userId;
                $order->name =$request->input('name');
                $order->address = $request->input('address');
                $order->state = $request->input('state');
                $order->city = $request->input('city');
                $order->pincode = $request->input('pincode');
                $order->mobile = $request->input('mobile');
                $order->paymentid = $request->input('payment_id');
                $order->totalprice = $request->input('totalprice');
                $order->added_date = now();
                $order->save();
        
                // Create order items
                
                $productid = $request->input('productId');

            
                $product = product::where('id',$productid)->get();

                $userId = $request->session()->get('user');
               foreach($product as $products){
                    $orderItem = new orderitems;
                    $orderItem->order_id = $order->id;
                    $orderItem->userid =  $userId;
                    $orderItem->productname =$products->name;
                    $orderItem->productid = $products->id;
                    $orderItem->quantity = 1;
                    $orderItem->price = $products->price;
                    $orderItem->image =$products->image;
                    $orderItem->save();
             
               }
                // Update cart to mark products as ordered
                Cart::where('userid', $userId)->delete();
            });
            
            return view('user.paymentsuccess');
            

        } catch (\Exception $e) {
            \Log::error($e);
            // Handle error appropriately
            return redirect()->back()->with('error', 'An error occurred while processing your payment.');
        }
    }
}    