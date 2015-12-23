@extends('layouts.master')

@section('content')
@include('admin.products.scriptindex')
@include('admin.error-message')
<div class="manage-menu">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-7.5">
			<div>
				<a href="{{ route('admin.products.create') }}" class="btn btn-info">Tạo mới sản phẩm chính</a>
			</div>
			<br/>
			<div>
				<a href="{{ action('ProductExtraController@create') }}" class="btn btn-info">Tạo mới sản phẩm phụ</a>
				<a href="{{ action('ProductExtraController@index') }}" class="btn btn-info">Danh sách sản phẩm phụ</a>
			</div>
			<br/>
			<div><a onclick="updateIndexData();" class="btn btn-success">Cập nhật Index</a></div>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-1.5">
			<span>Chọn category: </span>
		</div>
	  	<div class="col-xs-6 col-md-4">
		  	<form action="{{ route('admin.products.search') }}" method="GET" accept-charset="utf-8">
			  	<div class="row">
		  			<div class="col-sm-10">
    					{{ Form::select('category_id' , ['' => 'Chọn category'] + CommonCategory::getCategories(), returnInputSelect('category_id'), ['class' => 'form-control']) }}
					</div>
			  	</div>
			  	<div>
              		<input type="text" class="form-control" id="product_name" name="name" placeholder = "tên sản phẩm" >
			  	</div>
			  	<div>
              		<input type="text" class="form-control" id="product_code" name="code" placeholder = "mã sản phẩm" >
			  	</div>
			  	<div>
		        	<input type="submit" id="search" class='btn btn-primary'>
		        </div>
		  	</form>
	  	</div>
	</div>
	<div style="color: red">{{ $products->getTotal() }} sản phẩm</div>
	<table class="table table-hover" style="margin-top: 10px;">
	    <tr>
	        <th>Tên</th>
	        <th>Mã sản phẩm</th>
	        <th>Giá gốc</th>
	        <th>Giá KM</th>
	        <th>Khuyến Mại</th>
	        <th>Index</th>
	        <th>Hành động</th>
	    </tr>
	    @foreach($products as $product)
	    	<tr>
	        <td><a href="{{ route('admin.products.show',['product_id'=>$product->id]) }}">{{$product->name}}</a></td>
	        <td>{{ $product->code }}</td>
	        <td>{{ $product->origin_price }}</td>
	        <td>{{ $product->new_price }}</td>
	        <td>{{ statusName($product->status, NO_PROMOTION, PROMOTION) }}</td>
	        <td>
	        	<input type="hidden" name="id[]" value="{{ $product->id }}" />
	        	<input type="text" name="weight_number[]" value="{{ CommonProduct::getWeightNumber($product->id) }}" class="only_number" style="width: 50px; text-align: center;" />
	        </td>
	        <td>
	            <div style=" display: table" >
			        <div style = "display: table-cell;  vertical-align: center;">
		                <a href="{{ route('admin.products.show',['product_id'=>$product->id]) }}" class="btn btn-info">Chi tiết</a>
		            </div>
		            <div style = "display: table-cell;  vertical-align: center;">
		                <a href="{{ route('admin.products.edit',['product_id'=>$product->id]) }}" class="btn btn-warning">Sửa</a>
		            </div>
		            <div style = "display: table-cell;  vertical-align: center;">
		            <form action="{{ route('admin.products.destroy',['product_id'=>$product->id]) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Xoá sản phẩm này? Bạn có chắc chắn không?')) { return true } else {return false };">
		            	<input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="submit" class = "btn btn-danger" value="Xoá" />
			        </form>
			         </div>
	            </div>
	        </td>
	      </tr>
		@endforeach
	</table>
    <center>{{ $products->appends(Request::except('page'))->links() }}</center>
</div>
@stop
