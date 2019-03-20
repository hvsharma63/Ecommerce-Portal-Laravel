<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Billing;
use App\Shipping;
use Auth;
class UserController extends Controller
{
	public function index()
    {
        return view('layouts.user.admin.show');
    }
    public function show(Request $request)
    {
    	$columns = array( 
            0 =>'id', 
            1 =>'firstName',
            2=> 'email',
            3=> 'mobileNo',
            4=> 'created_at',
            6=> 'id',
        );

        $totalData = User::where('status','Y')
        ->count();
        $totalFiltered = $totalData; 
        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            $Users = User::where('status','Y')
            ->orWhere('status','N')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
        }
        else {
            $search = $request->input('search.value'); 
            $Users =  User::where('id','LIKE',"%{$search}%")
            ->orWhere('firstName', 'LIKE',"%{$search}%")
            ->orWhere('lastName', 'LIKE',"%{$search}%")
            ->orWhere('mobileNo', 'LIKE',"%{$search}%")
            ->orWhere('email', 'LIKE',"%{$search}%")
            ->orWhere('status','Y')
            ->orWhere('status','N')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
            $totalFiltered = User::where('id','LIKE',"%{$search}%")
            ->orWhere('firstName', 'LIKE',"%{$search}%")
            ->orWhere('lastName', 'LIKE',"%{$search}%")
            ->orWhere('mobileNo', 'LIKE',"%{$search}%")
            ->orWhere('email', 'LIKE',"%{$search}%")
            ->orWhere('status','Y')
            ->orWhere('status','N')
            ->count();
        }
        $data = array();
        if(!empty($Users))
        {
            foreach ($Users as $User)
            {

                $recordId = $User->id;
                $nestedData['id'] = $User->id;
                $nestedData['name'] = $User->firstName.' '.$User->lastName;
                $nestedData['email'] = $User->email;
                $nestedData['mobileNo'] = $User->mobileNo;
                $nestedData['created_at'] = date('j M Y',strtotime($User->created_at));
                // if($User->status=='Y'){
                //     $nestedData['active'] ="<input type='checkbox' checked name='activeInactive' id='activeInactive'  data-plugin='switchery' data-size='small' onchange='activeInactive($recordId)'  data-color='#039cfd'/>";
                // }else if ($User->status=='N') {
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
    public function destroy(Request $request)
    {
    	$id=$request->deleteRecord;
        $delete=User::find($id);
        $delete->status='T';
        $delete->save();   
        die(json_encode(array("success"=>"true","message"=>"Deleted Successfully")));
    }
    public function profile(Request $request)
    {
        $billingData=Billing::where('userId',Auth::user()->id)->get();
        // $shippings=Shipping::where('userId',Auth::user()->id)->get()->toArray();
        return view('layouts.frontend.profile')->with(compact('billingData'));
    }
}
