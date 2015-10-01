<section class="main-content cart-bill">
    <div class="container">
        <div class=" col-md-8 col-sm-8">
            <div class="cart left-bill clearfix">
                <h2>thanh toaùn</h2>
                <span class="title-buttom">1. Thông tin thanh toán</span>
                <span class="title-buttom">2. Thông tin đơn hàng</span><br>
                <form action ="{{ route('cart.order.add') }}" method="post">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th width="50%"> Tên sản phẩm </th>
                                <th > Giá tiền</th>
                                <th > Số lượng</th>
                                <th > Ck %</th>
                                <th > Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td width="50%">{{ $item->name }}</td>
                                <td >{{ $item->price }} đ</td>
                                <td >{{ $item->qty }}</td>
                                <td >0%</td>
                                <td >{{ $item->subtotal }} đ</td>
                            </tr>
                        @endforeach
                            <tr>
                                <td colspan="4" class="text-right">Tổng cộng</td>
                                <td >{{ Cart::total() }} đ</td>
                            </tr>
                            <tr>
                                <td colspan="4" class="text-right"><strong>Tổng tiền thanh toán</strong></td>
                                <td ><strong>{{ Cart::total() }} đ</strong></td>
                            </tr>
                        </tbody>
                    </table>
                   
                </div>
                 <button type="submit" class="pull-right">Nhận hóa đơn</button>
                </form>
                <div class="note"> Bạn quên sản phẩm mình đang mua là gì ? <a href="#"> Sửa giỏ hàng</a></div>
            </div>
        </div>
        <div class=" col-md-4 col-sm-4">
            <div class="cart-right">
                <h2>gioû haøng</h2>
                <span class="title-buttom">Được cung cấp bởi Vnmini.net</span>
                <div class="cart-content">
                @foreach($items as $item)
                    <div class="cart-item">
                        <div class="title">{{ $item->product->name }}</div>
                        <div class="content row">
                            <div class="col-xs-4  col-sm-12 col-md-4">
                                <img src="{{ asset($item->product->image_url) }}">
                            </div>
                            <!-- left -->
                            <div class="col-xs-8  col-sm-12 col-md-8">
                                <div class="form-quantity">
                                    <label>Số lượng</label>
                                    <div class="quantity input-group">
                                        <input type="text" id="quantity{{ $item->product->id }}" value="{{ $item->qty }}" name = "quantity{{ $item->product->id }}" class="form-control">
                                        <span type="button" class="add-quantity" onclick="addQuantity('{{ 'quantity'. $item->product->id }}');">Click me</span>
                                        <span type="button" class="sub-quantity" onclick="subQuantity('{{ 'quantity'.$item->product->id }}');">Click me</span>
                                        <div class="input-group-addon">
                                            <button value="1" class="input-group-addon arrow-right" onclick="cart.update('{{ route('cart.update', $item->rowid) }}', '{{ $item->product->id }}');">Thay đổi giỏ hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- right -->
                        </div>
                        <div class="cost"> {{ $item->price }} đ </div>
                    </div>
                @endforeach
                </div>
                <div> <span class="text-note">Ghi chú:</span> khi bạn thay đổi số lượng sản phẩm hãy bấm chọn "thay đổi giỏ hàng"</div>
                <!-- .cart-content -->
            </div>
        </div>
    </div>
</section>