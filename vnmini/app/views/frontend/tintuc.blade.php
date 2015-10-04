@extends('layouts.frontend_master')

@section('css')

@stop

@section('banner')
    {{-- @include('layouts.frontend_banner') --}}
@stop

@section('content')
    <section class="main-content">
    <div class="container">
        <section class="main-content page-new">
    <div class="container">
            <div class=" col-md-7 col-sm-7">
                <h1 class="page-title">{{ $article->title }}</h1>
                <div class="new">
                    <div class="content">
                        <img src="{{ asset($article->image_url) }}">
                        {{ $article->description }}
                        </p>
                    </div>
                </div>
            </div>
        <div class=" col-md-5 col-sm-5">
            <div class="sidebar">
                <div class="popular-posts">
                    <h2>baøi ñaêng phoå bieán</h2>
                    <div class="content">
                        <ul>
                        @foreach($news as $key => $new)
                            <li class="item">
                                <div class="item-content clearfix">
                                    <div class="item-thumbnail">
                                        <a href="{{ route('frontend.tintuc.show', $new->id) }}">
                                        <img alt="" border="0"  src="{{ asset($new->image_url) }}" height="150" width="150">
                                        </a>
                                    </div>
                                    <div class="item-title">
                                    <a href="{{ route('frontend.tintuc.show', $new->id) }}">{{ $new->title }}</a>
                                    </div>
                                    <div class="item-snippet">
                                    {{ $new->description }}
                                    </div>
                                </div>
                            </li>
                        @endforeach
                        </ul>
                    </div>
                    <nav>
                      <center>{{ $news->appends(Request::except('page'))->links() }}</center>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</section>

    </div>
</section>
@stop

@section('script')

@stop