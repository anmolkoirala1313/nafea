<div class="blog__three section-padding">
    <div class="container">
        <div class="row mb-30">
            <div class="col-xl-12">
                <div class="blog__three-title t-center">
                    <span class="subtitle-four">{{ $element->first()->subtitle ?? '' }}</span>
                    <h2>{{ $element->first()->title ?? '' }}</h2>
                </div>
            </div>
        </div>
        <div class="row">
            @foreach($element as $index=>$row)
                <div class="col-xl-4 col-lg-6 d-flex align-items-stretch">
                    <div class="blog__three-item" data-background="{{ asset(imagePath($row->image)) }}">
                        <h4>
                            <a>
                                {{$row->list_title ?? ''}}
                            </a>
                        </h4>
                        <p class="text-align-justify mt-2">
                            {{$row->list_description ?? ''}}
                        </p>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
</div>
