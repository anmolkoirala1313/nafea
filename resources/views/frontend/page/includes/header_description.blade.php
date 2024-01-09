<section class="portfolio-details" style="padding: 0px;">
    <div class="container">
        <div class="row">
            <div class="portfolio-details__bottom">
                <div class="row">
                    <div class="col-xl-12 col-lg-12">
                        <div class="portfolio-details__left">
                            @if($element->first()->subtitle)
                                <h3 class="portfolio-details__title">
                                    {{$element->first()->subtitle ?? '' }}
                                </h3>
                            @endif
                            <div class="portfolio-details__text-1 text-align-justify custom-description">
                                {!! $element->first()->description ?? '' !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
