<!-- Subscribe Area En -->
<!-- Footer Area Start -->
<div class="footer__one" data-background="{{asset('assets/frontend/img/shape/footer-bg-2.png')}}">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-5 col-sm-7">
                <div class="footer__one-widget">
                    <h4>About Us</h4>
                    <div class="footer__one-widget-about">
                        <a href="/">
                            <img class="lazy" data-src="{{ $setting_data->logo_white ?  asset(imagePath($setting_data->logo_white)) : asset(imagePath($setting_data->logo))}}" style="max-width: 90px;" alt="">
                        </a>
                        <p class="text-align-justify">{{ $setting_data->description ?? '' }}</p>
                        <div class="footer__one-widget-about-social">
                            <h6>Follow Us :</h6>
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
                                @if(!empty(@$setting_data->ticktock))
                                    <li><a href="{{$setting_data->ticktock}}" target="_blank"><i class="fab fa-tiktok"></i><span></span></a></li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-lg-3 col-sm-5">
                @if($footer_nav_data1!==null)
                    <div class="footer__one-widget">
                        <div class="footer__one-widget-menu footer__area-widget-menu two">
                            <h4>{{ $footer_nav_title1 ?? ''}}</h4>
                            <ul>
                                @foreach(@$footer_nav_data1 as $nav)
                                    @if(empty(@$nav->children[0]))
                                        <li><a href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">{{ @$nav->name ?? @$nav->title ?? ''}} </a></li>
                                    @endif
                                @endforeach
                            </ul>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                <div class="footer__one-widget">
                    <div class="footer__one-widget-location">
                        <h4>Company info</h4>
                        <div class="footer__one-widget-location-item">
                            <div class="footer__one-widget-location-item-icon">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div class="footer__one-widget-location-item-info">
                                <a href="mailto:{{ $setting_data->email ?? '' }}" target="_blank">{{ $setting_data->address ?? '' }}</a>
                            </div>
                        </div>
                        <h6>Reach out:</h6>
                        <div class="footer__one-widget-location-item">
                            <div class="footer__one-widget-location-item-icon">
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div class="footer__one-widget-location-item-info">
                                <span><a href="tel:{{ $setting_data->phone ?? $setting_data->mobile }}">{{ $setting_data->phone ?? $setting_data->mobile }}</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-lg-4 col-sm-6">
                @if($footer_nav_data2!==null)
                    <div class="footer__one-widget">
                    <div class="footer__one-widget-menu footer__area-widget-menu two">
                        <h4>{{ $footer_nav_title2 ?? ''}}</h4>
                        <ul>
                            @foreach(@$footer_nav_data2 as $nav)
                                @if(empty(@$nav->children[0]))
                                    <li><a href="{{get_menu_url(@$nav->type, @$nav)}}" target="{{@$nav->target ? '_blank':''}}">{{ @$nav->name ?? @$nav->title ?? ''}} </a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="copyright__two">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <p>Copyright 2023  <a href="/">{{ $setting_data->title ?? '' }}</a> - All Rights Reserved By <a href="https://www.canosoft.com.np/" target="_blank">Canosoft Technology</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer Area End -->
<!-- Scroll Btn Start -->
<div class="scroll-up scroll-two">
    <svg class="scroll-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102"><path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" /> </svg>
</div>
<!-- Scroll Btn End -->
<!-- Main JS -->
<script src="{{ asset('assets/frontend/js/jquery-3.7.0.min.js') }}"></script>
<!-- Bootstrap JS -->
<script src="{{ asset('assets/frontend/js/bootstrap.min.js') }}"></script>
<!-- Counter Up JS -->
<script src="{{ asset('assets/frontend/js/jquery.counterup.min.js') }}"></script>
<!-- Popper JS -->
<script src="{{ asset('assets/frontend/js/popper.min.js') }}"></script>
<!-- Progressbar JS -->
<script src="{{ asset('assets/frontend/js/progressbar.min.js') }}"></script>
<!-- Magnific Popup JS -->
<script src="{{ asset('assets/frontend/js/jquery.magnific-popup.min.js') }}"></script>
<!-- Swiper Bundle JS -->
<script src="{{ asset('assets/frontend/js/swiper-bundle.min.js') }}"></script>
<!-- Isotope JS -->
<script src="{{ asset('assets/frontend/js/isotope.pkgd.min.js') }}"></script>
<!-- Waypoints JS -->
<script src="{{ asset('assets/frontend/js/jquery.waypoints.min.js') }}"></script>
<!-- Mean Menu JS -->
<script src="{{ asset('assets/frontend/js/jquery.meanmenu.min.js') }}"></script>
<!-- Custom JS -->
<script src="{{ asset('assets/frontend/js/custom.js') }}"></script>

<script src="{{ asset('assets/common/lazyload.js') }}"></script>

@yield('js')
@stack('scripts')
</body>
</html>
