@extends('layouts.admin')

@section('content')
    <div class="page-header">
        <h1>Categories / Show </h1>
    </div>

<table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Parent</th>
        <th>Name</th>
        <th>Description</th>
        <th>View_Count</th>
        <th>Sell_Count</th>
      </tr>
    </thead>
    <tbody>
      <tr class="success">
        <td>{{$category->id}}</td>
        <td>
            @if($category->parrent_id != 0)
                {{App\Category::findOrFail($category->parrent_id)->name}}
            @else
                <span>None</span>
            @endif
        </td>
        <td>{{$category->name}}</td>
        <td>{{$category->description}}</td>
        <td>{{$category->count_view}}</td>
        <td>{{$category->count_sell}}</td>
      </tr>
    </tbody>
  </table>
            <a class="btn btn-default" href="{{ action('Admin\CategoryController@index') }}">Back</a>
            <a class="btn btn-warning" href="{{ action('Admin\CategoryController@edit', $category->id) }}">Edit</a>
            <form action="{{ action('Admin\CategoryController@destroy', $category->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"><button class="btn btn-danger" type="submit">Delete</button></form>
        </div>
    </div>


@endsection