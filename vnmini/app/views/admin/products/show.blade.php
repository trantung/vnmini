@extends('layouts.master')

@section('content')
<div id="content">
    <div class="page-header">
        <h1>Chi tiết sản phẩm </h1>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th>Mã sản phẩm</th>
                <th>Tên sản phẩm</th>
                <th>Loại</th>
                <th>Số lượng</th>
                <th>Giá gốc</th>
                <th>Giá khuyến mãi</th>
                <th>Khuyến mãi</th>
            </tr>
        </thead>
        <tbody>
            <tr class="success">
                <td>{{$product->code}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->category->name}}</td>
                <td>{{$product->quantity}}</td>
                <td>{{$product->origin_price}}</td>
                <td>{{ statusNewPrice($product->new_price) }}</td>
                <td>{{statusName($product->status, NO_PROMOTION, PROMOTION)}}</td>
            </tr>
        </tbody>
    </table>
    <center><h3>Product image</h3></center><br/>
        <div>
            <a class="btn btn-default" href="{{ route('admin.products.index') }}">Quay lại</a>
            <a class="btn btn-warning" href="{{ route('admin.products.edit', $product->id) }}">Chỉnh sửa</a>
            <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"><button class="btn btn-danger" type="submit">Xoá</button></form>
        </div>
</div>
@endsection