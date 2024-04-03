<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class orderitems extends Model
{

    protected $fillable = [
        'order_id',
        'product_id',
        'quantity',
        'price',
        'image',
        'user_id',
        // Add other fields as needed
    ];
    use HasFactory;
}
