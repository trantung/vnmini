@extends('layouts.frontend_master')

@section('css')

@stop

@section('banner')
    {{-- @include('layouts.frontend_banner') --}}
@stop

@section('content')
<section class="main-content">
    <div class="container">
        <div class="block-1">
            <h2 class="block-title search-result">{{ uniToVni('KẾT QUẢ') }}</h2>
            <div>Tìm thấy {{ count($news) }} tin tức</div>
            <br/>
            <div class="bs-example">
                <div class="tab-content">
                    <div id="all-item" class="tab-pane fade in active">
                        <div class="row">
                        @foreach($news as $new)
                            <div class="col-md-3 col-sm-3 col-xs-6">
                                <div class="item">
                                    <a href ="{{ route('frontend.tintuc.show', $new->id) }}">
                                        <img src="{{ asset($new->image_url) }}">
                                    </a>
                                    <a href ="{{ route('frontend.tintuc.show', $new->id) }}">
                                        <h3>{{ uniToVni($new->title) }}</h3>
                                    </a>
                            </div>
                        @endforeach
                        </div>
                        <center>{{ $news->appends(Request::except('page'))->links() }}</center>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop

@section('script')

@stop
