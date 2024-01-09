@extends('frontend.layouts.master')
@section('title') {{ $page }} @endsection
@section('css')
@endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'image-2.png'])

    <section class="team-page" style="padding: 90px 0 90px;">
        <div class="container">
            @if($data['heading'])
                <div class="col-xl-6">
                    <div class="why-choose-one__left">
                        <div class="section-title text-left">
                            <div class="section-title__tagline-box">
                                <p class="section-title__tagline">{{ $data['heading']->subtitle ?? '' }}</p>
                            </div>
                            <h2 class="section-title__title section-title_normal">{{ $data['heading']->title ?? '' }}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="why-choose-one__text custom-description text-align-justify">
                    {!! $data['heading']->description ?? ''  !!}
                </div>
            @endif
            <div class="row mt-4">
                @foreach($data['rows'] as $team)
                    <div class="col-xl-3 col-lg-6 col-md-6">
                        <div class="team-two__single">
                            <div class="team-two__img-box">
                                <div class="team-two__img">
                                    <img class="lazy" data-src="{{ asset(imagePath($team->image)) }}" alt="">
                                </div>
                            </div>
                            <div class="team-two__content">
                                <div class="team-two__name-box">
                                    <h3 class="team-two__name"><a>{{$team->title ?? ''}}</a>
                                    </h3>
                                    <p class="team-two__sub-title">{{$team->designation ?? ''}}</p>
                                </div>
                                @if(@$team->fb_link || @$team->twitter_link || @$team->instagram_link || @$team->linkedin_link)
                                    <div class="team-two__social">
                                        @if($team->fb_link)
                                            <a href="{{ $team->fb_link  ?? "#" }}"><span class="fab fa-facebook"></span></a>
                                        @endif
                                        @if($team->instagram_link)
                                            <a href="{{ $team->instagram_link  ?? "#" }}"><span class="fab fa-instagram"></span></a>
                                        @endif
                                        @if($team->twitter_link)
                                            <a href="{{ $team->twitter_link  ?? "#" }}"><span class="fab fa-twitter"></span></a>
                                       @endif
                                       @if($team->linkedin_link)
                                            <a href="{{ $team->linkedin_link  ?? "#" }}"><span class="fab fa-linkedin"></span></a>
                                       @endif
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_alert')
@endsection
