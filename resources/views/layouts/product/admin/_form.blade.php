@extends('layouts.admin.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Product Form</h4>
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
                            @route('product.update', $Products->id) : 
                            @route('product.store')
                        }}">
                            {{@csrf_field()}}
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Category</label>
                                <div class="col-10">
                                    <select class="form-control" name="categoryId" parsley-trigger="change" required>
                                        <option disabled selected>Choose one</option>
                                        @foreach($Categorys as $category)
                                        {{$Categorys}}
                                        <option value="{{$category->id}}" {{ isset($Products->categoryId) ? ($Products->categoryId==$category->id)? "selected" : "" : "" }}>
                                            {{$category->name}} 
                                        </option>
                                        @endforeach
                                    </select>
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
                            <?php $p = (array) $Productimages; 
                            $p = array_keys($p); ?>
                            @if(count($Productimages)>0)
                            @foreach($Productimages as $key => $image)
                            <div class="form-group fieldGroup row">
                                <input type="hidden" class="imageArray" name="imageArray[]" value="{{$image->image}}" id="imageArray">
                                <label class="col-2 col-form-label">Another Image</label>
                                <div class="input-group col-10">
                                    
                                    <div class="fileupload fileupload-exists col-md-4" data-provides="fileupload">
                                        <button type="button" class="btn btn-secondary btn-file">
                                            {{-- <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span> --}}
                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                            <input type="file" name="imageArray[]" class="imageEx btn-secondary" value="{{$image->image}}" />
                                        </button>
                                        <span class="fileupload-preview" style="margin-left:5px;">{{$image->image}}</span>
                                        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="sortNo[]" value="{{$image->sortNo}}" class="form-control" placeholder="Enter sort number" onkeypress="return onlyNum(event)" style="width: 100%;"/>
                                    </div>
                                    @if(count($Productimages)==1)
                                    <div class="col-md-3 "> 
                                        <a href="javascript:void(0)" class="btn btn-success btn-md addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
                                        <span class="rem"></span>
                                    </div>
                                    @else
                                    
                                    @if (end($p)==$key)
                                    <div class="col-md-3 add"> 
                                        <a href="javascript:void(0)" class="btn btn-success addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a><a href="javascript:void(0)" class="btn btn-danger btn-md remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
                                    </div>
                                    @else
                                    <div class="col-md-3 rem"> 
                                        <a href="javascript:void(0)" class="btn btn-danger btn-md remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>
                                    </div>
                                    @endif
                                    @endif
                                </div>
                            </div>
                            @endforeach
                            @else
                            <div class="form-group fieldGroup row">
                                <label class="col-2 col-form-label">Another Image</label>
                                <div class="input-group col-10">
                                    <div class="fileupload fileupload-new col-md-4" data-provides="fileupload">
                                        <button type="button" class="btn btn-secondary btn-file">
                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                            <input type="file" id="image" name="imageArray[]" class="btn-secondary"  />
                                        </button>
                                        <span class="fileupload-preview" style="margin-left:5px;"></span>
                                        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="sortNo[]" class="form-control" placeholder="Enter sort number" onkeypress="return onlyNum(event)" style="width: 100%;" />
                                    </div>
                                    <div class="col-md-3 "> 
                                        <a href="javascript:void(0)" class="btn btn-success btn-md addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
                                        <span class="rem"></span>
                                    </div>
                                </div>
                            </div>
                            @endif
                            @endif
                            @if(!isset($Productimages))
                            <div class="form-group fieldGroup row">
                                <label class="col-2 col-form-label">Another Image</label>
                                <div class="input-group col-10">
                                    <div class="fileupload fileupload-new col-md-4" data-provides="fileupload">
                                        <button type="button" class="btn btn-secondary btn-file">
                                            <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>
                                            <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                            <input type="file" id="image" name="imageArray[]" class="btn-secondary"  />
                                        </button>
                                        <span class="fileupload-preview" style="margin-left:5px;"></span>
                                        <a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>
                                    </div>
                                    <div class="col-md-3">
                                        <input type="text" name="sortNo[]" class="form-control" placeholder="Enter sort number" onkeypress="return onlyNum(event)" style="width: 100%;" />
                                    </div>
                                    <div class="col-md-3 "> 
                                        <a href="javascript:void(0)" class="btn btn-success btn-md addMore"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a>
                                        <span class="rem"></span>
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
                                    <input type="number" parsley-trigger="change" required class="form-control" name="upc" placeholder="Product upc" value="{{ isset($Products->upc) ? $Products->upc : '' }}" onkeypress="return onlyNum(event)">
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
    
    $(".addMore").click(function(){
            console.log('as');  
        if($('body').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="form-group fieldGroup row">';
            fieldHTML += '<label class="col-2 col-form-label">Another Image</label>';
            fieldHTML += '<div class="input-group col-10">';
            fieldHTML += '<div class="fileupload fileupload-new col-md-4" data-provides="fileupload">';
            fieldHTML += '<button type="button" class="btn btn-secondary btn-file">';
            fieldHTML += '<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>'; 
            fieldHTML += '<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>'; 
            fieldHTML += '<input type="file" class="btn-secondary" name="imageArray[]" />'; 
            fieldHTML += '</button>'; 
            fieldHTML += '<span class="fileupload-preview" style="margin-left:5px;"></span>'; 
            fieldHTML += '<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>'; 
            fieldHTML += '</div>'; 
            fieldHTML += '<div class="col-md-3">'; 
            fieldHTML += '<input type="text" name="sortNo[]" class="form-control" placeholder="Enter sort number" onkeypress="return onlyNum(event)" style="width:100%" parsley-trigger="change" required  />';
            fieldHTML += '</div>';
            fieldHTML += '<div class="col-md-3 add">';
            fieldHTML += '<a href="javascript:void(0)" class="btn btn-danger btn-md remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>';
            fieldHTML += '</div>';
            fieldHTML += '</div>';
            fieldHTML += '</div>';
            $('body').find('.fieldGroup:last').after(fieldHTML);
            if($('body').find('.fieldGroup').length <= 2)    
            {
                if($('body').find('.fieldGroup:last')){
                    $('.rem').html('<a href="javascript:void(0)" class="btn btn-danger btn-md remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>');
                }
            }
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });
    
    $("body").on("click",".addMor",function(){ 
        console.log('asssss');  
        if($('body').find('.fieldGroup').length < maxGroup){
            var fieldHTML = '<div class="form-group fieldGroup row">';
            fieldHTML += '<label class="col-2 col-form-label">Another Image</label>';
            fieldHTML += '<div class="input-group col-10">';
            fieldHTML += '<div class="fileupload fileupload-new col-md-4" data-provides="fileupload">';
            fieldHTML += '<button type="button" class="btn btn-secondary btn-file">';
            fieldHTML += '<span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select file</span>'; 
            fieldHTML += '<span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>'; 
            fieldHTML += '<input type="file" class="btn-secondary" name="imageArray[]" />'; 
            fieldHTML += '</button>'; 
            fieldHTML += '<span class="fileupload-preview" style="margin-left:5px;"></span>'; 
            fieldHTML += '<a href="#" class="close fileupload-exists" data-dismiss="fileupload" style="float: none; margin-left:5px;"></a>'; 
            fieldHTML += '</div>'; 
            fieldHTML += '<div class="col-md-3">'; 
            fieldHTML += '<input type="text" name="sortNo[]" class="form-control" placeholder="Enter sort number" onkeypress="return onlyNum(event)" style="width:100%" parsley-trigger="change" required  />';
            fieldHTML += '</div>';
            fieldHTML += '<div class="col-md-3 add ">';
            fieldHTML += '<a href="javascript:void(0)" class="btn btn-danger btn-md remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>';
            fieldHTML += '</div>';
            fieldHTML += '</div>';
            fieldHTML += '</div>';
            $('body').find('.fieldGroup:last').after(fieldHTML);
            if($('body').find('.fieldGroup').length <= 2)    
            {
                console.log('asdsad');
                if($('body').find('.fieldGroup:last')){
                    $('.rem').html('<a href="javascript:void(0)" class="btn btn-danger btn-md remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a>');
                }
            }
        }else{
            alert('Maximum '+maxGroup+' groups are allowed.');
        }
    });
    $("body").on("click",".remove",function(){ 
        $(this).parents(".fieldGroup").remove();
        if($('body').find('.fieldGroup:last')){
            if($('body').find('.add').length == 0){
                console.log('remove');
                $('.rem:last').html('');
            }
        }

        if($('body').find('.fieldGroup').length == 1)
        {
            $('.add:first').html('<a href="javascript:void(0)" class="btn btn-success btn-md addMore addMor"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a><span class="rem"></span>');
        }
        if($('body').find('.fieldGroup:first')){
            if($('body').find('.addMore').length <= 0){
                $('.add:first').html('<a href="javascript:void(0)" class="btn btn-success btn-md addMore addMor"><span class="glyphicon glyphicon glyphicon-plus" aria-hidden="true"></span> Add</a><span><a href="javascript:void(0)" class="btn btn-danger btn-md remove"><span class="glyphicon glyphicon glyphicon-remove" aria-hidden="true"></span> Remove</a></span>');
            }
        }
    });
});
</script>
@endsection