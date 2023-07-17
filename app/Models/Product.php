<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'product_name',
        'product_price',
        'product_discount',
        'product_discountprice',
        'product_description',
        'catagory',
        'subcatagory',
        'is_newest',
        'is_trending',
        'is_offer',
        'seller_name',
        'delivery_days',
        'product_image',
        'product_images',
    ];
}
