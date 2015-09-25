@extends('layouts.master')

@section('content')
<div id="content">
    <div class="page-header">
        <h1>Chi tiết sản phẩm </h1>
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Thể loại</label>
        {{ $product->category->name }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Tên sản phẩm:</label>
        {{ $product->name }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Mã sản phẩm:</label>
        {{ $product->code }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Kích cỡ:</label>
        {{ $product->size }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Chất liệu:</label>
        {{ $product->material }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Số lượng:</label>
        {{ $product->quantity }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Giá gốc:</label>
        {{ $product->origin_price }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Giá Khuyến Mãi</label>
        {{ $product->new_price }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Chi tiết</label>
        {{ $product->description }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Giới thiệu</label>
        {{ $product->introduce }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Thông tin khác</label>
        {{ $product->information }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Ảnh đại diện</label>
        <img src="{{ asset('img/products').'/'.$product->image_url }}" class="img-rounded" width="304" height="236" id="blah">
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Ảnh liên quan</label>
        @foreach($imageRelates as $key => $image)
            <div>
                Ảnh liên quan thứ {{ $key + 1 }}
                <img src="{{ asset('img/products/'.$product->id).'/'.$image->image_url }}" class="img-rounded" width="304" height="236">
            </div>
        @endforeach
    </div>
    <div class="form-group col-sm-4 col-md-8"> 
        <a class="btn btn-default" href="{{ route('admin.products.index') }}">Quay lại</a>
        <a class="btn btn-warning" href="{{ route('admin.products.edit', $product->id) }}">Chỉnh sửa</a>
        <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Xoá sản phẩm?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"><button class="btn btn-danger" type="submit">Xoá</button></form>
    </div>
</div>
@endsection