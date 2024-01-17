<div class="all__sidebar">
    <div class="all__sidebar-item">
        <h4>Search</h4>
        <div class="all__sidebar-item-search">
            {!! Form::open(['route' => $base_route.'search', 'method'=>'GET']) !!}
                <input type="text" name="for" placeholder="Search Here.....">
                <button type="submit"><i class="fal fa-search"></i></button>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="all__sidebar-item">
        @if(count( $data['latest']) > 0)

        <h4>Our Categories</h4>
        <div class="all__sidebar-item-solution">
            <ul>
                @foreach( $data['latest'] as $latest)
                    <li><a href="{{ route('frontend.service.show',$latest->key) }}"> {{$latest->title ?? ''}}</a></li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="all__sidebar-item-help" data-background="{{ asset('assets/frontend/img/pages/support.jpg') }}">
        <img class="all__sidebar-item-help-shape lazy" data-src="{{ asset('assets/frontend/img/shape/support.png') }}" alt="">
        <h4>Reach out and contact us !</h4>
        <div class="all__sidebar-item-help-contact">
            <i class="flaticon-phone-call"></i>
            <div class="all__sidebar-item-help-contact-content">
                <span>Quick Help</span>
                <h6><a href="tel:{{ $setting_data->phone ?? $setting_data->mobile ?? '' }}">{{ $setting_data->phone ?? $setting_data->mobile ?? '' }}</a></h6>
            </div>
        </div>
    </div>
</div>
