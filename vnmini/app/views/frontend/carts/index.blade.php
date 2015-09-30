@extends('layouts.frontend_master')

@section('css')

@stop

@section('banner')
    {{-- @include('layouts.frontend_banner') --}}
@stop

@section('content')
    <section class="main-content">
    <div class="container">
        @if(Cart::count() > 0)
            <?php $items = Cart::content(); ?>
            @if(isset($customer))
                @include('frontend.container.cart_order', [$items, $customer])
            @else
                @include('frontend.container.cart_customer', $items)
            @endif
        @else
            {{ 'KHÔNG CÓ SẢN PHÂM NÀO TRONG GIỎ HÀNG' }}
        @endif
        <!-- block 1 -->
        {{-- @include('frontend.container.section2') --}}
        <!-- block 2 -->
        {{-- @include('frontend.container.section3') --}}
        <!-- block 3 -->

    </div>
</section>
@stop

@section('script')

@stop