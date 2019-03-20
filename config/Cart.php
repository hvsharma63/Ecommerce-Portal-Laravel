<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Product;
use App\Cart;
if(!function_exists('cartList')) {
	function cartList() {
		if(Auth::user()!=NULL)
		{
			$products=Cart::where('userId',Auth::user()->id)->get()->toArray();
			if (isset($products)) {
				$data=array();
				$productTotal=0;
				$i=0;
				foreach ($products as $product) {
					$productData = Product::where('id',$product['productId'])->get()->toArray();
					$productSubTotal=$productData[0]['price']*$product['productQty'];
					$data[]=array(
						'productId'=>$productData[0]['id'],
						'productThumb'=>$productData[0]['thumbnail'],
						'productName'=>$productData[0]['name'],
						'productPrice'=>$productData[0]['price'],
						'productQty'=>$product['productQty'],
						'productSubTotal'=>$productSubTotal,
						'productTotal'=>$productTotal+=$productSubTotal,
					);
					$i++;
				}
			}
		}else{
			$products=Session::get('product');
			// print_r($products);
			// die();
			if(isset($products))
			{
				$productTotal=0;
				$data=array();
				foreach ($products['id'] as $key => $product) {
					$productData = Product::find($product);
					$productSubTotal=$productData->price*$products['qty'][$key];
					$data[]=array(
						'productId'=>$productData->id,
						'productThumb'=>$productData->thumbnail,
						'productName'=>$productData->name,
						'productPrice'=>$productData->price,
						'productQty'=>$products['qty'][$key],
						'productSubTotal'=>$productSubTotal,
						'productTotal'=>$productTotal+=$productSubTotal,
					);
				}
			}else{
				$data="";
			}
		}
		return $data;
	}
}
?>