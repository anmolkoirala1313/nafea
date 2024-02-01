@extends('frontend.layouts.master')
@section('title') {{ $page }} @endsection
@section('css')
@endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'image-2.png'])

    <div class="portfolio__three-page section-padding">
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
            <div class="row">
                @foreach($data['rows'] as $row)
                    <div class="col-xl-4 col-lg-4 col-md-6">
                        <div class="portfolio__two-item">
                            <div class="portfolio__two-item-image">
                                <img class="lazy" data-src="{{ asset(imagePath($row->image)) }}" alt="">
                                <div class="portfolio__two-item-image-content">
                                    <a href="{{ route('frontend.page.album_gallery',$row->slug) }}"><i class="flaticon-arrows"></i></a>
                                    <span>Images: ({{ $row->album_gallery_count }})</span>
                                    <h4><a href="{{ route('frontend.page.album_gallery',$row->slug) }}">{{ $row->title ?? '' }}</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
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
