@extends('layouts.master')

@section('content')
@include('admin.error-message')
{{Form::open(array("route"=>array('admin.products.update', $product->id), 'method' => 'PUT', "class"=>"form-horizontal",'files'=>true))}}
    <div class="form-group col-sm-4 col-md-8">
        <label for="category">Select Category:</label>
        {{ Form::select('category_id' , ['' => 'Select category'] + CommonCategory::getCategories(), $product->category->id, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Tên sản phẩm:</label>
        {{ Form::text('name', $product->name, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Mã sản phẩm:</label>
        {{ Form::text('code', $product->code, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Kích cỡ:</label>
        {{ Form::text('size', $product->size, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Chất liệu:</label>
        {{ Form::text('material', $product->material, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Số lượng:</label>
        {{ Form::text('quantity', $product->quantity, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Giá gốc:</label>
        {{ Form::text('origin_price', $product->origin_price, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Giá Khuyến Mãi</label>
        {{ Form::text('new_price', $product->new_price, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Description</label>
        {{Form::textarea('description', $product->description, array('class'=>'form-control',"rows"=>6, "id"=>'editor1'))}}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Introduce</label>
        {{ Form::text('introduce', $product->introduce, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Information</label>
        {{ Form::text('information', $product->information, ['class' => 'form-control']) }}
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Ảnh đại diện</label>
        {{Form::file('image_url',"", array('class'=>'form-control','id'=>'imgInp'))}}
        <img src="{{ asset('img/products').'/'.$product->image_url }}" class="img-rounded" width="304" height="236" id="blah">
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <label>Ảnh liên quan</label>
        @foreach($imageRelates as $key => $image)
            <div>
                Ảnh liên quan thứ {{ $key + 1 }}
                {{ Form::file("image[$image->id]", "", array('class'=>'btn btn-success')) }}
                <img src="{{ asset('img/products/'.$product->id).'/'.$image->image_url }}" class="img-rounded" width="304" height="236">
                <div class="btn btn-primary" id="delete" value="{{$image->id}}">Xoá</div>
            </div>
            <br/>
        @endforeach
        <div>Thêm ảnh
            {{ Form::file('image_relate[]', ['id' => 'files', 'multiple' => true]) }}
        </div>
    </div>
    <div class="form-group col-sm-4 col-md-8">
        <a class="btn btn-success" href="{{route('admin.products.index')}}">Back</a>
        {{ Form::submit('Submit', ['class' => 'btn btn-primary']) }}
    </div>           
{{ Form::close() }}
@include('admin.script')
@endsection