<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Start Meta -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="{{ucwords(@$setting_data->meta_description ?? '')}}"/>
    <meta name="keywords" content=" {{@$setting_data->meta_tags ?? ''}}">
{{--    <link rel="canonical" href="https://s.com.np" />--}}

    @if (\Request::is('/'))
        <title> {{ucwords($setting_data->title ?? '')}}</title>
    @else
        <title>@yield('title') |  {{ucwords($setting_data->title ?? '')}} </title>
    @endif


    <meta property="og:title" content="{{ucwords(@$setting_data->meta_title ?? '')}}" />
    <meta property="og:type" content="Consultancy" />
{{--    <meta property="og:url" content="https://s.com.np" />--}}
    <meta property="og:site_name" content="{{ucwords($setting_data->title ?? '')}}" />
    <meta property="og:description" content="{{ucwords(@$setting_data->meta_description ?? '')}}" />

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
{{--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />--}}

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
                                <li><a href="{{$setting_data->youtube}}" target="_blank"><i class="fab fa-youtube"></i><span>YouTube</span></a></li>
                            @endif
                            @if(@$setting_data->linkedin)
                                <li><a href="{{$setting_data->linkedin}}" target="_blank"><i class="fab fa-dribbble"></i><span>Linked In</span></a></li>
                            @endif
                            @if(!empty(@$setting_data->ticktock))
                                <li><a href="{{$setting_data->ticktock}}" target="_blank"><i class="fab fa-dribbble"></i><span>TikTok</span></a></li>
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
                        <img class="dark-n" src="assets/img/logo-3.png" alt="Logo-image"><img class="light-n" src="assets/img/logo-4.png" alt="Logo-image"></a>
                </div>
            </div>
            <div class="header__area-menubar-center">
                <div class="header__area-menubar-center-menu two menu-responsive">
                    <ul id="mobilemenu">
                        <li class="menu-item-has-children menus"><a href="#">Home</a>
                            <ul class="sub-menu">
                                <li class="menu-item-has-children"><a href="#">Multi Page</a>
                                    <ul class="sub-menu">
                                        <li><a href="index.html">Health Insurance (Light)</a></li>
                                        <li><a href="dark/index-dark.html">Health Insurance (Dark)</a></li>
                                        <li><a href="index-two.html">Business Insurance (Light)</a></li>
                                        <li><a href="dark/index-two-dark.html">Business Insurance (Dark)</a></li>
                                        <li><a href="index-three.html">Property Insurance (Light)</a></li>
                                        <li><a href="dark/index-three-dark.html">Property Insurance (Dark)</a></li>
                                        <li><a href="index-four.html">Life Insurance (Light)</a></li>
                                        <li><a href="dark/index-four-dark.html">Life Insurance (Dark)</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">OnePage</a>
                                    <ul class="sub-menu">
                                        <li><a href="onepage/index_onepage.html">Health Insurance (Light)</a></li>
                                        <li><a href="onepage/index_onepage-dark.html">Health Insurance (Dark)</a></li>
                                        <li><a href="onepage/index-two_onepage.html">Business Insurance (Light)</a></li>
                                        <li><a href="onepage/index-two_onepage-dark.html">Business Insurance (Dark)</a></li>
                                        <li><a href="onepage/index-three_onepage.html">Property Insurance (Light)</a></li>
                                        <li><a href="onepage/index-three_onepage-dark.html">Property Insurance (Dark)</a></li>
                                        <li><a href="onepage/index-four_onepage.html">Life Insurance (Light)</a></li>
                                        <li><a href="onepage/index-four_onepage-dark.html">Life Insurance (Dark)</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">RTL</a>
                                    <ul class="sub-menu">
                                        <li><a href="rtl/index-rtl.html">Health Insurance (Light)</a></li>
                                        <li><a href="rtl/index-dark-rtl.html">Health Insurance (Dark)</a></li>
                                        <li><a href="rtl/index-two-rtl.html">Business Insurance (Light)</a></li>
                                        <li><a href="rtl/index-two-dark-rtl.html">Business Insurance (Dark)</a></li>
                                        <li><a href="rtl/index-three-rtl.html">Property Insurance (Light)</a></li>
                                        <li><a href="rtl/index-three-dark-rtl.html">Property Insurance (Dark)</a></li>
                                        <li><a href="rtl/index-four-rtl.html">Life Insurance (Light)</a></li>
                                        <li><a href="rtl/index-four-dark-rtl.html">Life Insurance (Dark)</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children home"><a href="#">Home</a>
                            <ul class="sub-menu home-area">
                                <li>
                                    <div class="home-area-box">
                                        <div class="home-area-box-item">
                                            <div class="home-area-box-item-thumb">
                                                <ul>
                                                    <li><a target="_blank" href="rtl/index-rtl.html">RTL</a></li>
                                                    <li><a target="_blank" href="onepage/index_onepage.html">OnePage</a></li>
                                                </ul>
                                                <img src="assets/img/demo/demo-1.jpg" alt="demo-image">
                                            </div>
                                            <div class="home-area-box-item-content">
                                                <h6 class="two"><a href="index.html">Health Insurance (MultiPage)</a></h6>
                                                <h6 class="one"><a href="index.html">Health Insurance</a></h6>
                                            </div>
                                        </div>
                                        <div class="home-area-box-item">
                                            <div class="home-area-box-item-thumb">
                                                <ul>
                                                    <li><a target="_blank" href="rtl/index-two-rtl.html">RTL</a></li>
                                                    <li><a target="_blank" href="onepage/index-two_onepage.html">OnePage</a></li>
                                                </ul>
                                                <img src="assets/img/demo/demo-2.jpg" alt="demo-image">
                                            </div>
                                            <div class="home-area-box-item-content">
                                                <h6 class="two"><a href="index-two.html">Business Insurance (MultiPage)</a></h6>
                                                <h6 class="one"><a href="index-two.html">Business Insurance</a></h6>
                                            </div>
                                        </div>
                                        <div class="home-area-box-item">
                                            <div class="home-area-box-item-thumb">
                                                <ul>
                                                    <li><a target="_blank" href="rtl/index-three-rtl.html">RTL</a></li>
                                                    <li><a target="_blank" href="onepage/index-three_onepage.html">OnePage</a></li>
                                                </ul>
                                                <img src="assets/img/demo/demo-3.jpg" alt="demo-image">
                                            </div>
                                            <div class="home-area-box-item-content">
                                                <h6 class="two"><a href="index-three.html">Property Insurance (MultiPage)</a></h6>
                                                <h6 class="one"><a href="index-three.html">Property Insurance</a></h6>
                                            </div>
                                        </div>
                                        <div class="home-area-box-item">
                                            <div class="home-area-box-item-thumb">
                                                <ul>
                                                    <li><a target="_blank" href="rtl/index-four-rtl.html">RTL</a></li>
                                                    <li><a target="_blank" href="onepage/index-four_onepage.html">OnePage</a></li>
                                                </ul>
                                                <img src="assets/img/demo/demo-4.jpg" alt="demo-image">
                                            </div>
                                            <div class="home-area-box-item-content">
                                                <h6 class="two"><a href="index-four.html">Life Insurance (MultiPage)</a></h6>
                                                <h6 class="one"><a href="index-four.html">Life Insurance</a></h6>
                                            </div>
                                        </div>
                                        <div class="home-area-box-item">
                                            <div class="home-area-box-item-thumb">
                                                <ul>
                                                    <li><a target="_blank" href="rtl/index-dark-rtl.html">RTL</a></li>
                                                    <li><a target="_blank" href="onepage/index_onepage-dark.html">OnePage</a></li>
                                                </ul>
                                                <img src="assets/img/demo/dark-1.jpg" alt="demo-image">
                                            </div>
                                            <div class="home-area-box-item-content">
                                                <h6 class="two"><a href="dark/index-dark.html">Health Insurance (MultiPage)</a></h6>
                                                <h6 class="one"><a href="dark/index-dark.html">Health Insurance</a></h6>
                                            </div>
                                        </div>
                                        <div class="home-area-box-item">
                                            <div class="home-area-box-item-thumb">
                                                <ul>
                                                    <li><a target="_blank" href="rtl/index-two-dark-rtl.html">RTL</a></li>
                                                    <li><a target="_blank" href="onepage/index-two_onepage-dark.html">OnePage</a></li>
                                                </ul>
                                                <img src="assets/img/demo/dark-2.jpg" alt="demo-image">
                                            </div>
                                            <div class="home-area-box-item-content">
                                                <h6 class="two"><a href="dark/index-two-dark.html">Business Insurance (MultiPage)</a></h6>
                                                <h6 class="one"><a href="dark/index-two-dark.html">Business Insurance</a></h6>
                                            </div>
                                        </div>
                                        <div class="home-area-box-item">
                                            <div class="home-area-box-item-thumb">
                                                <ul>
                                                    <li><a target="_blank" href="rtl/index-three-dark-rtl.html">RTL</a></li>
                                                    <li><a target="_blank" href="onepage/index-three_onepage-dark.html">OnePage</a></li>
                                                </ul>
                                                <img src="assets/img/demo/dark-3.jpg" alt="demo-image">
                                            </div>
                                            <div class="home-area-box-item-content">
                                                <h6 class="two"><a href="dark/index-three-dark.html">Property Insurance (MultiPage)</a></h6>
                                                <h6 class="one"><a href="dark/index-three-dark.html">Property Insurance</a></h6>
                                            </div>
                                        </div>
                                        <div class="home-area-box-item">
                                            <div class="home-area-box-item-thumb">
                                                <ul>
                                                    <li><a target="_blank" href="rtl/index-four-dark-rtl.html">RTL</a></li>
                                                    <li><a target="_blank" href="onepage/index-four_onepage-dark.html">OnePage</a></li>
                                                </ul>
                                                <img src="assets/img/demo/dark-4.jpg" alt="demo-image">
                                            </div>
                                            <div class="home-area-box-item-content">
                                                <h6 class="two"><a href="dark/index-four-dark.html">Life Insurance (MultiPage)</a></h6>
                                                <h6 class="one"><a href="dark/index-four-dark.html">Life Insurance</a></h6>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Pages</a>
                            <ul class="sub-menu">
                                <li><a href="about.html">About Us</a></li>
                                <li><a href="pricing.html">Price Plans</a></li>
                                <li><a href="faq.html">FAQ's</a></li>
                                <li><a href="testimonial.html">Testimonials</a></li>
                                <li class="menu-item-has-children"><a href="#">Teams</a>
                                    <ul class="sub-menu">
                                        <li><a href="team-filter.html">Team Filter</a></li>
                                        <li><a href="team.html">Team 01</a></li>
                                        <li><a href="team-two.html">Team 02</a></li>
                                        <li><a href="team-three.html">Team 03</a></li>
                                        <li><a href="team-single.html">Team Single</a></li>
                                    </ul>
                                </li>
                                <li><a href="request-quote.html">Request Quote</a></li>
                                <li><a href="404-error.html">404 Page</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Services</a>
                            <ul class="sub-menu">
                                <li><a href="services.html">Services 01</a></li>
                                <li><a href="services-two.html">Services 02</a></li>
                                <li><a href="services-right-sidebar.html">Single Right Sidebar</a></li>
                                <li><a href="services-left-sidebar.html">Single Left Sidebar</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Project</a>
                            <ul class="sub-menu">
                                <li><a href="project-filter.html">Project Filter</a></li>
                                <li class="menu-item-has-children"><a href="#">Project Grid</a>
                                    <ul class="sub-menu">
                                        <li><a href="project-two.html">2 Columns</a></li>
                                        <li><a href="project-three.html">3 Columns</a></li>
                                        <li><a href="project-four.html">4 Columns</a></li>
                                    </ul>
                                </li>
                                <li><a href="project-single.html">Project Single</a></li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Blog</a>
                            <ul class="sub-menu">
                                <li class="menu-item-has-children"><a href="#">Blog Grid</a>
                                    <ul class="sub-menu">
                                        <li><a href="blog-grid-two.html">2 Columns</a></li>
                                        <li><a href="blog-grid-three.html">3 Columns</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">Blog Standard</a>
                                    <ul class="sub-menu">
                                        <li><a href="standard-left-sidebar.html">Left Sidebar</a></li>
                                        <li><a href="standard-full-width.html">Full Width</a></li>
                                        <li><a href="standard-right-sidebar.html">Right Sidebar</a></li>
                                    </ul>
                                </li>
                                <li class="menu-item-has-children"><a href="#">Blog Single</a>
                                    <ul class="sub-menu">
                                        <li><a href="single-left-sidebar.html">Left Sidebar</a></li>
                                        <li><a href="single-full-width.html">Full Width</a></li>
                                        <li><a href="single-right-sidebar.html">Right Sidebar</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item-has-children"><a href="#">Contact</a>
                            <ul class="sub-menu">
                                <li><a href="contact.html">Contact Style 01</a></li>
                                <li><a href="contact-two.html">Contact Style 02</a></li>
                                <li><a href="contact-three.html">Contact Style 03</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="header__area-menubar-right">
                <div class="header__area-menubar-right-search two">
                    <div class="search">
                        <span class="header__area-menubar-right-search-icon open"><i class="fal fa-search"></i></span>
                    </div>
                    <div class="header__area-menubar-right-search-box">
                        <form>
                            <input type="search" placeholder="Search Here.....">
                            <button type="submit"><i class="fal fa-search"></i>
                            </button>
                        </form>
                        <span class="header__area-menubar-right-search-box-icon"><i class="fal fa-times"></i></span>
                    </div>
                </div>
                <div class="header__area-menubar-right-sidebar">
                    <div class="header__area-menubar-right-sidebar-popup-icon"><i class="flaticon-dots-menu"></i></div>
                </div>
                <div class="header__area-menubar-right-btn">
                    <a class="btn-two" href="contact.html">Contact now</a>
                </div>
                <div class="header__area-menubar-right-responsive-menu menu__bar">
                    <i class="flaticon-dots-menu"></i>
                </div>
                <!-- sidebar Menu Start -->
                <div class="header__area-menubar-right-sidebar-popup two">
                    <div class="sidebar-close-btn"><i class="fal fa-times"></i></div>
                    <div class="header__area-menubar-right-sidebar-popup-logo">
                        <a href="index.html"> <img src="assets/img/logo-4.png" alt="Logo-image"> </a>
                    </div>
                    <p>The insurance company assumes the financial risk of covering these events in exchange for the premiums paid by the policyholder. There are many different types of insurance,</p>
                    <div class="header__area-menubar-right-sidebar-popup-contact">
                        <h4 class="mb-30">Get In Touch</h4>
                        <div class="header__area-menubar-right-sidebar-popup-contact-item">
                            <div class="header__area-menubar-right-sidebar-popup-contact-item-icon">
                                <i class="fal fa-phone-alt icon-animation"></i>
                            </div>
                            <div class="header__area-menubar-right-sidebar-popup-contact-item-content">
                                <span>Call Now</span>
                                <h6><a href="tel:+125(895)658568">+125 (895) 658 568</a></h6>
                            </div>
                        </div>
                        <div class="header__area-menubar-right-sidebar-popup-contact-item">
                            <div class="header__area-menubar-right-sidebar-popup-contact-item-icon">
                                <i class="fal fa-envelope"></i>
                            </div>
                            <div class="header__area-menubar-right-sidebar-popup-contact-item-content">
                                <span>Quick Email</span>
                                <h6><a href="mailto:info.help@gmail.com">info.help@gmail.com</a></h6>
                            </div>
                        </div>
                        <div class="header__area-menubar-right-sidebar-popup-contact-item">
                            <div class="header__area-menubar-right-sidebar-popup-contact-item-icon">
                                <i class="fal fa-map-marker-alt"></i>
                            </div>
                            <div class="header__area-menubar-right-sidebar-popup-contact-item-content">
                                <span>Office Address</span>
                                <h6><a href="https://www.google.com/maps" target="_blank">PV3M+X68 Welshpool United Kingdom</a></h6>
                            </div>
                        </div>
                    </div>
                    <div class="header__area-menubar-right-sidebar-popup-social">
                        <ul>
                            <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                            <li><a href="https://www.behance.net/" target="_blank"><i class="fab fa-behance"></i></a></li>
                            <li><a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
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
                    <a href="index.html"><img src="assets/img/logo-4.png" alt="logo-image"></a>
                    <div class="responsive-menu"></div>
                </div>
                <div class="menu__bar-popup-left-social">
                    <h6>Follow Us</h6>
                    <ul>
                        <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                        <li><a href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                        <li><a href="https://twitter.com/" target="_blank"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="https://dribbble.com/" target="_blank"><i class="fab fa-dribbble"></i></a></li>
                        <li><a href="https://www.behance.net/" target="_blank"><i class="fab fa-behance"></i></a></li>
                        <li><a href="https://www.linkedin.com/" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                        <li><a href="https://www.youtube.com/" target="_blank"><i class="fab fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="menu__bar-popup-right">
                <div class="menu__bar-popup-right-search">
                    <form>
                        <input type="search" placeholder="Search Here....." required>
                        <button type="submit"><i class="fal fa-search"></i>
                        </button>
                    </form>
                </div>
                <div class="menu__bar-popup-right-contact">
                    <h4>Get In Touch</h4>
                    <div class="menu__bar-popup-right-contact-item">
                        <div class="menu__bar-popup-right-contact-item-info">
                            <span>Call Now</span>
                            <h6><a href="tel:+125(895)658568">+125 (895) 658 568</a></h6>
                        </div>
                    </div>
                    <div class="menu__bar-popup-right-contact-item">
                        <div class="menu__bar-popup-right-contact-item-info">
                            <span>Quick Email</span>
                            <h6><a href="mailto:info.help@gmail.com">info.help@gmail.com</a></h6>
                        </div>
                    </div>
                    <div class="menu__bar-popup-right-contact-item">
                        <div class="menu__bar-popup-right-contact-item-info">
                            <span>Office Address</span>
                            <h6><a href="https://www.google.com/maps" target="_blank">PV3M+X68 Welshpool United Kingdom</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
