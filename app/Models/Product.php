<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = 
    [
        'brand_id',
        'category_id',
        'subcategory_id',
        'subsubcategory_id',
        'product_name',
        'product_slug',
        'product_code',
        'product_color',
        'product_size',
        'product_price',
        'product_qty',
        'product_tag',
        'product_thumbnail',
        'discount_price',
        'short_des',
        'long_des',
        'specail_offer',
        'hot_deals',
        'features',
        'special_deals',
        'status',
        
    ];

    
}
