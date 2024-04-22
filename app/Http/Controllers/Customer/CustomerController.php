<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Userlogged;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index(){
     
        $customers = Userlogged::all();
        return view('customer.index',compact('customers'));

    }
    





}
   