@extends('layouts.master')
@section('content')
    <div class="page-header">
        <h1>USERS</h1>
    </div>
@include('admin.error-message')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Email</th>
                        <th>Điện thoại</th>
                        <th>Trạng thái</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($users as $user)
                <tr>
                    <td>{{$user->id}}</td>
                    <td>
                        <a href = "{{ route('admin.user.show', $user->id) }}">
                            {{$user->name}}
                        </a>
                    </td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>{{ $user->status }}</td>
                    <td class="text-right">
                        <a class="btn btn-primary" href="{{ action('UserController@show', $user->id) }}">Chi tiết</a>
                        <a class="btn btn-warning " href="{{ action('UserController@edit', $user->id) }}">Sửa</a>
                        <form action="{{ action('UserController@destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Xoá</button></form>
                    </td>
                </tr>

                @endforeach

                </tbody>
            </table>
            
            <a class="btn btn-success" href="{{ action('UserController@create') }}">Create</a>
        </div>
        <center>{{ $users->appends(Request::except('page'))->links() }}</center>
    </div>
@endsection