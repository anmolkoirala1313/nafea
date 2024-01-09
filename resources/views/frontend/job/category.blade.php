@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=>'image-2.png'])

    <section class="news-page-three news-list-three-left">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    @include($view_path.'includes.sidebar')
                </div>
                <div class="col-xl-8 col-lg-7">
                    <div class="news-page-three__left">
                        <div class="news-page-three__content-box">
                            <div class="row">
                                @foreach( $data['rows']  as $index=>$row)
                                    <div class="col-xl-6 col-lg-6 col-md-6">
                                        <div class="portfolio-three__single">
                                            <div class="portfolio-three__img-box">
                                                <div class="portfolio-three__img">
                                                    <img class="lazy" data-src="{{ asset(imagePath($row->image)) }}" alt="">
                                                </div>
                                            </div>
                                            <div class="portfolio-three__content">
                                                <p class="portfolio-three__sub-title">
                                                    @if(@$row->end_date >= date('Y-m-d'))
                                                        {{date('M j, Y',strtotime(@$row->start_date))}} - {{date('M j, Y',strtotime(@$row->end_date))}}
                                                    @else
                                                        Expired
                                                    @endif</p>
                                                <h3 class="portfolio-three__title"><a href="{{ route('frontend.job.show', $row->slug) }}">{{ $row->title ?? '' }}</a></h3>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="portfolio-page__pagination">
                            {{ $data['rows']->links('vendor.pagination.default') }}
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
