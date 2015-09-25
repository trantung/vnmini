@extends('layouts.master')
@section('content')
    <div class="page-header">
        <h1>Shops</h1>
    </div>
@include('admin.error-message')
    <div class="row">
        <div class="col-md-12">
            <form role="form">
                <div class="form-group">
                    <label for="name">Tên:</label>
                    <input type="text" class="form-control" id="name" value="{{ $shop->name }}">
                </div>
                <div class="form-group">
                    <label for="add">Địa chỉ:</label>
                    <input type="text" class="form-control" id="add" value="{{ $shop->address }}">
                </div>
                <div class="form-group">
                    <label for="founder">Người sáng lập:</label>
                    <input type="text" class="form-control" id="founder" value="{{ $shop->user->name }}">
                </div>
                <div class="form-group">
                    <label for="manager">Liên hệ:</label>
                    <input type="text" class="form-control" id="manager" value="{{ $shop->contact }}">
                </div>
                <div class="form-group">
                    <label for="tel">ĐT cố định:</label>
                    <input type="text" class="form-control" id="tel" value="{{ $shop->tel }}">
                </div>
                <div class="form-group">
                    <label for="mobile">ĐT cố định:</label>
                    <input type="text" class="form-control" id="mobile" value="{{ $shop->mobile }}">
                </div>
                <div class="form-group">
                <label>Mô tả</label>
                <textarea class="form-control" rows="6" id="editor1" name="description">{{ $shop->description }}</textarea>
                </div>
                <div class="form-group"> 
                    <label>Ảnh cửa hàng</label>
                    <img src="{{ asset($shop->image_url) }}" class="img-responsive" alt="Shop">
                </div>
                <div class="form-group">
                    <label>Vị trí</label>
                </div>
                <div class="form-group col-sm-4 col-md-8">
                    <a class="btn btn-success" href="{{route('admin.shop.index')}}">Back</a>
                    <input type="submit" value ="Submit" class ="btn btn-primary" />
                </div>
            </form>
        </div>
    </div>
@endsection