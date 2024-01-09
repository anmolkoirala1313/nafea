@extends('frontend.layouts.master')
@section('title') {{ $data['row']->title ?? $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=>'image-3.jpeg'])

    <section class="news-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-8 col-lg-7">
                    <div class="news-details__left">
                        <div class="news-details__img">
                            <img class="lazy" data-src="{{ asset(imagePath($data['row']->image)) }}" alt="">
                        </div>
                        <div class="news-details__author-and-meta">
                            <div class="news-details__meta">
                                <p><span class="fas fa-calendar"></span>{{date('d M Y', strtotime($data['row']->created_at))}}</p>
                                <p> <a href="{{ route('frontend.blog.category', $data['row']->blogCategory->slug)}}" >
                                    <span class="fas fa-list-alt"></span>
                                        {{ $data['row']->blogCategory->title ?? ''}}
                                    </a>
                                </p>
                            </div>
                        </div>
                        <h3 class="news-details__title-1">
                            {{ $data['row']->title ?? '' }}
                        </h3>
                        <div class="news-details__text-2 text-align-justify custom-description">{!!  $data['row']->description !!}</div>
                        <div class="news-details__tag-and-social">
                            <div class="news-details__tag">
                            </div>
                            <div class="news-details__social">
                                <span>Share on:</span>
                                <a href="#"><i class="fab fa-facebook" onclick='fbShare("{{route('frontend.blog.show',$data['row']->slug)}}")'></i></a>
                                <a href="#"><i class="fab fa-twitter" onclick='twitShare("{{route('frontend.blog.show',$data['row']->slug)}}","{{ $data['row']->title }}")'></i></a>
                                <a href="#"><i class="fab fa-whatsapp" onclick='whatsappShare("{{route('frontend.blog.show',$data['row']->slug)}}","{{ $data['row']->title }}")'></i></a>

                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-5">
                    @include($view_path.'includes.sidebar')
                </div>
            </div>
        </div>
    </section>
@endsection

@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script>
        function fbShare(url) {
            window.open("https://www.facebook.com/sharer/sharer.php?u=" + url, "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
        }
        function twitShare(url, title) {
            window.open("https://twitter.com/intent/tweet?text=" + encodeURIComponent(title) + "+" + url + "", "_blank", "toolbar=no, scrollbars=yes, resizable=yes, top=200, left=500, width=600, height=400");
        }
        function whatsappShare(url, title) {
            message = title + " " + url;
            window.open("https://api.whatsapp.com/send?text=" + message);
        }
        $( document ).ready(function() {
            let selector = $('.custom-description').find('table').length;
            if(selector>0){
                $('.custom-description').find('table').addClass('table table-bordered table-responsive');
            }
        });
    </script>
@endsection
