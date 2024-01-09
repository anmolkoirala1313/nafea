@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection
@section('css')
@endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg'])


    <!--Information Start-->
    <section class="information">
        <div class="container">
            <div class="row">
                <!--Information Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="100ms">
                    <div class="information__single">
                        <div class="information__icon">
                            <span class="icon-chat-1"></span>
                        </div>
                        <p class="information__text">Send Message</p>
                        <p class="information__number">Use our contact form</p>
                    </div>
                </div>
                <!--Information Single End-->
                <!--Information Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="200ms">
                    <div class="information__single">
                        <div class="information__icon">
                            <span class="icon-phone-call"></span>
                        </div>
                        <p class="information__text">Call Us</p>
                        <p class="information__number"><a href="tel:{{ $data['setting_data']->phone ?? $data['setting_data']->mobile ?? '' }}">{{ $data['setting_data']->phone ?? $data['setting_data']->mobile ?? '' }}</a></p>
                    </div>
                </div>
                <!--Information Single End-->
                <!--Information Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="300ms">
                    <div class="information__single">
                        <div class="information__icon">
                            <span class="icon-gmail"></span>
                        </div>
                        <p class="information__text">Mail Us</p>
                        <p class="information__number"><a href="mailto:{{ $data['setting_data']->email }}">{{ $data['setting_data']->email }}</a>
                        </p>
                    </div>
                </div>
                <!--Information Single End-->
                <!--Information Single Start-->
                <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInUp" data-wow-delay="400ms">
                    <div class="information__single">
                        <div class="information__icon">
                            <span class="icon-location-2"></span>
                        </div>
                        <p class="information__text">Office Address</p>
                        <p class="information__number">{{ $data['setting_data']->address }}</p>
                    </div>
                </div>
                <!--Information Single End-->
            </div>
        </div>
    </section>
    <!--Information End-->

    <!--Contact Page Start-->
    <section class="contact-page">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6">
                    <div class="contact-page__left">
                        <h3 class="contact-page__title">Get in Touch</h3>
                        <p class="contact-page__sub-title">LEAVE US A MESSAGE</p>
                        <div class="contact-page__form-box">
                            {!! Form::open(['route' => $module.'contact-us.store', 'method'=>'POST', 'class'=>'contact-page__form contact-form-validated submit_form','novalidate'=>'novalidate']) !!}
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="contact-page__input-box">
                                            <h3 class="contact-page__input-title">Full Name *</h3>
                                            <input type="text" placeholder="Name" name="name">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="contact-page__input-box">
                                            <h3 class="contact-page__input-title">Email *</h3>
                                            <input placeholder="Your Email" type="email" name="email">
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="contact-page__input-box">
                                            <h3 class="contact-page__input-title">Phone Number *</h3>
                                            <input type="text" placeholder="Phone" name="phone" >
                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="contact-page__input-box">
                                            <h3 class="contact-page__input-title">subject*</h3>
                                            <input type="text" placeholder="Subject" name="subject">

                                        </div>
                                    </div>
                                    <div class="col-xl-12">
                                        <div class="contact-page__input-box text-message-box">
                                            <h3 class="contact-page__input-title">Message
                                                <span>(Oprional)</span></h3>
                                            <textarea placeholder="Message" name="message" rows="5"></textarea>
                                        </div>
                                        <div class="contact-page__btn-box">
                                            <button type="submit" class="thm-btn contact-page__btn"><span
                                                    class="fas fa-paper-plane"></span>SEND
                                                MESSAGE</button>
                                        </div>
                                    </div>
                                </div>
                            {!! Form::close() !!}
                            <div class="result"></div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6">
                    <div class="contact-page__right">
                        @if($data['setting_data'] && $data['setting_data']->google_map)
                            <iframe src="{{$data['setting_data']->google_map}}" style="border:0;width: 625px;height: 746px;" allowfullscreen="" loading="lazy"></iframe>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--Contact Page End-->
@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_alert')
@endsection
