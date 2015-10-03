@extends('layouts.frontend_master')

@section('css')

@stop

@section('banner')
    {{-- @include('layouts.frontend_banner') --}}
@stop

@section('content')
    <section class="main-content">
    <div class="container">
        @include('frontend.container.sort_detail', $sort)
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