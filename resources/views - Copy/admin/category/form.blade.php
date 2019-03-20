@extends('admin.layouts.app')
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Category Form</h4>
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
                        @if($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" action="{{ 
                            isset($Categorys) ? 
                            @route('category.update', $Categorys->id) : 
                            @route('category.store')
                        }}">
                            {{@csrf_field()}}
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Image</label>
                                <div class="col-10">
                                    <div class="fileupload fileupload-new" data-provides="fileupload">
                                        <div class="fileupload-new thumbnail" style="width: 200px; height: 150px;">
                                            @if(isset($Categorys) && $Categorys->image!="")
                                                <img src="{{URL('resources/assets/categories/'.$Categorys->id.'/'.$Categorys->image)}}">
                                            @else
                                                <img src="{{URL('resources/assets/images/default.png')}}" alt="image" />
                                            @endif
                                        </div>
                                        <div class="fileupload-preview fileupload-exists thumbnail" style="max-height: 150px; line-height: 20px;"></div>
                                        <div>
                                            <button type="button" class="btn btn-secondary btn-file">
                                                <span class="fileupload-new"><i class="fa fa-paper-clip"></i> Select image</span>
                                                <span class="fileupload-exists"><i class="fa fa-undo"></i> Change</span>
                                                <input type="file" class="btn-secondary" name="image" />
                                            </button>   
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Name</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="name" placeholder="Category name" value="{{ isset($Categorys->name) ? $Categorys->name : '' }}">
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-md btn-primary waves-effect waves-light">Submit</button>
                                <a href="{{ route('category.show') }}"><button type="button" class="btn btn-md btn-default waves-effect waves-light">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>
@endsection