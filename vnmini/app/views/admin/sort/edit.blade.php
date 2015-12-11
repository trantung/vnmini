@extends('layouts.master')

@section('content')
@include('admin.error-message')
    <div class="page-header">
        <h1>Sửa Thể Loại</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('SortController@update', $sort->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table">
                    <tbody>
                        <tr class="success">
                            <td>ID</td>
                            <td>{{$sort->id}}</td>
                        </tr>
                        <tr>
                            <td>Tên</td>
                            <td>
                                <input type="text" name = "name" value="{{ $sort->name }}" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Tên SEO</td>
                            <td>
                                <input type="text" name = "name_seo" value="{{ $sort->name_seo }}" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Index</td>
                            <td>
                                <input type="text" name = "weight_number" value="{{ $sort->weight_number }}" class="form-control" required>
                            </td>
                        </tr>
                    </tbody>
                  </table>
            <a class="btn btn-default" href="{{ action('SortController@index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Save</a>
            </form>
        </div>
    </div>
@endsection