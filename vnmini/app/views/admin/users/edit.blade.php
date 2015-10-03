@extends('layouts.master')

@section('content')
@include('admin.error-message')
    <div class="page-header">
        <h1>Users / Edit </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('UserController@update', $user->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                
                <table class="table">
                        <tbody>
                          <tr class="success">
                            <td>ID</td>
                            <td>{{$user->id}}</td>
                        </tr>
                        <tr>
                            <td>Tên</td>
                            <td>
                                <div class="form-group col-md-5 col-sm-5">
                                    <input class="form-control" type="text" name = "name" value="{{ $user->name }}" required>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>
                                <div class="form-group col-md-5 col-sm-5">
                                <input class="form-control" type="email" name = "email" value="{{ $user->email }}" required>
                                </div>
                            </td>
                        </tr>
                        @if(Auth::user()->role_id !=2)
                            <tr>
                                <td>Quyền</td>
                                <td>
                                    <div class="form-group col-md-5 col-sm-5">
                                      <select class="form-control" required name="role">
                                            @foreach($roles as $role)
                                                <option value = "{{ $role->id }}" <?php if($role->id == $user->role->id){echo "selected";} ?>>{{ $role->name }}</option>
                                            @endforeach
                                      </select>
                                    </div>
                                </td>
                            </tr>
                        @endif
                        <tr>
                            <td>Điện thoại</td>
                            <td>
                                <div class="form-group col-md-5 col-sm-5">
                                <input class="form-control" type="text" name = "phone" value="{{ $user->phone }}" required>
                                </div>
                            </td>
                        </tr>
                        @if(Auth::user()->role_id !=2)
                            <tr>
                                <td>Trạng thái</td>
                                <td>
                                    <div class="form-group col-md-5 col-sm-5">
                                    <select class="form-control" required name ="status">
                                        <option value = "0" <?php if($user->status == USING){echo "selected";} ?>>{{ USER_USING }} </option>
                                        <option value = "1" <?php if($user->status == LOCK){echo "selected";} ?>>{{ USER_LOCK }} </option>
                                    </select>
                                    </div>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                  </table>
            <a class="btn btn-default" href="{{ action('UserController@index') }}">Back</a>
            <button class="btn btn-primary" type="submit" >Save</a>
            </form>
        </div>
    </div>


@endsection