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
                        <p>Mã số đơn hàng của bạn là: <span>235</span>. <br> Chúng tôi đã tải hóa đơn này qua email của bạn để bạn tiện lưu trũ. Bạn hãy kiểm tra email xem đã nhận được hay <br>chưa, nếu chưa nhận được hãy liên lạc với chúng tôi để chúng tôi xử lý sự cố này và gửi lại bạn.</p>
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