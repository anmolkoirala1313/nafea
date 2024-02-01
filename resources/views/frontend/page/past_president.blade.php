@extends('frontend.layouts.master')
@section('title') {{ $page }} @endsection
@section('css')
@endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'image-3.jpeg'])

    <div class="team-one">
        <div class="container">
            @if($data['heading'])
                <div class="row">
                    <div class="col-xl-12 col-lg-12 text-center">
                        <div class="about__four-right-title mb-0">
                            <span class="subtitle-four" style="margin-bottom: 0px;">{{ $data['heading']->subtitle ?? '' }}</span>
                            <h2 style="width: 50%;margin:auto;line-height: 50px;">{{ $data['heading']->title ?? '' }}</h2>
                        </div>
                    </div>
                    <div class="custom-description text-align-justify text-center mt-3">
                        {!! $data['heading']->description ?? ''  !!}
                    </div>
                </div>
            @endif
            <div class="row">
                @foreach($data['rows'] as $row)
                    <div class="col-lg-4 col-md-6">
                        <div class="team__four-item">
                            <div class="team__four-item-image">
                                <img class="lazy" data-src="{{ asset(imagePath($row->image)) }}" alt="">
                                <div class="team__four-item-image-social">
                                    <ul>
                                        @if($row->fb_link)
                                            <li><a href="{{ $row->fb_link  ?? "#" }}" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                                        @endif
                                        @if($row->instagram_link)
                                            <li><a href="{{ $row->instagram_link  ?? "#" }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                                        @endif
                                        @if($row->twitter_link)
                                            <li><a href="{{ $row->twitter_link  ?? "#" }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                                        @endif
                                        @if($row->linkedin_link)
                                            <li><a href="{{ $row->linkedin_link  ?? "#" }}" target="_blank"><i class="fab fa-linkedin-in"></i></a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                            <div class="team__four-item-content">
                                <span>{{$row->designation ?? ''}} - {{$row->duration ?? ''}}</span>
                                <h4 style="font-size: 22px;"><a>{{$row->title ?? ''}}</a></h4>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_alert')
@endsection
