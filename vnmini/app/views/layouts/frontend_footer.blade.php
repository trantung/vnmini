<section class="bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-5 col-xs-10">
                <div class="contact">
                    <h4>liên hệ</h4>
                    <span>{{ $footer->contact }}</span>
                    <address>
                        Địa chỉ : {{ $footer->address }} <br>
                        Hotline : {{ $footer->hotline }}<br>
                        Email : <a href="mailto:vnmini18@gmail.com">{{ $footer->email }}</a> <br>
                        Web : <a href ="{{ route('frontend.product.index') }}" >{{ url() }}</a><br>
                    </address>
                    <div class="fb-like" data-send="false" data-layout="button_count" data-width="90" data-show-faces="true" data-font="lucida grande"></div>
                    <br />
                    <div class="fb-share-button" data-href="{{ FB_PAGE }}" data-layout="button_count"></div>
                </div>
            </div>
            <input id = "latitude" type="hidden" value="{{ $info->lat }}">
            <input id = "longitude" type="hidden" value="{{ $info->long }}">
            <div class="col-md-5 col-sm-2 col-xs-3">
                <div class="map">
                    <div class="col-md-3 col-md-offset-2 col-sm-2 col-xs-2 " id="mapview" style="width:320px;height:250px; margin-right: 3px !important;"></div>
                </div>
            </div>
        </div>
        </div>
</section>
@include('googlemap_script')