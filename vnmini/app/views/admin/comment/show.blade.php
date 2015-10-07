@extends('layouts.master')

@section('content')
<div class="page-header">
    <h1>Chi tiết comment</h1>
</div>
<div id="content">
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
        {{ returnStatusComment($comment->status) }}
    </div>
    <div class="form-group col-sm-4 col-md-8"> 
        <a class="btn btn-default" href="{{ route('admin.comment.index') }}">Quay lại</a>
        <a class="btn btn-warning" href="{{ route('admin.comment.edit', $comment->id) }}">Chỉnh sửa</a>
        <form action="{{ route('admin.comment.destroy', $comment->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Xoá sản phẩm?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"><button class="btn btn-danger" type="submit">Xoá</button></form>
    </div>
</div>
@endsection