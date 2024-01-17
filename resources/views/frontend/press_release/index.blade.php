@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=>'background_action.jpeg'])

    <div class="blog__standard section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 order-last order-lg-first">
                    @include($view_path.'includes.sidebar')
                </div>
                <div class="col-xl-8 col-lg-8 lg-mb-50">
                    <div class="row">
                        @foreach( $data['rows']  as $index=>$row)
                            <div class="col-lg-6 lg-mb-30 d-flex align-items-stretch {{ $index > 1 ? 'mt-4':'' }}">
                                <div class="portfolio__one-item page">
                                    <img class="lazy" data-src="{{ asset(thumbnailImagePath($row->image))}}" alt="">
                                    <div class="portfolio__one-item-content">
                                        <div class="portfolio__one-item-content-left">
                                            <a href="{{ route('frontend.press_release.show', $row->slug) }}"><i class="flaticon-arrows"></i></a>
                                        </div>
                                        <div class="portfolio__one-item-content-right">
                                            <span><i class="far fa-calendar-alt"></i> {{date('d, M Y', strtotime($row->created_at))}}</span>

                                            <h4><a href="{{ route('frontend.press_release.show', $row->slug) }}">{{ $row->title ?? '' }}</a></h4>
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
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
@endsection
