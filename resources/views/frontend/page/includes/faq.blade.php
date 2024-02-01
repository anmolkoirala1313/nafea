<div class="faq__one-page section-padding">
    <div class="container">
        <div class="row align-items-center">

            <div class="col-xxl-12 col-lg-6">
                <div class="faq__one-right">
                    <div class="faq__one-right-title">
                        <span class="subtitle-four">Faqs</span>
                        <h2>{{ $element->first()->title ?? '' }}</h2>
                    </div>
                    <div class="faq__area" id="accordionExample">
                        @foreach($element as $index=>$row)
                            <div class="faq__area-item">
                                <h6 class="icon page" data-bs-toggle="collapse" data-bs-target="#collapse{{$index}}">
                                    {{ $row->list_title ?? '' }}
                                </h6>
                                @if($row->list_description)
                                    <div id="collapse{{$index}}" class="faq__area-item-body collapse {{$loop->first ? 'show':''}}" data-bs-parent="#accordionExample">
                                        <p>
                                            {{ $row->list_description ?? '' }}
                                        </p>
                                    </div>
                                @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
