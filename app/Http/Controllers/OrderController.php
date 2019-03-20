<?php

namespace App\Http\Controllers;
use App\Billing;
use App\Shipping;
use App\Order;
use App\Cart;
use App\Orderproduct;
use Auth;
use Illuminate\Http\Request;
use Validator;
use Session;
class OrderController extends Controller
{
	public function __construct()
	{
		$this->middleware(['auth']);
	}
	public function index()
    {
        return view('layouts.order.admin.show');
    }
    
	public function billingView()
	{
		$cartData = Cart::where('userId',Auth::user()->id)->count();
		if(empty($cartData) || $cartData<0)
			return redirect('/viewCart/viewProducts');
		$billingData=Billing::where('userId',Auth::user()->id)->get();
		return view('layouts.order.frontend.billingAdd')->with('billingData',$billingData);
	}
	public function billingStore(Request $request)
	{
		if($request->billingId=='newAddress')
		{
			$v = Validator::make($request->all(), 
				[
					"firstName"=>'required',
					"lastName"=>'required',
					"email"=>'required',
					"address"=>'required',
					"city"=>'required',
					"state"=>'required',
					"zipCode"=>'required',
					"mobileNo"=>'required',
				]);
			if ($v->fails())
			{
				return redirect()->back()->withErrors($v->errors());
			}
			$requestData=$request->all();
			$requestData['userId']=Auth::user()->id;
			$billingInsert=Billing::create($requestData);
			$billingId=$billingInsert->id;
		}else{
			if(!empty($request->firstName) && !empty($request->email))
			{
				$Billing=Billing::find($request->billingId);
				$Billing->firstName=$request->firstName;
				$Billing->lastName=$request->lastName;
				$Billing->email=$request->email;
				$Billing->address=$request->address;
				$Billing->city=$request->city;
				$Billing->state=$request->state;
				$Billing->zipCode=$request->zipCode;
				$Billing->mobileNo=$request->mobileNo;
				$Billing->save();
			}
			$billingId=$request->billingId;
			Session::put('billingId',$billingId);
			Session::save();
		}
		if ($request->shippingAddress=='sameAdd') {
			$billingData=Billing::find($billingId)->toArray();
			$billingData['billingId']=$billingId;
			array_shift($billingData);
			if(Shipping::where('billingId',$billingId)->exists())
			{	
				Shipping::where('billingId',$billingId)->update($billingData);
				$shippingId=Shipping::where('billingId',$billingId)->get()->toArray();
			}else{
				$shippingInsert=Shipping::create($billingData);
				$shippingId=$shippingInsert->id;
			}
			Session::put('billingId',$billingId);
			Session::put('shippingId',$shippingId);
			Session::save();
			return redirect('/orderReview');
		}else{
			Session::put('billingId',$billingId);
			Session::save();
			return redirect('/shippingCheckout');
		}
	}
	public function billingProfileAdd(Request $request)
	{
		$v = Validator::make($request->all(), 
				[
					"firstName"=>'required',
					"lastName"=>'required',
					"email"=>'required',
					"address"=>'required',
					"city"=>'required',
					"state"=>'required',
					"zipCode"=>'required',
					"mobileNo"=>'required',
				]);
			if ($v->fails())
			{
				return redirect()->back()->withErrors($v->errors());
			}
			$requestData=$request->all();
			$requestData['userId']=Auth::user()->id;
			$billingInsert=Billing::create($requestData);
			$billingId=$billingInsert->id;
			return redirect()->back();
	}
	public function billingChangeData(Request $request)
	{
		$billingData=Billing::where('userId',Auth::user()->id)
		->where('id',$request->billingId)
		->get()
		->toArray();
		die(json_encode(array('success'=>'true','billingData'=>$billingData)));
	}
	public function shippingView()
	{
		if(!Session::has('billingId'))
		{
			return redirect('/billingCheckout');
		}
		$shippingData=Shipping::where('userId',Auth::user()->id)->get();
		$billingId=Session::get('billingId');
		return view('layouts.order.frontend.shippingAdd')->with(compact('shippingData','billingId'));
	}
	public function shippingStore(Request $request)
	{
		if($request->shippingId=='newAddress')
		{
			$v = Validator::make($request->all(), 
				[
					"firstName"=>'required',
					"lastName"=>'required',
					"email"=>'required',
					"address"=>'required',
					"city"=>'required',
					"state"=>'required',
					"zipCode"=>'required',
					"mobileNo"=>'required',
				]);
			if ($v->fails())
			{
				return redirect()->back()->withErrors($v->errors());
			}
			$requestData=$request->all();
			array_shift($requestData);
			$requestData['userId']=Auth::user()->id;
			$shippingInsert=Shipping::create($requestData);
			$shippingId=$shippingInsert->id;
			$billingId=$request->billingId;
		}else{
			if(!empty($request->firstName) && !empty($request->email))
			{
				$Shipping=Shipping::find($request->shippingId);
				$Shipping->firstName=$request->firstName;
				$Shipping->lastName=$request->lastName;
				$Shipping->email=$request->email;
				$Shipping->address=$request->address;
				$Shipping->city=$request->city;
				$Shipping->state=$request->state;
				$Shipping->zipCode=$request->zipCode;
				$Shipping->mobileNo=$request->mobileNo;
				$Shipping->save();
			}
			$billingId=$request->billingId;
			$shippingId=$request->shippingId;

		}
		Session::put('shippingId',$shippingId);
		Session::save();
		$billingId=Session::get('billingId');
		return redirect('/orderReview');
	}
	public function shippingChangeData(Request $request)
	{
		$shippingData=Shipping::where('userId',Auth::user()->id)
		->where('id',$request->shippingId)
		->get()
		->toArray();
		die(json_encode(array('success'=>'true','shippingData'=>$shippingData)));
	}
	public function orderReview()
	{
		$cartData = Cart::where('userId',Auth::user()->id)->count();
		if(!Session::has('billingId'))
		{
			if(empty($cartData) || $cartData<0)
				return redirect('/viewCart/viewProducts');
			else
				return redirect('/billingCheckout');
		}
		$billingId=Session::get('billingId');
		$shippingId=Session::get('shippingId');

		$billingData=Billing::where('id',$billingId)->get();
		$shippingData=Shipping::where('id',$shippingId)->get();
		return view('layouts.order.frontend.orderReview')->with(compact('billingData','shippingData'));
	}
	public function placeOrder(Request $request)
	{
		$cartData = Cart::where('cart.userId',Auth::user()->id)
		->join('products', 'cart.productId', '=', 'products.id')
		->select('cart.productQty','cart.productId', 'products.price as productPrice')
		->get()->toArray();
		if(!Session::has('billingId'))
		{
			if(empty($cartData))
				return redirect('/viewCart/viewProducts');
			else
				return redirect('/billingCheckout');
		}
		$requestData=$request->all();
		$requestData['userId']=Auth::user()->id;
		$billingFirstN=Billing::find($request->billingId)->firstName;
		$billingLastN=Billing::find($request->billingId)->lastName;
		$requestData['name']=$billingFirstN.' '.$billingLastN;
		$orderInsert=Order::create($requestData);
		$orderId=$orderInsert->id;
		foreach ($cartData as $cart) {
			$cart['orderId']=$orderId;
			Orderproduct::create($cart);
			
		}
		// dd($cartData);
		$totalQty = 0;
		$totalPrice = 0;
		foreach($cartData as $item) {
			$totalQty += $item['productQty'];
			$totalPrice += $item['productQty']*$item['productPrice'];
		}
		Order::where('id',$orderId)->update(['totalQty'=>$totalQty,'totalAmount'=>$totalPrice]);
		Cart::where('userId',Auth::user()->id)->delete();
		Session::forget('billingId');
		Session::forget('shippingId');
		return redirect('/thankYou');
	}
	public function thankYou()
	{
		return view('layouts.order.frontend.thankYou');
	}
	public function orderHistory()
	{
		$order=Order::where('userId',Auth::user()->id)->orderBy('created_at','desc')->get()->toArray();
		return view('layouts.order.frontend.orderHistory')->with(compact('order'));
	}
	public function orderProducts(Request $request)
	{
		$orderId=$request->orderId;
		$cartData = Orderproduct::where('orderproducts.orderId',$orderId)
		->join('products', 'orderproducts.productId', '=', 'products.id')
		->join('orders', 'orderproducts.orderId', '=', 'orders.id')
            ->select('products.name','orderproducts.productQty','orders.totalAmount','products.price as productPrice')
            ->get()->toArray();
		$htmlTable='';
		$i=1;
		foreach ($cartData as $product) {
			$htmlTable.='<tr>
			<td width="68">'.$i.'</td>
			<td width="14">'.$product['name'].'</td>
			<td width="14">'.$product['productQty'].'</td>
			<td width="14">$'.$product['productPrice'].'</td>
			<td width="14">$'.$product['productQty']*$product['productPrice'].'</td>
			</tr>';
			$i++;
		}
		$htmlTable.='<tr><td colspan=4 style="text-align: right;"><strong>Total Amount</strong></td><td><strong>$'.$product['totalAmount'].'</strong></td></tr>';
		die(json_encode(array('status'=>true,'data'=>$htmlTable)));
	}
	public function show(Request $request)
    {
    	$columns = array( 
            0 =>'id', 
            1 =>'name',
            2=> 'totalQty',
            3=> 'totalAmount',
            4=> 'created_at',
            5=> 'id',
            6=> 'id',
            7=> 'id',
        );

        $totalData = Order::where('status','Y')
        ->count();
        $totalFiltered = $totalData; 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            $Orders = Order::where('status','Y')
            ->orWhere('status','N')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
        }
        else {
            $search = $request->input('search.value'); 
            $Orders =  Order::where('id','LIKE',"%{$search}%")
            ->orWhere('name', 'LIKE',"%{$search}%")
            ->orWhere('totalAmount', 'LIKE',"%{$search}%")
            ->orWhere('totalQty', 'LIKE',"%{$search}%")
            ->orWhere('status','Y')
            ->orWhere('status','N')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
            $totalFiltered = Order::where('id','LIKE',"%{$search}%")
            ->orWhere('name', 'LIKE',"%{$search}%")
            ->orWhere('totalAmount', 'LIKE',"%{$search}%")
            ->orWhere('totalQty', 'LIKE',"%{$search}%")
            ->orWhere('status','Y')
            ->orWhere('status','N')
            ->count();
        }
        $data = array();
        if(!empty($Orders))
        {
            foreach ($Orders as $Order)
            {

                $recordId = $Order->id;
                $nestedData['id'] = $Order->id;
                $nestedData['name'] = $Order->name;
                $nestedData['totalQty'] = $Order->totalQty;
                $nestedData['totalAmount'] = $Order->totalAmount;
                $nestedData['created_at'] = date('j M Y',strtotime($Order->created_at));
                if($Order->paymentStatus==0)
                {
                	$nestedData['paymentStatus'] = 
                	'<select class="selectpicker" data-style="btn-primary btn-bordered" id="status" onchange="statusChange('.$Order->id.',this.value)">
                	<option value=0 selected>Pending</option>
                	<option value=1>Confirm</option>
                	<option value=2>Deliver</option>
                	<option value=3>Cancel</option>
                	</select>';
                }
                elseif($Order->paymentStatus==1)
                {
                	$nestedData['paymentStatus'] = 
                	'<select class="selectpicker" data-style="btn-primary btn-bordered" id="status" onchange="statusChange('.$Order->id.',this.value)">
                	<option value=0>Pending</option>
                	<option value=1 selected>Confirm</option>
                	<option value=2>Deliver</option>
                	<option value=3>Cancel</option>
                	</select>';	
                }
                elseif($Order->paymentStatus==2)
                {
                	$nestedData['paymentStatus'] = 
                	'<select class="selectpicker" data-style="btn-primary btn-bordered" id="status" onchange="statusChange('.$Order->id.',this.value)">
                	<option value=0>Pending</option>
                	<option value=1>Confirm</option>
                	<option value=2 selected>Deliver</option>
                	<option value=3>Cancel</option>
                	</select>';
                }
                elseif($Order->paymentStatus==3)
                {
                	$nestedData['paymentStatus'] = 
                	'<select class="selectpicker" data-style="btn-primary btn-bordered" id="status" onchange="statusChange('.$Order->id.',this.value)">
                	<option value=0>Pending</option>
                	<option value=1>Confirm</option>
                	<option value=2>Deliver</option>
                	<option value=3 selected>Cancel</option>
                	</select>';
                }
                // if($Order->status=='Y'){
                //     $nestedData['active'] ="<input type='checkbox' checked name='activeInactive' id='activeInactive'  data-plugin='switchery' data-size='small' onchange='activeInactive($recordId)'  data-color='#039cfd'/>";
                // }else if ($Order->status=='N') {
                //     $nestedData['active'] ="<input type='checkbox' name='activeInactive' id='activeInactive'  data-plugin='switchery' data-size='small' onchange='activeInactive($recordId)'  data-color='#039cfd'/>";
                // }
               $nestedData['action'] = "<div class='button-list'><a class='btn btn-action text-danger' style='background-color: transparent;' onclick='SwalDelete($recordId)'><i class='fa fa-trash'></i></a></div>";
                $data[] = $nestedData;
            }
        }
        $json_data = array(
            "draw"            => intval($request->input('draw')),  
            "recordsTotal"    => intval($totalData),  
            "recordsFiltered" => intval($totalFiltered), 
            "data"            => $data   
        );
        echo json_encode($json_data);
    }
    public function statusChange(Request $request)
    {
        $orderId = $request->orderId;
        $status = $request->status;
        Order::where('id',$orderId)->update(['paymentStatus'=>$status]);
        die(json_encode(array('success'=>TRUE,'message'=>'Order Status Changed')));
    }
    public function destroy(Request $request)
    {
    	$id=$request->deleteRecord;
        $delete=Order::find($id);
        $delete->status='T';
        $delete->paymentStatus=3;
        $delete->save();   
        die(json_encode(array("success"=>"true","message"=>"Deleted Successfully")));
    }
}
