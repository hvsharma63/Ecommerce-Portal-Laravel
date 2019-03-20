<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Product;
use App\Cart;
use Auth;

class SessionController extends Controller
{
    public function getProducts(Request $request)
    {
        if(Auth::user()!=NULL)
        {
            $count=Cart::where('userId',Auth::user()->id)
            ->where('productId',$request->productId)->count();
            if($count>0)
            {
                Cart::where('userId',Auth::user()->id)
                ->where('productId',$request->productId)
                ->update(['productQty'=>$request->qty]);
            }else{
                $CartSave = new Cart;
                $CartSave->userId = Auth::user()->id;
                $CartSave->productId = $request->productId;
                $CartSave->productQty = $request->qty;
                $CartSave->save();
            }
        }
        else{
            $product=Session::get('product');
            if($product!="")
            {
                if(!in_array($request->productId, $product['id']))
                {
                    $request->session()->push('product.id',$request->productId);
                    $request->session()->push('product.qty',$request->qty);
                    $request->session()->save();
                }else{
                    $key = array_search($request->productId, $product['id']);
                    if($product['qty'][$key]!=$request->qty)
                    {
                        $request->session()->put('product.qty.'.$key,$request->qty);
                    }
                }
            }
            else{
                $request->session()->push('product.id',$request->productId);
                $request->session()->push('product.qty',$request->qty);
                $request->session()->save();
            }
        }
        return view('layouts.frontend.viewCart');
    }
    public function get(Request $request)
    {
    	dd($request->session());
    }
    public function deleteProduct(Request $request)
    {
        $remove = $request->productId;
        if(Auth::user()!=NULL)
        {
            Cart::where('productId',$remove)->delete();
        }
        else{
            if (Session::has('product'))
            {
                foreach (Session::get('product.id') as $key => $value) 
                {
                    if ($value == $remove)
                    {
                        $request->session()->forget('product.id.'.$key);
                        $request->session()->forget('product.qty.'.$key);
                    }
                }
            }
        }

        return view('layouts.frontend.viewCart');
    }
}
