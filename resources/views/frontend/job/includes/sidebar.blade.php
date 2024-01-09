<div class="sidebar sidebar--two">
    <div class="sidebar__single sidebar__search">
        <div class="sidebar__title-box">
            <h3 class="sidebar__title">Search Jobs</h3>
        </div>
        {!! Form::open(['route' => $base_route.'search', 'method'=>'GET', 'class'=>'sidebar__search-form']) !!}
        <input type="text" placeholder="Search Jobs" name="for" >
        <button type="submit"><i class="icon-magnifying-glass"></i></button>
        {!! Form::close() !!}
    </div>
    @if(count( $data['categories']) > 0)
        <div class="sidebar__single sidebar__category">
        <div class="sidebar__title-box">
            <h3 class="sidebar__title">Categories</h3>
        </div>
        <ul class="sidebar__category-list list-unstyled">
            @foreach($data['categories'] as $category)
                <li>
                    <a href="{{ route($base_route.'category',$category->slug) }}">
                        {{$category->title}} ({{$category->jobs_count}})<span class="icon-right-arrow1"></span></a>
                </li>
            @endforeach
        </ul>
    </div>
    @endif
    @if(count( $data['latest']) > 0)

        <div class="sidebar__single sidebar__post">
            <div class="sidebar__title-box">
                <h3 class="sidebar__title">Recent Demands</h3>
            </div>
            <ul class="sidebar__post-list list-unstyled">
                @foreach($data['latest'] as $latest)
                    <li>
                        <div class="sidebar__post-image">
                            <img class="lazy" data-src="{{ asset(imagePath($latest->image)) }}" alt="">
                        </div>
                        <div class="sidebar__post-content">
                            <h3 class="sidebar__post-title"><a href="{{ route($module.'job.show',$latest->slug) }}">
                                    {{ $latest->title }}
                                </a></h3>
                            <p class="sidebar__post-date"><span class="icon-time"></span>
                                @if(@$job->end_date >= date('Y-m-d'))
                                    {{date('M j, Y',strtotime(@$job->start_date))}} - {{date('M j, Y',strtotime(@$job->end_date))}}
                                @else
                                    Expired
                                @endif
                            </p>
                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    @endif
</div>
