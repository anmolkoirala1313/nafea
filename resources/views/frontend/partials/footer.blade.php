<!--Site Footer Three Start-->
<footer class="site-footer-three">
    <div class="site-footer-three__shape-1 float-bob-y">
        <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/site-footer-three-shape-1.png') }}" alt="">
    </div>
    <div class="site-footer-three__shape-2 img-bounce">
        <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/site-footer-three-shape-2.png') }}" alt="">
    </div>
    <div class="site-footer-three__shape-3 zoominout">
        <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/site-footer-three-shape-3.png') }}" alt="">
    </div>
    <div class="container">
        <div class="site-footer-three__top">
            <ul class="site-footer-three__contact-list list-unstyled">
                <li>
                    <div class="site-footer-three__contact-list-single">
                        <div class="icon">
                            <span class="icon-location-1"></span>
                        </div>
                        <div class="content">
                            <h3>Office Location</h3>
                            <p>{{ $setting_data->address ?? '' }}</p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="site-footer-three__contact-list-single">
                        <div class="icon">
                            <span class="icon-phone"></span>
                        </div>
                        <div class="content">
                            <h3>Get in touch</h3>
                            <p><a href="tel:{{ $setting_data->phone ?? $setting_data->mobile }}">{{ $setting_data->phone ?? $setting_data->mobile }}</a></p>
                        </div>
                    </div>
                </li>
                <li>
                    <div class="site-footer-three__contact-list-single">
                        <div class="icon">
                            <span class="icon-envelope"></span>
                        </div>
                        <div class="content">
                            <h3>Email</h3>
                            <p><a href="mailto:{{ $setting_data->email }}">{{ $setting_data->email }}</a></p>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="site-footer-three__middle">
            <div class="row">
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="footer-widget-three__column footer-widget-three__about">
                        <div class="footer-widget-two__logo">
                            <a href="/">
                                <img class="lazy" data-src="{{ $setting_data->logo_white ?  asset(imagePath($setting_data->logo_white)) : asset(imagePath($setting_data->logo))}}" style="max-width: 305px;" alt="">
                            </a>
                        </div>
                        <p class="footer-widget-three__about-text text-align-justify">{{ $setting_data->description ?? '' }}</p>
                        <div class="footer-widget-three__email">
                            <a href="mailto:{{ $setting_data->email ?? '' }}"><span
                                    class="icon-gmail"></span>{{ $setting_data->email ?? '' }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    @if($footer_nav_data1!==null)
                        <div class="footer-widget-three__column footer-widget-three__company">
                        <div class="footer-widget-three__title-box">
                            <h3 class="footer-widget-three__title">{{ $footer_nav_title1 ?? ''}}</h3>
                        </div>
                        <ul class="footer-widget-three__company-list list-unstyled">
                            @foreach(@$footer_nav_data1 as $nav)
                                @if(empty(@$nav->children[0]))
                                    <li><a href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">{{ @$nav->name ?? @$nav->title ?? ''}} </a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </div>
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    @if($footer_nav_data2!==null)
                        <div class="footer-widget-three__column footer-widget-three__company">
                            <div class="footer-widget-three__title-box">
                                <h3 class="footer-widget-three__title">{{ $footer_nav_title2 ?? ''}}</h3>
                            </div>
                            <ul class="footer-widget-three__company-list list-unstyled">
                                @foreach(@$footer_nav_data2 as $nav)
                                    @if(empty(@$nav->children[0]))
                                        <li><a href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">{{ @$nav->name ?? @$nav->title ?? ''}} </a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    @if( count($latest_blogs)>0)
                        <div class="footer-widget-three__column footer-widget-three__post">
                            <div class="footer-widget-three__title-box">
                                <h3 class="footer-widget-three__title">Latest Blogs</h3>
                            </div>
                            <ul class="footer-widget-three__post-list list-unstyled">
                                @foreach(@$latest_blogs as $latest)
                                    <li>
                                        <div class="footer-widget-three__post-img">
                                            <img class="lazy" data-src="{{ asset(imagePath($latest->image)) }}" alt="" style="width: 70px;height: 70px;object-fit: cover;">
                                        </div>
                                        <div class="footer-widget-three__post-content">
                                            <h3><a href="{{ route('frontend.blog.show', $latest->key) }}">{{ $latest->title ?? '' }}</a></h3>
                                            <p><span class="icon-menu"></span>{{ $latest->blogCategory->title ?? '' }}</p>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="site-footer-three__bottom">
        <div class="container">
            <div class="site-footer-three__bottom-inner">
                <p class="site-footer-three__bottom-text">
                    © 2023 {{$setting_data->title ?? ''}} <a href="https://www.canosoft.com.np/" class="text-white" target="_blank">Canosoft Techonology</a>  - All rights reserved

                </p>
                <div class="site-footer-three__bottom-social">
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
</footer>
<!--Site Three Footer End-->


</div><!-- /.page-wrapper -->


<div class="mobile-nav__wrapper">
    <div class="mobile-nav__overlay mobile-nav__toggler"></div>
    <!-- /.mobile-nav__overlay -->
    <div class="mobile-nav__content">
        <span class="mobile-nav__close mobile-nav__toggler"><i class="fa fa-times"></i></span>

        <div class="logo-box">
            <a href="/"><img src="{{ $setting_data->logo ?  asset(imagePath($setting_data->logo)) : asset(imagePath($setting_data->logo_white))}}" style="max-width: 355px;" alt=""></a>

        </div>
        <!-- /.logo-box -->
        <div class="mobile-nav__container"></div>
        <!-- /.mobile-nav__container -->

        <ul class="mobile-nav__contact list-unstyled">
            <li>
                <i class="fa fa-envelope"></i>
                <a href="mailto:{{ $setting_data->email ?? '' }}">{{ $setting_data->email ?? '' }}</a>
            </li>
            <li>
                <i class="fa fa-phone-alt"></i>
                <a href="tel:{{ $setting_data->phone ?? $setting_data->mobile }}">{{ $setting_data->phone ?? $setting_data->mobile }}</a>
            </li>
        </ul><!-- /.mobile-nav__contact -->
        <div class="mobile-nav__top">
            <div class="mobile-nav__social">
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
            </div><!-- /.mobile-nav__social -->
        </div><!-- /.mobile-nav__top -->



    </div>
    <!-- /.mobile-nav__content -->
</div>
<!-- /.mobile-nav__wrapper -->

<div class="search-popup">
    <div class="search-popup__overlay search-toggler"></div>
    <!-- /.search-popup__overlay -->
    <div class="search-popup__content">
        {!! Form::open(['route' => $module.'job.search', 'method'=>'GET']) !!}
            <label for="search" class="sr-only">search here</label><!-- /.sr-only -->
            <input type="text" id="search" placeholder="Search Jobs..." />
            <button type="submit" aria-label="search submit" class="thm-btn">
                <i class="icon-magnifying-glass"></i>
            </button>
        {!! Form::close() !!}

    </div>
    <!-- /.search-popup__content -->
</div>
<!-- /.search-popup -->

<a href="#" data-target="html" class="scroll-to-target scroll-to-top"><i class="icon-right-arrow"></i></a>
@if(@$setting_data->whatsapp || @$setting_data->viber)

    <div class="floatings floating-share">
        @if(@$setting_data->viber)
            <a href="viber://contact?number=%2B{{$setting_data->viber}}" target="_blank" class="hov viber" tooltip="Viber"><i class="fab fa-viber"></i></a>
        @endif
        @if(@$setting_data->whatsapp)
            <a href="https://wa.me/{{$setting_data->whatsapp}}" target="_blank" class="hov whatsapp" tooltip="Whatsapp"><i class="fab fa-whatsapp"></i></i></a>
        @endif
        <a target="_blank" class="hov theme"><i class="fa-solid fa-plus"></i></a>
    </div>
@endif

<script src="{{ asset('assets/frontend/vendors/jquery/jquery-3.6.0.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/jarallax/jarallax.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/jquery-ajaxchimp/jquery.ajaxchimp.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/jquery-appear/jquery.appear.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/jquery-circle-progress/jquery.circle-progress.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/jquery-magnific-popup/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/jquery-validate/jquery.validate.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/odometer/odometer.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/swiper/swiper.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/wnumb/wNumb.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/wow/wow.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/isotope/isotope.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/owl-carousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/bootstrap-select/js/bootstrap-select.min.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/jquery-ui/jquery-ui.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/timepicker/timePicker.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/circleType/jquery.circleType.js') }}"></script>
<script src="{{ asset('assets/frontend/vendors/circleType/jquery.lettering.min.js') }}"></script>


<script src="{{ asset('assets/frontend/js/bixola.js') }}"></script>
<script src="{{ asset('assets/common/lazyload.js') }}"></script>
@yield('js')
@stack('scripts')
</body>
</html>
