@extends('layouts.master')

@section('content')
<div class="page-header">
    <h1>Chi tiết tin tức</h1>
</div>
<div id="content">
    <div class="page-header">
        <h1>Chi Bài Viết </h1>
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Người viết: </label>
        {{ $new->user->name }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Tiêu đề: </label>
        {{ $new->title }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Chi tiết: </label>
         {{ $new->description  }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Ảnh: </label>
        <img src="{{ asset($new->image_url) }}"/>
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Ngày tạo: </label>
       {{ $new->created_at }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Ngày cập nhật: </label>
        {{ $new->updated_at }}
    </div>
    <div class="form-group col-sm-4 col-md-8"> 
        <a class="btn btn-default" href="{{ route('admin.new.index') }}">Quay lại</a>
        <a class="btn btn-warning" href="{{ route('admin.new.edit', $new->id) }}">Chỉnh sửa</a>
        <form action="{{ route('admin.new.destroy', $new->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Xoá bài viết?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"><button class="btn btn-danger" type="submit">Xoá</button></form>
    </div>
</div>
@endsection