@extends('layouts.master')

@section('content')
<div class="page-header">
    <h1>BannerImgae / Show </h1>
</div>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Ảnh</th>
      </tr>
    </thead>
    <tbody>
      <tr class="success">
        <td>{{ $bannerSlide->id }}</td>
        <td>
            <img src="{{ asset(PATH_BANNER_SLIDE).'/'.$bannerSlide->image_url }}" class="img-rounded" width="150" height="100">
        </td>
      </tr>
    </tbody>
</table>
<a class="btn btn-default" href="{{ action('BannerSlideController@index') }}">Back</a>
<a class="btn btn-warning" href="{{ action('BannerSlideController@destroy', $bannerSlide->id) }}">Xoá</a>
@endsection