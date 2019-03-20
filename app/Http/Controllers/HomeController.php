<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Order;
use App\Product;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth','admin']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $users=User::where('status','Y')->count();
        $orders=Order::where('status','Y')->count();
        $totalAmount=Order::where('status','Y')->sum('totalAmount');
        $products=Product::where('status','Y')->count();
        // dd($totalAmount);
        return view('layouts.admin.index')->with(compact('users','orders','totalAmount','products'));
    }
}
