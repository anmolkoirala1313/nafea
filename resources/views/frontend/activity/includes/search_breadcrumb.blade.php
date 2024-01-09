<section class="position-relative pb-15 pt-2 page-title bg-patten"
         style="background-image: linear-gradient(180deg, rgba(24, 26, 32, 0) 0%, #181A20 100%), url({{ isset($page_image) && $page_image  ? asset(imagePath($page_image)) : asset('assets/frontend/images/'.$breadcrumb_image) }});">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb text-light mb-0 p-0">
                <li class="breadcrumb-item text-white"><a href="/">Home</a></li>
                @if($page_method !== 'index')
                    <li class="breadcrumb-item text-white"><a href="{{route($base_route.'index')}}">{{ $page }}</a></li>
                    <li class="breadcrumb-item active text-white" aria-current="page"> {{ $page_title }}</li>
                @else
                    <li class="breadcrumb-item active text-white" aria-current="page"> {{ $page_title }}</li>
                @endif

            </ol>
        </nav>
        <h1 class="fs-32 mb-0 text-white font-weight-600 text-center pt-11 mb-5 lh-17 mxw-478" data-animate="fadeInDown">
            {{ $page_title }} </h1>
    </div>
</section>

<section>
    <div class="container">
        <div class="mt-n8 bg-white px-6 py-3 shadow-sm-2 rounded-lg form-search-02 position-relative z-index-3">
            @include($module.'includes.tour_tab')
        </div>
    </div>
</section>
