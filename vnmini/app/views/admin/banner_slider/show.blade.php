@extends('layouts.master')

@section('content')
<div class="page-header">
    <h1>Tạo mới ảnh slide</h1>
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
            <img src="{{ asset($bannerSlide->image_url) }}" class="img-rounded" width="150" height="100">
        </td>
      </tr>
    </tbody>
</table>
<a class="btn btn-default" href="{{ action('BannerSlideController@index') }}">Back</a>
<form action="{{ action('BannerSlideController@destroy', $bannerSlide->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>

@endsection