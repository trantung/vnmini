@extends('layouts.master')

@section('content')
@include('admin.error-message')
    <div class="page-header">
        <h1>Chiết khấu </h1>
    </div>
    <div class="row">
        <div class="col-md-12">
            <form action="{{ action('DiscountController@update', $discount->id) }}" method="POST">
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                    <label>Phần trăm chiết khấu</label>
                    <input type="text" name = "percentage" value="{{ $discount->percentage }}" required>
                </div>
                <a class="btn btn-default" href="{{ action('DiscountController@index') }}">Back</a>
                <button class="btn btn-primary" type="submit" >Save</a>
            </form>
        </div>
    </div>
@stop