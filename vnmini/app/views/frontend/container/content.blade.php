@foreach($sorts as $sort)
    <div class="block-1">
        <h2 class="block-title">{{ $sort->name }}</h2>
        <div class="bs-example">
        <div class="">                
            <ul class="nav navbar-nav tabs">
                <li class="active">
                    <a data-toggle="tab" href="#all-item" class="first">Tất cả</a>
                </li>
                @foreach($sort->categories as $category)
                    <li>
                        <a data-toggle="tab" href="#category-{{ $category->id }}">
                            {{ $category->name }}
                        </a>
                    </li>
                @endforeach       
            </ul>
        </div>
            <div class="tab-content">
            <?php 
                $category_ids = CommonSort::getCategoryId($sort);
                $products = CommonProduct::getAllProduct($category_ids);
            ?>
                <div id="all-item" class="tab-pane fade in active">
                    <div class="row">
                        @foreach($products as $product)
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <div class="item">
                                    <a href ="{{ route('frontend.product.show', $product->id) }}">
                                        <img src="{{ asset($product->image_url) }}">
                                    </a>
                                    <a href ="{{ route('frontend.product.show', $product->id) }}">
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
                                    <button class="add-to-cart" onclick="cart.add('{{ route('frontend.product.show', $product->id) }}');">Thêm vào giỏ</button>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- row 1 -->
                </div>
                <!-- all-item -->
            @foreach($sort->categories as $category)
                <?php 
                    $products = CommonCategory::getProduct($category);
                ?>
                <div id="category-{{ $category->id }}" class="tab-pane fade">
                    <div class="row">
                    @foreach($products as $key => $product)
                        <div class="col-md-3 col-sm-3 col-xs-6">
                            <div class="item">
                                <a href ="{{ route('frontend.product.show', $product->id) }}">
                                    <img src="{{ asset($product->image_url) }}">
                                </a>
                                <a href ="{{ route('frontend.product.show', $product->id) }}">
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
                                <button class="add-to-cart" onclick="cart.add('{{ route('frontend.product.show', $product->id) }}');">Thêm vào giỏ</button>
                            </div>
                        </div>
                        @if($key%4 == 0)
                            </div> {{-- close row and create new row (line) --}}
                            <div class="row">
                        @endif
                    @endforeach    
                    </div>
                    <!-- row 1 -->
                </div>
            @endforeach
                <!-- category-1 -->
            </div>
        </div>
    </div>
@endforeach