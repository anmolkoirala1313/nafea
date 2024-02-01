<div class="features__two section-padding" data-background="{{ asset('assets/frontend/img/shape/features.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-7 lg-mb-30">
                <div class="features__two-left mt-5">
                    <div class="features__two-left-title" style="width: 110%;">
                        <span class="subtitle-three">{{ $element->first()->subtitle ?? '' }}</span>
                        <h2>{{ $element->first()->title ?? '' }}</h2>
                        <p class="text-align-justify">
                            {{ $element->first()->description ?? '' }}
                        </p>
                        @if($element->first()->button_link)
                            <div class="about__one-right-bottom">
                                <div class="about__one-right-bottom-list">
                                    <a class="btn-two" href="{{ $element->first()->button_link ?? '' }}">{{ $element->first()->button }}</a>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-lg-5">
                <div class="features__two-right dark__image">
                    @if($setting_data && $setting_data->google_map)
                        <iframe src="{{ $setting_data->google_map }}" style="border:0;width: 625px;height: 729px;" allowfullscreen="" loading="lazy"></iframe>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

