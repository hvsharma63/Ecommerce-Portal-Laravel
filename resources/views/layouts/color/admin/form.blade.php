@extends('layouts.admin.app')
@section('title')
    <title>Color Form</title>
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">{{isset($Colors) ? 'Update Form' : 'Create Form'}}</h4>
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
                            isset($Colors) ? 
                            @route('color.update',['id'=>$Colors->id]) : 
                            @route('color.store')
                        }}">
                            {{@csrf_field()}}
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Color Name</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" parsley-trigger="change" required name="colorName" placeholder="Color name" value="{{ isset($Colors->colorName) ? $Colors->colorName : '' }}" onkeypress="return blockChar(event)">
                                    @if ($errors->has('colorName'))
                                    <span class="help-block label label-warning">
                                        <strong>{{ $errors->first('colorName') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Color</label>
                                <div class="col-10">
                                    <input type="color" class="form-control" name="colorHash" value="{{ isset($Colors->colorHash) ? $Colors->colorHash : '' }}">
                                </div>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-md btn-primary waves-effect waves-light">Submit</button>
                                <a href="{{ route('color.show') }}"><button type="button" class="btn btn-md btn-default waves-effect waves-light">Cancel</button></a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>
@endsection