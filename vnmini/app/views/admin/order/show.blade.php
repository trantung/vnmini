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
        <label>Số điện thoại</label>
        {{ $order->customer->phone }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Email</label>
        {{ $order->customer->email }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Địa chỉ</label>
        {{ $order->customer->address }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Ghi chú</label>
        {{ $order->note }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Tiền chiết khấu</label>
        {{ $order->value_discount }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Tiền chưa chiết khấu</label>
        {{ $order->value_origin }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Tiền thực</label>
        {{ $order->value }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Trạng thái</label>
        {{ returnStatusOrder($order->status) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Ngày tạo hoá đơn</label>
        {{ $order->created_at }}
    </div>
    <div class="form-group col-sm-4 col-md-8"> 
        <a class="btn btn-default" href="{{ route('admin.order.index') }}">Quay lại</a>
        <a class="btn btn-warning" href="{{ route('admin.order.edit', $order->id) }}">Chỉnh sửa</a>
        <form action="{{ route('admin.order.destroy', $order->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Xoá sản phẩm?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"><button class="btn btn-danger" type="submit">Xoá</button></form>
    </div>
</div>
@endsection