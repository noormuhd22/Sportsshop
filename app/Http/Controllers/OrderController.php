<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Orderitems;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(){
        $order = order::all();
        return view('order.index',['order'=>$order]);
    }


    public function show($id){

     $order = order::findorfail($id);
     $orderitems = Orderitems::where('order_id', $id)->get(); 
     return view('order.view',['order'=>$order,'orderitems' => $orderitems]);
    }
}
