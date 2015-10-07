<section class="main-content correlate">
    <div class="container">
        <h2 class="block-title"><span>Saûn phaåm lieân quan</span></h2>
        <div class="row">
            <div class="slider slick-auto-2">
            @foreach($product_relates as $product)
                <div>
                    <div class="item">
                        <a href ="{{ route('frontend.product.show', ['name_seo'=> $product->name_,'product_id'=>$product->id]) }}">
                            <img src="{{ asset($product->image_url) }}">
                        </a>
                        <a href ="{{ route('frontend.product.show', ['name_seo'=>$product->name_seo,'product_id'=>$product->id]) }}">
                            <h3>{{ $product->name }}</h3>
                        </a>
                        <div class="cost">
                            @if(!empty($product->new_price))
                                <span class="price">
                                    {{ $product->origin_price }}<span>đ</span>
                                </span>{{ $product->new_price }}<span>đ</span>
                            @else
                                </span>{{ $product->origin_price }}<span>đ</span>
                            @endif
                        </div>
                        <button class="add-to-cart" onclick="cart.add('{{ route('frontend.product.show', ['name_seo'=>$product->name_seo,'product_id'=>$product->id]) }}');">Thêm vào giỏ</button>
                    </div>
                </div>
            @endforeach
            </div>
        </div>
    </div>
</section>
<!-- .correlate -->