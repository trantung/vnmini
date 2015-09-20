@extends('layouts.master')

@section('content')
<div class="manage-menu">
	<div class="row">
		<div class="col-xs-12 col-sm-6 col-md-7.5">
			<a href="{{ route('admin.products.create') }}" class="btn btn-info">Create New Product</a>
		</div>
		<div class="col-xs-12 col-sm-6 col-md-1.5">
			<span>Select category: </span>
		</div>
	  	<div class="col-xs-6 col-md-4">
	  	<form action="#" method="get" accept-charset="utf-8">
		  	<div class="row">
		  			<div class="col-sm-10">
					<select class="form-control" name="category">
						<option selected="true">....</option>
						@foreach($categories as $category)
							<option value="{{$category->id}}">{{$category->name}}</option>
						@endforeach
					</select>
					</div>
			        <div class="col-sm-2">
			        	<input type="submit" name="search" id="search" class='btn btn-primary' value="Search"/>
			        </div>
		  	</div>
	  	</form>
			
	  	</div>
	</div>
	<table class="table table-hover" style="margin-top: 10px;">
	    <tr>
	        <th>NAME</th>
	        <th>PRICE</th>
	        <th>CATEGORY</th>
	        <th>DESCRIPTION</th>
	        <th>IMAGE</th>
	        <th>ACTION</th>
	    </tr>
	    @foreach($products as $product)
	    	<?php 
	    		$img = '/';
	    	?>
	    	<tr>
	        <td><a href="{{ route('admin.products.show',['product_id'=>$product->id]) }}">{{$product->name}}</a></td>
	        <td>{{$product->price}}</td>
	        <td>{{$product->category->name}}</td>
	        <td>{{$product->description}}</td>
	        <td>
	        	<a href="{{ route('admin.products.show',['product_id'=>$product->id]) }}">
	        		<img src="{{ $img }}" class="img-rounded compress" style="width:7em; height:5em;"/>
	        	</a>
	        </td>
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
	</table>
	
</div>
<script type="text/javascript">
	$(".compress").hover(function(){
  	$(".image").show();
},
function(){
   $(".image").hide()
}
);
</script>
@stop
