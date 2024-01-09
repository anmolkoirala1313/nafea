@extends('frontend.layouts.master')
@section('title') Home @endsection
@section('css')

@endsection
@section('content')

    <section class="main-slider">
        <div class="main-slider__carousel owl-carousel owl-theme thm-owl__carousel"
             data-owl-options='{"loop": true, "items": 1, "navText": ["<span class=\"icon-left-arrow\"></span>","<span class=\"icon-right-arrow\"></span>"], "margin": 0, "dots": true, "nav": false, "animateOut": "slideOutDown", "animateIn": "fadeIn", "active": true, "smartSpeed": 1000, "autoplay": true, "autoplayTimeout": 7000, "autoplayHoverPause": false}'>

            @foreach($data['sliders']  as $index=>$slider)
                <div class="item main-slider__slide-{{$index+1}}">
                    <div class="main-slider__bg"
                         style="background-image: url( {{ asset(imagePath($slider->image)) }});">
                    </div><!-- /.slider-one__bg -->

{{--                    <div class="main-slider__shape-1 rotate-me">--}}
{{--                        <img src="{{ asset('assets/frontend/images/shapes/main-slider-shape-1.png') }}" alt="">--}}
{{--                    </div>--}}
                    <div class="main-slider__shape-2 float-bob-x">
                        <img src="{{ asset('assets/frontend/images/shapes/main-slider-shape-2.png') }}" alt="">
                    </div>

                    <div class="container">
                        <div class="main-slider__content" style="    top: -60px;">
                            <p class="main-slider__sub-title">{{ $slider->subtitle ?? '' }}</p>
                            <h2 class="main-slider__title">{{ $slider->title ?? '' }}</h2>
                            @if($slider->link)
                                <div class="main-slider__btn-and-video-box">
                                    <div class="main-slider__btn-box">
                                        <a href="{{ $slider->link ?? '' }}" class="thm-btn main-slider__btn-{{ $loop->even ? '1':'2'}}">{{ $slider->link ?? 'View More' }}</a>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    <!--Main Sllider Start -->

    @if($data['homepage']->mission)
        <section class="feature-two">
            <div class="container">
                <div class="row">

                    <div class="col-xl-4 col-lg-4 d-flex align-items-stretch wow fadeInUp" data-wow-delay="100ms">
                        <div class="feature-two__single">
                            <div class="feature-two__icon">
                                <span class="icon-business-advice"></span>
                            </div>
                            <h3 class="feature-two__title"><a>Mission</a></h3>
                            <p class="feature-two__text">{{ $data['homepage']->mission ?? '' }}</p>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 d-flex align-items-stretch wow fadeInUp" data-wow-delay="200ms">
                        <div class="feature-two__single">
                            <div class="feature-two__icon">
                                <span class="icon-icon-start-ups"></span>
                            </div>
                            <h3 class="feature-two__title"><a>Vision</a></h3>
                            <p class="feature-two__text">{{ $data['homepage']->vision ?? '' }}</p>

                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-4 d-flex align-items-stretch wow fadeInUp" data-wow-delay="300ms">
                        <div class="feature-two__single">
                            <div class="feature-two__icon">
                                <span class="icon-risk-management"></span>
                            </div>
                            <h3 class="feature-two__title"><a>Value</a></h3>
                            <p class="feature-two__text">{{ $data['homepage']->value ?? '' }}</p>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    @endif

    @if($data['homepage']->description)
        <section class="about-two">
            <div class="about-three__shape-5">
                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/about-three-shape-5.png') }}" alt="">
            </div>
            <div class="about-two__shape-2 zoominout">
                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/about-two-shape-2.png') }}" alt="">
            </div>
            <div class="about-two__shape-3 float-bob-y">
                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/about-two-shape-3.png') }}" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-two__left {{ $data['homepage']->image_position == 'left' ? 'custom_left':'' }}">
                            @if($data['homepage']->image_position == 'left')
                                @include($module.'partials.welcome_image')
                            @else
                                @include($module.'partials.welcome_description')
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="about-two__right {{ $data['homepage']->image_position == 'left' ? 'custom_right':'' }}">
                            @if($data['homepage']->image_position == 'right')
                                @include($module.'partials.welcome_image')
                            @else
                                @include($module.'partials.welcome_description')
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

{{--    @if(count($data['jobs']) > 1)--}}
{{--        <section class="news-three">--}}
{{--            <div class="news-three__shape-1 img-bounce">--}}
{{--                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/news-three-shape-1.png') }}" alt="">--}}
{{--            </div>--}}
{{--            <div class="news-three__shape-2 float-bob-y">--}}
{{--                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/news-three-shape-2.png') }}" alt="">--}}
{{--            </div>--}}
{{--            <div class="container">--}}
{{--                <div class="section-title-three text-center">--}}
{{--                    <div class="section-title-three__tagline-box">--}}
{{--                        <p class="section-title-three__tagline">Current demands</p>--}}
{{--                    </div>--}}
{{--                    <h2 class="section-title-three__title">Learn more about our latest<br> jobs</h2>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    @foreach($data['jobs'] as $index=>$job)--}}
{{--                        <div class="col-xl-6 col-lg-6">--}}
{{--                            <div class="news-page-three__single wow fadeInUp" data-wow-delay="{{$index+1}}00ms">--}}
{{--                                <div class="news-page-three__img">--}}
{{--                                    <img class="lazy" data-src="{{ asset(imagePath($job->image)) }}" alt="">--}}
{{--                                </div>--}}
{{--                                <div class="news-page-three__content news-page-three__content_padding">--}}
{{--                                    <ul class="list-unstyled news-page-three__meta">--}}
{{--                                        <li><a href="#"> <span class="icon-date11"></span>--}}
{{--                                                @if(@$job->end_date >= date('Y-m-d'))--}}
{{--                                                    {{date('M j, Y',strtotime(@$job->start_date))}} - {{date('M j, Y',strtotime(@$job->end_date))}}--}}
{{--                                                @else--}}
{{--                                                    Expired--}}
{{--                                                @endif--}}
{{--                                            </a></li>--}}
{{--                                    </ul>--}}
{{--                                    <div class="news-page-three__title-box">--}}
{{--                                        <h3><a href="{{ route('frontend.job.show', $job->slug) }}">{{ $job->title ?? '' }}</a></h3>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                    <div class="portfolio-one__btn-box">--}}
{{--                        <a href="{{ route('frontend.job.index') }}" class="portfolio-one__btn thm-btn">See All Jobs</a>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
{{--    @endif--}}

    @if(count($data['jobs']) > 1)
        <section class="portfolio-three">
            <div class="portfolio-three__shape-1 zoominout">
                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/portfolio-three-shape-1.png') }}" alt="">
            </div>
            <div class="portfolio-three__shape-2 float-bob-y">
                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/portfolio-three-shape-2.png') }}" alt="">
            </div>
            <div class="container">
                <div class="section-title-three text-center">
                    <div class="section-title-three__tagline-box">
                        <p class="section-title-three__tagline">Current demands</p>
                    </div>
                    <h2 class="section-title-three__title">Learn more about our latest<br> jobs</h2>
                </div>
                <div class="row">
                    @foreach($data['jobs'] as $index=>$job)
                        <div class="col-xl-4 col-lg-6 col-md-6">
                            <div class="portfolio-three__single">
                                <div class="portfolio-three__img-box">
                                    <div class="portfolio-three__img">
                                        <img class="lazy" data-src="{{ asset(imagePath($job->image)) }}" alt="">
                                    </div>
                                </div>
                                <div class="portfolio-three__content">
                                    <p class="portfolio-three__sub-title">
                                        @if(@$job->end_date >= date('Y-m-d'))
                                            {{date('M j, Y',strtotime(@$job->start_date))}} - {{date('M j, Y',strtotime(@$job->end_date))}}
                                        @else
                                            Expired
                                        @endif</p>
                                    <h3 class="portfolio-three__title"><a href="{{ route('frontend.job.show', $job->slug) }}">{{ $job->title ?? '' }}</a></h3>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if(count($data['services']) > 0)
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
                        <p class="section-title__tagline">OUR LATEST CATEGORIES</p>
                    </div>
                    <h2 class="section-title__title">Covering All Bases With Our <br> Special Category</h2>
                </div>
                <div class="row">
                    @foreach($data['services'] as $index=>$service)
                        <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="{{$index+1}}00ms">
                            <div class="portfolio-one__single">
                                <div class="portfolio-one__img-box">
                                    <div class="portfolio-one__img">
                                        <img class="lazy" data-src="{{ asset(thumbnailImagePath($service->image)) }}" alt="">
                                    </div>
                                    <div class="portfolio-one__content">
{{--                                        <p class="portfolio-one__sub-title">Business Audit</p>--}}
                                        <h3 class="portfolio-one__title">
                                            <a href="{{ route('frontend.service.show', $service->key) }}">{{ $service->title ?? '' }}</a></h3>
                                    </div>
                                    <div class="portfolio-one__arrow">
                                        <a href="{{ route('frontend.service.show', $service->key) }}" class=""><span
                                                class="icon-top-right-1"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <p class="services-three__bottom-text">Learn more about <a href="{{ route('frontend.service.index') }}" class="all-services">
                        Categories We Have<span class="icon-right-arrow-11"></span></a>
                    <a href="{{ route('frontend.service.index') }}" class="">For you</a></p>
            </div>
        </section>
    @endif


    @if(count( $data['clients']) > 0)
        <section class="brand-one">
            <div class="container">
                <div class="brand-one__inner">
                    <div class="brand-one__carousel thm-owl__carousel owl-theme owl-carousel" data-owl-options='{
                            "items": 3,
                            "margin": 30,
                            "smartSpeed": 700,
                            "loop":true,
                            "autoplay": 6000,
                            "nav":false,
                            "dots":false,
                            "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                            "responsive":{
                                "0":{
                                    "items":1
                                },
                                "768":{
                                    "items":3
                                },
                                "992":{
                                    "items": 4
                                },
                                "1200":{
                                    "items": 5
                                }
                            }
                        }'>
                        @foreach($data['clients'] as $index=>$client)
                            <!--Brand One Single-->
                            <div class="brand-one__single">
                                <div class="brand-one__img">
                                    <a href="{{ $client->link ?? '#' }}" target="{{ ($client->link !== null) ? '_blank':'' }}">
                                        <img src="{{ asset(imagePath($client->image)) }}" alt="">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- If we need navigation buttons -->
                </div>
            </div>
        </section>
    @endif

    @if($data['homepage']->action_title)
        <section class="cta-one">
            <div class="cta-one__shape-1 float-bob-x">
                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/cta-one-shape-1.png') }}" alt="">
            </div>
            <div class="cta-one__shape-2 float-bob-y">
                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/cta-one-shape-2.png') }}" alt="">
            </div>
            <div class="cta-one__shape-3 shape-mover">
                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/cta-one-shape-3.png') }}" alt="">
            </div>
            <div class="cta-one__shape-4 img-bounce">
                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/cta-one-shape-4.png') }}" alt="">
            </div>
            <div class="container">
                <div class="cta-one__inner">
                    <div class="cta-one__title-box">
                        <p class="cta-one__text">{{ $data['homepage']->action_subtitle ?? '' }}</p>
                        <h3 class="cta-one__title">{{ $data['homepage']->action_title ?? '' }}</h3>
                    </div>
                    <div class="cta-one__btn-box">
                        <a href="{{ $data['homepage']->action_link ?? '/contact-us' }}" class="cta-one__btn thm-btn">{{ $data['homepage']->action_button ?? 'Start Here' }}</a>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($data['homepage']->coreValueDetail))
        <section class="services-three">
            <div class="services-three__shape-1 float-bob-y">
                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/services-three-shape-1.png') }}" alt="">
            </div>
            <div class="services-three__shape-2 zoominout">
                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/services-three-shape-2.png') }}" alt="">
            </div>
            <div class="container">
                <div class="section-title text-center">
                    <div class="section-title__tagline-box">
                        <p class="section-title__tagline"> {{ $data['homepage']->core_subtitle ?? '' }}</p>
                    </div>
                    <h2 class="section-title__title">{{ $data['homepage']->core_title ?? '' }}</h2>
                </div>
                <div class="row">

                    @foreach($data['homepage']->coreValueDetail as $index=>$core_value)
                        <div class="col-xl-4 col-lg-6 col-md-6 d-flex align-items-stretch wow fadeInUp" data-wow-delay="{{$index+1}}00ms">
                            <div class="services-three__single">
                                <h3 class="services-three__title">
                                    <a>{{ $core_value->title ?? '' }}</a>
                                </h3>
                                <div class="services-three__icon">
                                    <span class="{{ core_value_icon($index) }}"></span>
                                </div>
                                <p class="services-three__text">
                                    {{ $core_value->description ?? '' }}
                                </p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    @if(count($data['homepage']->recruitmentProcess))
        <section class="process-one">
            <div class="container">
                <div class="section-title text-center">
                    <div class="section-title__tagline-box">
                        <p class="section-title__tagline">Our Flow</p>
                    </div>
                    <h2 class="section-title__title">Understand Our Work process</h2>
                </div>
                <div class="process-one__inner">
                    @foreach($data['homepage']->recruitmentProcess->chunk(4) as $index=>$chunked_process)
                        <div class="process-one__shape-{{$index+1}}">
                            <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/process-one-shape-1.png') }}" alt="">
                        </div>
                        <div class="row">
                            @foreach($chunked_process as $index=>$process)
                                <div class="col-xl-3 col-lg-6 col-md-6 {{ $index > 3 ? 'mt-3':'' }}">
                                    <div class="process-one__single">
                                        <div class="process-one__count"></div>
                                        <h3 class="process-one__title">{{ $process->title ?? '' }}</h3>
                                        <p class="process-one__text">
                                            {{ $process->description ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                </div>
            </div>
        </section>
    @endif

    @if($data['homepage']->why_title)
        <section class="counter-one">
            <div class="container">
                <div class="counter-one__inner">
                    <div class="counter-one__bg float-bob-y"
                         style="background-image: url({{ asset('assets/frontend/images/backgrounds/counter-one-bg.png') }});"></div>
                    <ul class="counter-one__count-list list-unstyled">
                        <li>
                            <div class="counter-one__icon">
                                <span class="icon-icon-years-experience"></span>
                            </div>
                            <div class="counter-one__count count-box">
                                <h3 class="count-text" data-stop="{{ $data['homepage']->project_completed ?? '600' }}" data-speed="1500">00</h3>
                            </div>
                            <p class="counter-one__text">Project Completed</p>
                        </li>
                        <li>
                            <div class="counter-one__icon">
                                <span class="icon-icon-team-members"></span>
                            </div>
                            <div class="counter-one__count count-box">
                                <h3 class="count-text" data-stop="{{ $data['homepage']->happy_clients ?? '560' }}" data-speed="1500">00</h3>
                            </div>
                            <p class="counter-one__text">Happy Clients</p>
                        </li>
                        <li>
                            <div class="counter-one__icon">
                                <span class="icon-icon-successful-project"></span>
                            </div>
                            <div class="counter-one__count count-box">
                                <h3 class="count-text" data-stop="{{ $data['homepage']->visa_approved ?? '785' }}" data-speed="1500">00</h3>
                                <span>+</span>
                            </div>
                            <p class="counter-one__text">Visa Approved</p>
                        </li>
                        <li>
                            <div class="counter-one__icon">
                                <span class="icon-icon-satisfied-clients"></span>
                            </div>
                            <div class="counter-one__count count-box">
                                <h3 class="count-text" data-stop="{{ $data['homepage']->success_stories ?? '650' }}" data-speed="1500">00</h3>
                                <span>+</span>
                            </div>
                            <p class="counter-one__text">Success Stories</p>
                        </li>
                    </ul>
                </div>
            </div>
        </section>

        <section class="why-choose-two">
            <div class="about-one__shape-3 float-bob-y">
                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/about-one-shape-3.png') }}" alt="">
            </div>
            <div class="why-choose-two__shape-3 img-bounce">
                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/why-choose-two-shape-3.png') }}" alt="">
            </div>
            <div class="container">
                <div class="row mt-6">
                    <div class="col-xl-6">
                        <div class="why-choose-two__left">
                            <div class="section-title-three text-left">
                                <div class="section-title-three__tagline-box">
                                    <p class="section-title-three__tagline">{{ $data['homepage']->why_subtitle ?? 'Why Choose Us' }}</p>
                                </div>
                                <h2 class="section-title-three__title">{{ $data['homepage']->why_title }}</h2>
                            </div>
                            <p class="why-choose-two__text text-align-justify">{{ $data['homepage']->why_description ?? '' }}</p>
                        </div>
                    </div>
                    <div class="col-xl-6">
                        <div class="why-choose-two__right">
                            <div class="why-choose-two__img wow slideInRight" data-wow-delay="100ms"
                                 data-wow-duration="2500ms">
                                <img class="lazy" data-src="{{ asset(imagePath($data['homepage']->why_image)) }}" alt="">
                                @if($data['homepage']->why_video)
                                    <div class="about-two__video-link">
                                        <a href="{{ $data['homepage']->why_video }}" class="video-popup">
                                            <div class="about-two__video-icon">
                                                <span class="fa fa-play"></span>
                                                <i class="ripple"></i>
                                            </div>
                                        </a>
                                    </div>
                                @endif
                                <div class="why-choose-two__shape-1 float-bob-y">
                                    <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/why-choose-two-shape-1.png') }}"
                                       alt="">
                                </div>
                                <div class="why-choose-two__shape-2 zoominout">
                                    <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/why-choose-two-shape-2.png') }}"
                                         alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($data['director']) > 0)
        <section class="team-details">
            <div class="pricing-one__shape-1 zoominout">
                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/pricing-one-shape-1.png') }}" alt="">
            </div>
            <div class="news-one__shape-3 rotate-me">
                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/news-one-shape-3.png') }}" alt="">
            </div>
            <div class="news-one__shape-2 float-bob-y">
                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/news-one-shape-2.png') }}" alt="">
            </div>
            <div class="container">
                <div class="section-title text-center">
                    <div class="section-title__tagline-box">
                        <p class="section-title__tagline">Our Flow</p>
                    </div>
                    <h2 class="section-title__title">Understand Our Work process</h2>
                </div>

                <div class="brand-one__inner">
                    <div class="brand-one__carousel thm-owl__carousel owl-theme owl-carousel" data-owl-options='{
                            "items": 1,
                            "margin": 30,
                            "smartSpeed": 700,
                            "loop":true,
                            "autoplay": 6000,
                            "nav":false,
                            "dots":false,
                            "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                            "responsive":{
                                "0":{
                                    "items":1
                                },
                                "768":{
                                    "items":1
                                },
                                "992":{
                                    "items":1
                                },
                                "1200":{
                                    "items":1
                                }
                            }
                        }'>
                        @foreach($data['director'] as $index=>$director)
                            <div class="team-details__inner">
                                <div class="row">
                                    <div class="col-xl-5 col-lg-5">
                                        <div class="team-details__left">
                                            <div class="team-details__img">
                                                <img src="{{ asset(imagePath($director->image)) }}" alt="">
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-xl-7 col-lg-7">
                                        <div class="team-details__right">
                                            <h3 class="team-details__title-1">{{ $director->title ?? '' }}</h3>
                                            <p class="team-details__sub-title">{{ $director->designation ?? '' }}</p>
                                            <p class="team-details__text-1 text-align-justify">{{ $director->description ?? '' }}
                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

            </div>
        </section>
    @endif

    @if($data['homepage']->grievance_title)
        <section class="why-choose-one">
            <div class="why-choose-one__shape-3 float-bob-y-2">
                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/why-choose-one-shape-3.png') }}" alt="">
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-6">
                        <div class="why-choose-one__left">
                            <div class="section-title text-left">
                                <div class="section-title__tagline-box">
                                    <p class="section-title__tagline">{{ $data['homepage']->grievance_subtitle ?? '' }}</p>
                                </div>
                                <h2 class="section-title__title section-title_normal">{{ $data['homepage']->grievance_title ?? '' }}
                                </h2>
                            </div>
                            <p class="why-choose-one__text text-align-justify">
                                {{ $data['homepage']->grievance_description }}
                               </p>

                            @if($data['homepage']->grievance_link)
                                <div class="why-choose-one__btn-box mt-3">
                                    <a href="{{ $data['homepage']->grievance_link }}" class="why-choose-one__btn thm-btn">{{ $data['homepage']->grievance_button ?? 'Contact Us' }}</a>
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

                                @if($data['map'])
                                    <iframe src="{{$data['map']}}" style="border:0;width: 625px;height: 520px;" allowfullscreen="" loading="lazy"></iframe>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($data['testimonials'])>0)
        <section class="testimonial-one">
            <div class="testimonial-one__bg float-bob-x"
                 style="background-image: url({{ asset('assets/frontend/images/backgrounds/testimonial-one-bg.png') }});"></div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-5">
                        <div class="testimonial-one__left">
                            <div class="section-title text-left">
                                <div class="section-title__tagline-box">
                                    <p class="section-title__tagline">Testimonials</p>
                                </div>
                                <h2 class="section-title__title section-title_normal">What our client's <br> says about our
                                    <br> best work.</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-7">
                        <div class="testimonial-one__right">
                            <div class="testimonial-one__carousel owl-carousel owl-theme thm-owl__carousel"
                                 data-owl-options='{
                                    "loop": true,
                                    "autoplay": true,
                                    "margin": 48,
                                    "nav": true,
                                    "dots": false,
                                    "smartSpeed": 500,
                                    "autoplayTimeout": 10000,
                                    "navText": ["<span class=\"icon-right-arrow-1\"></span>","<span class=\"icon-right-arrow-11\"></span>"],
                                    "responsive": {
                                        "0": {
                                            "items": 1
                                        },
                                        "768": {
                                            "items": 1
                                        },
                                        "992": {
                                            "items": 2
                                        },
                                        "1200": {
                                            "items": 1.60999999999
                                        }
                                    }
                                }'>
                                @foreach($data['testimonials'] as $index=>$testimonial)
                                    <div class="testimonial-one__single">
                                        <p class="testimonial-one__text">
                                            {{ $testimonial->description }}
                                        </p>
                                        <div class="testimonial-one__client-info-and-img">
                                            <div class="testimonial-one__client-img">
                                                <img src="{{ asset(imagePath($testimonial->image))}}" alt="">
                                            </div>
                                            <div class="testimonial-one__client-info">
                                                <h3>{{ $testimonial->title ?? '' }}</h3>
                                                <p>{{ $testimonial->position ?? '' }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    @if(count($data['blogs'])>0)
        <section class="news-three" style="padding: 80px 0 90px;">
            <div class="news-three__shape-1 img-bounce">
                <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/news-three-shape-1.png') }}" alt="">
            </div>
        <div class="news-three__shape-2 float-bob-y">
            <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/news-three-shape-2.png') }}" alt="">
        </div>
        <div class="container">
            <div class="section-title-three text-center">
                <div class="section-title-three__tagline-box">
                    <p class="section-title-three__tagline">Latest Blog</p>
                </div>
                <h2 class="section-title-three__title">Learn about our latest<br> news from blog.</h2>
            </div>
            <div class="row">
                @foreach($data['blogs'] as $blog)
                    <div class="col-xl-4 col-lg-4 d-flex align-items-stretch">
                        <div class="news-three__single">
                            <div class="news-three__img-box">
                                <div class="news-three__img">
                                    <img class="lazy" data-src="{{ asset(imagePath($blog->image))}}" alt="">
                                </div>
                                <div class="news-three__date">
                                    <p>{{date('d', strtotime($blog->created_at))}}</p>
                                    <span>{{date('M Y', strtotime($blog->created_at))}}</span>
                                </div>
                            </div>
                            <div class="news-three__content">
                                <ul class="news-three__meta list-unstyled">
                                    <li>
                                        <p><span class="icon-report"></span> {{ $blog->blogCategory->title ?? '' }}</p>
                                    </li>
                                </ul>
                                <h3 class="news-three__title"><a href="{{ route('frontend.blog.show', $blog->slug) }}">
                                        {{ $blog->title ?? '' }}</a></h3>
                                <div class="news-three__btn">
                                    <a href="{{ route('frontend.blog.show', $blog->slug) }}">Learn More<span class="icon-right-arrow1"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif
@endsection

@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
@endsection
