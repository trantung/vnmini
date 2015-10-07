@extends('layouts.master')

@section('content')tức
<div class="page-header">
    <h1>Sửa comment</h1>
</div>
<div id="content">
{{ Form::open(['route' => ['admin.comment.update', $comment->id], 'method' => 'PUT']) }}
    <div class="page-header">
        <h1>Chi tiết comment </h1>
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Product name</label>
        {{ $comment->product->name }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Mã sản phẩm:</label>
        {{ $comment->product->code }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Email</label>
        {{ $comment->email }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Name commenter</label>
        {{ $comment->name }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Content</label>
        {{ $comment->content }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Status</label>
        {{ Form::select('status' , ['' => 'Chọn trạng thái'] + [0 => 'Chưa xử lý', 1 => 'Đã xử lý'], $comment->status, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8"> 
        <a class="btn btn-default" href="{{ route('admin.comment.index') }}">Quay lại</a>
        {{ Form::submit('Chỉnh sửa', ['class' => 'btn btn-warning']) }}
    </div>
{{ Form::close() }}
</div>
@endsection