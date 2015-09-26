@extends('layouts.master')
@section('content')
    <div class="page-header">
        <h1>Ảnh Slide</h1>
    </div>
    {{ Form::open(['route' => 'admin.bannerslide.search', 'method' => 'GET']) }}
        <div class="row">
            <div class="col-sm-10">
                {{ Form::select('position' , ['' => 'Chọn vị trí'] + CommonBannerSlide::getPosition(), null, ['class' => 'form-control']) }}
            </div>
            <div class="col-sm-2">
                <input type="submit" id="search" class='btn btn-primary'>
            </div>
        </div>
    {{ Form::close() }}
@include('admin.error-message')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Vị trí</th>
                        <th>Ảnh Thumb</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($bannerSlides as $bannerSlide)
                <tr>
                    <td>{{$bannerSlide->id}}</td>
                    <td>{{ returnPositionBannerSlide($bannerSlide->position) }}</td>
                    <td>
                        <img src="{{ asset(PATH_BANNER_SLIDE).'/'.$bannerSlide->image_url }}" class="img-rounded" width="150" height="100">
                    </td>
                    <td class="text-right">
                        <a class="btn btn-primary" href="{{ action('BannerSlideController@show', $bannerSlide->id) }}">View</a>
                        <form action="{{ action('BannerSlideController@destroy', $bannerSlide->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <a class="btn btn-success" href="{{ action('BannerSlideController@create') }}">Create</a>
        </div>
    </div>
@endsection