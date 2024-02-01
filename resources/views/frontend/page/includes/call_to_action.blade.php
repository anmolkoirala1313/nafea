<div class="solution__area section-padding" data-background="{{ asset('assets/frontend/img/pages/cta.jpg') }}">
    <img class="solution__area-shape-one" src="{{ asset('assets/frontend/img/shape/cta-3.png') }}" alt="shape-image">
    <img class="solution__area-shape-two left-right-animate" src="{{ asset('assets/frontend/img/shape/cta-4.png') }}" alt="shape-image">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="solution__area-title md-t-center">
                    <span class="subtitle-four">{{ $element->first()->subtitle ?? '' }}</span>
                    <h2>{{ $element->first()->title ?? '' }}</h2>
                    @if($element->first()->button_link)
                        <a class="btn-two" href="{{ $element->first()->button_link }}">{{ $element->first()->button ?? 'Learn More' }}</a>
                    @endif
                </div>
            </div>
            <div class="col-md-4">
                <div class="solution__area-right">
                    @if($element->first()->description)
                        <div class="solution__area-right-video">
                            <div class="solution__area-right-icon video video-pulse">
                                <a class="video-popup" href="{{ $element->first()->description ?? '' }}"><i style="top: 38%;position: relative;" class="fas fa-play"></i></a>
                            </div>
{{--                            <h6>Watch The Consulting Video</h6>--}}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
