@extends('frontend.layouts.master')
@section('title') {{ $page }} @endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}" />
    <style>
        .image-dimension{
            height: 270px;
            object-fit: cover;
        }
    </style>
@endsection


@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'image-3.jpeg'])


    <section class="portfolio-one">
        <div class="container">
            <div class="row">
                @foreach($data['rows']->albumGallery as $index=>$gallery)

                    <div class="col-xl-3 col-lg-6 col-md-6 wow fadeInDown" data-wow-delay="{{$index+1}}00ms">
                        <div class="portfolio-one__single">
                            <div class="portfolio-one__img-box">
                                <div class="portfolio-one__img">
                                    <img class="image-dimension" src="{{ asset(galleryImagePath('album').$gallery->resized_name) }}" alt="">
                                </div>
                                <div class="portfolio-one__arrow">
                                    <a href="{{ asset(galleryImagePath('album').$gallery->resized_name) }}" class="img-popup"><span
                                            class="icon-top-right-1"></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>

        </div>
    </section>
@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_alert')
@endsection
