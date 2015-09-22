@extends('layouts.master')

@section('content')
    <div class="page-header">
        <h1>Categories / Show </h1>
    </div>

<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Tên</th>
        <th>Thể loại</th>
      </tr>
    </thead>
    <tbody>
      <tr class="success">
        <td>{{$category->id}}</td>
        <td>{{$category->name}}</td>
        <td>
            @if($category->sort_id)
                {{ $category->sort->name }}
            @endif
        </td>
      </tr>
    </tbody>
  </table>
            <a class="btn btn-default" href="{{ action('CategoryController@index') }}">Back</a>
            <a class="btn btn-warning" href="{{ action('CategoryController@edit', $category->id) }}">Edit</a>
            <form action="{{ action('CategoryController@destroy', $category->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"><button class="btn btn-danger" type="submit">Delete</button></form>
        </div>
    </div>


@endsection