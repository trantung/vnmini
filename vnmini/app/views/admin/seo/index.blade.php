@extends('layouts.master')
@section('content')
<div class="page-header">
    <h1>Thông tin description seo</h1>
</div>
@include('admin.error-message')
<div class="row">
    <div class="col-md-12">
        <form role="form" action="{{ route('admin.descriptionseo.update', $seo->id) }}" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_method" value="PUT" />
            <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="6" name="description">{{ $seo->description }}</textarea>
            </div>
            <div class="form-group">
                <label>Keyword</label>
                <textarea class="form-control" rows="6" name="keyword">{{ $seo->keyword }}</textarea>
            </div>
            <div class="form-group col-sm-4 col-md-8">
                <input type="submit" value ="Submit" class ="btn btn-primary" />
            </div>
        </form>
    </div>
</div>
@endsection