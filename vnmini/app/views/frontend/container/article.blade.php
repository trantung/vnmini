<article class="main-content">
    <div class="container production">
        <div class="row">
        @include('admin.error-message')
            <div class="col-md-8 col-sm-8">
                <div class=" wm-zoom-container my-zoom">
                    <div class="wm-zoom-box">
                        <img src="{{ asset($product->image_url) }}" class="wm-zoom-default-img" alt="alternative text" data-hight-src="{{ asset($product->big_image_url) }}" data-loader-src="{{ asset('img/loader.gif') }}">
                    </div>
                </div>
                <!-- image -->
               
            </div>

            <!-- detail -->
            <div class="col-md-4 col-sm-4 right">
                <div class="">
                    <h2>{{ uniToVni($product->name) }} </h2>
                    <div class="description">
                        <label>Mã sản phẩm :</label> {{ $product->code }} <br>
                        <label>Kích thước :</label> {{ $product->size }} <br>
                        <label>Chất liệu :</label> {{ $product->material }} <br>
                        <label>Hướng dẫn bảo quản :</label>
                            @if(!empty($product->introduce))
                                {{ $product->introduce }}
                            @else
                                {{ 'chưa có' }} 
                            @endif
                             <br>
                        <label>Thông tin khác :</label>
                            @if(!empty($product->information))
                                {{ $product->information }}
                            @else
                                {{ 'chưa có' }} 
                            @endif
                             <br>
                    </div>
                    <div class="cost">
                        @if($product->new_price)
                            <span class="price">{{ $product->origin_price }}<span>đ</span></span>
                            {{ $product->new_price }} <span>đ</span>
                        @else
                            {{ $product->origin_price }} <span>đ</span>
                        @endif
                    </div>
                    @if(!is_null($product->images))
                        <div class="item-thumbnail">
                            <ul>
                            @foreach($product->images as $relate_image)
                                <li><img src="{{ asset($relate_image->image_url) }}"></li>
                            @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-quantity">
                        <label>số lượng</label>
                        <div class="quantity">
                            <input type="text" id="quantity" value="0" name="quantity">
                            <span type="button" id="add-quantity">Click me</span>
                            <span type="button" id="sub-quantity">Click me</span>
                        </div>
                        <h3 style="color:red;" id="qual_require"></h3>
                        @if(Cart::count() > 0)
                            <div class="input-group">
                                <div class="input-group-addon arrow-right">arrow right</div>
                                <a href = "{{ route('cart.index') }}"><button name="buy">Thanh toán</button></a>
                            </div>
                        @endif
                        <div class="input-group">
                            <div class="input-group-addon arrow-down">arrow down</div>
                            <button name="add_cart" id ="button-cart" value="{{ $product->id }}">Thêm vào giỏ</button>
                        </div>
                        <br />
                        @if(!$product->new_price)
                        <div class="block">
                            <h2>{{ nl2br(uniToVni($promotion->title)) }}</h2>
                            <div class="description">
                                {{ $promotion->description }}
                            </div>
                        </div>
                        <br />
                        @endif
                        <div id="success"></div>
                    </div>
                </div>
            </div>
            <!-- left detail -->
            <div class="col-md-8 col-sm-8">
            @if(CommonProduct::getProductRelate($product) !=null)
            <?php 
                $pRelate = CommonProduct::getProductRelate($product);
            ?>
                <div class="relationship">
                    <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th> Sản phẩm </th>
                                <th width="35%"> </th>
                                <th> Giá Vnmini.net</th>
                                <th> Giá khuyến mãi</th>
                                <th> Đặt mua</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($pRelate as $p)
                            <tr>
                                <td>{{ $p->code }}</td>
                                <td> {{ $p->name.' '.$p->type->name }} </td>
                                @if($p->new_price)
                                    <span class="price">{{ $p->origin_price }}<span>đ</span></span>
                                    {{ $p->new_price }} <span>đ</span>
                                @else
                                    {{ $p->origin_price }} <span>đ</span>
                                @endif
                                <td class="red"> {{ $p->discounts }}</td>
                                <td> <button name="add_cart" id ="button-cart" value="{{ $p->id }}">Thêm vào giỏ</button></td>
                            </tr>
                        @endforeach   
                        </tbody>
                    </table>
                   
                </div>
                </div>
            @endif
                <div class="detail">
                    <ul class="nav navbar-nav tabs">
                        <li class="active"><a data-toggle="tab" href="#all-item" class="active" aria-expanded="true">Moâ taû</a></li>
                        <li><a data-toggle="tab" href="#section-1">ñaùnh giaù</a></li>
                    </ul>
                    <div class="tab-content">
                        <div id="all-item" class="tab-pane fade in active">
                            <p>{{ $product->description }} </p>
                        </div>
                        <!-- all-item -->
                        <div id="section-1" class="tab-pane fade">
                            <form class="clearfix" action="{{ route('frontend.product.comment', $product->id) }}" method="post">
                                <div class="form-group">
                                    <label>Họ tên <span class="text-note">*</span></label>
                                    <input type="text" class="form-control" name="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Email <span class="text-note">*</span></label>
                                    <input type="email" class="form-control" name="email" required>
                                </div>
                                <div class="form-group">
                                    <label >Đánh giá </label>
                                    <textarea class="form-control" name="content" required></textarea>
                                </div>
                                <input type="hidden" value="{{ $product->id }} " name="product_id" />
                                <button type="submit"> Gửi đi</button> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</article>

@section('script')
<script type="text/javascript">
    $('.my-zoom').WMZoom({
        config : {
            stageW : 500,
            stageH : 330,
            inner  : false,
            position : 'right', // [top, right, bottom, left]
            margin : 10
        }
    });
    $('#button-cart').on('click', function() {
        $.ajax({
            url: '{{ route("cart.store") }}',
            type: 'post',
            data: {quantity:$('#quantity').val(), product_id:$(this).val()},
            dataType:'json',
            beforeSend: function() {
                $('.alert, .text-danger').remove();
                var msg = '<div class="alert alert-danger">';
        msg+='<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
  msg+='<strong>Lỗi! </strong> Nhập số lượng.</div>';
                $('#button-cart').prop("disabled",true);
                if($('#quantity').val() <= 0 ){
                    $(".quantity").before(msg);
                    $('#button-cart').prop("disabled",false);
                    return false;
                }
            },
            complete: function() {
                $('#button-cart').prop("disabled",false);
            },
            success: function(json) {
                $('.alert, .text-danger').remove();
                if (json['error']) {
                    // Highlight any found errors
                    $("#qual_require").text(json['error']);
                }
                if (json['success']) {
                    var url      = window.location.href;
                    $('#cart').load(url+' #cart');
                    var msg = '<div class="alert alert-success">';
        msg+='<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
  msg+=json['success'];
                    $('#success').after(msg);
                    setTimeout(function(){// wait for 5 secs(2)
                           location.reload(); // then reload the page.(3)
                      }, 3000); 
                }
            }
        });
    });
    //-->
</script>
@stop
<!-- article -->
