<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Color;
use App\Product;
use Validator;
use Session;
use File;
class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.color.admin.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.color.admin.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {                
        $v = Validator::make($request->all(), 
            [
                "colorName"=>'required',
                "colorHash"=>'required',
            ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }

        $save=Color::create($request->all());

        Session::flash('success','You have added new color.');
        return redirect(Route('color.show'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $columns = array( 
            0 =>'id', 
            1=> 'colorName',
            2=> 'created_at',
            3=> 'id',
            4=> 'id',
        );

        $totalData = Color::where('status',1)
        ->count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            $Colors = Color::where('status','Y')
            ->orWhere('status','N')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

        }
        else {
            $search = $request->input('search.value'); 

            $Colors =  Color::where('id','LIKE',"%{$search}%")
            ->orWhere('colorName', 'LIKE',"%{$search}%")
            ->orWhere('status','Y')
            ->orWhere('status','N')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

            $totalFiltered = Color::where('id','LIKE',"%{$search}%")
            ->orWhere('colorName', 'LIKE',"%{$search}%")
            ->orWhere('status','Y')
            ->orWhere('status','N')
            ->count();
        }

        $data = array();
        if(!empty($Colors))
        {
            foreach ($Colors as $Color)
            {
                $recordId = $Color->id;
                $editUrl=route('color.edit',['id'=>$Color->id]);
                $nestedData['id'] = '<span class="text-center">'.$Color->id.'</span>';
                $nestedData['colorName'] = $Color->colorName.' &nbsp; <span style="background-color:'.$Color->colorHash.';padding-right: 35%;"></span>';
                $nestedData['created_at'] = date('j M Y ',strtotime($Color->created_at));
                if($Color->status=='Y'){
                    $nestedData['active'] ="<input type='checkbox' checked name='activeInactive' id='activeInactive'  data-plugin='switchery' data-size='small' onchange='activeInactive($recordId)'  data-color='#039cfd'/>";
                }else if ($Color->status=='N') {
                    $nestedData['active'] ="<input type='checkbox' name='activeInactive' id='activeInactive'  data-plugin='switchery' data-size='small' onchange='activeInactive($recordId)'  data-color='#039cfd'/>";
                }
                $nestedData['action'] = "<div class='button-list'><a class='btn btn-action text-primary' href='{$editUrl}'><i class='fa fa-pencil'></i></a><a class='btn btn-action text-danger' style='background-color: transparent;' onclick='SwalDelete($recordId)'><i class='fa fa-trash'></i></a></div>";
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $color=Color::find($id);
        return view('layouts.color.admin.form')->with('Colors',$color);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $v = Validator::make($request->all(), 
            [
                "colorHash"=>'required',
                "colorName"=>'required',
            ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }

        $color=Color::find($id);
        $color->colorName=$request->colorName;
        $color->colorHash=$request->colorHash;
        $color->save();
        Session::flash('success','You have updated color.');
        return redirect(Route('color.show'));
    }

    public function activeInactive(Request $request)
    {
        $statusChange=Color::find($request->recordId);
        $status=$statusChange->status;
        if ($status=='Y') {
            $checkUse = Product::where('colorId',$request->recordId)->exists();
            if ($checkUse==false) {
                $statusChange->status='N';
                $message='This category is inactive now';
                $icon='warning';
            }else{
                $message='This category can not be inactived.';
                $icon='warning';
            }
        }elseif ($status=='N') {
            $statusChange->status='Y';
            $message='This color is active now ';
            $icon='success';
        }
        $statusChange->save();
        die(json_encode(array("success"=>"true","message"=>$message,"icon"=>$icon)));

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->deleteRecord;
        $delete=Color::find($id);
        $delete->status='T';
        $delete->save();   
        die(json_encode(array("success"=>"true","message"=>"Deleted Successfully")));
    }
}
