@extends('layouts.frontend_master')

@section('css')

@stop

@section('banner')
    {{-- @include('layouts.frontend_banner') --}}
@stop

@section('content')
    <section class="main-content">
    <div class="container">
      <section class="main-content">
        <div class="container">
            <div class=" col-md-6">
                <div class="order row">
                    <h2>ñôn haøng ñaõ nhaän ñöôïc</h2>
                    <div class="content">
                        <p> <strong>cảm ơn bạn đã đặt mua sản phẩm của chúng tôi ! </strong></p>
                        <p>Mã số đơn hàng của bạn là: <strong>{{ $code }}</strong>. <br> {{ Config::get('cart_complete.message') }}</p>
                    </div>
                    <a href ="/">
                      <button>Tiếp tục mua hàng</button>
                    </a>
                </div>
            </div>
            
        </div>
      </section>

    </div>
</section>
@stop