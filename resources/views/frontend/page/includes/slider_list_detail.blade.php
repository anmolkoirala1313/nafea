@foreach($element as $index=>$row)
    @if( $data['slider_list_type'] == 'normal')
        <div class="col-xl-4 col-lg-4 wow d-flex align-items-stretch fadeInLeft mt-4" data-wow-delay="{{ $index + 1 }}00ms">
    @else
        <div class="item">
    @endif
        <div class="news-one__single">
            <div class="news-one__img-box">
                <div class="news-one__img">
                    <img src="{{ asset(imagePath($row->image)) }}" style="background: #ec673312" alt="">
                </div>
            </div>
            <div class="news-one__content">
                <div class="news-one__content-top">
                    <h3 class="news-one__title">
                        <a href="{{ $data['slider_list_type'] !== 'normal' ? route($base_route.'slider_single',@$row->list_subtitle) : '#'}}">
                            {{ $row->list_title ?? '' }}
                        </a>
                    </h3>
                        <p class="news-one__text text-align-justify">{{ $data['slider_list_type'] == 'normal' ? strip_tags($row->list_description) : elipsis($row->list_description)}}</p>
                </div>
                @if($data['slider_list_type'] !== 'normal')
                    <div class="news-one__person-and-date">
                        <div class="news-three__btn" style="margin-top: 0px;">
                            <a href="{{route($base_route.'slider_single',@$row->list_subtitle)}}">Learn More<span class="icon-right-arrow1"></span></a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endforeach



