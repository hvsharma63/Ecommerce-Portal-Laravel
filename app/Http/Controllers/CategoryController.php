<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Product;
use Validator;
use Session;
use File;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('layouts.category.admin.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layouts.category.admin.form');
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
                "image"=>'required|mimes:jpg,jpeg,png',
                "name"=>'required',
            ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }

        $save=Category::create($request->all());
        $insertId=$save->id;

        $file = $request->image;
        $name = 'profile.'.$file->getClientOriginalExtension();
        File::makeDirectory(base_path('resources\assets\categories\\'.$insertId.'\\'), 0775);
        $destinationPath = base_path('resources\assets\categories\\'.$insertId.'\\');
        $file->move($destinationPath, $name);
        $update=Category::find($insertId);
        $update->image=$name;
        $update->save();


        Session::flash('success','You have added new category.');
        return redirect(Route('category.show'));
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
            1 =>'image',
            2=> 'name',
            3=> 'created_at',
            4=> 'id',
            5=> 'id',
        );

        $totalData = Category::where('status',1)
        ->count();

        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            $Categorys = Category::where('status','Y')
            ->orWhere('status','N')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();
        }
        else {
            $search = $request->input('search.value'); 

            $Categorys =  Category::where('id','LIKE',"%{$search}%")
            ->orWhere('name', 'LIKE',"%{$search}%")
            ->orWhere('status','Y')
            ->orWhere('status','N')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

            $totalFiltered = Category::where('id','LIKE',"%{$search}%")
            ->orWhere('name', 'LIKE',"%{$search}%")
            ->orWhere('status','Y')
            ->orWhere('status','N')
            ->count();
        }

        $data = array();
        if(!empty($Categorys))
        {
            foreach ($Categorys as $Category)
            {
                $recordId = $Category->id;
                $editUrl=route('category.edit',['id'=>$Category->id]);
                $imageUrl=URL('resources/assets/categories/'.$Category->id.'/'.$Category->image);
                $nestedData['id'] = $Category->id;
                $nestedData['image'] = "<img src='{$imageUrl}' style='width:100px'>";
                $nestedData['name'] = $Category->name;
                $nestedData['created_at'] = date('j M Y',strtotime($Category->created_at));
                if($Category->status=='Y'){
                    $nestedData['active'] ="<input type='checkbox' checked name='activeInactive' id='activeInactive'  data-plugin='switchery' data-size='small' onchange='activeInactive($recordId)'  data-color='#039cfd'/>";
                }else if ($Category->status=='N') {
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
        $category=Category::find($id);
        return view('layouts.category.admin.form')->with('Categorys',$category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $id=$request->id;
        $v = Validator::make($request->all(), 
            [
                "image"=>'mimes:jpg,jpeg,png',
                "name"=>'required',
            ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }

        $category=Category::find($id);
        $category->name=$request->name;
        $file=$request->image;
        $file_path=base_path('resources\assets\categories\\'.$id.'\\'.$category->image);

        if($file!="")
        {
            if(File::exists($file_path)) {
                File::delete($file_path);
            }
            $name = 'profile.'.$file->getClientOriginalExtension();
            $destinationPath = base_path('resources\assets\categories\\'.$id.'\\');
            $file->move($destinationPath, $name);
            $category->image=$name;
        }
        $category->save();
        Session::flash('success','You have updated category.');
        return redirect(Route('category.show'));
    }

    public function activeInactive(Request $request)
    {
        $statusChange=Category::find($request->recordId);
        
            $status=$statusChange->status;
            if ($status=='Y') {
                $checkUse = Product::where('categoryId',$request->recordId)->exists();
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
                $message='This category is active now ';
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
        $delete=Category::find($id);
        $delete->status='T';
        $delete->save();   
        die(json_encode(array("success"=>"true","message"=>"Deleted Successfully")));
    }
}
