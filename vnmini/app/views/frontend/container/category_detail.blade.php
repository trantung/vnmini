<div class="block-1">
    <h2 class="block-title">{{ uniToVni($sort->name) }}</h2>
    <div class="bs-example">
    <div class="">                
        <ul class="nav navbar-nav tabs">

            <li class="active">
                <a class="{{ getClass(0, Request::segments()) }}" href="{{ route('frontend.sort.category.product', ['sort_name'=>$sort->name_seo,'sort_id'=>$sort->id, 'cate_id'=>0, 'cate_name'=>'tat-ca']) }}">Tất cả</a>
            </li>
            @foreach($categories as $category)
                <li>
                    <a  class="{{ getClass($category->id, Request::segments()) }}" href="{{ route('frontend.sort.category.product', ['sort_name'=>$sort->name_seo,'sort_id'=>$sort->id, 'cate_id'=>$category->id, 'cate_name'=>$category->name_seo]) }}">
                        {{ $category->name }}
                    </a>
                </li>
            @endforeach       
        </ul>
    </div>
    <div class="tab-content">
        <div id="all-item" class="tab-pane fade in active">
            <div class="row">
                @foreach($products as $product)
                <?php 
                    $name_seo = CommonProduct::getNameSeo($product->name_seo);
                ?>
                    <div class="col-md-3 col-sm-3 col-xs-6">
                        <div class="item">
                            <a href ="{{ route('frontend.product.show', ['name_seo'=>$name_seo,'product_id'=>$product->id]) }}">
                                <img src="{{ asset($product->image_url) }}">
                            </a>
                            <a href ="{{ route('frontend.product.show', ['name_seo'=>$name_seo,'product_id'=>$product->id]) }}">
                                <h3>{{ uniToVni($product->name) }}</h3>
                            </a>
                            <div class="cost">
                            @if(!empty($product->new_price))
                                <span class="price">
                                    {{ get_full_price_in_vnd($product->origin_price) }}<span>đ</span>
                                </span>{{ get_full_price_in_vnd($product->new_price) }}<span>đ</span>
                            @else
                                </span>{{ get_full_price_in_vnd($product->origin_price) }}<span>đ</span>
                            @endif
                            </div>
                            <button class="add-to-cart" onclick="cart.add('{{ route('frontend.product.show', ['name_seo'=>$name_seo,'product_id'=>$product->id]) }}');">Thanh Toán</button>
                        </div>
                    </div>
                @endforeach
            </div>
            <!-- row 1 -->
        </div>
        <!-- all-item -->
    </div>
</div>
<center>{{ $products->appends(Request::except('page'))->links() }}</center>
