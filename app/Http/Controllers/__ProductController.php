<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Category;
use App\Color;
use App\Productimages;
use Validator;
use Session;
use File;
use DB;
class ProductController extends Controller
{
    public function index()
    {
        return view('layouts.product.admin.show');
    }
    public function create()
    {
        $Categorys=Category::where('status','Y')->get();
        $Colors=Color::where('status','Y')->get();
        return view('layouts.product.admin.form')->with(compact('Categorys','Colors'));
    }
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), 
            [
                "thumbnail"=>'required|mimes:jpg,jpeg,png',
                "name"=>'required',
                "ram"=>'required',
                "battery"=>'required',
                "processor"=>'required',
                "price"=>'required',
                "stock"=>'required',
            ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }

        $req=$request->all();
        $req['price']=str_replace(",","", $request->price);
        $save=Product::create($req);
        $insertId=$save->id;

        $file = $request->thumbnail;
        $name = 'thumbnail.'.$file->getClientOriginalExtension();
        File::makeDirectory(base_path('resources\assets\products\\'.$insertId.'\\'), 0775);
        $destinationPath = base_path('resources\assets\products\\'.$insertId.'\\');
        $file->move($destinationPath, $name);
        $update=Product::find($insertId);
        $update->thumbnail=$name;
        $update->save();
        if(in_array(NULL,$request->sortNo) )
        {
            if (empty($request->imageArray)) {
                $v = Validator::make($request->imageArray, 
                    [
                        "imageArray"=>'required',
                    ]);
                if ($v->fails())
                {
                    return redirect()->back()->withErrors($v->errors());
                }
            }else{
                
                $v = Validator::make($request->sortNo, 
                    [
                        "sortNo"=>'required',
                    ]);
                if ($v->fails())
                {
                    return redirect()->back()->withErrors($v->errors());
                }
            }
        }else{
            if (empty($request->imageArray)) {
                $v = Validator::make($request->imageArray, 
                    [
                        "imageArray"=>'required',
                    ]);
                if ($v->fails())
                {
                    return redirect()->back()->withErrors($v->errors());
                }
            }
        }

        if(!in_array(NULL, $request->sortNo) && !empty($request->imageArray))
        {
            $imageArray=array_combine($request->sortNo, $request->imageArray);
            if(!empty($imageArray))
            {
                $destinationPath = base_path('resources\assets\products\\'.$insertId.'\\'); 
                $upc=$request->upc;
                foreach($imageArray as $key=>$value)
                {
                    $name = $upc.'_'.$key.'.'.$value->getClientOriginalExtension();
                    $value->move($destinationPath, $name); 
                    Productimages::create([
                        'productId' => $insertId,
                        'image' => $name,
                        'sortNo'=>$key,
                    ]);
                }
            }
        }
        Session::flash('success','You have added new product.');
        return redirect(Route('product.show'));
    }

    public function show(Request $request)
    {
        $columns = array( 
            0 =>'id', 
            1 =>'id', 
            2 =>'categoryName',
            3=> 'colorName',
            4=> 'name',
            5=> 'ram',
            6=> 'battery',
            7=> 'processor',
            8=> 'price',
            9=> 'stock',
            10=>'created_at',
            11=>'id',
            12=>'id',
        );

        $totalData = Product::where('products.status','Y')
        ->join('categories', 'products.categoryId', '=', 'categories.id')
        ->join('colors', 'products.colorId', '=', 'colors.id')
        ->count();


        $totalFiltered = $totalData; 

        $limit = $request->input('length');
        $start = $request->input('start');
        $order = $columns[$request->input('order.0.column')];
        $dir = $request->input('order.0.dir');

        if(empty($request->input('search.value')))
        {            
            $Products = Product::whereIn('products.status',['Y','N'])
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->join('colors', 'products.colorId', '=', 'colors.id')
            ->select('products.*', 'categories.name as categoryName','colors.colorName')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

        }
        else {
            $search = $request->input('search.value'); 

            $Products =  Product::where('products.id','LIKE',"'%{$search}%'")
            ->orWhere('products.name', 'LIKE',"'%{$search}%'")
            ->orWhere('products.ram', 'LIKE',"'%{$search}%'")
            ->orWhere('products.battery', 'LIKE',"'%{$search}%'")
            ->orWhere('products.processor', 'LIKE',"'%{$search}%'")
            ->orWhere('products.price', 'LIKE',"'%{$search}%'")
            ->orWhere('products.stock', 'LIKE',"'%{$search}%'")
            ->orWhere('categories.name', 'LIKE',"'%{$search}%'")
            ->orWhere('colors.colorName', 'LIKE',"'%{$search}%'")
            ->orWhere('products.status','Y')
            ->orWhere('products.status','N')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->join('colors', 'products.colorId', '=', 'colors.id')
            ->select('products.*', 'categories.name as categoryName','colors.colorName')
            ->offset($start)
            ->limit($limit)
            ->orderBy($order,$dir)
            ->get();

            $totalFiltered = Product::where('products.id','LIKE',"%{$search}%")
            ->orWhere('products.name', 'LIKE',"'%{$search}%'")
            ->orWhere('products.ram', 'LIKE',"'%{$search}%'")
            ->orWhere('products.battery', 'LIKE',"'%{$search}%'")
            ->orWhere('products.processor', 'LIKE',"'%{$search}%'")
            ->orWhere('products.price', 'LIKE',"'%{$search}%'")
            ->orWhere('products.stock', 'LIKE',"'%{$search}%'")
            ->orWhere('categories.name', 'LIKE',"'%{$search}%'")
            ->orWhere('colors.colorName', 'LIKE',"'%{$search}%'")
            ->orWhere('products.status','Y')
            ->orWhere('products.status','N')
            ->join('categories', 'products.categoryId', '=', 'categories.id')
            ->join('colors', 'products.colorId', '=', 'colors.id')
            ->count();
        }

        $data = array();
        $image="";
        if(!empty($Products))
        {
            foreach ($Products as $Product)
            {
                $recordId = $Product->id;
                $deleteImg=URL("resources/assets/images/icons/full_trash.svg");
                $editImg=URL("resources/assets/images/icons/edit_image.svg");
                $editUrl=route('product.edit',['id'=>$Product->id]);

                $ProductImages=Productimages::where('productId',$recordId)->get();
                foreach ($ProductImages as $prImage) {
                    $imagename=$prImage->image;
                    $path=URL('resources/assets/products/'.$Product->id.'/'.$imagename);
                    $image.="<a href='$path' target='_blank'><img src='$path' style='width:100px;border:2px solid #f2f2f2;padding:5px;margin-right:15px'/></a>";
                }
                $imageUrl=URL('resources/assets/products/'.$Product->id.'/'.$Product->thumbnail);
                $nestedData['id'] = $Product->id;
                $nestedData['image'] = "<img src='{$imageUrl}' width=200>";
                $nestedData['name'] = $Product->name;
                $nestedData['ram'] = $Product->ram;
                $nestedData['battery'] = $Product->battery;
                $nestedData['processor'] = $Product->processor;
                $nestedData['price'] = $Product->price;
                $nestedData['stock'] = $Product->stock;
                $nestedData['categoryName'] = $Product->categoryName;
                $nestedData['colorName'] = $Product->colorName;
                // $nestedData['multipleImages'] = $image;
                $nestedData['created_at'] = date('j M Y ',strtotime($Product->created_at));

                if($Product->status=='Y'){
                    $nestedData['active'] ="<input type='checkbox' checked name='activeInactive' id='activeInactive'  data-plugin='switchery' data-size='small' onchange='activeInactive($recordId)'  data-color='#039cfd'/>";
                }else if ($Product->status=='N') {
                    $nestedData['active'] ="<input type='checkbox' name='activeInactive' id='activeInactive'  data-plugin='switchery' data-size='small' onchange='activeInactive($recordId)'  data-color='#039cfd'/>";
                }
                $nestedData['action'] = "<a href='{$editUrl}'><img class='icon-colored' src='$editImg' title='Edit' style='margin: 0 auto;'></a><button class='btn btn-xs' style='background-color: transparent;' onclick='SwalDelete($recordId)'><img class='icon-colored' src='$deleteImg' title='delete' style='margin: 0 auto;'></button>";
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

    public function edit($id)
    {
        $Products=Product::find($id);
        $Categorys=Category::where('status','Y')
        ->get();
        $Colors=Color::where('status','Y')
        ->get();
        $Productimages = Productimages::where('productId',$id)
        ->get();
        return view('layouts.product.admin.form',compact('Products','Categorys','Colors','Productimages'));
    }

    public function update(Request $request)
    {
        $id=$request->id;
        $v = Validator::make($request->all(), 
            [
                "thumbnail"=>'mimes:jpg,jpeg,png',
                "name"=>'required',
                "ram"=>'required',
                "battery"=>'required',
                "processor"=>'required',
                "price"=>'required',
                "stock"=>'required',
            ]);
        if ($v->fails())
        {
            return redirect()->back()->withErrors($v->errors());
        }

        $product=Product::find($id);
        $file_path=base_path('resources\assets\products\\'.$id.'\\'.$product->image);

        if(isset($request->thumbnail))
        {
            if(File::exists($file_path)) {
                File::delete($file_path);
            }
            $file=$request->thumbnail;
            $name = 'thumbnail.'.$file->getClientOriginalExtension();
            $destinationPath = base_path('resources\assets\products\\'.$id.'\\');
            $file->move($destinationPath, $name);
            $reqData=$request->all();
            $reqData['thumbnail']=$name;
            $product->fill($reqData)->save();
        }else{
            $product->fill($request->all())->save();
        }

        $imgDiff=array_diff($request->imageOldArray, $request->imageArray);
        if(!empty($imgDiff))
        {
            $file_path = base_path('resources\assets\products\\'.$id.'\\'); 
            foreach ($imgDiff as $value) {
                File::delete($filePath.$value);
            }
        }

        if(isset($request->sortNo) && isset($request->imageArray))
        {
            $deleteImg= Productimages::where(['productId'=>$id])->delete();
            $imageArray=array_combine($request->sortNo, $request->imageArray);
            if(!empty($imageArray))
            {
                $upc=$request->upc;
                foreach($imageArray as $key=>$value)
                {
                    $destinationPath = base_path('resources\assets\products\\'.$id.'\\'); 
                    if(!is_object($value)){
                    // $ext = substr($value, strpos($value, ".") + 1);
                        $ext = pathinfo($value,PATHINFO_EXTENSION);
                        $newName = strstr($value, '_', true);
                        $name=$newName.'_'.$key.'.'.$ext;
                        $filePath = base_path('resources\assets\products\\'.$id.'\\'.$value); 
                        $destinationPath = base_path('resources\assets\products\\'.$id.'\\'.$name); 
                        rename($filePath,$destinationPath);
                        if ($filePath!=$destinationPath) {
                            File::delete($filePath);
                        }
                    }else{
                        $name = $upc.'_'.$key.'.'.$value->getClientOriginalExtension();
                        $value->move($destinationPath,$name);
                    }
                    Productimages::create([
                        'productId' => $id,
                        'image' => $name,
                        'sortNo'=>$key,
                    ]); 
                }
            }
        }
        Session::flash('success','You have updated product.');
        return redirect(Route('product.show'));
    }

    public function activeInactive(Request $request)
    {
        $statusChange=Product::find($request->recordId);
        $status=$statusChange->status;
        if ($status=='Y') {
            $statusChange->status='N';
            $message='This Product is inactive now';
            $icon='warning';
        }elseif ($status=='N') {
            $statusChange->status='Y';
            $message='This Product is active now ';
            $icon='success';
        }
        $statusChange->save();
        die(json_encode(array("success"=>"true","message"=>$message,"icon"=>$icon)));
    }
    public function destroy(Request $request)
    {
        $id=$request->deleteRecord;
        $delete=Product::find($id);
        $delete->status='T';
        $delete->save();   
        die(json_encode(array("success"=>"true","message"=>"Deleted Successfully")));
    }

    public function productList()
    {
        $categories=Category::whereNotIn('status',['N','T'])->get();

        $colors = DB::select( DB::raw("SELECT c.id, c.colorName,c.colorHash, (SELECT count(*)  FROM products p WHERE p.colorId = c.id) AS colorCount  FROM colors c Where status not in ('N','T')") );
        $products = Product::paginate(2);
        return view('layouts.product.frontend.productList')->with(compact('categories','colors','products'));
    }
    public function getAllData()
    {
        $products = Product::whereNotIn('status',['N','T'])
        ->get();   
        return view('layouts.frontend.productAjax')->with('products',$products);
    }
    public function getSortData(Request $request)
    {
        if($request->value=="position")
            $value="id";
        else
            $value=$request->value;
        $products = Product::orderBy('$value')->get();  
        return view('layouts.frontend.productAjax')->with('products',$products);
    }
    public function getPricingData(Request $request)
    {
        // dd($request->all());
        if($request->value=="position")
            $value="id";
        else
            $value=$request->value;
        $products = Product::orderBy($value)->get();   
        return view('layouts.frontend.productAjax')->with('products',$products);
    }
    public function getFilterData(Request $request)
    {
        
        if(!empty($request->getColor))
        {
            if (!empty($request->getCategory)) {
                $products = Product::whereNotIn('status',['N','T'])
                ->whereIn('categoryId', $request->getCategory)
                ->whereIn('colorId', $request->getColor)
                ->get();
            }else{
                $products = Product::whereNotIn('status',['N','T'])
                ->whereIn('colorId', $request->getColor)
                ->get();   
            }
        }elseif (!empty($request->getCategory)) {            
            $products = Product::whereNotIn('status',['N','T'])
            ->whereIn('categoryId', $request->getCategory)
            ->get();
        }else{
            $products = Product::whereNotIn('status',['N','T'])
            ->get();
        }
        return view('layouts.frontend.productAjax')->with('products',$products);
    }
    public function productDetail($id)
    {
        $products = Product::
        join('categories', 'products.categoryId', '=', 'categories.id')
        ->join('colors', 'products.colorId', '=', 'colors.id')
        ->select('products.*', 'categories.name as categoryName','colors.colorName')
        ->where('products.id',$id)
        ->whereNotIn('products.status',['N','T'])
        ->get();

        $productImages = Productimages::where('productId',$id)->orderBy('sortNo')->get();
        return view('layouts.product.frontend.productDetail')->with(compact('products','productImages'));
    }
}