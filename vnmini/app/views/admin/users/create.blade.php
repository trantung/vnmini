@extends('layouts.master')

@section('content')
@include('admin.error-message')
    <div class="page-header">
        <h1>User / Create </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('UserController@store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                <div class="form-group">
                     <label>Email</label>
                     <input type="text" name="email" class="form-control" value="{{  Session::getOldInput('name') }}"/>
                </div>
                <div class="form-group">
                     <label>Password</label>
                     {{ Form::password('password', array('class'=> 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::select('status' , ['' => 'Chọn trạng thái user'] + [0 => 'Sử dụng',1 => 'Khoá'], null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    <label>Thể loại</label>
                    {{ Form::select('role_id' , ['' => 'Chọn quyền'] + Role::getRoleName(), null, ['class' => 'form-control']) }}
                </div>
            <a class="btn btn-default" href="{{ action('UserController@index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Create</a>
            </form>
        </div>
    </div>
@stop