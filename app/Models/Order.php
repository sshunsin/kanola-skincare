<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'customer_name',
        'payment_method',
        'shipping_method',
        'total_price',
        'status',
        'products',
    ];

    protected $casts = [
        'products' => 'array',
    ];
}