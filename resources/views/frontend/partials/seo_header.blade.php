<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="{{ucwords(@$setting_data->meta_description ?? '')}}"/>
    <meta name="keywords" content=" {{@$setting_data->meta_tags ?? ''}}">
{{--    <link rel="canonical" href="https://s.com.np" />--}}

    @yield('seo')
    <link rel="shortcut icon" type="image/x-icon" href="{{ $setting_data->favicon ?  asset(imagePath($setting_data->favicon)) : ''}}">

<!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bootstrap.min.css') }}">
    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/all.css') }}">
    <!-- Animate CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/animate.css') }}">
    <!-- Flaticon -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/font/flaticon.css') }}">
    <!-- Swiper Bundle CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/swiper-bundle.min.css') }}">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}">
    <!-- Mean Menu CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/meanmenu.min.css') }}">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/sass/style.css') }}">

    <script async src="https://www.googletagmanager.com/gtag/js?id={{@$setting_data->google_analytics}}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{@$setting_data->google_analytics}}');
    </script>
    @yield('css')
    @stack('styles')
</head>

<body>
<!-- Preloader Start -->
<div class="theme-loader">
    <div class="spinner">
        <div class="spinner-bounce one"></div>
        <div class="spinner-bounce two"></div>
        <div class="spinner-bounce three"></div>
    </div>
</div>
<!-- Preloader End -->
<!-- Top Bar Area Start -->

<div class="top__bar-two">
    <div class="custom__container">
        <div class="row">
            <div class="col-lg-8">
                <div class="top__bar-two-left lg-t-center">
                    <ul>
                        <li><a href="mailto:{{ $setting_data->email ?? '' }}"><i class="fas fa-map-marker-alt"></i>Location : {{ $setting_data->address ?? '' }}</a></li>
                        <li><a href="mailto:{{ $setting_data->email ?? '' }}"><i class="fas fa-envelope"></i>Email : {{ $setting_data->email ?? '' }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="top__bar-two-right">
                    <h6>Follow Us :</h6>
                    <div class="top__bar-two-right-social">
                        <ul>
                            @if(@$setting_data->facebook)
                                <li><a href="{{$setting_data->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i><span>Facebook</span></a></li>
                            @endif
                            @if(@$setting_data->instagram)
                                <li><a href="{{$setting_data->instagram}}" target="_blank"><i class="fab fa-instagram"></i><span>Instagram</span></a></li>
                            @endif
                            @if(@$setting_data->youtube)
                                <li><a href="{{$setting_data->youtube}}" target="_blank"><i class="fab fa-youtube"></i><span>Youtube</span></a></li>
                            @endif
                            @if(@$setting_data->linkedin)
                                <li><a href="{{$setting_data->linkedin}}" target="_blank"><i class="fab fa-linkedin"></i><span>Linkedin</span></a></li>
                            @endif
                            @if(@$setting_data->linkedin)
                                <li><a href="{{$setting_data->ticktock}}" target="_blank"><i class="fab fa-tiktok"></i><span>Tiktok</span></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Top Bar Area End -->
<!-- Header Area Start -->
<div class="header__area two header__sticky">
    <div class="custom__container">
        <div class="header__area-menubar p-relative">
            <div class="header__area-menubar-left">
                <div class="header__area-menubar-left-logo two">
                    <a href="/">
                        <img class="dark-n" style="    width: 90px;" src="{{ $setting_data->logo_white ?  asset(imagePath($setting_data->logo_white)) : asset(imagePath($setting_data->logo))}}" alt="">
                        <img class="light-n" style="    width: 90px;" src="{{ $setting_data->logo ?  asset(imagePath($setting_data->logo)) : asset(imagePath($setting_data->logo_white))}}" alt=""></a>
                </div>
            </div>
            <div class="header__area-menubar-center">
                <div class="header__area-menubar-center-menu two menu-responsive">
                    <ul id="mobilemenu">
                        <li><a href="/">Home</a>
                        </li>
                        @if(!empty($top_nav_data))
                            @foreach($top_nav_data as $nav)
                                @if(!empty($nav->children[0]))
                                    <li class="menu-item-has-children"><a href="#">{{ @$nav->name ?? @$nav->title }}</a>
                                        <ul class="sub-menu">
                                            @foreach($nav->children[0] as $childNav)
                                                <li class="{{ !empty($childNav->children[0]) ? 'menu-item-has-children':'' }}">
                                                    <a href="{{get_menu_url($childNav->type, $childNav)}}">
                                                        {{ @$childNav->name ?? @$childNav->title ??''}}
                                                    </a>
                                                    @if(!empty($childNav->children[0]))
                                                        <ul class="sub-menu">
                                                            @foreach($childNav->children[0] as $key => $lastchild)
                                                                <li>
                                                                    <a href="{{get_menu_url($lastchild->type, $lastchild)}}" target="{{@$lastchild->target ? '_blank':''}}">
                                                                        {{ @$lastchild->name ?? @$lastchild->title ?? ''}}
                                                                    </a>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    @endif
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li>
                                        <a href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">
                                            {{ @$nav->name ?? @$nav->title ??''}}
                                        </a>
                                    </li>
                                @endif
                            @endforeach
                        @endif
                    </ul>
                </div>
            </div>
            <div class="header__area-menubar-right">
                <div class="header__area-menubar-right-search two">
                    <div class="search">
                        <span class="header__area-menubar-right-search-icon open"><i class="fal fa-search"></i></span>
                    </div>
                    <div class="header__area-menubar-right-search-box">
                        {!! Form::open(['route' => $module.'press_release.search', 'method'=>'GET']) !!}
                        <input type="text" name="for" id="search" placeholder="Search Press Release...">
                        <button type="submit"><i class="fal fa-search"></i>
                        </button>
                        {!! Form::close() !!}
                        <span class="header__area-menubar-right-search-box-icon"><i class="fal fa-times"></i></span>
                    </div>
                </div>
                <div class="header__area-menubar-right-sidebar">
                    <div class="header__area-menubar-right-sidebar-popup-icon"><i class="flaticon-dots-menu"></i></div>
                </div>
                <div class="header__area-menubar-right-btn">
                    <a class="btn-two" href="{{route('frontend.contact-us')}}">Contact Us</a>
                </div>
                <div class="header__area-menubar-right-responsive-menu menu__bar">
                    <i class="flaticon-dots-menu"></i>
                </div>
                <!-- sidebar Menu Start -->
                <div class="header__area-menubar-right-sidebar-popup two">
                    <div class="sidebar-close-btn"><i class="fal fa-times"></i></div>
                    <div class="header__area-menubar-right-sidebar-popup-logo">
                        <a href="/">
                            <img class="lazy" data-src="{{ $setting_data->logo_white ?  asset(imagePath($setting_data->logo_white)) : asset(imagePath($setting_data->logo))}}" style="max-width: 305px;" alt="">
                        </a>
                    </div>
                    <div class="text-align-justify">{{ $setting_data->description ?? '' }}</div>
                    <div class="header__area-menubar-right-sidebar-popup-contact">
                        <h4 class="mb-30">Get In Touch</h4>
                        <div class="header__area-menubar-right-sidebar-popup-contact-item">
                            <div class="header__area-menubar-right-sidebar-popup-contact-item-icon">
                                <i class="fal fa-phone-alt icon-animation"></i>
                            </div>
                            <div class="header__area-menubar-right-sidebar-popup-contact-item-content">
                                <span>Call Now</span>
                                <h6><a href="tel:{{ $setting_data->phone ?? $setting_data->mobile }}">{{ $setting_data->phone ?? $setting_data->mobile }}</a></h6>
                            </div>
                        </div>
                        <div class="header__area-menubar-right-sidebar-popup-contact-item">
                            <div class="header__area-menubar-right-sidebar-popup-contact-item-icon">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="header__area-menubar-right-sidebar-popup-contact-item-content">
                                <span>Quick Email</span>
                                <h6><a href="mailto:{{ $setting_data->email ?? '' }}">{{ $setting_data->email ?? '' }}</a></h6>
                            </div>
                        </div>
                        <div class="header__area-menubar-right-sidebar-popup-contact-item">
                            <div class="header__area-menubar-right-sidebar-popup-contact-item-icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="header__area-menubar-right-sidebar-popup-contact-item-content">
                                <span>Office Address</span>
                                <h6><a href="mailto:{{ $setting_data->email ?? '' }}" target="_blank">{{ $setting_data->address ?? '' }}</a></h6>
                            </div>
                        </div>
                    </div>
                    <div class="header__area-menubar-right-sidebar-popup-social">
                        <ul>
                            @if(@$setting_data->facebook)
                                <li><a href="{{$setting_data->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i><span></span></a></li>
                            @endif
                            @if(@$setting_data->instagram)
                                <li><a href="{{$setting_data->instagram}}" target="_blank"><i class="fab fa-instagram"></i><span></span></a></li>
                            @endif
                            @if(@$setting_data->youtube)
                                <li><a href="{{$setting_data->youtube}}" target="_blank"><i class="fab fa-youtube"></i><span></span></a></li>
                            @endif
                            @if(@$setting_data->linkedin)
                                <li><a href="{{$setting_data->linkedin}}" target="_blank"><i class="fab fa-linkedin"></i><span></span></a></li>
                            @endif
                            @if(@$setting_data->linkedin)
                                <li><a href="{{$setting_data->ticktock}}" target="_blank"><i class="fab fa-tiktok"></i><span></span></a></li>
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="sidebar-overlay"></div>
                <!-- sidebar Menu Start -->
            </div>
        </div>
        <div class="menu__bar-popup two">
            <div class="menu__bar-popup-close"><i class="fal fa-times"></i></div>
            <div class="menu__bar-popup-left">
                <div class="menu__bar-popup-left-logo">
                    <a href="/">
                        <img src="{{ $setting_data->logo_white ?  asset(imagePath($setting_data->logo_white)) : asset(imagePath($setting_data->logo))}}" style="max-width: 305px;" alt="">
                    </a>
                    <div class="responsive-menu"></div>
                </div>
                <div class="menu__bar-popup-left-social">
                    <h6>Follow Us</h6>
                    <ul>
                        @if(@$setting_data->facebook)
                            <li><a href="{{$setting_data->facebook}}" target="_blank"><i class="fab fa-facebook-f"></i><span></span></a></li>
                        @endif
                        @if(@$setting_data->instagram)
                            <li><a href="{{$setting_data->instagram}}" target="_blank"><i class="fab fa-instagram"></i><span></span></a></li>
                        @endif
                        @if(@$setting_data->youtube)
                            <li><a href="{{$setting_data->youtube}}" target="_blank"><i class="fab fa-youtube"></i><span></span></a></li>
                        @endif
                        @if(@$setting_data->linkedin)
                            <li><a href="{{$setting_data->linkedin}}" target="_blank"><i class="fab fa-linkedin"></i><span></span></a></li>
                        @endif
                        @if(@$setting_data->linkedin)
                            <li><a href="{{$setting_data->ticktock}}" target="_blank"><i class="fab fa-tiktok"></i><span></span></a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <div class="menu__bar-popup-right">
                <div class="menu__bar-popup-right-search">
                    {!! Form::open(['route' => $module.'press_release.search', 'method'=>'GET']) !!}
                    <input type="text" name="for" id="search" placeholder="Search Press Release...">
                    <button type="submit"><i class="fal fa-search"></i>
                    </button>
                    {!! Form::close() !!}
                </div>
                <div class="menu__bar-popup-right-contact">
                    <h4>Get In Touch</h4>
                    <div class="menu__bar-popup-right-contact-item">
                        <div class="menu__bar-popup-right-contact-item-info">
                            <span>Call Now</span>
                            <h6><a href="tel:{{ $setting_data->phone ?? $setting_data->mobile }}">{{ $setting_data->phone ?? $setting_data->mobile }}</a></h6>
                        </div>
                    </div>
                    <div class="menu__bar-popup-right-contact-item">
                        <div class="menu__bar-popup-right-contact-item-info">
                            <span>Quick Email</span>
                            <h6><a href="mailto:{{ $setting_data->email ?? '' }}">{{ $setting_data->email ?? '' }}</a></h6>
                        </div>
                    </div>
                    <div class="menu__bar-popup-right-contact-item">
                        <div class="menu__bar-popup-right-contact-item-info">
                            <span>Office Address</span>
                            <h6><a href="mailto:{{ $setting_data->email ?? '' }}" target="_blank">{{ $setting_data->address ?? '' }}</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
