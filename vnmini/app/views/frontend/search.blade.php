@extends('layouts.frontend_master')

@section('css')

@stop

@section('banner')
    {{-- @include('layouts.frontend_banner') --}}
@stop

@section('content')
<section class="main-content">
    <div class="container">
        <div class="block-1">
            <h2 class="block-title search-result">{{ uniToVni('KẾT QUẢ') }}</h2>
            <div>Tìm thấy {{ count($results) }} sản phẩm</div>
            <br/>
            <div class="bs-example">
                <div class="tab-content">
                    <div id="all-item" class="tab-pane fade in active">
                        <div class="row">
                        @foreach($results as $product)
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <div class="item">
                                    <a href ="{{ route('frontend.product.show', ['name_seo'=>$product->name_seo,'product_id'=>$product->id]) }}">
                                        <img src="{{ asset($product->image_url) }}">
                                    </a>
                                    <a href ="{{ route('frontend.product.show', ['name_seo'=>$product->name_seo,'product_id'=>$product->id]) }}">
                                        <h3>{{ uniToVni($product->name) }}</h3>
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
            </div>
        </div>
    </div>
</section>
@stop

@section('script')

@stop
