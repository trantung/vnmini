@extends('layouts.master')

@section('content')
@include('admin.error-message')
<div class="manage-menu">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-7.5">
			<a href="{{ route('admin.products.create') }}" class="btn btn-info">Create New Product</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-1.5">
			<span>Select category: </span>
		</div>
	  	<div class="col-xs-6 col-md-4">
		  	<form action="{{ route('admin.products.search') }}" method="GET" accept-charset="utf-8">
			  	<div class="row">
			  			<div class="col-sm-10">
						<select class="form-control" name="category_id">
							<option selected="true"></option>
							@foreach($categories as $category)
								<option value="{{$category->id}}">{{$category->name}}</option>
							@endforeach
						</select>
						</div>
				        <div class="col-sm-2">
				        	<input type="submit" id="search" class='btn btn-primary'>
				        </div>
			  	</div>
			  	<div>
              		<input type="text" class="form-control" id="product_name" name="name" placeholder = "tên sản phẩm" >
			  	</div>
			  	<div>
              		<input type="text" class="form-control" id="product_code" name="code" placeholder = "mã sản phẩm" >
			  	</div>
		  	</form>
	  	</div>
	</div>
	<table class="table table-hover" style="margin-top: 10px;">
	    <tr>
	        <th>Tên</th>
	        <th>Mã sản phẩm</th>
	        <th>Loại sản phẩm</th>
	        <th>Giá gốc</th>
	        <th>Giá KM</th>
	        <th>Khuyến Mại</th>
	        <th>Hành động</th>
	    </tr>
	    @foreach($products as $product)
	    	<?php 
	    		$img = '/';
	    	?>
	    	<tr>
	        <td><a href="{{ route('admin.products.show',['product_id'=>$product->id]) }}">{{$product->name}}</a></td>
	        <td>{{ $product->code }}</td>
	        <td>{{ $product->category->name }}</td>
	        <td>{{ $product->origin_price }}</td>
	        <td>{{ $product->new_price }}</td>
	        <td>{{statusName($product->status, NO_PROMOTION, PROMOTION)}}</td>
	        <td>
	            <div style=" display: table" >
			        <div style = "display: table-cell;  vertical-align: center;">
		                <a href="{{ route('admin.products.show',['product_id'=>$product->id]) }}" class="btn btn-info">View</a>
		            </div>
		            <div style = "display: table-cell;  vertical-align: center;">
		                <a href="{{ route('admin.products.edit',['product_id'=>$product->id]) }}" class="btn btn-warning">Edit</a>
		            </div>
		            <div style = "display: table-cell;  vertical-align: center;">
		            <form action="{{ route('admin.products.destroy',['product_id'=>$product->id]) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
		            	<input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}">
                        	<input type="submit" class = "btn btn-danger" value="Delete" />
			            </form>
			         </div>
	            </div>
	        </td>
	      </tr>
		@endforeach
    	{{ $products->appends(Request::except('page'))->links() }}
	</table>
    <center>{{ $products->appends(Request::except('page'))->links() }}</center>
</div>
@stop
