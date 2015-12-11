<strong>1. Thông tin hoá đơn</strong><br/>
- Tổng tiền thanh toán: {{ $order['value'] }}
<br/>
- Mã số hoá đơn : {{ $order['code'] }}
<br/>
<strong>2. Chi tiết hoá đơn</strong>
@foreach($items as $item)
<div>
	- Tên sản phẩm: {{ $item->product->name }}
	<br/>
	- Mã sản phẩm: {{ $item->product->code }}
	<br/>
	- Số lượng: {{ $item->qty }}
	<br/>
	- Giá sản phẩm: {{ $item->price }}
	<br/>
</div>
@endforeach