@extends('layouts.master')

@section('content')
<div class="page-header">
    <h1>BannerImgae / Show </h1>
</div>
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Title</th>
        <th>Description</th>
        <th>Position</th>
      </tr>
    </thead>
    <tbody>
      <tr class="success">
        <td>{{ $bannerImage->id }}</td>
        <td>{{ $bannerImage->title }}</td>
        <td>{{ $bannerImage->description }} </td>
        <td>{{ returnPositionBannerImage($bannerImage->position) }}</td>
      </tr>
    </tbody>
</table>
<a class="btn btn-default" href="{{ action('BannerImageController@index') }}">Back</a>
<a class="btn btn-warning" href="{{ action('BannerImageController@edit', $bannerImage->id) }}">Edit</a>
@endsection