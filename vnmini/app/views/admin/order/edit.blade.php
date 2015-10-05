@extends('layouts.master')

@section('content')
@include('admin.error-message')
{{ Form::open(array("route"=>array('admin.order.update', $order->id), 'method' => 'PUT', "class"=>"form-horizontal",'files'=>true))}}
    <div class="form-group col-sm-4 col-md-8">
        <label>Mã đơn hàng:</label>
        {{ Form::text('code', $order->code, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Tên khách hàng:</label>
        {{ Form::text('fullname', $order->customer->fullname , ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Số điện thoại</label>
        {{ Form::text('phone', $order->customer->phone, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Email</label>
        {{ Form::text('email', $order->customer->email, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Địa chỉ</label>
        {{ Form::text('address', $order->customer->address, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Ghi chú</label>
        {{ Form::text('note', $order->note, ['class' => 'form-control']) }}
    </div>
        <div class="form-group col-sm-4 col-md-8">
        <label>Tiền chiết khấu</label>
        {{ Form::text('value_discount', $order->value_discount, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Tiền chưa chiết khấu</label>
        {{ Form::text('value_origin', $order->value_origin, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Tiền thực</label>
        {{ Form::text('value', $order->value, ['class' => 'form-control']) }}
    </div>
    @foreach($order->orderproducts as $key => $orderProduct)
        <div class="form-group col-sm-4 col-md-8">
            <a href="{{ route('admin.products.show', $orderProduct->product_id) }} ">
                <span>Sản phẩm thứ {{ $key+1 }}</span>
            </a>
            <div>
                <label>Mã Sản phẩm</label>
                {{ $orderProduct->product->code }}
            </div>
            <div>
                <label>Giá Sản phẩm</label>
                @if($orderProduct->product->new_price)
                    {{ $orderProduct->product->new_price }}
                @else
                    {{ $orderProduct->product->origin_price }}
                @endif
            </div>
            <div>
                <label>Tên Sản phẩm </label>
                {{ $orderProduct->product->name }}
            </div>
            <div>
                <label>Số lượng sản phẩm đặt mua</label>
                {{ Form::text($orderProduct->product->id, CommonOrder::getQuantityProduct($order->id, $orderProduct->product->id), ['class' => 'form-control']) }}
                <label>Số lượng sản phẩm trong kho</label>
                {{ $orderProduct->product->quantity }}
                <br/>
                <a href="javascript:;" onclick="deleteOrderProduct()" data-id="{{ returnOrderProductId($orderProduct->product->id, $order->id) }}" class="order_product btn btn-danger">Xoá</a> sản phẩm <span style = "color:blue">{{ $orderProduct->product->name }}</span> trong đơn hàng
            </div>
        </div>
    @endforeach
    <div class="form-group col-sm-4 col-md-8">
        <label>Trạng thái</label>
        {{ Form::select('status' , ['' => 'Chọn trạng thái'] + CommonOrder::getStatusOrder(), $order->status, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <a class="btn btn-success" href="{{route('admin.order.index')}}">Back</a>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>           
{{ Form::close() }}
@include('admin.script')
@include('admin.order_product')
@endsection