<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table='shipping';
    protected $fillable = [
        'userId', 'address','city','state','mobileNo','firstName','lastName','email','billingId','zipCode'
    ];
}
