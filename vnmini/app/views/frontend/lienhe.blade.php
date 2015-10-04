@extends('layouts.frontend_master')

@section('css')

@stop

@section('banner')
    {{-- @include('layouts.frontend_banner') --}}
@stop

@section('content')
    <section class="main-content">
    <div class="container">
        <div class="contact-us">
            <h1 class="page-title ">taát caû nhöõng gì mini ñeàu deã thöông</h1>
            <img src="{{ asset($info->image_url) }}">
            <div class="content">
                {{ $info->description }}
                <br />
                <address>
                    <span>Liên hệ: Vnmini.net. </span><br>
                    Địa chỉ: {{ $info->address }}<br>
                    Hotline: {{ $info->mobile }}<br>
                    Facebook Page: <a href="https://www.facebook.com/Vnmini.net">https://www.facebook.com/Vnmini.net</a><br>
                    Email: <a href="mailto:vnmini18@gmail.com">Vnmini18@gmail.com</a> <br>
                </address>
            </div>
        </div>

    </div>
</section>
@stop

@section('script')

@stop