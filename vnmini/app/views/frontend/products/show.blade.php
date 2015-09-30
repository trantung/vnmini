@extends('layouts.frontend_master')

@section('css')
	
@stop

@section('banner')
    {{-- @include('layouts.frontend_banner') --}}
@stop

@section('content')
    <section class="main-content">
    <div class="container">
        @include('frontend.container.article', $product)
        @if(!$product_relates->isEmpty())
        	@include('frontend.container.article_relate', $product_relates)
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