@extends('layouts.master')
@section('content')
	<div class="page-header">
		<h1>Hoá đơn</h1>
	</div>
@include('admin.error-message')
	<link href="{{ asset('admins/css/jquery-ui.css') }}" rel="stylesheet">
	<script src="{{ asset('admins/js/jquery-ui.min.js')}}"></script>
	<div class="row">
	  	<div class="col-xs-6 col-md-4">
		  	<form action="{{ route('admin.order.search') }}" method="GET" accept-charset="utf-8">
			  	<div class="row">
		  			<div class="col-sm-10">
						{{ Form::select('status' , ['' => 'Chọn trạng thái'] + CommonOrder::getStatusOrder(), returnInputSelect('category_id'), ['class' => 'form-control']) }}
					</div>
			        <div class="col-sm-2">
			        	<input type="submit" id="search" class='btn btn-primary'>
			        </div>
			  	</div>
			  	<div class="row">
				  	<div class="col-sm-10">
		          		<input type="text" class="form-control" id="product_name" name="code" placeholder = "mã hoá đơn" >
				  	</div>
			  	</div>
			  	<div class="row">
				  	<div class="col-sm-10">
		          		<input type="text" class="form-control datepicker" name="startDate" placeholder = "ngày bắt đầu" >
		          		<input type="text" class="form-control datepicker" name="endDate" placeholder = "ngày kết thúc" >
				  	</div>
			  	</div>
		  	</form>
	  	</div>
	</div>
	<div class="row">
	  	<div class="col-xs-6 col-md-4">
		 	Có tổng cộng <span style = "color:red">{{ count($orders) }}</span> hoá đơn
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<table class="table table-striped">
				<thead>
					<tr>
						<th>Tên khách hàng</th>
						<th>Phone</th>
						<th>Tiền trước chiết khấu</th>
						<th>Tiền chiết khấu</th>
						<th>Tiền thực </th>
						<th>Status</th>
						<th class="text-right">OPTIONS</th>
					</tr>
				</thead>
				<tbody>
				@foreach($orders as $order)
					<tr>
						<td>{{ $order->customer->fullname }}</td>
						<td>{{ $order->customer->phone }}</td>
						<td>{{ $order->value_origin }} </td>
						<td>{{ $order->value_discount }}</td>
						<td>{{ $order->value }}</td>
						<td>{{ returnStatusOrder($order->status) }}</td>
						<td class="text-right">
							<a class="btn btn-primary" href="{{ action('OrderController@show', $order->id) }}">View</a>
							<a class="btn btn-warning " href="{{ action('OrderController@edit', $order->id) }}">Edit</a>
				   			@if(Auth::user()->isAdmin())
							<form action="{{ action('OrderController@destroy', $order->id) }}" method="POST" style="display: inline;" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };"><input type="hidden" name="_method" value="DELETE"><input type="hidden" name="_token" value="{{ csrf_token() }}"> <button class="btn btn-danger" type="submit">Delete</button></form>
					   		@endif
						</td>
					</tr>
				@endforeach
				</tbody>
			</table>
			<center>{{ $orders->appends(Request::except('page'))->links() }}</center>
		</div>
	</div>
<script type="text/javascript">
	$( '.datepicker' ).datepicker({
	  	dateFormat: "yy-mm-dd"
	});
</script>
@endsection