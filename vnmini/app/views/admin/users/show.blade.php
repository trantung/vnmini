@extends('layouts.master')

@section('content')
    <div class="page-header">
        <h1>Users / Show </h1>
    </div>
@include('admin.error-message')
<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Email</th>
        <th>Quyền</th>
        <th>Điện thoại</th>
        <th>Trạng thái</th>
        <th>Ngày tạo</th>
        <th>Ngày update</th>
      </tr>
    </thead>
    <tbody>
      <tr class="success">
        <td>{{ $user->id }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->role->name }}</td>
        <td>{{ $user->phone }}</td>
        <td>{{ returnStatusUser($user->status) }}</td>
        <td>{{ $user->created_at }}</td>
        <td>{{ $user->updated_at }}</td>
      </tr>
    </tbody>
  </table>
        <a class="btn btn-default" href="{{ action('UserController@index') }}">Back</a>
        <a class="btn btn-warning" href="{{ action('UserController@edit', $user->id) }}">Edit</a>
        @if(Auth::user()->isAdmin() && Auth::user()->id != $user->id)
        <form action="{{ action('UserController@destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"><button class="btn btn-danger" type="submit">Delete</button></form>
        @endif
        </div>
    </div>
@endsection