<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Productimages extends Model
{
    protected $table='productimages';
    protected $fillable = [
        'productId', 'image','sortNo'
    ];
}
