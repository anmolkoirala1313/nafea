@extends('frontend.layouts.master')
@section('title') Home @endsection
@section('css')

@endsection
@section('content')

    <div class="banner__one swiper banner-slider">
        <div class="banner__two-shape">
{{--            <img class="banner__two-shape-two left-right-animate" src="{{ asset('assets/frontend/img/shape/banner-3.png') }}" alt="banner-shape">--}}
{{--            <img class="banner__two-shape-three" src="{{ asset('assets/frontend/img/shape/banners-2.png') }}" alt="banner-shape">--}}
{{--            <img class="banner__two-shape-four" src="{{ asset('assets/frontend/img/shape/banners-3.png') }}" alt="banner-shape">--}}
        </div>
        <div class="swiper-wrapper">
            @foreach($data['sliders']  as $index=>$slider)
                <div class="swiper-slide">
                    <div class="banner__one-image dark-n" data-background="{{ asset(imagePath($slider->image)) }}"></div>
                    <div class="banner__one-image light-n" data-background="{{ asset(imagePath($slider->image)) }}"></div>
                    <div class="container">
                        <div class="row">
                            <div class="col-xl-12">
                                <div class="banner__two-content">
                                    <span data-animation="fadeInUp" data-delay=".3s">{{ $slider->subtitle ?? '' }}</span>
                                    <h1 data-animation="fadeInUp" data-delay=".7s" style="color:#fff;width: 70%">{{ $slider->title ?? '' }}</h1>
                                    @if($slider->link || $slider->video_link)
                                        <div class="banner__two-content-button" data-animation="fadeInUp" data-delay="1s">
                                            @if($slider->link)
                                                <a class="btn-two" href="{{ $slider->link ?? '#' }}">{{ $slider->button ?? 'Discover More' }}</a>
                                            @endif
                                            @if($slider->video_link)
                                                    <div class="banner__two-content-button-video video-pulse">
                                                    <a class="video-popup" href="{{ $slider->video_link }}"><i class="fas fa-play"></i></a>
                                                </div>
                                            @endif
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="banner__one-arrow">
            <div class="banner__one-arrow-prev swiper-button-prev"><i class="fal fa-long-arrow-left"></i></div>
            <div class="banner__one-arrow-next swiper-button-next"><i class="fal fa-long-arrow-right"></i></div>
        </div>
    </div>

    @if($data['homepage']->description)
        <div class="about__one section-padding" >
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 lg-mb-30">
                        @if($data['homepage']->image_position == 'left')
                            @include($module.'partials.welcome_image')
                        @else
                            @include($module.'partials.welcome_description')
                        @endif
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        @if($data['homepage']->image_position == 'right')
                            @include($module.'partials.welcome_image')
                        @else
                            @include($module.'partials.welcome_description')
                        @endif
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($data['homepage']->mission)
        <div class="features">
            <img class="services__two-shape-one dark-n" src="{{asset('assets/frontend/img/shape/services-3.png')}}" alt="services-shape">
            <img class="services__two-shape-two dark-n" src="{{asset('assets/frontend/img/shape/services-2.png')}}" alt="services-shape">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="features-area">
                            <div class="features-area-item d-flex align-items-stretch">
                                <div class="features-area-item-icon">
                                    <i class="flaticon-mission"></i>
                                </div>
                                <div class="features-area-item-content">
                                    <h4>Mission</h4>
                                    <p class="text-align-justify">{{ $data['homepage']->mission ?? '' }}</p>
                                </div>
                            </div>
                            <div class="features-area-item features-area-item-hover d-flex align-items-stretch">
                                <div class="features-area-item-icon">
                                    <i class="flaticon-winner"></i>
                                </div>
                                <div class="features-area-item-content">
                                    <h4>Vision</h4>
                                    <p class="text-align-justify">{{ $data['homepage']->vision ?? '' }}</p>
                                </div>
                            </div>
                            <div class="features-area-item d-flex align-items-stretch">
                                <div class="features-area-item-icon">
                                    <i class="flaticon-value"></i>
                                </div>
                                <div class="features-area-item-content">
                                    <h4>Value</h4>
                                    <p class="text-align-justify">{{ $data['homepage']->value ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if($data['homepage']->action_title)
        <div class="cta__three section-padding" data-background="{{ asset('assets/frontend/img/pages/bread-bg8.jpeg') }}">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-5 lg-mb-30">
                        <div class="cta__three-title">
                            <span class="subtitle-four">{{ $data['homepage']->action_subtitle ?? '' }}</span>
                            <h2>{{ $data['homepage']->action_title ?? '' }}</h2>
                            <a class="btn-two mt-30" href="{{ $data['homepage']->action_link ?? '/contact-us' }}">{{ $data['homepage']->action_button ?? 'Start Here' }}</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-7">
                        <div class="cta__three-info">
                            <div class="cta__three-info-item">
                                <div class="cta__three-info-item-icon">
                                    <i class="fal fa-phone-alt icon-animation"></i>
                                </div>
                                <div>
                                    <span>Call us </span>
                                    <h6><a href="tel:{{ $data['setting']->phone ?? $data['setting']->mobile  }}">{{ $data['setting']->phone ?? $data['setting']->mobile  }}</a></h6>
                                </div>
                            </div>
                            <div class="cta__three-info-item">
                                <div class="cta__three-info-item-icon">
                                    <i class="fal fa-envelope-open-text"></i>
                                </div>
                                <div>
                                    <span>Mail us anytime</span>
                                    <h6><a href="mailto:{{ $data['setting']->email ?? '' }}">{{ $data['setting']->email ?? '' }}</a></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(count($data['homepage']->recruitmentProcess))
        <div class="work__area section-padding">
            <img class="work__area-shape" src="{{asset('assets/frontend/img/shape/work.png')}}" alt="work-shape">
            <div class="container">
                <div class="row mb-60">
                    <div class="col-xl-12">
                        <div class="work__area-title t-center">
                            <span class="subtitle-four">{{ $data['homepage']->recruitment_subtitle ?? 'How it Works' }}</span>
                            <h2>{{ $data['homepage']->recruitment_title ?? 'Our Work Process Journey' }}</h2>
                        </div>
                    </div>
                </div>
                <div class="row work-n">
                    @foreach($data['homepage']->recruitmentProcess as $index=>$process)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="work__area-item">
                                <div class="work__area-item-icon">
                                    <i class="{{ recruitment_icon($index) }}"></i>
                                    <span>{{ $index > 9 ? $index+1:'0'.$index+1 }}</span>
                                </div>
                                <div class="work__area-item-content">
                                    <h5>{{ $process->title ?? '' }}</h5>
                                    <p>{{ $process->description ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if(count($data['press_release']))
        <div class="portfolio__one">
            <div class="container">
                <div class="row mb-20">
                    <div class="col-xl-6">
                        <div class="offer__area-right-title">
                            <span class="subtitle-four">Our Press Release</span>
                            <h2>Read Our Groundbreaking Approaches</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="swiper portfolio__one-slider">
                            <div class="swiper-wrapper">
                                @foreach($data['press_release'] as $release)
                                    <div class="portfolio__one-item swiper-slide">
                                        <img src="{{ asset(thumbnailImagePath($release->image))}}" alt="">
                                        <div class="portfolio__one-item-content">
                                            <div class="portfolio__one-item-content-left">
                                                <a href="{{ route('frontend.press_release.show', $release->slug) }}"><i class="flaticon-arrows"></i></a>
                                            </div>
                                            <div class="portfolio__one-item-content-right">
                                                <span><i class="far fa-calendar-alt"></i> {{date('d, M Y', strtotime($release->created_at))}}</span>
                                                <h4><a href="{{ route('frontend.press_release.show', $release->slug) }}">{{ $release->title ?? '' }}</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(count($data['homepage']->coreValueDetail))
        <div class="services__two section-padding" style="padding-top: 60px">
            <img class="services__two-shape-one dark-n lazy" src="{{ asset('assets/frontend/img/shape/services-3.png') }}" alt="">
            <img class="services__two-shape-two dark-n lazy" src="{{ asset('assets/frontend/img/shape/services-2.png') }}" alt="">
            <div class="container">
                <div class="row mb-30">
                    <div class="col-xl-12">
                        <div class="services__two-title">
                            <span class="subtitle-four">Available Solutions</span>
                            <h2>Insurance Solutions</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($data['homepage']->coreValueDetail as $index=>$core_value)
                        <div class="col-xl-4 col-lg-4 col-md-6 d-flex align-items-stretch">
                            <div class="services__two-item">
                                <div class="services__two-item-icon">
                                    <i class="{{ core_value_icon($index) }}"></i>
                                </div>
                                <div class="services__two-item-content">
                                    <h4><a>{{ $core_value->title ?? '' }}</a></h4>
                                    <p>{{ $core_value->description ?? '' }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if(count($data['director']) > 0)
        <div class="testimonial__two section-padding">
            <div class="shape-slide">
                <div class="sliders scrolls">
                    <img class="lazy" data-src="{{ asset('assets/frontend/img/shape/testimonial.png') }}" alt="">
                </div>
                <div class="sliders scrolls">
                    <img class="lazy" data-src="{{ asset('assets/frontend/img/shape/testimonial.png') }}" alt="">
                </div>
            </div>
            <div class="container">
                <div class="col-xl-6 col-lg-6 lg-mb-30 mb-5">
                    <div class="testimonial__two-title">
                        <span class="subtitle-four">Message From Directors</span>
                        <h2>Listen To What Our Executive Team Members Say.</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="testimonial__two-left">
                            <div class="swiper testimonial__slider">
                                <div class="swiper-wrapper" style="height: fit-content;">
                                    @foreach($data['director'] as $index=>$director)
                                        <div class="testimonial__two-item swiper-slide">
                                            <div class="testimonial__two-item-inner">
                                                <div class="testimonial__two-item-inner-client">
                                                    <h4>{{ $director->title ?? '' }}</h4>
                                                    <p class="text-align-justify">{{ $director->description ?? '' }}</p>
                                                </div>
                                                <div class="testimonial__two-item-inner-avatar">
                                                    <img src="{{ asset(imagePath($director->image)) }}" alt="avatar-shape">
                                                    <div class="quote">
                                                        <i class="flaticon-quote"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="testimonial__two-item-bottom">
                                                <span>{{ $director->designation ?? '' }}</span>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="testimonial-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    @if($data['homepage']->why_title)
        <div class="offer__area section-padding" style="padding: 90px 0px 20px;">
            <img class="offer__area-shape lazy" data-src="{{ asset('assets/frontend/img/shape/offer-bg.pn') }}g" alt="offer-shape">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 lg-mb-30">
                        <div class="offer__area-left">
                            <div class="image-overlay dark__image">
                                <img class="offer__area-left-one lazy" data-src="{{ asset(imagePath($data['homepage']->why_image)) }}" alt=" ">
                            </div>
                            @if($data['homepage']->why_video)
                                <div class="video__area-play video video-pulse" style="position: absolute;top: 40%;left: 40%;">
                                    <a class="video-popup" href="{{ $data['homepage']->why_video }}">
                                        <i class="fas fa-play"></i>
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="offer__area-right">
                            <div class="offer__area-right-title">
                                <span class="subtitle-four">{{ $data['homepage']->why_subtitle ?? 'Why Choose Us' }}</span>
                                <h2>{{ $data['homepage']->why_title }}</h2>
                                <p class="text-align-justify">{{ $data['homepage']->why_description ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="counter__three section-padding pt-0">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="counter__two-bg">
                            <div class="counter__two-item">
                                <div class="counter__two-item-icon">
                                    <i class="flaticon-success"></i>
                                </div>
                                <div class="counter__two-item-content">
                                    <h2><span class="counter">{{ $data['homepage']->project_completed ?? '200' }}</span></h2>
                                    <h6>Project Completed</h6>
                                </div>
                            </div>
                            <div class="counter__two-item">
                                <div class="counter__two-item-icon">
                                    <i class="flaticon-safe-flight"></i>
                                </div>
                                <div class="counter__two-item-content">
                                    <h2><span class="counter">{{ $data['homepage']->happy_clients ?? '560' }}</span></h2>
                                    <h6>Happy Clients</h6>
                                </div>
                            </div>
                            <div class="counter__two-item">
                                <div class="counter__two-item-icon">
                                    <i class="flaticon-project-management"></i>
                                </div>
                                <div class="counter__two-item-content">
                                    <h2><span class="counter">{{ $data['homepage']->visa_approved ?? '260' }}</span></h2>
                                    <h6>Visa Approved</h6>
                                </div>
                            </div>
                            <div class="counter__two-item">
                                <div class="counter__two-item-icon">
                                    <i class="flaticon-costumer"></i>
                                </div>
                                <div class="counter__two-item-content">
                                    <h2><span class="counter">{{ $data['homepage']->success_stories ?? '250' }}</span>+</h2>
                                    <h6>Success Stories</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(count($data['services']) > 0)
        <div class="services__one section-padding">
            <div class="shape-slide">
                <div class="sliders scroll">
                    <img class="lazy" data-src="{{ asset('assets/frontend/img/shape/services-1.png') }}" alt="service-shape">
                </div>
                <div class="sliders scroll">
                    <img class="lazy" data-src="{{ asset('assets/frontend/img/shape/services-1.png') }}" alt="service-shape">
                </div>
            </div>
            <div class="container">
                <div class="row align-items-end">
                    <div class="col-xl-6 col-lg-6 lg-mb-30">
                        <div class="services__one-title lg-t-center">
                            <span class="subtitle-four">Our Latest Categories</span>
                            <h2>Covering All Bases With Our Special Category</h2>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="services__one-btn t-right lg-t-center">
                            <a class="btn-one" href="{{ asset('frontend.service.index') }}">View All</a>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($data['services'] as $index=>$service)
                        <div class="col-xl-3 col-lg-4 col-md-6">
                            <div class="services__one-item">
                                <div class="services__one-item-image">
                                    <img class="lazy" data-src="{{ asset(thumbnailImagePath($service->image)) }}" alt="">
                                </div>
                                <div class="services__one-item-content">
                                    <div class="services__one-item-content-icon">
                                        <i class="flaticon-winner"></i>
                                    </div>
                                    <h4><a href="{{ route('frontend.service.show', $service->key) }}">{{ $service->title ?? '' }}</a></h4>
                                    <p></p>
                                    <a href="{{ route('frontend.service.show', $service->key) }}">Read More<i class="fas fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif

    @if(count($data['notices']) > 0)
        <div class="portfolio__three section-padding">
            <div class="container">
                <div class="row mb-60">
                    <div class="col-xl-12">
                        <div class="portfolio__three-title t-center">
                            <span class="subtitle-four">Our Notice</span>
                            <h2>Our Important Notice and Information</h2>
                        </div>
                    </div>
                </div>
            </div>
            <div class="portfolio">
                @foreach($data['notices'] as $index=>$notice)
                    <div class="portfolio__three-item {{ $index == 1 ? 'active':'' }}">
                        <img src="{{ asset(imagePath($notice->image)) }}" alt="">
                        <div class="portfolio__three-item-content vertical">
                            <div>
                                <span>NAFEA Notice</span>
                                <h4><a href="{{ route('frontend.notice.index') }}">{{ $notice->title ?? '' }}</a></h4>
                            </div>
                            <div class="portfolio__three-item-content-icon vertical">
                                <a href="{{ route('frontend.notice.index') }}"><i class="flaticon-right-up"></i></a>
                            </div>
                        </div>
                        <div class="portfolio__three-item-content transition">
                            <div>
                                <span>NAFEA Notice</span>
                                <h4><a href="{{ route('frontend.notice.index') }}">{{ $notice->title ?? '' }}</a></h4>
                            </div>
                            <div class="portfolio__three-item-content-icon">
                                <a href="{{ route('frontend.notice.index') }}"><i class="flaticon-right-up"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @endif

    @if(count($data['testimonials'])>0)
        <div class="testimonial__one section-padding">
            <img class="testimonial__one-shape" src="{{ asset('assets/frontend/img/shape/testimonial-bg.png') }}" alt="testimonial-shape">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 lg-mb-30">
                        <div class="testimonial__two-title">
                            <span class="subtitle-four">{{ $data['testimonial_heading']->subtitle ?? 'Our Testimonials'}}</span>
                            <h2>{{ $data['testimonial_heading']->title ?? '' }}</h2>
                            {!! $data['testimonial_heading']->description  ?? "<p>At NAFEA, we take pride in providing exceptional coverage and service to our clients. But don't just take our word for it - hear it from our associates and clients!</p>" !!}
                            <a class="btn-two" href="{{ route('frontend.page.testimonial') }}">See All Testimonial</a>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6">
                        <div class="testimonial__one-right">
                            <div class="testimonial__one-pagination swiper gallery-thumbs">
                                <div class="swiper-wrapper">
                                    @foreach($data['testimonials'] as $index=>$testimonial)
                                        <div class="swiper-slide">
                                            <div class="testimonial__one-pagination-item swiper-slide-container">
                                                <img src="{{ asset(imagePath($testimonial->image))}}" alt="">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="swiper gallery-top">
                                <div class="swiper-wrapper">
                                    @foreach($data['testimonials'] as $index=>$testimonial)
                                        <div class="swiper-slide">
                                            <div class="swiper-slide-container">
                                                <div class="testimonial__one-item">
                                                    <p>{{ $testimonial->description }}</p>
                                                    <div class="testimonial__one-item-bottom">
                                                        <i class="flaticon-quote-1"></i>
                                                        <div class="testimonial__one-item-bottom-name">
                                                            <h4>{{ $testimonial->title ?? '' }}</h4>
                                                            <span>{{ $testimonial->position ?? '' }}</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    @if(count( $data['clients']) > 0)
        <div class="text__slider client section-padding" style="background: #fff url({{ asset('assets/frontend/img/shape/counter-bg.png') }})">
            <div class="container">
                <div class="row mb-60">
                    <div class="col-xl-12">
                        <div class="portfolio__three-title t-center">
                            <span class="subtitle-four">Our Valuable clients</span>
                            <h2>Associated With</h2>
                        </div>
                    </div>
                </div>
                <div class="swiper-container">
                    <div class="swiper-wrapper">
                        @foreach($data['clients'] as $index=>$client)
                            <div class="swiper-slide">
                                <div class="client__box">
                                    <a href="{{ $client->link ?? '#' }}" target="{{ ($client->link !== null) ? '_blank':'' }}">
                                        <img src="{{ asset(imagePath($client->image)) }}" alt="">
                                    </a>
                                </div>
                            </div>
                        @endforeach

                    </div>

                    <!-- If we need pagination -->
                    <div class="swiper-pagination"></div>

                </div>
            </div>
        </div>
    @endif

    @if(count($data['blogs'])>0)
        <div class="blog__one section-padding">
            <div class="container">
                <div class="row mb-30">
                    <div class="col-xl-12">
                        <div class="blog__one-title t-center">
                            <span class="subtitle-four">From the blog</span>
                            <h2>News & Articles</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($data['blogs'] as $blog)
                        <div class="col-xl-4 col-lg-6 d-flex align-items-stretch">
                            <div class="blog__one-item">
                                <div class="blog__one-item-image">
                                    <img class="lazy" data-src="{{ asset(imagePath($blog->image))}}" alt="">
                                </div>
                                <div class="blog__one-item-content">
                                    <div class="blog__one-item-content-meta">
                                        <ul>
                                            <li><a href="{{ route('frontend.blog.show', $blog->slug) }}"><i class="far fa-list-alt"></i>{{ $blog->blogCategory->title ?? '' }}</a></li>
                                            <li><a href="{{ route('frontend.blog.show', $blog->slug) }}"><i class="far fa-calendar-alt"></i>{{date('d, M Y', strtotime($blog->created_at))}}</a></li>
                                        </ul>
                                    </div>
                                    <h4><a href="{{ route('frontend.blog.show', $blog->slug) }}"> {{ $blog->title ?? '' }}</a></h4>
                                </div>
                                <div class="blog__one-item-btn">
                                    <a href="{{ route('frontend.blog.show', $blog->slug) }}">Read More<span><i class="far fa-long-arrow-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
    <!-- Blog Area End -->

@endsection

@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
@endsection
