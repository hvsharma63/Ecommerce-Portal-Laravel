<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    protected $table='billings';
    protected $fillable = [
        'userId', 'address','city','state','mobileNo','firstName','lastName','email','zipCode'
    ];
}
