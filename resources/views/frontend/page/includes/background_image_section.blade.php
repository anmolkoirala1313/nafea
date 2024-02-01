<div class="team__single section-padding">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7">
                <div class="about__three-right">
                    <div class="about__three-right-title" style="margin-bottom: 0px;">
                        <span class="subtitle-four">{{ $element->first()->subtitle ?? '' }}</span>
                        <h2 style="margin-bottom: 10px; line-height: 50px;">{{ $element->first()->title ?? '' }}</h2>
                    </div>
                </div>
                <div class="team__single-right">
                    <div class="team__single-right-experience">
                        <div class="text-align-justify custom-description">
                            {!! $element->first()->description ?? '' !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 lg-mb-30">
                <div class="team__single-left">
                    <div class="team__single-left-thumb dark__image ">
                        <img class="img__full lazy" data-src="{{ asset(imagePath($element->first()->image)) }}" alt="">
{{--                        <div class="team__single-left-thumb-social">--}}
{{--                            <ul>--}}
{{--                                <li><a href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f"></i></a></li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
