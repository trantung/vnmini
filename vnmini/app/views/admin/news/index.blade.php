@extends('layouts.master')
@section('content')
    <div class="page-header">
        <h1>News</h1>
    </div>
@include('admin.error-message')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Người viết</th>
                        <th>Tiêu đề</th>
                        <th>Ngày viết</th>
                        <th>Ngày cập nhật</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($news as $new)
                <tr>
                    <td><a href="{{ route('admin.user.show', $new->user->id) }}">
                    {{$new->user->name}}</a></td>
                    <td>{{ $new->title }}</td>
                    <td>{{ $new->created_at }}</td>
                    <td>{{ $new->updated_at }}</td>
                    <td class="text-right">
                        <a class="btn btn-primary" href="{{ action('AdminNewController@show', $new->id) }}">Chi tiết</a>
                        <a class="btn btn-warning " href="{{ action('AdminNewController@edit', $new->id) }}">Sửa</a>
                        <form action="{{ action('AdminNewController@destroy', $new->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Xóa</button></form>
                    </td>
                </tr>

                @endforeach

                </tbody>
            </table>
            
            <a class="btn btn-success" href="{{ action('AdminNewController@create') }}">Create</a>
        </div>
        <center>{{ $news->appends(Request::except('page'))->links() }}</center>
    </div>
@endsection