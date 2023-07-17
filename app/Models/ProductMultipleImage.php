<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductMultipleImage extends Model
{
    use HasFactory;
    protected $table = ('product_multiple_images');
    protected $fillable = [
        'product_id',
        'product_mult_image',
        'created_by',
        'updated_by',
    ];
}
