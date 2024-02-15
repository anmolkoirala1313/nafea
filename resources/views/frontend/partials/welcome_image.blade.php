<div class="about__one-left">
    <div class="about__one-left-image">
        <div class="image-overlay dark__image">
            <img class="lazy" data-src="{{ asset(imagePath($data['homepage']->image)) }}" alt="">
        </div>
        @if ($data['homepage']->video)
            <div class="about__one-left-image-experience">
                <div class="banner__two-content-button-video video-pulse">
                    <a class="video-popup" href="{{ $data['homepage']->video }}"><i class="fas fa-play"></i></a>
                </div>
            </div>
        @endif

    </div>
</div>
