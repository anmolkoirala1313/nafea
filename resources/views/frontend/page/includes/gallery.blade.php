<div class="portfolio__three-page section-padding" style="    background: var(--color-4);">
    <div class="shape-slide">
        <div class="sliders scroll">
            <img src="{{ asset('assets/frontend/img/shape/services-1.png') }}" alt="service-shape">
        </div>
        <div class="sliders scroll">
            <img src="{{ asset('assets/frontend/img/shape/services-1.png') }}" alt="service-shape">
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 text-center">
                <div class="about__four-right-title mb-0">
                    @if($element->list_number_2)
                    <span class="subtitle-four" style="margin-bottom: 10px;">{{ $element->list_number_1 ?? '' }}</span>
                    @endif
                    <h2 style="width: 50%;margin:auto;line-height: 50px;">{{ $element->list_number_2 ?? '' }}</h2>
                </div>
            </div>
        </div>
        <div class="footer__one-widget-gallery-area four mt-5">
            @foreach($element->pageSectionGalleries as $index=>$gallery)
                <div class="footer__one-widget-gallery-area-item">
                    <a class="img-popup" href="{{ asset(galleryImagePath('section_element').$gallery->resized_name) }}">
                        <img src="{{ asset(galleryImagePath('section_element').$gallery->resized_name) }}"
                             class="{{ @$page_detail->slug=='legal-document' || @$page_detail->slug=='legal-documents' || @$page_detail->slug=='sample-documents' || @$page_detail->slug=='sample-document' ? '':'image-dimension' }}"
                             alt="">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>

