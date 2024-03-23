<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(){
     
        $customers = Customer::where('status', '!=', 1)->get();
        return view('customer.index',compact('customers'));

    }
    public function form(){
        return view('customer.create');
    }




    Public function store(Request $request){

        $request ->validate([
        'name'=>'required|alpha_num',
        'email'=>'required|email',
        'phone'=>'required|numeric',
        'address'=>'required|string|max:255'
        ]);

        $customer = new Customer;
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->save();

        return redirect()->route('customer.index')->with('success', 'Customer created successfully!');
    }

    public function edit($id){

        try{
            $customer = customer::findorfail($id);
            return view('customer.edit',compact('customer'));
        }catch(\Exception $r){
           abort(404,$r->getmessage());
        }
       
    }

    public function update( request $request,$id){
           
      $request -> validate([
       'name'=>'required|alpha_num',
       'email'=>'required|email',
       'phone'=>'required|numeric',
       'address'=>'required|string|max:255'
      ]);

        $customer = customer::findorfail($id);
        $customer->name = $request->name;
        $customer->phone = $request->phone;
        $customer->email = $request->email;
        $customer->address =$request->address;
        $customer -> save();

        return redirect()->route('customer.index')->with('success', 'Customer updated successfully!');

    }

    public function delete($id){

        $customer =customer::findorfail($id);
        $customer->status = 1;
        $customer->save();
        return redirect()->back()->with('success', 'Customer deleted successfully!');
    }
}
   