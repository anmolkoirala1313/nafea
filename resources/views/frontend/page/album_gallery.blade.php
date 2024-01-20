@extends('frontend.layouts.master')
@section('title') {{ $page }} @endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}" />
    <style>
        .image-dimension{
            height: 425px;
            width: 425px;
            object-fit: cover;
        }
    </style>
@endsection


@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'image-3.jpeg'])

    <div class="portfolio__three-page section-padding">
        <div class="container">
            <div class="footer__one-widget-gallery-area four">
                @foreach($data['rows']->albumGallery as $index=>$gallery)
                    <div class="footer__one-widget-gallery-area-item">
                        <a class="img-popup" href="{{ asset(galleryImagePath('album').$gallery->resized_name) }}">
                            <img src="{{ asset(galleryImagePath('album').$gallery->resized_name) }}" class="image-dimension" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_alert')
@endsection
