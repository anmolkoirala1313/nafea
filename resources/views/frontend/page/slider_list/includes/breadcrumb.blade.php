<section class="page-header">
    <div class="page-header__bg" style="background-image:url({{ isset($page_image) && $page_image  ? asset(imagePath($page_image)) :
 asset('assets/frontend/images/backgrounds/'.$breadcrumb_image) }});">
    </div>
    <div class="page-header__shape-1 float-bob-y">
        <img src="{{ asset('assets/frontend/images/shapes/page-header-shape-1.png') }}" alt="">
    </div>
    <div class="page-header__shape-2 float-bob-x">
        <img src="{{ asset('assets/frontend/images/shapes/page-header-shape-2.png') }}" alt="">
    </div>
    <div class="page-header__shape-3 float-bob-y">
        <img src="{{ asset('assets/frontend/images/shapes/page-header-shape-3.png') }}" alt="">
    </div>
    <div class="page-header__shape-4 float-bob-x">
        <img src="{{ asset('assets/frontend/images/shapes/page-header-shape-4.png') }}" alt="">
    </div>
    <div class="container">
        <div class="page-header__inner">
            <h2>  {{ $page_title }}</h2>
            <ul class="thm-breadcrumb list-unstyled">
                <li>
                    <a href="/">Home</a>
                </li>
                <li><span class="icon-down-arrow"></span></li>
                <li>
                    <a href="{{route($base_route.'index', $data['row']->section->page->slug)}}">{{ucwords(@$data['row']->section->page->title)}}</a>
                </li>
                <li><span class="icon-down-arrow"></span></li>
                <li>
                    {{ucwords(@$data['row']->list_title ?? $page_title ?? '')}}
                </li>

            </ul>
        </div>
    </div>
</section>
