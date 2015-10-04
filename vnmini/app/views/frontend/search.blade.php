@extends('layouts.frontend_master')

@section('css')

@stop

@section('banner')
    {{-- @include('layouts.frontend_banner') --}}
@stop

@section('content')
    <div id="section-1">
        <div class="row">
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="item">
                    <img src="images/page-image/item-1.png">
                    <h3>Voøng ñaù maét hoå naâu vaøng</h3>
                    <div class="cost"> 300.000 <span>đ</span></div>
                    <button class="add-to-cart">Thêm vào giỏ</button>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="item">
                    <img src="images/page-image/item-2.png">
                    <h3>Voøng ñaù nham thaïch nuùi löûa</h3>
                    <div class="cost"> 300.000 <span>đ</span></div>
                    <button class="add-to-cart">Thêm vào giỏ</button>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="item">
                    <img src="images/page-image/item-3.png">
                    <h3>Voøng ñaù thaïch anh tím</h3>
                    <div class="cost"> 300.000 <span>đ</span></div>
                    <button class="add-to-cart">Thêm vào giỏ</button>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 col-xs-6">
                <div class="item">
                    <img src="images/page-image/item-4.png">
                    <h3>Voøng ñaù thaïch anh hoàng</h3>
                    <div class="cost"> 300.000 <span>đ</span></div>
                    <button class="add-to-cart">Thêm vào giỏ</button>
                </div>
            </div>
        </div>
        <!-- row 1 -->
    </div>
@stop

@section('script')

@stop
