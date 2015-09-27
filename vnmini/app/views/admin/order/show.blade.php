@extends('layouts.master')

@section('content')
<div id="content">
    <div class="page-header">
        <h1>Chi tiết hoá đơn </h1>
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Tên khách hàng:</label>
        {{ $order->customer->fullname }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Mã sản phẩm:</label>
        {{ $order->code }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Kích cỡ:</label>
        {{ $order->size }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Chất liệu:</label>
        {{ $order->material }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Số lượng:</label>
        {{ $order->quantity }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Giá gốc:</label>
        {{ $order->origin_price }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Giá Khuyến Mãi</label>
        {{ $order->new_price }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Chi tiết</label>
        {{ $order->description }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Giới thiệu</label>
        {{ $order->introduce }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Thông tin khác</label>
        {{ $order->information }}
    </div>
    <div class="form-group col-sm-4 col-md-8"> 
        <a class="btn btn-default" href="{{ route('admin.order.index') }}">Quay lại</a>
        <a class="btn btn-warning" href="{{ route('admin.order.edit', $order->id) }}">Chỉnh sửa</a>
        <form action="{{ route('admin.order.destroy', $order->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Xoá sản phẩm?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"><button class="btn btn-danger" type="submit">Xoá</button></form>
    </div>
</div>
@endsection