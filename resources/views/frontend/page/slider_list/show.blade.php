@extends('frontend.layouts.master')
@section('title') {{ $data['row']->list_title ?? $page_title }} @endsection

@section('content')

    @include($view_path.'slider_list.includes.breadcrumb',['breadcrumb_image'=>'image-3.jpeg'])

    <section class="services-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4">
                    @include($view_path.'slider_list.includes.sidebar')
                </div>
                <div class="col-xl-9 col-lg-8">
                    <div class="services-details__right">
                        <div class="services-details__img">
                            <img class="lazy" data-src="{{ asset(imagePath($data['row']->image)) }}" alt="">
                        </div>
                        <h3 class="services-details__title-1">
                            {{ $data['row']->list_title ?? '' }}
                        </h3>
                        <div class="services-details__text-1 text-align-justify custom-description">
                            {!!  $data['row']->list_description !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
@endsection
