@extends('layouts.frontend_master')

@section('css')

@stop

@section('banner')
    {{-- @include('layouts.frontend_banner') --}}
@stop

@section('content')
    <section class="main-content">
        <div class="container">
            @if(!isset($categories))
                @include('frontend.container.sort_detail', compact('sort'))
            @else
                @include('frontend.container.category_detail', compact('products', 'categories', 'sort'))
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