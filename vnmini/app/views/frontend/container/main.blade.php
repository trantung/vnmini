@foreach($sorts as $sort)
    <?php 
        $sort_name = CommonProduct::getNameSeo($sort->name);
    ?>
    <div class="block-1">
        <h2 class="block-title">{{ uniToVni($sort->name) }}</h2>
        <div class="bs-example">
        @if($sort->id !=3)
            <div class="">                
                <ul class="nav navbar-nav tabs">
                    <li class="active">
                        <a href="{{ route('frontend.sort.category.product', ['sort_name'=>$sort_name,'sort_id'=>$sort->id, 'cate_id'=>0, 'cate_name'=>'tat-ca']) }}" class="first">Tất cả</a>
                    </li>
                    <?php 
                        $sub_cate = $sort->categories()->orderBy("weight_number", 'asc')->get();
                    ?>
                    @foreach($sub_cate as $category)
                        <?php 
                            $cate_name = CommonProduct::getNameSeo($category->name);
                        ?>
                        <li>
                            <a href="{{ route('frontend.sort.category.product', ['sort_name'=>$sort_name,'sort_id'=>$sort->id, 'cate_id'=>$category->id, 'cate_name'=>$cate_name]) }}">
                                {{ $category->name }}
                            </a>
                        </li>
                    @endforeach       
                </ul>
            </div>

        @endif
            <div class="tab-content">
            <?php 
                $category_ids = CommonSort::getCategoryId($sort->id);
                $products = CommonProduct::getAllProduct($category_ids);
            ?>
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
    </div>
@endforeach