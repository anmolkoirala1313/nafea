<div class="about-two__img wow slideInRight animated" data-wow-delay="100ms">
    <div class="about-two__shape-1 img-bounce">
        <img class="lazy" data-src="{{ asset('assets/frontend/images/shapes/about-two-shape-1.png') }}" alt="">
    </div>
    <img src="{{ asset(imagePath($data['homepage']->image)) }}" alt="">
    @if($data['homepage']->video)
        <div class="about-two__video-link">
            <a href="{{ $data['homepage']->video }}" class="video-popup">
                <div class="about-two__video-icon">
                    <span class="fa fa-play"></span>
                    <i class="ripple"></i>
                </div>
            </a>
        </div>
    @endif
</div>
