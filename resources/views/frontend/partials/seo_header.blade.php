<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="{{ucwords(@$setting_data->meta_description ?? '')}}"/>
    <meta name="keywords" content=" {{@$setting_data->meta_tags ?? ''}}">
    <link rel="canonical" href="https://s.com.np" />

    @yield('seo')

    <link rel="shortcut icon" type="image/x-icon" href="{{ $setting_data->favicon ?  asset(imagePath($setting_data->favicon)) : ''}}">

    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>

    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap"
        rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css2?family=Inter+Tight:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/animate/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/animate/custom-animate.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/fontawesome/css/all.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/jarallax/jarallax.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/jquery-magnific-popup/jquery.magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/odometer/odometer.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/swiper/swiper.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/bixola-icons/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/owl-carousel/owl.carousel.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/owl-carousel/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/bootstrap-select/css/bootstrap-select.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/jquery-ui/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/vendors/timepicker/timePicker.css') }}" />

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- template styles -->
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bixola.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/bixola-responsive.css') }}" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
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
<body class="custom-cursor">

<div class="custom-cursor__cursor"></div>
<div class="custom-cursor__cursor-two"></div>

{{--<div class="preloader">--}}
{{--    <div class="preloader__image"></div>--}}
{{--</div>--}}
<!-- /.preloader -->


<div class="page-wrapper">
    <header class="main-header-three">
        <div class="main-header-three__top">
            <div class="container">
                <div class="main-header-three__top-inner">
                    <div class="main-header-three__top-left">
                        <ul class="list-unstyled main-header-three__contact-list">
                            <li>
                                <div class="icon">
                                    <i class="icon-phone"></i>
                                </div>
                                <div class="text">
                                    <p><a href="tel:{{ $setting_data->phone ?? $setting_data->mobile }}">{{ $setting_data->phone ?? $setting_data->mobile }}</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="icon-envelope"></i>
                                </div>
                                <div class="text">
                                    <p><a href="mailto:{{ $setting_data->email ?? '' }}">{{ $setting_data->email ?? '' }}</a></p>
                                </div>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="icon-location-1"></i>
                                </div>
                                <div class="text">
                                    <p>{{ $setting_data->address ?? '' }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <div class="main-header-three__top-text-and-social">
                        {{--                        <div class="main-header-three__top-text">--}}
                        {{--                            <p><span class="icon-three-o-clock-clock"></span> Monday - Friday / 8AM - 11PM</p>--}}
                        {{--                        </div>--}}
                        <div class="main-header-three__top-social">
                            @if(@$setting_data->facebook)
                                <a href="{{$setting_data->facebook}}"><i class="fab fa-facebook"></i></a>
                            @endif
                            @if(@$setting_data->instagram)
                                <a href="{{$setting_data->instagram}}"><i class="fab fa-instagram"></i></a>
                            @endif
                            @if(@$setting_data->youtube)
                                <a href="{{$setting_data->youtube}}"><i class="fab fa-youtube"></i></a>
                            @endif
                            @if(@$setting_data->linkedin)
                                <a href="{{$setting_data->linkedin}}"><i class="fab fa-linkedin"></i></a>
                            @endif
                            @if(!empty(@$setting_data->ticktock))
                                <a href="{{$setting_data->ticktock}}"><i class="fab fa-tiktok"></i></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <nav class="main-menu main-menu-three">
            <div class="main-menu-three__wrapper">
                <div class="container">
                    <div class="main-menu-three__wrapper-inner">
                        <div class="main-menu-three__logo">
                            <a href="/"><img src="{{ $setting_data->logo ?  asset(imagePath($setting_data->logo)) : asset(imagePath($setting_data->logo_white))}}" style="max-width: 355px;" alt=""></a>
                        </div>
                        <div class="main-menu-three__main-menu-box">
                            <a href="#" class="mobile-nav__toggler"><i class="fa fa-bars"></i></a>
                            <ul class="main-menu__list">
                                <li>
                                    <a href="/">Home </a>
                                </li>
                                @if(!empty($top_nav_data))
                                    @foreach($top_nav_data as $nav)
                                        @if(!empty($nav->children[0]))
                                            <li class="dropdown">
                                                <a href="#">{{ @$nav->name ?? @$nav->title }}</a>
                                                <ul class="sub-menu">
                                                    @foreach($nav->children[0] as $childNav)
                                                        <li class="{{ !empty($childNav->children[0]) ? 'dropdown':'' }}">
                                                            <a href="{{get_menu_url($childNav->type, $childNav)}}">
                                                                {{ @$childNav->name ?? @$childNav->title ??''}}
                                                            </a>
                                                            @if(!empty($childNav->children[0]))
                                                                <ul>
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
                        <div class="main-menu-three__right">
                            {{--                                <div class="main-menu-three__search-box">--}}
                            {{--                                    <a href="#"--}}
                            {{--                                       class="main-menu-three__search search-toggler icon-magnifying-glass"></a>--}}
                            {{--                                </div>--}}
                            <div class="main-menu-three__btn-box">
                                <a href="{{route('frontend.contact-us')}}" class="thm-btn main-menu-three__btn thm-btn">
                                    Contact Us
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <div class="stricky-header stricked-menu main-menu main-menu-three">
        <div class="sticky-header__content"></div><!-- /.sticky-header__content -->
    </div><!-- /.stricky-header -->

