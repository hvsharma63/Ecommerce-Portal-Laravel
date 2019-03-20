<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Cart;
use Session;
class ViewCartController extends Controller
{
    public function index()
    {
        return view('layouts.frontend.viewCartList');
    }
    public function getProduct(Request $request)
    {
        $user = $request->user();
        if ($user=='') {
        	return view('layouts.frontend.login');
        }else{
        	return redirect('/billingCheckout');
        }
    }
    public function cartToDb(Request $request)
    {
        $user=$request->user();
        if($user->userType==0)
        {
            $sessionProduct = Session::get('product');
            if(isset($sessionProduct))
            {
                for ($i=0; $i < count($sessionProduct['id']); $i++) { 
                    $cartPIds=Cart::where('userId',$user->id)->where('productId',$sessionProduct['id'][$i])->get()->toArray();
                    if ($cartPIds!=NULL) {
                        Cart::where('productId',$cartPIds[0]['productId'])
                        ->where('userId',$cartPIds[0]['userId'])
                        ->update(['productQty'=>$sessionProduct['qty'][$i]]);                   
                    }else{
                        $CartSave = new Cart;
                        $CartSave->userId = $user->id;
                        $CartSave->productId = $sessionProduct['id'][$i];
                        $CartSave->productQty = $sessionProduct['qty'][$i];
                        $CartSave->save();
                    }
                }
                Session::forget('product');
            }
            // return redirect()->back();
            return redirect('/billingCheckout');
        }
        else
        {
            return redirect(route('home'));
        }
    }
}
