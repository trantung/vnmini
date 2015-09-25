@extends('layouts.master')
@section('content')
@include('admin.error-message')
<form action="{{ route('admin.products.store') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data" role="form">
    <div class="form-group col-sm-4 col-md-8">
        <label for="category">Select Category:</label>
        {{ Form::select('category_id' , ['' => 'Select category'] + CommonCategory::getCategories(), null, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Tên sản phẩm:</label>
        {{ Form::text('name', '', ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Mã sản phẩm:</label>
        {{ Form::text('code', '', ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Kích cỡ:</label>
        {{ Form::text('size', '', ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Chất liệu:</label>
        {{ Form::text('material', '', ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Số lượng:</label>
        {{ Form::text('quantity', '', ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Giá gốc:</label>
        {{ Form::text('origin_price', '', ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Giá Khuyến Mãi</label>
        {{ Form::text('new_price', '', ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Chi tiết</label>
        {{Form::textarea('description',"", array('class'=>'form-control',"rows"=>6, "id"=>'editor1'))}}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Giới thiệu</label>
        {{ Form::text('introduce', '', ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Thông tin khác</label>
        {{ Form::text('information', '', ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Ảnh đại diện</label>
        {{Form::file('image_url',"", array('class'=>'form-control','id'=>'imgInp'))}}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Ảnh liên quan</label>
        {{ Form::file('image_relate[]', ['id' => 'files', 'multiple' => true]) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <a class="btn btn-success" href="{{route('admin.products.index')}}">Back</a>
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>           
</form>
@include('admin.script')
@stop