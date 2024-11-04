<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'product_name',
        'product_image',
        'product_price',
        'discount',
        'stock_status',
    ];
}
