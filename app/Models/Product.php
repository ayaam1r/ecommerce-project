<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'category_id',
        'quantity',
        'image',
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function cartItems()
    {
        // A product can be in many cart items
        return $this->hasMany(Cart::class);
    }
}