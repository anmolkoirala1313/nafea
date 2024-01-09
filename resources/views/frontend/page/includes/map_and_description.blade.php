<section class="why-choose-one" style="background: #fff">
    <div class="why-choose-one__shape-3 float-bob-y-2">
        <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/why-choose-one-shape-3.png') }}" alt="">
    </div>
    <div class="container">
        <div class="row">
            <div class="col-xl-6">
                <div class="why-choose-one__left">
                    <div class="section-title text-left">
                        <div class="section-title__tagline-box">
                            <p class="section-title__tagline">{{ $element->first()->subtitle ?? '' }}</p>
                        </div>
                        <h2 class="section-title__title section-title_normal">{{ $element->first()->title ?? '' }}
                        </h2>
                    </div>
                    <p class="why-choose-one__text text-align-justify">
                        {{ $element->first()->description ?? '' }}
                    </p>

                    @if($element->first()->button_link)
                        <div class="why-choose-one__btn-box mt-3">
                            <a href="{{$element->first()->button_link}}" class="why-choose-one__btn thm-btn">{{ $element->first()->button ?? 'Explore more' }}</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-xl-6">
                <div class="why-choose-one__right" style="margin-left: 40px;">
                    <div class="why-choose-one__img wow slideInRight animated" data-wow-delay="100ms" data-wow-duration="2500ms" style="visibility: visible; animation-duration: 2500ms; animation-delay: 100ms; animation-name: slideInRight;">
                        <div class="why-choose-one__shape-1 float-bob-x">
                            <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/why-choose-one-shape-1.png') }}" alt="">
                        </div>
                        <div class="why-choose-one__shape-2 float-bob-y">
                            <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/why-choose-one-shape-2.png') }}" alt="">
                        </div>

                        @if($setting_data && $setting_data->google_map)
                            <iframe src="{{ $setting_data->google_map }}" style="border:0;width: 625px;height: 520px;" allowfullscreen="" loading="lazy"></iframe>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

