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
                                <input type="text" class="form-control" name='name'>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ email</label>
                                <input type="email" class="form-control" name='email'>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="form-group">
                                <label>Điện thoại liên hệ <span class="text-note">*</span></label>
                                <input type="text" class="form-control" name='phone'>
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ <span class="text-note">*</span></label>
                                <input type="text" class="form-control" name='address'>
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
                                <input type="text" class="form-control" name='code'>
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
                                <img src="{{ $item->product->image_url }}">
                            </div>
                            <!-- left -->
                            <div class="col-xs-8  col-sm-12 col-md-8">
                                <form class="form-quantity">
                                    <label>Số lượng</label>
                                    <div class="quantity input-group">
                                        <input type="text" id="quantity" value="{{ $item->qty }}" class="form-control">
                                        <span type="button" id="add-quantity">Click me</span>
                                        <span type="button" id="sub-quantity">Click me</span>
                                        <div class="input-group-addon">
                                            <button type="submit" value="1" class="input-group-addon arrow-right">Thay đổi giỏ hàng</button>
                                        </div>
                                    </div>
                                </form>
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