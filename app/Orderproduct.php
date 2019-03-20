<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orderproduct extends Model
{
    protected $table='orderproducts';
    protected $fillable = [
        'orderId', 'productId','productQty','productPrice'
    ];
}
