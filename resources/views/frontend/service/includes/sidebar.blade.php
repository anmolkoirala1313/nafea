<div class="services-details__left">
    <div class="sidebar__single sidebar__search service-search" style="background-color: #f7f9fa;">
        <div class="sidebar__title-box">
            <h3 class="sidebar__title">Search Here</h3>
        </div>
        {!! Form::open(['route' => $base_route.'search', 'method'=>'GET', 'class'=>'sidebar__search-form']) !!}
            <input type="text" placeholder="Search Service" name="for" style="    background-color: #ffffff;">
            <button type="submit"><i class="icon-magnifying-glass"></i></button>
        {!! Form::close() !!}
    </div>
    @if(count( $data['latest']) > 0)

        <div class="services-details__services-box">
            <ul class="services-details__services-list list-unstyled">
                @foreach($data['latest'] as $latest)
                    <li>
                        <a href="{{ route('frontend.service.show',$latest->key) }}">
                            {{$latest->title ?? ''}}<span
                                class="icon-right-arrow1"></span></a>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="services-details__contact">
        <h3 class="services-details__contact-title">Contact us</h3>
        <ul class="services-details__contact-list list-unstyled">
            <li>
                <div class="icon">
                    <span class="icon-location-1"></span>
                </div>
                <p>{{   $data['setting']->address ?? '' }}</p>
            </li>
            <li>
                <div class="icon">
                    <span class="icon-phone"></span>
                </div>
                <p><a href="tel:{{ $data['setting']->phone ?? $data['setting']->mobile }}">{{ $data['setting']->phone ?? $data['setting']->mobile }}</a></p>
            </li>
            <li>
                <div class="icon">
                    <span class="icon-envelope"></span>
                </div>
                <p><a href="mailto:{{ $data['setting']->email }}">{{ $data['setting']->email }}</a></p>
            </li>
        </ul>
    </div>
</div>
