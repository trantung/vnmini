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
                        <th>Phần trăm chiết khấu</th>
                        <th class="text-right">OPTIONS</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($discount as $discount)
                    <tr>
                        <td>{{$discount->id}}</td>
                        <td>{{$discount->percentage}}%</td>
                        <td class="text-right">
                            <a class="btn btn-primary" href="{{ action('DiscountController@show', $discount->id) }}">View</a>
                            <a class="btn btn-warning " href="{{ action('DiscountController@edit', $discount->id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection