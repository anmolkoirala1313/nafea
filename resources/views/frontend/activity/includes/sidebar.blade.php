<aside class="col-lg-4 primary-sidebar sidebar-sticky" id="sidebar">
    <div class="primary-sidebar-inner">
        @if(count( $data['categories']) > 0)
            <div class="card mb-4">
                <div class="card-body px-6 pt-5 pb-6">
                    <h4 class="card-title fs-16 lh-2 text-dark mb-3">Categories</h4>
                    <ul class="list-group list-group-no-border">
                        @foreach($data['categories'] as $category)
                            <li class="list-group-item p-0">
                                <a href="{{ route('frontend.activity.category', $category->slug ) }}" class="d-flex text-body hover-primary">
                                    <span class="lh-29">{{ $category->title ?? '' }}</span>
                                    <span class="d-block ml-auto">({{ $category->packages_count }})</span>
                                </a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        @if($page_method !== 'show')
            <div class="card">
                    <div class="card-body px-6 py-4">
                        <h4 class="card-title fs-16 lh-2 text-dark mb-2">Our Contacts</h4>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item px-0 pb-4 pt-0">
                                <div class="media align-items-center">
                                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                        <i class="far fa-phone-alt fs-25 text-primary"></i>
                                    </div>
                                    <div class="media-body">
                                        <a href="tel:{{$setting_data->phone ?? ''}}" class="d-block text-dark font-weight-500 lh-2 hover-primary">
                                            Phone
                                        </a>
                                        <a class="mb-0 fs-13 mb-0 lh-17 text-heading font-weight-500" href="tel:{{$setting_data->phone ?? ''}}">
                                            {{$setting_data->phone ?? ''}}
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0 pt-3 pb-4">
                                <div class="media align-items-center">
                                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                        <i class="far fa-mobile fs-30 text-primary"></i>
                                    </div>
                                    <div class="media-body">
                                        <a href="tel:{{ $setting_data->mobile ?? $setting_data->whatsapp ?? $setting_data->viber ?? ''}}" class="d-block text-dark font-weight-500 lh-2 hover-primary">
                                            Mobile
                                        </a>
                                        <a class="mb-0 fs-13 mb-0 lh-17 text-heading font-weight-500" href="tel:{{ $setting_data->mobile ?? $setting_data->whatsapp ?? $setting_data->viber ?? ''}}">
                                            {{ $setting_data->mobile ?? $setting_data->whatsapp ?? $setting_data->viber ?? ''}}
                                        </a>
                                    </div>
                                </div>
                            </li>
                            <li class="list-group-item px-0 pt-2">
                                <div class="media align-items-center">
                                    <div class="p-2 shadow-xxs-1 rounded-lg mr-2">
                                        <i class="far fa-envelope fs-25 text-primary"></i>
                                    </div>
                                    <div class="media-body">
                                        <a href="mailto:{{@$setting_data->email ?? ''}}" class="d-block text-dark font-weight-500 lh-2 hover-primary">Ted
                                            Email
                                        </a>
                                        <a class="mb-0 fs-13 mb-0 lh-17 text-heading font-weight-500" href="mailto:{{@$setting_data->email ?? ''}}">
                                            {{@$setting_data->email ?? ''}}
                                        </a>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
        @else
             <div class="card border-0 widget-request-tour">
                    <ul class="nav nav-tabs d-flex" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active px-3" data-toggle="tab" href="#schedule" role="tab" aria-selected="true">Schedule
                                A Tour</a>
                        </li>
                    </ul>
                    <div class="card-body px-sm-6 shadow-xxs-2 pb-5 pt-0">
                        <form>
                            <div class="tab-content pt-1 pb-0 px-0 shadow-none">
                                <div class="tab-pane fade show active" id="schedule" role="tabpanel">
                                    <div class="form-group mt-4 mb-2">
                                        <input type="text" class="form-control form-control-lg border-0" placeholder="First Name, Last Name">
                                    </div>
                                    <div class="form-group mb-2">
                                        <input type="email" class="form-control form-control-lg border-0" placeholder="Your Email">
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="tel" class="form-control form-control-lg border-0" placeholder="Your phone">
                                    </div>
                                    <div class="form-group mb-4">
                                        <textarea class="form-control form-control-lg border-0" placeholder="Your Message"></textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-lg btn-block rounded">Schedule A Tour</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
        @endif
    </div>
</aside>
