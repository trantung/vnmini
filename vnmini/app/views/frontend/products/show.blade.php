@extends('layouts.frontend_master')

@section('css')
	<style type="text/css">
        .main-content .relationship {
  margin-top: 30px;
}
/* line 21, ../sass/vn_mini/_main-content.scss */
.main-content .relationship .table-bordered {
  max-width: 680px;
  border-style: dotted;
  margin: 0 auto;
}
/* line 22, ../sass/vn_mini/_main-content.scss */
.main-content .relationship .table-bordered td, .main-content .relationship .table-bordered tr, .main-content .relationship .table-bordered th {
  border-style: dotted;
  text-align: center;
}
/* line 23, ../sass/vn_mini/_main-content.scss */
.main-content .relationship .table-bordered th {
  background: #f2f2f2;
}
/* line 24, ../sass/vn_mini/_main-content.scss */
.main-content .relationship .table-bordered .red {
  color: #ff0000;
}
/* line 25, ../sass/vn_mini/_main-content.scss */
.main-content .relationship .table-bordered .text-right {
  text-align: right;
}
/* line 26, ../sass/vn_mini/_main-content.scss */
.main-content .relationship .table-bordered button {
  background: #c51230;
  color: white;
  border: none;
  padding: 5px 10px;
  font-size: 12px;
  border-radius: 5px 5px 0 0;
}
    </style>
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