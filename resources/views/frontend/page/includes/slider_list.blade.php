<section class="news-one" style="background-color: #F5F7F8;padding: 100px 0 90px;margin-top: 40px;">
    <div class="container">
        <div class="section-title text-center">
            <div class="section-title__tagline-box">
                <p class="section-title__tagline">{{ $element->first()->subtitle ?? '' }}</p>
            </div>
            <h2 class="section-title__title">{{ $element->first()->title ?? '' }}</h2>
        </div>
        <div class="row">
            @if( $data['slider_list_type'] == 'normal')
                  @include($base_route.'includes.slider_list_detail')
            @else
                <div class="news-carousel thm-owl__carousel owl-theme owl-carousel carousel-dot-style" data-owl-options='{
                    "items": 3,
                    "margin": 30,
                    "smartSpeed": 600,
                    "loop":true,
                    "autoplay": 6000,
                    "nav":false,
                    "dots":true,
                    "navText": ["<span class=\"fa fa-angle-left\"></span>","<span class=\"fa fa-angle-right\"></span>"],
                    "responsive":{
                        "0":{
                            "items":1
                        },
                        "768":{
                            "items":2
                        },
                        "992":{
                            "items": 3
                        }
                    }
                }'>
                    @include($base_route.'includes.slider_list_detail')
                </div>
            @endif
        </div>
    </div>
</section>
