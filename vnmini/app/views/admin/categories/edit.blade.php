@extends('layouts.admin')

@section('content')
<?php 
    $allCAte = App\Category::where('id', '!=', $category->id)->get(['id', 'name']);
?>
    <div class="page-header">
        <h1>Categories / Edit </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('Admin\CategoryController@update', $category->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <table class="table">
                    <tbody>
                      <tr class="success">
                        <td>ID</td>
                        <td>{{$category->id}}</td>
                    </tr>
                    <tr class="warning">
                        <td>Parrent</td>
                        <td>
                            <div class="form-group">
                              <select class="form-control" id="parrent_id" name="parrent_id">
                                @foreach($allCAte as $cate)
                                    <option value="{{ $cate->id }}">
                                        {{ $cate->name }}
                                    </option>
                                @endforeach
                              </select>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>Name</td>
                        <td>
                            <input type="text" name = "name" value="{{ $category->name }}" required>
                        </td>
                    </tr>
                        <td>Description</td>
                        <td>
                            <input type="text" name = "description" value="{{ $category->description }}" required>
                        </td>
                      </tr>
                    </tbody>
                  </table>
            <a class="btn btn-default" href="{{ action('Admin\CategoryController@index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Save</a>
            </form>
        </div>
    </div>


@endsection