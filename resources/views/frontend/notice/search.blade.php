@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=>'image-2.png'])

    <div class="blog__standard section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-4 order-last order-lg-first">
                    @include($view_path.'includes.sidebar')
                </div>
                <div class="col-xl-8 col-lg-8 lg-mb-50">
                    <div class="blog__standard-left">
                        <h5>We found: <span class="text-primary">{{ count($data['rows']) }} Notice{{ count($data['rows']) > 1 ?'s':'' }}</span> </h5>
                        @foreach( $data['rows']  as $index=>$row)
                            <div class="blog__standard-left-item">
                                <div class="blog__standard-left-item-image">
                                    <a href="{{ route('frontend.notice.show', $row->slug) }}">
                                        <img class="lazy" data-src="{{ asset(imagePath($row->image))}}" alt="">
                                    </a>
                                </div>
                                <div class="blog__standard-left-item-content">
                                    <div class="blog__standard-left-item-content-meta">
                                        <ul>
                                            <li><a href="{{ route('frontend.blog.show', $row->slug) }}"><i class="far fa-calendar-alt"></i>{{date('d, M Y', strtotime($row->created_at))}}</a></li>
                                        </ul>
                                    </div>
                                    <h3 class="mb-10"><a href="{{ route('frontend.notice.show', $row->slug) }}">
                                            {{ $row->title ?? '' }}</a></h3>
                                    <p>{{ elipsis(strip_tags($row->description ?? ''), 30) }}</p>
                                    <a class="btn-two" href="{{ route('frontend.notice.show', $row->slug) }}">Read More</a>
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
