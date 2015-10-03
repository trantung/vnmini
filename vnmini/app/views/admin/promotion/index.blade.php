@extends('layouts.master')
@section('content')
    <div class="page-header">
        <h1>Thông tin khuyến mãi</h1>
    </div>
@include('admin.error-message')
    <div class="row">
        <div class="col-md-12">
            <form role="form" action="{{ route('admin.promotion.update', $promotion->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT" />
                <div class="form-group">
                    <label>Tiêu đề:</label>
                    <input type="text" class="form-control" id="title" value="{{ $promotion->title }}" name="title">
                </div>
                <div class="form-group">
                <label>Giới thiệu</label>
                <textarea class="form-control" rows="6" id="editor1" name="description" required>{{ $promotion->description }}</textarea>
                </div>
                <div class="form-group col-sm-4 col-md-8">
                    <a class="btn btn-success" href="{{route('admin.promotion.index')}}">Back</a>
                    <input type="submit" value ="Submit" class ="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
@include('admin.script')
@endsection