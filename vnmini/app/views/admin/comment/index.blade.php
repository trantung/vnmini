@extends('layouts.master')
@section('content')
    <div class="page-header">
        <h1>Comment</h1>
    </div>
    {{ Form::open(['route' => 'admin.comment.search', 'method' => 'GET']) }}
        <div class="row">
            <div class="col-sm-10">
                {{ Form::select('status' , ['' => 'Chọn trạng thái'] + [0 => 'Chưa xử lý', 1 => 'Đã xử lý'], null, ['class' => 'form-control']) }}
            </div>
            <div class="col-sm-2">
                <input type="submit" id="search" class='btn btn-primary'>
            </div>
        </div>
    {{ Form::close() }}
@include('admin.error-message')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
            Số lượng comments {{ $comments->getTotal() }}
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Product name</th>
                        <th>Email</th>
                        <th>Status</th>
                        <th>Created_at</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($comments as $comment)
                <tr>
                    <td>{{$comment->id}}</td>
                    <td>{{ $comment->product->name }}</td>
                    <td>{{ $comment->email }}</td>
                    <td>{{ returnStatusComment($comment->status) }}</td>
                    <td>{{ $comment->created_at }}</td>
                    <td class="text-right">
                        <a class="btn btn-primary" href="{{ action('CommentController@show', $comment->id) }}">View</a>
                        <a class="btn btn-warning " href="{{ action('CommentController@edit', $comment->id) }}">Edit</a>
                        <form action="{{ action('CommentController@destroy', $comment->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <center>{{ $comments->appends(Request::except('page'))->links() }}</center>
        </div>
    </div>
@endsection