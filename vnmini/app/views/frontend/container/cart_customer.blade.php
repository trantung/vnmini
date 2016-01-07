<section class="main-content cart-bill">
    <div class="container">
        <div class="col-md-8 col-sm-8">
            <div class="cart left-bill">
                <h2>thanh toaùn</h2>
                <span class="title-buttom">1. Thông tin thanh toán</span>
                <p class="text-note">Rất cảm ơn quý khách hàng đã chọn mua các sản phẩm tại VNMINI.NET, chúng tôi sẽ liên hệ với bạn theo thông tin nhập phía dưới đây</p>
                <form class="clearfix" method="post" action="{{ route('cart.customer.add') }}">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Họ và tên đệm <span class="text-note">*</span></label>
                                <input type="text" class="form-control" name='fullname' required>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ email</label>
                                <input type="email" class="form-control" name='email'>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Điện thoại liên hệ <span class="text-note">*</span></label>
                                <input type="text" class="form-control" name='phone' minlength="10" required>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ <span class="text-note">*</span></label>
                                <input type="text" class="form-control" name='address' required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <input type="text" class="form-control" name='note'>
                            </div>
                        </div>
                    </div>
                    <div class="row form-bottom">
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Mã khuyến mãi</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-ms-6">
                            <p class="text-note"><span class="text-note">*</span> Yêu cầu nhập thông tin</p>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-default">Gửi đi</button>
                        </div>
                    </div>
                </form>
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
                                            <button value="1" class="input-group-addon arrow-right" onclick="updateCart('{{ route('updateCart') }}', '{{ $item->product->id }}', '{{ $item->rowid }}');">Thay đổi giỏ hàng</button>
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