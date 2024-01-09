<section class="faq-two">
    <div class="faq-two__shape-1 float-bob-y">
        <img src="{{ asset('assets/frontend/images/shapes/faq-two-shape-1.png') }}" alt="">
    </div>
    <div class="faq-two__shape-2 img-bounce">
        <img src="{{ asset('assets/frontend/images/shapes/faq-two-shape-2.png') }}" alt="">
    </div>
    <div class="container">
        <div class="faq-two__inner">
            <h3 class="section__title-two">{{ $element->first()->title ?? '' }}</h3>
            <div class="accrodion-grp" data-grp-name="faq-two-accrodion">
                @foreach($element as $index=>$row)
                    <div class="accrodion  {{$loop->first ? 'active':''}}">
                        <div class="accrodion-title">
                            <h4> {{ $row->list_title ?? '' }}</h4>
                        </div>
                        @if($row->list_description)
                            <div class="accrodion-content">
                                <div class="inner">
                                    <p> {{ $row->list_description ?? '' }}</p>
                                </div><!-- /.inner -->
                            </div>
                        @endif

                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
