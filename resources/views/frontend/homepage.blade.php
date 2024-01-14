@extends('frontend.layouts.master')
@section('title') Home @endsection
@section('css')

@endsection
@section('content')

    <div class="banner__one swiper banner-slider">
        <div class="banner__two-shape">
            <img class="banner__two-shape-two left-right-animate" src="{{ asset('assets/frontend/img/shape/banner-3.png') }}" alt="banner-shape">
            <img class="banner__two-shape-three" src="{{ asset('assets/frontend/img/shape/banners-2.png') }}" alt="banner-shape">
            <img class="banner__two-shape-four" src="{{ asset('assets/frontend/img/shape/banners-3.png') }}" alt="banner-shape">
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
                                    <h1 data-animation="fadeInUp" data-delay=".7s" style="width: 70%">{{ $slider->title ?? '' }}</h1>
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
                            <span class="subtitle-two">{{ $data['homepage']->action_subtitle ?? '' }}</span>
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
                                    <h6><a href="mailto:{{ $setting_data->email ?? '' }}">{{ $setting_data->email ?? '' }}</a></h6>
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
                            <span class="subtitle-two">{{ $data['homepage']->recruitment_subtitle ?? 'How it Works' }}</span>
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
                            <span class="subtitle-two">Our Press Release</span>
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
                                        <img src="{{ asset(thumbnailImagePath($release->image))}}" alt="property-insurance">
                                        <div class="portfolio__one-item-content">
                                            <div class="portfolio__one-item-content-left">
                                                <a href="project-single.html"><i class="flaticon-arrows"></i></a>
                                            </div>
                                            <div class="portfolio__one-item-content-right">
                                                <span>Property Coverage</span>
                                                <h4><a href="project-single.html">Property Insurance</a></h4>
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

    @if(count($data['testimonials'])>0)
        <div class="testimonial__one section-padding">
            <img class="testimonial__one-shape" src="{{ asset('assets/frontend/img/shape/testimonial-bg.png') }}" alt="testimonial-shape">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-6 col-lg-6 lg-mb-30">
                        <div class="testimonial__two-title">
                            <span class="subtitle-two">{{ $data['testimonial_heading']->subtitle ?? 'Our Testimonials'}}</span>
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

    @if($data['homepage']->why_title)

        <div class="offer__area section-padding">
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
                                <span class="subtitle-two">{{ $data['homepage']->why_subtitle ?? 'Why Choose Us' }}</span>
                                <h2>{{ $data['homepage']->why_title }}</h2>
                                <p class="text-align-justify">{{ $data['homepage']->why_description ?? '' }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="text__slider section-padding">
        <div class="text-slide">
            <div class="sliders scroll">
                <ul>
                    <li><h2><a href="project-single.html">Marine Insurance</a><span>✦</span></h2></li>
                    <li><h2><a href="project-single.html">Fire Insurance</a><span>✦</span></h2></li>
                    <li><h2><a href="project-single.html">Farm Insurance</a><span>✦</span></h2></li>
                    <li><h2><a href="project-single.html">Business Insurance</a><span>✦</span></h2></li>
                    <li><h2><a href="project-single.html">Pet Insurance</a><span>✦</span></h2></li>
                </ul>
            </div>
            <div class="sliders scroll">
                <ul>
                    <li><h2><a href="project-single.html">Marine Insurance</a><span>✦</span></h2></li>
                    <li><h2><a href="project-single.html">Fire Insurance</a><span>✦</span></h2></li>
                    <li><h2><a href="project-single.html">Farm Insurance</a><span>✦</span></h2></li>
                    <li><h2><a href="project-single.html">Business Insurance</a><span>✦</span></h2></li>
                    <li><h2><a href="project-single.html">Pet Insurance</a><span>✦</span></h2></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- Blog Area Start -->
    <div class="blog__one section-padding">
        <div class="container">
            <div class="row mb-30">
                <div class="col-xl-12">
                    <div class="blog__one-title t-center">
                        <span class="subtitle-two">From the blog</span>
                        <h2>News & Articles</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-6">
                    <div class="blog__one-item">
                        <div class="blog__one-item-image">
                            <img src="assets/img/blog/liability-insurance.jpg" alt="liability-insurance">
                            <div class="blog__one-item-image-date">
                                <h5>22</h5>
                                <span>Apr</span>
                            </div>
                        </div>
                        <div class="blog__one-item-content">
                            <div class="blog__one-item-content-meta">
                                <ul>
                                    <li><a href="single-left-sidebar.html"><i class="far fa-user"></i>By-Admin</a></li>
                                    <li><a href="single-left-sidebar.html"><i class="far fa-comment-dots"></i>Comments (3)</a></li>
                                </ul>
                            </div>
                            <h4><a href="single-left-sidebar.html">How Liability Insurance Protects You</a></h4>
                            <p>Liability insurance can also help cover the costs of damages you may have..</p>
                        </div>
                        <div class="blog__one-item-btn">
                            <a href="single-left-sidebar.html">Read More<span><i class="far fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="blog__one-item">
                        <div class="blog__one-item-image">
                            <img src="assets/img/blog/business-insurance.jpg" alt="business-insurance">
                            <div class="blog__one-item-image-date">
                                <h5>19</h5>
                                <span>Apr</span>
                            </div>
                        </div>
                        <div class="blog__one-item-content">
                            <div class="blog__one-item-content-meta">
                                <ul>
                                    <li><a href="single-left-sidebar.html"><i class="far fa-user"></i>By-Admin</a></li>
                                    <li><a href="single-left-sidebar.html"><i class="far fa-comment-dots"></i>Comments (4)</a></li>
                                </ul>
                            </div>
                            <h4><a href="single-left-sidebar.html">Business Auto Insurance Coverage Basics</a></h4>
                            <p>This coverage protects businesses from claims of bodily injury or property..</p>
                        </div>
                        <div class="blog__one-item-btn">
                            <a href="single-left-sidebar.html">Read More<span><i class="far fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-6">
                    <div class="blog__one-item">
                        <div class="blog__one-item-image">
                            <img src="assets/img/blog/cyber-insurance.jpg" alt="cyber-insurance">
                            <div class="blog__one-item-image-date">
                                <h5>17</h5>
                                <span>Apr</span>
                            </div>
                        </div>
                        <div class="blog__one-item-content">
                            <div class="blog__one-item-content-meta">
                                <ul>
                                    <li><a href="single-left-sidebar.html"><i class="far fa-user"></i>By-Admin</a></li>
                                    <li><a href="single-left-sidebar.html"><i class="far fa-comment-dots"></i>Comments (2)</a></li>
                                </ul>
                            </div>
                            <h4><a href="single-left-sidebar.html">Cyber Security Risks & Prevention Measures</a></h4>
                            <p>Malware is malicious software that can infect a computer system and steal..</p>
                        </div>
                        <div class="blog__one-item-btn">
                            <a href="single-left-sidebar.html">Read More<span><i class="far fa-long-arrow-right"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Area End -->
    <!-- Subscribe Area Start -->
    <div class="subscribe__area">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 lg-mb-30">
                    <div class="subscribe__area-title">
                        <h3>Subscribe Our Newsletter to Get Company Update</h3>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="subscribe__area-form">
                        <form action="#">
                            <input type="text" name="email" placeholder="Email Address" required="">
                            <button class="btn-two" type="submit">Subscribe Now</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
@endsection
