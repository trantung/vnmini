@extends('layouts.master')
@section('content')
<div class="page-header">
    <h1>Tạo mới sản phẩm</h1>
</div>
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
        <label>Tên sản phẩm SEO</label>
        {{ Form::text('name_seo', '', ['class' => 'form-control']) }}
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
        <input name="image_url" type="file" class="form-control" id="imgInp">
        <img src="" class="img-rounded" alt="Image" width="500" height="236" id="blah1">
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Ảnh lớn:</label>
        <input name="big_image_url" type="file" class="form-control" id="imgInp2">
        <img src="" class="img-rounded" alt="Image" width="500" height="236" id="blah2">
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
@section('script_close')
<script type="text/javascript">
        function readURL(input, id) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $(id).attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    $('#imgInp').change(function(){
        readURL(this, '#blah1');
    });
    $('#imgInp2').change(function(){
        readURL(this, '#blah2');
    });
</script>
@stop