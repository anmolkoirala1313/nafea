<section class="pt-6 pb-8">
    <div class="container">
        <h4 class="fs-22 text-heading mb-6">Similar Activities You May Like</h4>
        <div class="slick-slider" data-slick-options='{"slidesToShow": 3, "dots":false,"arrows":false,"responsive":[{"breakpoint": 1200,"settings": {"slidesToShow":3,"arrows":false}},{"breakpoint": 992,"settings": {"slidesToShow":2}},{"breakpoint": 768,"settings": {"slidesToShow": 1}},{"breakpoint": 576,"settings": {"slidesToShow": 1}}]}'>
            @foreach($data['related_activity'] as $package)
                <div class="box">
                    <div class="card shadow-hover-2">
                        <div class="hover-change-image bg-hover-overlay rounded-lg card-img-top">
                            <img src="{{ asset(imagePath($package->image)) }}" alt="Home in Metric Way">
                            <div class="card-img-overlay p-2 d-flex flex-column">
                                @if($package->package_ribbon_id)
                                    <div>
                                        <span class="badge mr-2 badge-primary">for Sale</span>
                                    </div>
                                @endif
                                <ul class="list-inline mb-0 mt-auto hover-image">
                                    @if(count( $package->packageGalleries ) !== 0)
                                        <li class="list-inline-item mr-2" data-toggle="tooltip" title="{{count( $package->packageGalleries )}} Images">
                                            <a href="#" class="text-white hover-primary">
                                                <i class="far fa-images"></i><span class="pl-1">
                                                            {{ count( $package->packageGalleries ) }}
                                                        </span>
                                            </a>
                                        </li>
                                    @endif
                                    @if($package->video)
                                        <li class="list-inline-item" data-toggle="tooltip" title="1 Video">
                                            <a href="{{ route('frontend.activity.show',$package->slug) }}" class="text-white hover-primary">
                                                <i class="far fa-play-circle"></i><span class="pl-1">1</span>
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                        <div class="card-body pt-3">
                            <h2 class="card-title fs-16 lh-2 mb-0">
                                <a href="{{ route('frontend.activity.show',$package->slug) }}" class="text-dark hover-primary">
                                    {{ $package->title ?? '' }}
                                </a>
                            </h2>
                        </div>
                        <div class="card-footer bg-transparent d-flex justify-content-between align-items-center py-3">
                            <a class="fs-16 font-weight-bold text-heading mb-0" href="{{ route('frontend.activity.category', $package->packageCategory->slug) }}">
                                {{ $package->packageCategory->title }} {{ $package->price ?  ' / ' . $package->price:''}}
                            </a>
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item">
                                    <a class="w-40px h-40 border rounded-circle d-inline-flex align-items-center justify-content-center text-secondary bg-accent border-accent" data-toggle="tooltip" title="{{ $package->country->title }}">
                                        <i class="fas fa-globe"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
