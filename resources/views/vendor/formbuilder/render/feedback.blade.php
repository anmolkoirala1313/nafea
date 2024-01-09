@extends('formbuilder::front_layout')
@section('title') {{ ucfirst($form->name) }} @endsection
@section('css')
    <style>
        .contact-page__sub-title {
            font-size: 16px;
            font-weight: 400;
            text-transform: uppercase;
            color: #26292E;
            margin-top: 14px;
            margin-bottom: 11px!important;
        }

    </style>
@endsection
@section('content')

    <!-- Page Banner Start -->
    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg'])


    <section class="contact-page mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="contact-page__left">
                        {{--                        <h3 class="contact-page__title">Get in Touch</h3>--}}
                                                <p class="contact-page__sub-title">Your entry for <strong>{{ $form->name }}</strong> was successfully submitted.</p>
                        <div class="contact-page__form-box">
                            <div class="result"></div>
                            <div class="contact-page__btn-box">
                                <a  href="{{ url()->previous() }}" class="thm-btn contact-page__btn"><span class="fas fa-paper-plane"></span> View Form </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
