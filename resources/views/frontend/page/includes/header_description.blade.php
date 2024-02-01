<div class="project__single section-padding" style="padding-top: 0px;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 lg-mb-30">
                <div class="project__single-area">
                    <div class="project__single-area-content">
                        @if($element->first()->subtitle)
                            <h2>{{$element->first()->subtitle ?? '' }}</h2>
                        @endif
                        <div class="text-align-justify custom-description">
                            {!! $element->first()->description ?? '' !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
