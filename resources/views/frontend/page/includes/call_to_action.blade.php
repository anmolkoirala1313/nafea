<section class="cta-one mt-5">
    <div class="container">
        <div class="cta-one__inner">
            <div class="counter-one__bg float-bob-y" style="background-image: url({{ asset('assets/frontend/images/backgrounds/counter-one-bg.png') }});"></div>
            <div class="cta-one__title-box">
                <h3 class="cta-one__title">  {{ $element->first()->title ?? '' }}</h3>
                <p class="cta-one__text">{{ $element->first()->subtitle ?? '' }}</p>
            </div>
            @if($element->first()->button_link)
                <div class="cta-one__btn-box">
                    <a href="{{ $element->first()->button_link }}" class="cta-one__btn thm-btn">{{ $element->first()->button ?? 'Learn More' }}</a>
                </div>
            @endif

        </div>
    </div>
</section>
