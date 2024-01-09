@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection

@section('content')

    @include($view_path.'includes.search_breadcrumb', ['breadcrumb_image'=>'bread-bg.jpeg'])

    <section class="pt-8 pb-11 bg-gray-01">
        <div class="container">
            <div class="row">
                @include($view_path.'includes.sidebar')
                <div class="col-lg-8 mb-8 mb-lg-0 order-1 order-lg-2">
                    <div class="row align-items-sm-center mb-4">
                        <div class="col-md-6">
                            <h2 class="fs-15 text-dark mb-0">We found <span class="text-primary">{{ count($data['rows']) }}</span> activities
                                available for you
                            </h2>
                        </div>
                    </div>
                    <div class="row align-items-sm-center mb-4">
                        @foreach($data['rows'] as $package)
                            <div class="col-lg-6 box pb-7 pt-2">
                                <div class="card shadow-hover-2" data-animate="zoomIn">
                                    <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                                        <img class="lazy" data-src="{{ asset(imagePath($package->image)) }}" alt="Home in Metric Way">
                                        <div class="card-img-overlay p-2 d-flex flex-column">
                                            @if($package->package_ribbon_id)
                                                <div>
                                                    <span class="badge mr-2 badge-orange {{$package->packageRibbon->key ?? ''}}">{{$package->packageRibbon->title ?? ''}}</span>
                                                </div>
                                            @endif
                                            <ul class="list-inline mb-0 mt-auto hover-image">
                                                @if(count( $package->packageGalleries ) !== 0)
                                                    <li class="list-inline-item mr-2" data-toggle="tooltip" title="{{count( $package->packageGalleries )}} Images">
                                                        <a href="#" class="text-white hover-primary">
                                                            <i class="far fa-images"></i><span class="pl-1">
                                                                    {{ count( $package->packageGalleries ) }}
                                                                </span>
                                                        </a>
                                                    </li>
                                                @endif
                                                @if($package->video)
                                                    <li class="list-inline-item" data-toggle="tooltip" title="1 Video">
                                                        <a href="{{ route('frontend.activity.show',$package->slug) }}" class="text-white hover-primary">
                                                            <i class="far fa-play-circle"></i><span class="pl-1">1</span>
                                                        </a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="card-body pt-3">
                                        <h2 class="card-title fs-16 lh-2 mb-0">
                                            <a href="{{ route('frontend.activity.show',$package->slug) }}" class="text-dark hover-primary">
                                                {{ $package->title ?? '' }}
                                            </a>
                                        </h2>
                                    </div>
                                    <div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                                        <a class="fs-16 font-weight-bold text-heading mb-0" href="{{ route('frontend.activity.category', $package->packageCategory->slug) }}">
                                            {{ $package->packageCategory->title }} {{ $package->price ?  ' / ' . $package->price:''}}
                                        </a>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item">
                                                <a class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent" data-toggle="tooltip" title="{{ $package->country->title }}">
                                                    <i class="fas fa-globe"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <nav class="pt-6">
                        {{ $data['rows']->links('vendor.pagination.default') }}
                    </nav>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
@endsection
