@extends('layouts.master')
@section('content')
    <div class="page-header">
        <h1>Sort</h1>
    </div>
@include('admin.error-message')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($sorts as $sort)
                <tr>
                    <td>{{$sort->id}}</td>
                    <td>{{$sort->name}}</td>
                    <td class="text-right">
                        <a class="btn btn-primary" href="{{ action('SortController@show', $sort->id) }}">View</a>
                        <a class="btn btn-warning " href="{{ action('SortController@edit', $sort->id) }}">Edit</a>
                        <form action="{{ action('SortController@destroy', $sort->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                    </td>
                </tr>

                @endforeach

                </tbody>
            </table>
            
            <a class="btn btn-success" href="{{ action('SortController@create') }}">Create</a>
        </div>
        <center>{{ $sorts->appends(Request::except('page'))->links() }}</center>
    </div>
@endsection