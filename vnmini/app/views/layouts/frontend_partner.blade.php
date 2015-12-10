<section class="partner">
    <div class="container">
    <h2 class="block-title"><span> Đối tác</span></h2>
        <div class="slider slick-auto">
        @foreach($partner_slider as $key => $slider)
            <div>
                <img src="{{ asset($slider->image_url) }}" alt="{{ 'slider '.$key }}">
            </div>
        @endforeach
        </div>
    </div>
</section>