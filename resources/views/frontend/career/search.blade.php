@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=>'image-2.png'])

    <section class="news-page-two news-list-two-left">
        <div class="container">
            <div class="row">
                <div class="col-xl-4 col-lg-5">
                    @include($view_path.'includes.sidebar')
                </div>
                <div class="col-xl-8 col-lg-7">
                    <h3 class="team-five__title">We found: <span class="search-text">{{ count($data['rows']) }}</span> Job{{ count($data['rows']) > 1 ?'s':'' }}</h3>

                    <div class="news-page-two__left">
                        <div class="news-page-two__content-box">
                            @foreach( $data['rows']  as $index=>$row)
                                <div class="news-page-two__single wow fadeInUp" data-wow-delay="{{$index+1}}00ms">
                                    <div class="news-page-two__img">
                                        <img class="lazy" data-src="{{ asset(imagePath($row->image)) }}" alt="" style="width: 400px; height: 330px; object-fit: cover">
                                    </div>
                                    <div class="news-page-two__content">
                                        <p class="news-page-two__category"><a href="{{ route('frontend.career.show', $row->slug) }}">
                                                @if(@$row->end_date >= date('Y-m-d'))
                                                    {{date('M j, Y',strtotime(@$row->start_date))}} - {{date('M j, Y',strtotime(@$row->end_date))}}
                                                @else
                                                    Expired
                                                @endif
                                            </a>
                                        </p>
                                        <div class="news-page-two__title-box">
                                            <h3><a href="{{ route('frontend.career.show', $row->slug) }}">{{ $row->title ?? '' }}</a></h3>
                                        </div>
                                        <ul class="list-unstyled news-page-two__meta">
                                            @if($row->min_qualification)
                                                <li><a href="{{ route('frontend.career.show', $row->slug) }}"> <span class="icon-list"></span>
                                                        Min. Qualification: {{ ucfirst($row->min_qualification) }}</a>
                                                </li>
                                            @endif
                                            @if($row->required_number)
                                                <li><a href="{{ route('frontend.career.show', $row->slug) }}"> <span class="icon-user-2"></span>
                                                        Req. Number: {{ $row->required_number }}</a>
                                                </li>
                                            @endif
                                        </ul>
                                        <div class="news-page-two__read-more" style="margin-top: {{ $row->required_number || $row->min_qualification ? '38px':'101px' }}; ">
                                            <a href="{{ route('frontend.career.show', $row->slug) }}">View Details</a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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
