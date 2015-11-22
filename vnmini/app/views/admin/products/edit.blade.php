@extends('layouts.master')

@section('content')
<div class="page-header">
    <h1>Sửa sản phẩm</h1>
</div>
@include('admin.error-message')
{{Form::open(array("route"=>array('admin.products.update', $product->id), 'method' => 'PUT', "class"=>"form-horizontal",'files'=>true))}}
    <div class="form-group col-sm-4 col-md-8">
        <label for="category">Select Category:</label>
        {{ Form::select('category_id[]', CommonCategory::getCategories(), CommonProduct::getCategoryProduct($product->id), ['class' => 'form-control', 'multiple'=>'multiple']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
         <label for="category">Select Type:</label>
        {{ Form::select('type_id', CommonCategory::getTypeProduct(), $product->type_id, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Tên sản phẩm:</label>
        {{ Form::text('name', $product->name, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Tên sản phẩm SEO</label>
        {{ Form::text('name_seo', $product->name_seo, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Mã sản phẩm:</label>
        {{ Form::text('code', $product->code, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Kích cỡ:</label>
        {{ Form::text('size', $product->size, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Chất liệu:</label>
        {{ Form::text('material', $product->material, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Số lượng:</label>
        {{ Form::text('quantity', $product->quantity, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Giá gốc:</label>
        {{ Form::text('origin_price', $product->origin_price, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Giá Khuyến Mãi</label>
        {{ Form::text('new_price', $product->new_price, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Chi tiết</label>
        {{Form::textarea('description', $product->description, array('class'=>'form-control',"rows"=>6, "id"=>'editor1'))}}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Giới thiệu</label>
        {{ Form::text('introduce', $product->introduce, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Thông tin khác</label>
        {{ Form::text('information', $product->information, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Ảnh đại diện</label>
        <input name="image_url" type="file" class="form-control" id="imgInp">
        <img src="{{ asset($product->image_url) }}" class="img-rounded" alt="Image" width="500" height="236" id="blah1">
        
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Ảnh lớn</label>
        <input name="big_image_url" type="file" class="form-control" id="imgInp2">
        <img src="{{ asset($product->big_image_url) }}" class="img-rounded" alt="Image" width="500" height="236" id="blah2">
        
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Ảnh liên quan</label>
        @if($imageRelates->count() > 0)
            @foreach($imageRelates as $key => $image)
                <div>
                    Ảnh liên quan thứ {{ $key + 1 }}
                    <img src="{{ asset($image->image_url) }}" class="img-rounded" width="304" height="236">
                    <a href="javascript:;" onclick="deleteImageRelate()" data-id="{{ $image->id }}" class="image_relate btn btn-danger">Xoá</a>
                </div>
                <br/>
            @endforeach
        @else
            Không có ảnh liên quan
        @endif
        <div>Thêm ảnh
            {{ Form::file('image_relate[]', ['id' => 'files', 'multiple' => true]) }}
        </div>
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <a class="btn btn-success" href="{{route('admin.products.index')}}">Back</a>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>           
{{ Form::close() }}
@include('admin.script')
@include('admin.image_relate')
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