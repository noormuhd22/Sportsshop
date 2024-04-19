<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Orderitems;
use Illuminate\Http\Request;

class OrderstatusController extends Controller
{
 
public function index(Request $request){

$userId = $request->session()->get('user')['id'];

$order = Order::where('userid', $userId)
                ->orderByDesc('created_at')
                ->get();

return view('user.orders',['order' => $order]);

}


public function show($id){

    $order = order::findorfail($id);
    $orderitems = orderitems::where("order_id",$id)->get();
    return view('user.vieworder',['order' => $order,'orderitems' => $orderitems]);

}

}
