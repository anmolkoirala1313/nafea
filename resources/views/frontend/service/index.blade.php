@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=>'image-2.png'])

    <div class="services__details section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 lg-mb-50">
                    <div class="row">
                        @foreach( $data['rows']  as $index=>$row)
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="services__one-item {{ $index > 1 ? 'mt-4':'mt-0' }}" style="border: 1px solid #eee;">
                                    <div class="services__one-item-image">
                                        <img class="lazy" data-src="{{ asset(imagePath($row->image)) }}" alt="">
                                    </div>
                                    <div class="services__one-item-content">
                                        <div class="services__one-item-content-icon">
                                            <i class="flaticon-winner"></i>
                                        </div>
                                        <h4><a href="{{ route('frontend.service.show', $row->key) }}">{{ $row->title ?? '' }}</a></h4>
                                        <p></p>
                                        <a href="{{ route('frontend.service.show', $row->key) }}">Read More<i class="fas fa-long-arrow-right"></i></a>
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
                <div class="col-xl-4 col-lg-4">
                    @include($view_path.'includes.sidebar')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
@endsection
