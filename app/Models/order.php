<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{

    protected $fillable = [
        'totalprice',
        'paymentid',
        'orderid',
        'address',
        'userid',
        'mobile',
        'pincode',
        'city',
        'state',
        'status',
        // Add other fields here as needed
    ];


    use HasFactory;
}
