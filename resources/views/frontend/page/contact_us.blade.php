@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection
@section('css')
@endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg'])


    <div class="contact__three section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 lg-mb-30 d-flex align-items-stretch wow fadeInUp" data-wow-delay=".4s">
                    <div class="contact__three-info">
                        <div class="contact__three-info-icon">
                            <img class="lazy" data-src="{{ asset('assets/frontend/img/icon/locationss.png') }}" alt="">
                        </div>
                        <h4>Office Location</h4>
                        <span>You can visit our office at:</span>
                        <p>{{ $data['setting_data']->address ?? '' }}</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 md-mb-30 d-flex align-items-stretch wow fadeInUp" data-wow-delay=".8s">
                    <div class="contact__three-info">
                        <div class="contact__three-info-icon">
                            <img class="lazy" data-src="{{ asset('assets/frontend/img/icon/phone-call.png') }}" alt="">
                        </div>
                        <h4>Tell With US</h4>
                        <span>Keeping you better connected, always.</span>
                        @if($data['setting_data']->phone)
                            <p><a href="tel:{{ $data['setting_data']->phone ?? '' }}">{{ $data['setting_data']->phone ?? '' }}</a></p>
                        @endif
                        @if($data['setting_data']->mobile)
                            <p><a href="tel:{{ $data['setting_data']->mobile ?? '' }}">{{ $data['setting_data']->mobile ?? '' }}</a></p>
                        @endif
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-6 d-flex align-items-stretch wow fadeInUp" data-wow-delay="1.2s">
                    <div class="contact__three-info">
                        <div class="contact__three-info-icon">
                            <img class="lazy" data-src="{{ asset('assets/frontend/img/icon/emails.png') }}" alt="">
                        </div>
                        <h4>Quick Email</h4>
                        <span>Drop us a mail we will answer you asap.</span>
                        <p><a href="mailto:{{ $data['setting_data']->email }}">{{ $data['setting_data']->email ?? '' }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="contact__three">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="contact__three-form t-center">
                        <div class="contact__three-form-title">
                            <span class="subtitle-four">Get in Touch</span>
                            <h2>We are always Ready for your queries</h2>
                        </div>
                        {!! Form::open(['route' => $module.'contact-us.store', 'method'=>'POST', 'class'=>'submit_form','novalidate'=>'novalidate']) !!}
                            <div class="row">
                                <div class="col-md-6 mb-30">
                                    <div class="contact__two-right-form-item contact-item">
                                        <span class="fal fa-user"></span>
                                        <input type="text" name="name" placeholder="Full Name" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6 md-mb-30">
                                    <div class="contact__two-right-form-item contact-item">
                                        <span class="far fa-envelope-open"></span>
                                        <input type="email" name="email" placeholder="Email Address" >
                                    </div>
                                </div>
                                <div class="col-md-6 md-mb-30">
                                    <div class="contact__two-right-form-item contact-item">
                                        <span class="far fa-phone"></span>
                                        <input type="number" name="phone" placeholder="Phone Number" required="required">
                                    </div>
                                </div>
                                <div class="col-md-6 mb-30">
                                    <div class="contact__two-right-form-item contact-item">
                                        <span class="fal fa-book"></span>
                                        <input type="text" name="subject" placeholder="Subject">
                                    </div>
                                </div>
                                <div class="col-md-12 mb-30">
                                    <div class="contact__two-right-form-item contact-item">
                                        <span class="far fa-comments"></span>
                                        <textarea name="message" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="contact__two-right-form-item">
                                        <button class="btn-two" type="submit">Submit Message </button>
                                    </div>
                                </div>
                            </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>

    @if($data['setting_data'] && $data['setting_data']->google_map)

        <div class="contact__two-map">
            <iframe src="{{$data['setting_data']->google_map}}" loading="lazy"></iframe>
        </div>
    @endif
@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_alert')
@endsection
