@extends('layouts.master')

@section('content')
@include('admin.error-message')
    <div class="page-header">
        <h1>Chiết khấu </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('DiscountController@store') }}" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                     <label>Phần trăm chiết khấu</label>
                     {{ $discount->percentage }}%
                </div>
                <a class="btn btn-default" href="{{ action('DiscountController@index') }}">Back</a>
                <a class="btn btn-warning" href="{{ action('DiscountController@edit', $discount->id) }}">Edit</a>
            </form>
        </div>
    </div>
@stop