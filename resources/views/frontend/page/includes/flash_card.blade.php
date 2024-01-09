<section class="services-page" style="background-color: #fff;padding: 45px 0 90px;">
    <div class="container">
        <div class="section-title-three text-left">
            <div class="section-title__tagline-box">
                <p class="section-title__tagline">{{ $element->first()->subtitle ?? '' }}</p>
            </div>
            <h2 class="section-title-three__title">{{ $element->first()->title ?? '' }}</h2>
        </div>
        <div class="row">
            @foreach($element as $index=>$row)
                <div class="col-xl-4 col-lg-6 col-md-6 d-flex align-items-stretch">
                    <div class="services-page__single">
                        <h3 class="services-page__title">
                            <a>{{$row->list_title ?? ''}}</a>
                        </h3>
                        <div class="services-page__icon">
                            @if($row->image)
                                <span><img src="{{ asset(imagePath($row->image)) }}"  alt=""></span>
                            @else
                                <span class="{{ get_flash_card_icons($index) }}"></span>
                            @endif
                        </div>
                        <p class="services-page__text text-align-justify">{{$row->list_description ?? ''}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
