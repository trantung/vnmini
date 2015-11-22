@extends('layouts.master')

@section('content')
@include('admin.error-message')
    <div class="page-header">
        <h1>Sửa category</h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('CategoryController@update', $category->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <table class="table">
                    <tbody>
                        <tr class="success">
                            <td>ID</td>
                            <td>{{$category->id}}</td>
                        </tr>
                        <tr>
                            <td>Tên</td>
                            <td>
                                <input type="text" name = "name" value="{{ $category->name }}" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Tên SEO</td>
                            <td>
                                <input type="text" name = "name_seo" value="{{ $category->name_seo }}" class="form-control" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Thể loại</td>
                            <td>
                                <div class="row form-group  col-md-3 col-sm-3">
                                    {{ Form::select('parent_id' , [$category->parent_id => $category->sort->name] + CommonCategory::getSortCategory(), null, ['class' => 'form-control']) }}
                                </div>
                            </td>
                        </tr>
                    </tbody>
                  </table>
            <a class="btn btn-default" href="{{ action('CategoryController@index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Save</a>
            </form>
        </div>
    </div>


@endsection