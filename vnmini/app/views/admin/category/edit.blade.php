@extends('layouts.master')

@section('content')
    <div class="page-header">
        <h1>Categories / Edit </h1>
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
                            <input type="text" name = "name" value="{{ $category->name }}" required>
                        </td>
                    </tr>
                        <td>Trạng thái</td>
                        <td>
                            <div class="row form-group  col-md-3 col-sm-3">
                              <select class="form-control" name="status">
                                <option value="1"<?php if($category->status == 1) {echo"selected";}?>>Hiện</option>
                                <option value="0" <?php if($category->status == 0){ echo"selected";}?>>Ẩn</option>
                              </select>
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