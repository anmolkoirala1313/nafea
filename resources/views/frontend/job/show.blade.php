@extends('frontend.layouts.master')
@section('title') {{ $data['row']->title ?? $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=>'background_action.jpeg'])

    <section class="portfolio-details">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="portfolio-details__img">
                        <img class="lazy" data-src="{{ asset(imagePath($data['row']->image)) }}" alt="">
                    </div>
                </div>
                <div class="portfolio-details__bottom">
                    <div class="row">
                        <div class="col-xl-8 col-lg-7">
                            <div class="portfolio-details__left">
                                <h3 class="portfolio-details__title">
                                    {{ $data['row']->name ?? $data['row']->title ?? '' }}
                                </h3>
                                <div class="portfolio-details__text-1 text-align-justify custom-description">
                                    {!!  $data['row']->description !!}
                                </div>
                                <div class="news-details__tag-and-social">
                                    <div class="news-details__tag">
                                        <span>Category:</span>
                                        @foreach($data['row']->categories as $category)
                                            <a href="{{ route('frontend.job.category',$category->title)}}">{{$category->title}}</a>
                                        @endforeach
                                    </div>
                                    <div class="news-details__social">
                                        <span>Share on:</span>
                                        <a href="#"><i class="fab fa-facebook" onclick='fbShare("{{route('frontend.job.show',$data['row']->slug)}}")'></i></a>
                                        <a href="#"><i class="fab fa-twitter" onclick='twitShare("{{route('frontend.job.show',$data['row']->slug)}}","{{ $data['row']->title }}")'></i></a>
                                        <a href="#"><i class="fab fa-whatsapp" onclick='whatsappShare("{{route('frontend.job.show',$data['row']->slug)}}","{{ $data['row']->title }}")'></i></a>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-5">
                            <div class="portfolio-details__right">
                                <div class="portfolio-details__information-box">
                                    <h3 class="portfolio-details__information-title">Job Information</h3>
                                    <ul class="portfolio-details__information list-unstyled">
                                        <li>
                                            <div class="icon">
                                                <span class="icon-date11"></span>
                                            </div>
                                            <div class="content">
                                                <p>Published Date:</p>
                                                <h4>
                                                    @if(@$data['row']->end_date >= date('Y-m-d'))
                                                        {{date('M j, Y',strtotime(@$data['row']->start_date))}} - {{date('M j, Y',strtotime(@$data['row']->end_date))}}
                                                    @else
                                                        Expired
                                                    @endif
                                                </h4>
                                            </div>
                                        </li>
                                        @if($data['row']->company)
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-bank-building"></span>
                                                </div>
                                                <div class="content">
                                                    <p>Required Number:</p>
                                                    <h4>{{ ucfirst($data['row']->company ?? '')}}</h4>
                                                </div>
                                            </li>
                                        @endif
                                        @if($data['row']->required_number)
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-list"></span>
                                                </div>
                                                <div class="content">
                                                    <p>Required Number:</p>
                                                    <h4>{{ $data['row']->required_number ?? ''}}</h4>
                                                </div>
                                            </li>
                                        @endif
                                        @if($data['row']->salary)
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-money"></span>
                                                </div>
                                                <div class="content">
                                                    <p>Salary:</p>
                                                    <h4>{{ $data['row']->salary ?? '' }}</h4>
                                                </div>
                                            </li>
                                        @endif
                                        @if($data['row']->min_qualification)
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-category"></span>
                                                </div>
                                                <div class="content">
                                                    <p>Minimum Qualification:</p>
                                                    <h4>{{ $data['row']->min_qualification  ?? ''}}</h4>
                                                </div>
                                            </li>
                                        @endif
                                        @if($data['row']->formlink && $data['row']->end_date >= date('Y-m-d'))
                                            <li>
                                                <div class="icon">
                                                    <span class="icon-location11"></span>
                                                </div>
                                                <div class="content">
                                                    <p>Apply:</p>
                                                    <h4><a href="{{$data['row']->formlink}}" target="_blank">Submit response</a></h4>
                                                </div>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
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
