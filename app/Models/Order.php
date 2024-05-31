<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'buyer_id',
        'seller_id',
        'buyer_name_lastname',
        'seller_name_lastname',
        'buyer_email',
        'seller_email',
        'product_title',
        'product_description',
        'price',
        'city',
        'address'
    ];
}
