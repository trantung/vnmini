@extends('layouts.master')
@section('content')
    <div class="page-header">
        <h1>Categories</h1>
    </div>
@include('admin.error-message')
    <div class="row">
        <div class="col-md-12">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên</th>
                        <th>Thư mục cha</th>
                        <th>Index</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>

                <tbody>

                @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    <td>{{$category->name}}</td>
                    <td>
                    @if($category->sort)
                        {{ $category->sort->name }}
                    @endif
                    </td>
                    <td>{{$category->weight_number}}</td>
                    <td class="text-right">
                        <a class="btn btn-primary" href="{{ action('CategoryController@show', $category->id) }}">View</a>
                        <a class="btn btn-warning " href="{{ action('CategoryController@edit', $category->id) }}">Edit</a>
                        <form action="{{ action('CategoryController@destroy', $category->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
                    </td>
                </tr>

                @endforeach

                </tbody>
            </table>
            
            <a class="btn btn-success" href="{{ action('CategoryController@create') }}">Create</a>
        </div>
        <center>{{ $categories->appends(Request::except('page'))->links() }}</center>
    </div>
@endsection