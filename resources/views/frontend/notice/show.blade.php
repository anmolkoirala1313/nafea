@extends('frontend.layouts.master')
@section('title') {{ $data['row']->title ?? $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=>'image-3.jpeg'])

    <div class="project__single section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 lg-mb-20">
                    <div class="project__single-image mb-20 dark__image">
                        <img class="img__full lazy" data-src="{{ asset(imagePath($data['row']->image)) }}" alt="">
                    </div>
                    <div class="project__single-area">
                        <div class="project__single-area-content">
                            <h3 class="mb-10"> {{ $data['row']->title ?? '' }}</h3>
                            <div class="text-align-justify custom-description">
                                {!!  $data['row']->description !!}
                            </div>
                            <div class="row mt-45 mb-60">
                                <div class="col-md-4">
                                    <div class="blog__details-left-share">
                                        <h6>Share:</h6>
                                        <ul>
                                            <li><a href="#" target="_blank"><i class="fab fa-facebook-f" onclick='fbShare("{{route('frontend.notice.show',$data['row']->slug)}}")'></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-twitter" onclick='twitShare("{{route('frontend.notice.show',$data['row']->slug)}}","{{ $data['row']->title }}")'></i></a></li>
                                            <li><a href="#" target="_blank"><i class="fab fa-whatsapp" onclick='whatsappShare("{{route('frontend.notice.show',$data['row']->slug)}}","{{ $data['row']->title }}")'></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    @include($view_path.'includes.sidebar')
                </div>
            </div>
        </div>
    </div>
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
