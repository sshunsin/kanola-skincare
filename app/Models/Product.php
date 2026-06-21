<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'batch_number',
        'manufactured_at',
        'expired_at',
        'stock',
        'price',
        'status',
        'benefits',
        'ingredients',
        'how_to_use',
        'image',
        'categories_id'
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class, 'categories_id');
    }
}