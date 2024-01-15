<div class="all__sidebar">
    <div class="all__sidebar-item">
        <h4>Search</h4>
        <div class="all__sidebar-item-search">
            {!! Form::open(['route' => $base_route.'search', 'method'=>'GET']) !!}
                <input type="text" name="for" placeholder="Search Blog.....">
                <button type="submit"><i class="fal fa-search"></i></button>
            {!! Form::close() !!}
        </div>
    </div>
    <div class="all__sidebar-item">
        @if(count( $data['categories']) > 0)
            <h4>Categories</h4>
            <div class="all__sidebar-item-solution">
            <ul>
                @foreach($data['categories'] as $category)
                    <li>
                        <a href="{{ route($base_route.'category',$category->slug) }}">
                            {{$category->title}}<span>({{$category->blogs_count}})</span></a>
                    </li>
                @endforeach
            </ul>
        </div>
        @endif
    </div>
    <div class="all__sidebar-item">
        @if(count( $data['latest']) > 0)
            <h4>Recent Post</h4>
            <div class="all__sidebar-item-post">
                @foreach($data['latest'] as $latest)
                    <div class="post__item">
                        <div class="post__item-image">
                            <a href="{{ route($module.'blog.show',$latest->slug) }}">
                                <img class="lazy" data-src="{{ asset(imagePath($latest->image)) }}" alt="">
                            </a>
                        </div>
                        <div class="post__item-title">
                            <h6><a href="{{ route($module.'blog.show',$latest->slug) }}">
                                    {{ $latest->title }}
                                </a>
                            </h6>
                            <span><i class="far fa-calendar-alt"></i>{{date('d M Y', strtotime($latest->created_at))}}</span>
                        </div>
                    </div>
                @endforeach
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
