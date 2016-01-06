<article class="main-content">
    <div class="container production">
        <div class="row">
        @include('admin.error-message')
            <div class="col-sm-8">

                <div class="row">
                    <div class="col-sm-6">
                        @if(!is_null($product->images))
                        <div class="detail_image">
                        <ul id="etalage">
                            <li>
                                <img class="etalage_source_image" src="{{ asset($product->image_url) }}" title="" />
                                <!--<img class="etalage_thumb_image" src="imgs/detail1a.jpg" />-->
                            </li>
                            @foreach($product->images as $relate_image)
                            <li>
                                <img class="etalage_source_image" src="{{ asset($relate_image->image_url) }}" title="" />
                                <!--<img class="etalage_thumb_image" src="imgs/detail1a.jpg" />-->
                            </li>
                            @endforeach
                        </ul>
                        <div class="clearfix"></div>
                        </div>
                        @endif
                    </div>
                    <div class="col-sm-6"></div>
                </div>

                @if(CommonProduct::getProductRelate($product) !=null)
                <?php
                    $pRelate = CommonProduct::getProductRelate($product);
                ?>
                <div class="relationship">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th> Mã sản phẩm </th>
                                    <th> Tên Sản phẩm </th>
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
                                    <td>{{ get_full_price_in_vnd($p->origin_price) }} <span> đ</span></td>
                                    <td class="red"> <?php if($p->new_price > 0){echo get_full_price_in_vnd($p->new_price) . '<span> đ</span>';} ?></td>
                                    <td> <button name="add_cart" id ="button-cart" onclick="addCart({{ $p->id }})" value="{{ $p->id }}">Thêm vào giỏ</button></td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="clearfix"></div>
                @endif
            </div>

            <!-- detail -->
            <div class="col-md-4 col-sm-4">
                <div class="detail_content">
                    <h1>{{ uniToVni($product->name) }} </h1>
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
                            <span class="price">{{ get_full_price_in_vnd($product->origin_price) }}<span>đ</span></span>
                            {{ get_full_price_in_vnd($product->new_price) }} <span>đ</span>
                        @else
                            {{ get_full_price_in_vnd($product->origin_price) }} <span>đ</span>
                        @endif
                    </div>

                    <div class="form-quantity">
                        <label>số lượng</label>
                        <div class="quantity">
                            <input type="text" id="quantity" value="1" name="quantity">
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
                            <button name="add_cart" id ="button-cart" onclick="addCart({{ $product->id }})" value="{{ $product->id }}">Thêm vào giỏ</button>
                        </div>
                        <br />
                        @if(!$product->new_price)
                        <div class="block">
                            <h2>{{ nl2br(uniToVni($promotion->title)) }}</h2>
                            <div class="description">
                                {{ $promotion->description }}
                            </div>
                        </div>
                        @endif
                        <div id="success"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-sm-12">

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
    function addCart(product_id)
    {
        $.ajax({
            url: '{{ route("cart.store") }}',
            type: 'post',
            data: {quantity:$('#quantity').val(), product_id:product_id},
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
    }
</script>

<script type="text/javascript">
    jQuery(document).ready(function(){

        var src_img_width = 900;
        var src_img_height = 900;
        var width, height, thumb_position, small_thumb_count;
        small_thumb_count = 4;
        width = jQuery(".detail_image").width()-10;
        height = width;
        thumb_position = "bottom";

        $('#etalage').etalage({
            thumb_image_width: width,
            thumb_image_height: height,
            source_image_width: src_img_width,
            source_image_height: src_img_height,
            zoom_area_width: width,
            zoom_area_height: height,
            zoom_enable: false,
            small_thumbs:small_thumb_count,
            smallthumb_hide_single: false,
            smallthumbs_position: thumb_position,
            small_thumbs_width_offset: 0,
            show_hint: false,
            show_icon: false,
            autoplay: false
        });

        if(jQuery(window).width()<768){
            jQuery(".etalage li.etalage_thumb").zoom();
        }
    });
</script>

@stop
<!-- article -->
