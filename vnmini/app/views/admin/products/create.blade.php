@extends('layouts.master')
@section('content')
<form action="{{ route('admin.products.store') }}" method="POST" accept-charset="utf-8" enctype="multipart/form-data" role="form">
            <div class="form-group col-sm-4 col-md-8">
                <label for="category">Select Category:</label>
                <select class="form-control" id="category" name="category_id" required>
                    <option value="">Select category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-4 col-md-8">
              <label>Tên sản phẩm:</label>
              <input type="text" class="form-control" id="name" name="name" placeholder = " tên sản phẩm" required>
            </div>
            <div class="form-group col-sm-4 col-md-8">
              <label>Mã sản phẩm:</label>
              <input type="text" class="form-control" id="code" name="code" placeholder = "mã sản phẩm" required>
            </div>
            <div class="form-group col-sm-4 col-md-8">
              <label>Kích cỡ:</label>
              <input type="text" class="form-control" id="size" name="size" placeholder = "kíck cỡ sản phẩm" >
            </div>
            <div class="form-group col-sm-4 col-md-8">
              <label for="size">Chất liệu:</label>
              <input type="text" class="form-control" id="material" name="material" placeholder = "chất liệu sản phẩm" >
            </div>
            <div class="form-group col-sm-4 col-md-8">
              <label>Số lượng:</label>
              <input type="text" class="form-control" id="quantity" name="quantity" placeholder = "số lượng sản phẩm" required>
            </div>
            <div class="form-group col-sm-4 col-md-8">
              <label>Giá gốc:</label>
              <input type="text" class="form-control" id="origin_price" name="origin_price" placeholder = "Giá gốc" required>
            </div>
            <div class="form-group col-sm-4 col-md-8">
              <label>Giá Khuyến Mãi</label>
              <input type="text" class="form-control" id="new_price" name="new_price" placeholder = "Giá Khuyến Mãi" >
            </div>

            <div class="form-group col-sm-4 col-md-8">
                <input id="input-file" class="file" type="file" multiple data-min-file-count="1" name = "image_url">
                <br>
                <a class="btn btn-success" href="{{route('admin.products.index')}}">Back</a>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>           
            <div class ="form-group col-sm-4 col-md-8">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </div>
        </form>
@stop