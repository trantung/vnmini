@extends('layouts.master')

@section('content')
@include('admin.error-message')
    <div class="page-header">
        <h1>Slide </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('BannerSlideController@store') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data" role="form">
                <div class="form-group">
                    <label>Ảnh Slide</label>
                    {{ Form::file('image_url') }}
                </div>
                <div class="form-group">
                    <label>Vị trí</label>
                    {{ Form::select('position' , ['' => 'Chọn vị trí'] + CommonBannerSlide::getPosition(), null, ['class' => 'form-control']) }}
                </div>
                <a class="btn btn-default" href="{{ action('BannerSlideController@index') }}">Back</a>
                <button class="btn btn-primary" type="submit" >Create</a>
            </form>
        </div>
    </div>
@stop