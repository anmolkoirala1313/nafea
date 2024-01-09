@extends('frontend.layouts.master')
@section('title') {{ $data['row']->title ?? $page_title }} @endsection
@section('css')
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}" />
@endsection

@section('content')

    @include($view_path.'includes.show_breadcrumb')

    <div class="primary-content pt-8">
        <div class="container">
            <div class="row">
                <article class="col-lg-8 pr-xl-4">
                    <section class="pb-6 border-bottom">
                        <div class="d-sm-flex justify-content-sm-between mb-4">
                            <div>
                                <h2 class="fs-35 font-weight-600 lh-15 text-heading">{{ $data['row']->title }}</h2>
                                <span class="list-inline-item mr-2 mt-2 mt-sm-0"><i class="fal fa-clock mr-1"></i>{{date('d M Y', strtotime($data['row']->created_at))}}</span>
                            </div>
                            <div class="mt-2 text-lg-right">
                                <p class="fs-22 text-heading font-weight-bold mb-0">{{ $data['row']->price ?? ''}}</p>
                                @if($data['row']->package_ribbon_id)
                                    <span class="list-inline-item badge badge-orange mr-2 {{$data['row']->packageRibbon->key ?? ''}}">{{$data['row']->packageRibbon->title ?? ''}}</span>
                                @endif
                            </div>
                        </div>
                        @if(count($data['row']->packageGalleries)>0)
                            @include($view_path.'partials.gallery')
                        @endif

                        <h4 class="fs-22 text-heading mt-6 mb-6">Facts and Features</h4>
                        <div class="row">
                            <div class="col-lg-4 col-sm-4 mb-6">
                                <div class="media">
                                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                        <i class="far fa-globe-asia fs-32 text-primary"></i>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Country</h5>
                                        <p class="mb-0 fs-13 font-weight-bold text-heading">{{ $data['row']->country->title ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                            @if( $data['row']->duration )
                                <div class="col-lg-4 col-sm-4 mb-6">
                                    <div class="media">
                                        <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                            <i class="far fa-calendar-alt fs-32 text-primary"></i>
                                        </div>
                                        <div class="media-body">
                                            <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Duration</h5>
                                            <p class="mb-0 fs-13 font-weight-bold text-heading">{{ $data['row']->duration ?? ''}}</p>
                                        </div>
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg-4 col-sm-4 mb-6">
                                <div class="media">
                                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                        <i class="far fa-list-alt fs-32 text-primary"></i>
                                    </div>
                                    <div class="media-body">
                                        <h5 class="my-1 fs-14 text-uppercase letter-spacing-093 font-weight-normal">Category</h5>
                                        <p class="mb-0 fs-13 font-weight-bold text-heading">{{ $data['row']->packageCategory->title ?? '' }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @include($view_path.'partials.description')

                </article>
                @include($view_path.'includes.sidebar')
            </div>
        </div>
    </div>

    @if(count($data['related_activity']) > 0)
        @include($view_path.'partials.related_activity')
    @endif
@endsection

@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/frontend/js/navbar-sticky.js')}}"></script>
@endsection
