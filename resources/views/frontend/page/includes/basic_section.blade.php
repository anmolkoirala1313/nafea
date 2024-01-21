
{{--<section class="about-three" style="    padding: 120px 0 0px;">--}}
{{--    <div class="about-three__shape-2 float-bob-y">--}}
{{--        <img class="lazy" data-src="{{asset('assets/frontend/images/shapes/about-three-shape-2.png')}}" alt="">--}}
{{--    </div>--}}
{{--    <div class="container">--}}
{{--        <div class="row">--}}
{{--            <div class="col-xl-6">--}}
{{--                <div class="about-three__left">--}}
{{--                    <div class="about-three__img wow slideInLeft" data-wow-delay="100ms"--}}
{{--                         data-wow-duration="2500ms">--}}
{{--                        <img class="lazy" data-src="{{ asset(imagePath($element->first()->image)) }}" alt="">--}}
{{--                        <div class="about-three__shape-1 zoominout">--}}
{{--                            <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/about-three-shape-1.png') }}" alt="">--}}
{{--                        </div>--}}
{{--                        <div class="about-three__shape-2 float-bob-y">--}}
{{--                            <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/about-three-shape-2.png') }}" alt="">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--            <div class="col-xl-6">--}}
{{--                <div class="about-three__right">--}}
{{--                    <div class="section-title-three text-left">--}}
{{--                        <div class="section-title-three__tagline-box">--}}
{{--                            <p class="section-title-three__tagline">{{ $element->first()->subtitle ?? '' }}</p>--}}
{{--                        </div>--}}
{{--                        <h2 class="section-title-three__title">{{ $element->first()->title ?? '' }}</h2>--}}
{{--                    </div>--}}
{{--                    <div class="about-three__text-2 text-align-justify custom-description">--}}
{{--                        {!! $element->first()->description ?? '' !!}--}}
{{--                    </div>--}}
{{--                    @if($element->first()->button_link)--}}
{{--                        <div class="about-two__btn-box">--}}
{{--                            <a href="{{$element->first()->button_link}}" class="about-one__btn thm-btn">  {{ $element->first()->button ?? 'Reach Out' }}</a>--}}
{{--                        </div>--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</section>--}}

<div class="about__three section-padding">
    <img class="about__three-shape lazy" data-src="{{ asset('assets/frontend/img/shape/about-4.png') }}" alt="">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-6 col-lg-6 lg-mb-30">
                <div class="about__three-left" style="margin-right: 15px;">
                    <img class="about__three-left-shape dark-n lazy" data-src="{{ asset('assets/frontend/img/shape/about-3.png') }}" alt="">
                    <img class="about__three-left-shape light-n" src="{{ asset('assets/frontend/img/shape/about-3-dark.png') }}" alt="">
                    <div class="about__three-left-image">
                        <div class="image-overlay dark__image">
                            <img class="lazy" data-src="{{ asset(imagePath($element->first()->image)) }}" alt="">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6" style="margin-bottom: 75px;">
                <div class="about__three-right">
                    <div class="about__three-right-title" style="margin-bottom: 0px;">
                        <span class="subtitle-two">{{ $element->first()->subtitle ?? '' }}</span>
                        <h2 style="margin-bottom: 10px; line-height: 50px;">{{ $element->first()->title ?? '' }}</h2>
                        <div class="text-align-justify custom-description">
                            {!! $element->first()->description ?? '' !!}
                        </div>
                    </div>
                </div>
                @if($element->first()->button_link)
                    <div class="about__one-right-bottom">
                        <div class="about__one-right-bottom-list">
                            <a class="btn-two" href="{{ $element->first()->button_link ?? '' }}">{{ $element->first()->button }}</a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
