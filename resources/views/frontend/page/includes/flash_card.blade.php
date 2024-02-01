<div class="quote__area section-padding">
    <img class="quote__area-shape-one lazy" src="{{ asset('assets/frontend/img/shape/quote-1.png') }}" alt="">
    <img class="quote__area-shape-two lazy" src="{{ asset('assets/frontend/img/shape/quote-2.png') }}" alt="">
    <div class="container">
        <div class="row mb-60">
            <div class="col-xl-12">
                <div class="quote__area-title t-center">
                    <span class="subtitle-four">{{ $element->first()->subtitle ?? '' }}</span>
                    <h2>{{ $element->first()->title ?? '' }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-5 lg-mb-30">
                <div class="quote__area-left">
                    <ul class="nav">
                        @foreach($element as $index=>$row)
                            <li><h6 class="{{ $index == 0 ? 'active':'' }}" data-bs-toggle="pill" data-bs-target="#tab_{{$index}}">
                                    @if($row->image)
                                        <img src="{{ asset(imagePath($row->image)) }}"  alt="">
                                    @else
                                        <i class="{{ get_flash_card_icons($index) }}"></i>
                                    @endif
                                        {{$row->list_title ?? ''}}
                                </h6></li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="col-xl-8 col-lg-7">
                <div class="tab-content">
                    @foreach($element as $index=>$row)
                        <div class="tab-pane fade {{ $index == 0 ? 'show active':'' }}" id="tab_{{$index}}">
                            <p class="quote__area-right-form text-align-justify custom-description" style="color: #fbfbfb">
                                {{$row->list_description ?? ''}}
                            </p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
