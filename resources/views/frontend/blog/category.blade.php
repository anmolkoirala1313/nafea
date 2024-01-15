@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=>'image-2.png'])

    <div class="blog__standard section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-8 lg-mb-50">
                    <div class="row">
                        @foreach( $data['rows']  as $index=>$row)
                            <div class="col-xl-6 col-lg-6 d-flex align-items-stretch {{ $index > 1 ? 'mt-4':'' }}">
                                <div class="blog__one-item">
                                    <div class="blog__one-item-image">
                                        <img class="lazy" data-src="{{ asset(imagePath($row->image))}}" alt="">
                                    </div>
                                    <div class="blog__one-item-content">
                                        <div class="blog__one-item-content-meta">
                                            <ul>
                                                <li><a href="{{ route('frontend.blog.show', $row->slug) }}"><i class="far fa-list-alt"></i>{{ $row->blogCategory->title ?? '' }}</a></li>
                                                <li><a href="{{ route('frontend.blog.show', $row->slug) }}"><i class="far fa-calendar-alt"></i>{{date('d, M Y', strtotime($row->created_at))}}</a></li>
                                            </ul>
                                        </div>
                                        <h4><a href="{{ route('frontend.blog.show', $row->slug) }}"> {{ $row->title ?? '' }}</a></h4>
                                    </div>
                                    <div class="blog__one-item-btn">
                                        <a href="{{ route('frontend.blog.show', $row->slug) }}">Read More<span><i class="far fa-long-arrow-right"></i></span></a>
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
