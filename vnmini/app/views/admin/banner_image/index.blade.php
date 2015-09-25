@extends('layouts.master')
@section('content')
    <div class="page-header">
        <h1>BannerImage</h1>
    </div>
@include('admin.error-message')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Position</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($bannerImages as $bannerImage)
                <tr>
                    <td>{{$bannerImage->id}}</td>
                    <td>{{$bannerImage->title}}</td>
                    <td>{{ $bannerImage->description }}</td>
                    <td>{{ returnPositionBannerImage($bannerImage->position) }}</td>
                    <td class="text-right">
                        <a class="btn btn-primary" href="{{ action('BannerImageController@show', $bannerImage->id) }}">View</a>
                        <a class="btn btn-warning " href="{{ action('BannerImageController@edit', $bannerImage->id) }}">Edit</a>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection