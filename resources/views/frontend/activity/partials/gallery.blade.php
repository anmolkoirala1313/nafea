<div class="galleries position-relative border-bottom">
    <div class="slick-slider slider-for-01 arrow-haft-inner mx-0" data-slick-options='{"slidesToShow": 1, "autoplay":false,"dots":false,"arrows":true,"asNavFor": ".slider-nav-01"}'>
        @foreach($data['row']->packageGalleries as $gallery)
            <div class="box px-0">
                <div class="item item-size-3-2">
                    <div class="card p-0 hover-change-image">
                        <a href="{{ asset(galleryImagePath('package').$gallery->resized_name) }}" class="card-img" data-gtf-mfp="true" data-gallery-id="04" style="background-image:url('{{ asset(galleryImagePath('package').$gallery->resized_name) }}')">
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="slick-slider slider-nav-01 mt-4 mx-n1 arrow-haft-inner" data-slick-options='{"slidesToShow": 5, "autoplay":false,"dots":false,"arrows":false,"asNavFor": ".slider-for-01","focusOnSelect": true,"responsive":[{"breakpoint": 768,"settings": {"slidesToShow": 4}},{"breakpoint": 576,"settings": {"slidesToShow": 2}}]}'>
        @foreach($data['row']->packageGalleries as $gallery)
            <div class="box pb-6 px-0">
                <div class="bg-hover-white p-1 shadow-hover-xs-3 h-90 rounded-lg">
                    <img src="{{ asset(galleryImagePath('package').$gallery->resized_name) }}" alt="Gallery 01" class="h-100 w-100 rounded-lg">
                </div>
            </div>
        @endforeach
    </div>
</div>

