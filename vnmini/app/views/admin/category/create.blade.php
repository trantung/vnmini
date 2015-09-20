@extends('layouts.master')

@section('content')
    <div class="page-header">
        <h1>Categories / Create </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('CategoryController@store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                     <label for="name">NAME</label>
                     <input type="text" name="name" class="form-control" value="{{  Session::getOldInput('name') }}"/>
                </div>

            <a class="btn btn-default" href="{{ action('CategoryController@index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Create</a>
            </form>
        </div>
    </div>


@stop