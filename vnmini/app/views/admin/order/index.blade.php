@extends('layouts.master')
@section('content')
	<div class="page-header">
		<h1>Hoá đơn</h1>
	</div>
@include('admin.error-message')
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
@endsection