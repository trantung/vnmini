<section class="bottom">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-7">
                <div class="contact">
                    <h4>liên hệ</h4>
                    <span>VNMINI.NET</span>
                    <address>
                        Địa chỉ : {{ $info->address }} <br>
                        Hotline : {{ $info->mobile }}<br>
                        Email : <a href="mailto:vnmini18@gmail.com">vnmini18@gmail.com</a> <br>
                        Web : <a href ="{{ route('frontend.product.index') }}" >{{ url() }}</a><br>
                    </address>
                    <div class="fb-like"></div>
                    <br />
                    <div class="fb-share-button" data-href="{{ FB_PAGE }}" data-layout="button_count"></div>
                </div>
            </div>
            <input id = "latitude" type="hidden" value="{{ $info->lat }}">
            <input id = "longitude" type="hidden" value="{{ $info->long }}">
            <div class="col-md-5 col-sm-5">
                <div class="map">
                    <div class="col-md-3 col-md-offset-3" id="mapview" style="width:370px;height:250px"></div>
                </div>
            </div>
        </div>
        </div>
</section>
@include('googlemap_script')