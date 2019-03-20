<?php
namespace App;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Product;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $table='cart';
    protected $fillable = [
        'userId', 'productId','productQty'
    ];
}

?>