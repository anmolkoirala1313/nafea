<div class="page__banner">
    <div class="page__banner-image" data-background="{{ isset($page_image) && $page_image  ? asset(imagePath($page_image)) :
 asset('assets/frontend/img/banner/'.$breadcrumb_image) }}"></div>
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="page__banner-content">
                    <h1> {{ $page_title }}</h1>
                    <ul>
                        <li><a href="/">Home</a><span>|</span></li>
                    @if($page_method !=='index')
                            <li><a href="{{route($base_route.'index')}}">{{ $page }}</a><span>|</span></li>
                            <li>
                                {{ $page_title }}
                            </li>
                        @else
                            <li>
                                {{ $page }}
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
