<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table='products';
    protected $fillable = [
        'thumbnail', 'name','categoryId','ram','battery','processor','price','stock','colorId','upc'
    ];
    // public function getNameAttribute($value='')
    // {
    // 	return strtoupper($value);
    // }
}
