@extends('layouts.admin.app')
@section('title')
    <title>Product Form</title>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">{{isset($Products) ? 'Update Form' : 'Create Form'}}</h4>            
            <a href="{{ URL::previous() }}" style="float: right;"><button class="btn btn-default waves-effect waves-light"><i class="fa fa-arrow-circle-left"></i> Back</button></a>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card-box">
            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ 
                            isset($Products) ? 
                            @route('product.update',['id'=>$Products->id]) : 
                            @route('product.store')
                        }}">
                            {{@csrf_field()}}
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Category</label>
                                <div class="col-10">
                                    @if (isset($Products->categoryId))
                                       @foreach($Categorys as $category)
                                            @if($Products->categoryId==$category->id) 
                                                <span class='form-control btn disabled text-left'>{{$category->name}}</span>
                                            @endif
                                       @endforeach
                                    @else
                                        <select class="form-control" name="categoryId" parsley-trigger="change" required>
                                            <option disabled selected>Choose one</option>
                                            @foreach($Categorys as $category)
                                            {{-- {{$Categorys}} --}}
                                            <option value="{{$category->id}}">
                                                {{$category->name}} 
                                            </option>
                                            @endforeach
                                        </select>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Color</label>
                                <div class="col-10">
                                    <select class="form-control" name="colorId" parsley-trigger="change" required>
                                        <option disabled selected>Choose one</option>
                                        @foreach($Colors as $color)
                                        <option value="{{$color->id}}" {{ isset($Products->colorId) ? ($Products->colorId==$color->id)? "selected" : "" : "" }}>
                                            {{$color->colorName}}
                                        </option>
                                        @endforeach
                                    </select>   
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Image</label>
                                <div class="col-10">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                            @if(isset($Products) && $Products->thumbnail!="")
                                                <img src="{{URL('resources/assets/products/'.$Products->id.'/'.$Products->thumbnail)}}">
                                            @else
                                                <img src="{{URL('resources/assets/images/default.png')}}" alt="thumbnail" />
                                            @endif
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                            <button type="button" class="btn btn-secondary btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select thumbnail</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="btn-secondary" name="thumbnail" value="{{ isset($Products->thumbnail) ? $Products->thumbnail : '' }}" />
                                            </button>   
                                        </div>
                                    </div>
                                    @if ($errors->has('thumbnail'))
                                    <span class="help-block label label-warning">
                                        <strong>{{ $errors->first('thumbnail') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            @if(isset($Productimages))  
                            @if(count($Productimages)>0)
                            @foreach($Productimages as $key => $image)
                            <div class="form-group fieldGroup row">
                                <input type="hidden" class="imageArray" name="imageOldArray[]" value="{{$image->image}}" id="imageOldArray">
                                <label class="col-2 col-form-label">Another Image</label>
                                <div class="clonnable col-10">
                                    <div class="input-group">
                                        <input type="hidden" class="imageArray" name="imageArray[]" value="{{$image->image}}" id="imageArray">
                                        <div class="fileupload fileupload-exists col-md-5" data-provides="fileupload">
                                            <button type="button" class="btn btn-secondary btn-file">
                                                {{-- <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> --}}
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" name="imageArray[]" class="imageEx btn-secondary" value="{{$image->image}}" />
                                            </button>
                                            <span class="fileupload-preview" style="margin-left:5px;">{{$image->image}}</span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                            @if ($errors->has('imageArray'))
                                            <span class="help-block label label-warning">
                                                <strong>{{ $errors->first('imageArray') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="sortNo[]" value="{{$image->sortNo}}" class="form-control clearText" placeholder="Enter sort number" onkeypress="return onlyNum(event)" style="width: 100%;"/>
                                            @if ($errors->has('sortNo'))
                                            <span class="help-block label label-warning">
                                                <strong>{{ $errors->first('sortNo') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-4"> 
                                            <a href="javascript:void(0)" class="btn btn-success btn-md addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-md remove"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="form-group fieldGroup row">
                                <label class="col-2 col-form-label">Another Image</label>
                                <div class="clonnable col-10">
                                    <div class="input-group">
                                        <div class="fileupload fileupload-new col-md-5" data-provides="fileupload">
                                            <button type="button" class="btn btn-secondary btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" id="image" name="imageArray[]" class="btn-secondary clearText"  />
                                            </button>
                                            <span class="fileupload-preview" style="margin-left:5px;"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                            @if ($errors->has('imageArray'))
                                            <span class="help-block label label-warning">
                                                <strong>{{ $errors->first('imageArray') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="sortNo[]" class="form-control clearText" placeholder="Enter sort number" onkeypress="return onlyNum(event)" style="width: 100%;" />
                                            @if ($errors->has('sortNo'))
                                            <span class="help-block label label-warning">
                                                <strong>{{ $errors->first('sortNo') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-4"> 
                                            <a href="javascript:void(0)" class="btn btn-success btn-md addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-md remove"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endif
                            @if(!isset($Productimages))
                            <div class="form-group fieldGroup row">
                                <label class="col-2 col-form-label">Another Image</label>
                                <div class="clonnable col-10">
                                    <div class="input-group">
                                        <div class="fileupload fileupload-new col-md-5" data-provides="fileupload">
                                            <button type="button" class="btn btn-secondary btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" id="image" name="imageArray[]" class="btn-secondary clearText"  />
                                            </button>
                                            <span class="fileupload-preview" style="margin-left:5px;"></span>
                                            <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                            @if ($errors->has('imageArray'))
                                            <span class="help-block label label-warning">
                                                <strong>{{ $errors->first('imageArray') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <input type="text" name="sortNo[]" class="form-control clearText" placeholder="Enter sort number" onkeypress="return onlyNum(event)" style="width: 100%;" />
                                            @if ($errors->has('sortNo'))
                                            <span class="help-block label label-warning">
                                                <strong>{{ $errors->first('sortNo') }}</strong>
                                            </span>
                                            @endif
                                        </div>
                                        <div class="col-md-4"> 
                                            <a href="javascript:void(0)" class="btn btn-success btn-md addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-md remove"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Remove</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Name</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" parsley-trigger="change" required name="name" placeholder="Product name" value="{{ isset($Products->name) ? $Products->name : '' }}" onkeypress="return blockChar(event)">
                                    @if ($errors->has('name'))
                                    <span class="help-block label label-warning">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">UPC</label>
                                <div class="col-10">
                                    @if (isset($Products->upc))
                                        <span class="form-control btn disabled text-left">{{$Products->upc}}</span>   
                                    @else
                                    <input type="text" parsley-trigger="change" required class="form-control " name="upc" placeholder="Product upc" onkeypress="return onlyNum(event)">
                                    @endif
                                    @if ($errors->has('upc'))
                                    <span class="help-block label label-warning">
                                        <strong>{{ $errors->first('upc') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Ram</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" parsley-trigger="change" required name="ram" placeholder="Product ram" value="{{ isset($Products->ram) ? $Products->ram : '' }}" onkeypress="return onlyNum(event)">
                                    @if ($errors->has('ram'))
                                    <span class="help-block label label-warning">
                                        <strong>{{ $errors->first('ram') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Battery</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" parsley-trigger="change" required name="battery" placeholder="Product battery" value="{{ isset($Products->battery) ? $Products->battery : '' }}" onkeypress="return onlyNum(event)">
                                    @if ($errors->has('battery'))
                                    <span class="help-block label label-warning">
                                        <strong>{{ $errors->first('battery') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Processor</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" parsley-trigger="change" required name="processor" placeholder="Product processor" value="{{ isset($Products->processor) ? $Products->processor : '' }}" onkeypress="return blockChar(event)">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Price</label>
                                <div class="col-10">
                                    <input type="text" class="form-control autonumber" parsley-trigger="change" required name="price" placeholder="Product price" value="{{ isset($Products->price) ? $Products->price : '' }}">
                                    @if ($errors->has('price'))
                                    <span class="help-block label label-warning">
                                        <strong>{{ $errors->first('price') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Stock</label>
                                <div class="col-10">
                                    <input type="text" class="form-control"  parsley-trigger="change" required name="stock" placeholder="Product stock" value="{{ isset($Products->stock) ? $Products->stock : '' }}" onkeypress="return onlyNum(event)">
                                    @if ($errors->has('stock'))
                                    <span class="help-block label label-warning">
                                        <strong>{{ $errors->first('stock') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-md btn-primary waves-effect waves-light">Submit</button>
                                <a href="{{ route('product.show') }}"><button type="button" class="btn btn-md btn-default waves-effect waves-light">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('script')
<script src="{{URL('resources/assets/plugins/bootstrap-inputmask/bootstrap-inputmask.min.js')}}" type="text/javascript"></script>

<script src="{{URL('resources/assets/plugins/autoNumeric/autoNumeric.js')}}" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){

    // var a = $('#imageArray').val();
    var values = $("input[name='imageArray[]']").map(function(){return $(this).val();}).get();
    console.log(values);
    jQuery(function($) {
        $('.autonumber').autoNumeric('init');
    });
    var maxGroup = 10;
    
    $("body").on("click",".addMore",function(){
        if($('body').find('.fieldGroup').length < maxGroup){
            var divParent=$(this).parent();
            var parent = divParent.parent().clone();
            parent.find('.fileupload').toggleClass('fileupload-exists fileupload-new');
            parent.find('.fileupload-preview').html('');
            parent.find('.clearText').val('');
            $('.clonnable:last').append(parent);
            removeSeen();
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });

    removeSeen();
    function removeSeen() {
        if ($('.input-group').length==1)
        {
            $('.remove').hide();
        }else{
            $('.remove').show();
        }
    };
    
    $("body").on("click",".remove",function(){ 
        $(this).parents(".input-group").remove();
        removeSeen();
    });
});
</script>
@endsection