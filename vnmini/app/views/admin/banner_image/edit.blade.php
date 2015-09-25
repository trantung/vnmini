@extends('layouts.master')

@section('content')
@include('admin.error-message')
    <div class="page-header">
        <h1>Categories / Edit </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('BannerImageController@update', $bannerImage->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table">
                    <tbody>
                        <tr class="success">
                            <td>ID</td>
                            <td>{{ $bannerImage->id }}</td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td>
                                <textarea name = "title">{{ $bannerImage->title }}</textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td>
                                <textarea name = "description">{{ $bannerImage->description }}</textarea>
                            </td>
                        </tr>
                        <tr class="success">
                            <td>ID</td>
                            <td>{{ returnPositionBannerImage($bannerImage->position) }}</td>
                        </tr>
                    </tbody>
                  </table>
                <a class="btn btn-default" href="{{ action('BannerImageController@index') }}">Back</a>
                <button class="btn btn-primary" type="submit" >Save</a>
            </form>
        </div>
    </div>


@endsection