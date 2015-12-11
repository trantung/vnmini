@extends('layouts.master')
@section('content')
    <div class="page-header">
        <h1>Thông tin footer</h1>
    </div>
@include('admin.error-message')
    <div class="row">
        <div class="col-md-12">
            <form role="form" action="{{ route('admin.footer.update', $footer->id) }}" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="PUT" />
                <div class="form-group">
                    <label for="name">Contact/Liên hệ</label>
                    <input type="text" class="form-control" value="{{ $footer->contact }}" name="contact" >
                </div>
                <div class="form-group">
                    <label for="add">Địa chỉ</label>
                    <input type="text" class="form-control" value="{{ $footer->address }}" name="address">
                </div>
                <div class="form-group">
                    <label for="founder">Hotline</label>
                    <input type="text" class="form-control" value="{{ $footer->hotline }}" name="hotline">
                </div>
                <div class="form-group">
                    <label for="manager">Email</label>
                    <input type="text" class="form-control" value="{{ $footer->email }}" name="email">
                </div>
                <div class="form-group col-sm-4 col-md-8">
                    <input type="submit" value ="Submit" class ="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
@endsection