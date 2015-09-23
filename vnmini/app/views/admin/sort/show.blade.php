@extends('layouts.master')

@section('content')
<div class="page-header">
    <h1>Thể loại </h1>
</div>
<table class="table">
    <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
        </tr>
    </thead>
    <tbody>
        <tr class="success">
            <td>{{$sort->id}}</td>
            <td>{{$sort->name}}</td>
        </tr>
    </tbody>
</table>
<a class="btn btn-default" href="{{ action('SortController@index') }}">Back</a>
<a class="btn btn-warning" href="{{ action('SortController@edit', $sort->id) }}">Edit</a>
<form action="{{ action('SortController@destroy', $sort->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"><button class="btn btn-danger" type="submit">Delete</button></form>
@endsection