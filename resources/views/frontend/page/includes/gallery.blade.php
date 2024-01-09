



{{--<section class="pt60 pb90 bgc-f8">--}}
{{--    <div class="container">--}}
{{--        <div class="col-lg-6 m-auto wow fadeInUp" data-wow-delay="300ms">--}}
{{--            <div class="main-title2 text-start text-md-center">--}}
{{--                <h2 class="title">{{ $element->list_number_1 ?? '' }}</h2>--}}
{{--                <p class="paragraph">{{ $element->list_number_2 ?? '' }}</p>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="row mb30 mt10 wow fadeInUp" data-wow-delay="300ms">--}}
{{--            @foreach($element->pageSectionGalleries as $gallery)--}}
{{--                <div class="item col-md-4">--}}
{{--                    <div class="sp-img-content">--}}
{{--                        <a class="popup-img preview-img-2 sp-img mb30" href="{{ asset(galleryImagePath('section_element').$gallery->resized_name) }}" style="width: 400px;height: 300px;border-radius: 12px;">--}}
{{--                            <img class="w-100" src="{{ asset(galleryImagePath('section_element').$gallery->resized_name) }}" alt="" style="object-fit: cover;">--}}
{{--                        </a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endforeach--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}
<section class="portfolio-one">
    <div class="portfolio-one__shape-1 float-bob-x">
        <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/portfolio-one-shape-1.png') }}" alt="">
    </div>
    <div class="portfolio-one__shape-2 rotate-me">
        <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/portfolio-one-shape-2.png') }}" alt="">
    </div>
    <div class="container">
        <div class="section-title text-center">
            <div class="section-title__tagline-box">
                <p class="section-title__tagline">{{ $element->list_number_2 ?? '' }}</p>
            </div>
            <h2 class="section-title__title">{{ $element->list_number_1 ?? '' }}</h2>
        </div>
        <div class="row">
            @foreach($element->pageSectionGalleries as $index=>$gallery)

            <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInDown" data-wow-delay="{{$index+1}}00ms">
                <div class="portfolio-one__single">
                    <div class="portfolio-one__img-box">
                        <div class="portfolio-one__img">
                            <img class="{{ @$page_detail->slug=='legal-document' || @$page_detail->slug=='legal-documents' || @$page_detail->slug=='sample-documents' || @$page_detail->slug=='sample-document' ? '':'image-dimension' }}" src="{{ asset(galleryImagePath('section_element').$gallery->resized_name) }}" alt="">
                        </div>
                        <div class="portfolio-one__arrow">
                            <a href="{{ asset(galleryImagePath('section_element').$gallery->resized_name) }}" class="img-popup"><span
                                    class="icon-top-right-1"></span></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>

    </div>
</section>

