@extends('frontend.layouts.master')
@section('title') {{ $page }} @endsection
@section('css')
@endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'image-2.png'])

    <div class="testimonial__page section-padding">
        <div class="container">
            @if($data['heading'])
                <div class="row">
                    <div class="col-xl-12 col-lg-12 text-center">
                        <div class="about__four-right-title mb-0">
                            <span class="subtitle-four" style="margin-bottom: 0px;">{{ $data['heading']->subtitle ?? '' }}</span>
                            <h2 style="width: 50%;margin:auto;line-height: 50px;">{{ $data['heading']->title ?? '' }}</h2>
                        </div>
                    </div>
                    <div class="custom-description text-align-justify text-center mt-3">
                        {!! $data['heading']->description ?? ''  !!}
                    </div>
                </div>
            @endif
            <div class="row mt-3">
                @if(count($data['rows'] ))
                    @foreach($data['rows'] as $testimonial)
                        <div class="col-xl-4 col-md-6 mb-30 d-flex text-align-justify">
                            <div class="testimonial__page-item">
                                <div class="testimonial__page-item-top">
                                    <i class="flaticon-quote-1"></i>
                                </div>
                                <p class="text-align-justify">{{ $testimonial->description }}</p>
                                <div class="testimonial__page-item-bottom">
                                    <img class="lazy" data-src="{{ asset(imagePath($testimonial->image)) }}" alt="">
                                    <div class="testimonial__page-item-bottom-name">
                                        <h5>{{ $testimonial->title ?? '' }}</h5>
                                        <span>{{ $testimonial->position ?? '' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
            <div class="row mt-50">
                <div class="col-xl-12">
                    <div class="theme__pagination text-center">
                        {{ $data['rows']->links('vendor.pagination.default') }}
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_alert')
@endsection
