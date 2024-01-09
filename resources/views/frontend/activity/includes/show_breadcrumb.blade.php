<section class="pt-2 pb-13 page-title bg-img-cover-center bg-white-overlay" style="background-image:url({{ $data['row']->cover ? asset(imagePath($data['row']->cover)) : asset('assets/frontend/images/bread-bg2.jpeg')}});">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb mb-0 p-0">
                <li class="breadcrumb-item text-white"><a href="#">Home</a></li>
                <li class="breadcrumb-item text-white" aria-current="page">
                    <a href="{{route($base_route.'index')}}">{{ $page }}</a>
                </li>
                <li class="breadcrumb-item active text-white" aria-current="{{ $data['row']->title ?? $page_title ?? '' }}">
                    {{ $page_title }}
                </li>
            </ol>
        </nav>
        <h1 class="fs-30 lh-15 mb-0 text-white font-weight-500 text-center pt-10" data-animate="fadeInDown">
            {{ $data['row']->title ?? $page_title ?? '' }}
        </h1>
    </div>
</section>
