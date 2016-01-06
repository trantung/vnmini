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
                                <th > Tổng tiền</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($items as $item)
                            <tr>
                                <td width="50%">{{ $item->name }}</td>
                                <td >{{ get_full_price_in_vnd($item->price) }} đ</td>
                                <td >{{ $item->qty }}</td>
                                <td >{{ get_full_price_in_vnd($item->subtotal) }} đ</td>
                            </tr>
                        @endforeach
                            <tr>
                                <td colspan="4" class="text-left"><strong>
                                Có {{returnDiscount($items)[0]}} sản phẩm thường 
                                @if(returnDiscount($items)[0] >1)
                                    (khuyến mãi {{ Discount::getDiscount() }}%)
                                @endif
                                và {{ returnDiscount($items)[1] }} sản phẩm khuyến mãi
                               </strong></td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right">Tổng cộng</td>
                                <td >{{ get_full_price_in_vnd(Cart::total()) }} đ</td>
                            </tr>
                            <tr>
                                <td colspan="3" class="text-right">Chiết khấu</td>
                                <td>@if($value_discount)
                                        {{ Discount::getDiscount() }}%
                                    @else
                                        Không có discount
                                    @endif
                                </td>
                            </tr>
                            
                            <tr>
                                <td colspan="3" class="text-right"><strong>Tổng tiền thanh toán</strong></td>
                                <td ><strong>{{ get_full_price_in_vnd($value) }} đ</strong></td>
                            </tr>
                        </tbody>
                    </table>
                   
                </div>
                 <button type="submit" class="pull-right">Nhận hóa đơn</button>
                 <input type="hidden" value="{{ $value }}" name="value">
                 <input type="hidden" value="{{ $value_origin }}" name="value_origin">
                 <input type="hidden" value="{{ $value_discount }}" name="value_discount">
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
                                            <button value="1" class="input-group-addon arrow-right" onclick="cart.update('{{ route('cart.update', $item->product->id) }}', '{{ $item->product->id }}');">Thay đổi giỏ hàng</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- right -->
                        </div>
                        <div class="cost"> {{ get_full_price_in_vnd($item->price) }} đ </div>
                    </div>
                @endforeach
                </div>
                <div> <span class="text-note">Ghi chú:</span> khi bạn thay đổi số lượng sản phẩm hãy bấm chọn "thay đổi giỏ hàng"</div>
                <!-- .cart-content -->
            </div>
        </div>
    </div>
</section>