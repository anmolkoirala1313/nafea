@extends('backend.layouts.master')
@section('title','Dashboard')
@section('css')
@endsection

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>

                        {{--                            <div class="page-title-right">--}}
                        {{--                                <ol class="breadcrumb m-0">--}}
                        {{--                                    <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>--}}
                        {{--                                    <li class="breadcrumb-item active">ADashboard</li>--}}
                        {{--                                </ol>--}}
                        {{--                            </div>--}}

                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col">

                    <div class="h-100">
                        <div class="row mb-3 pb-1">
                            <div class="col-12">
                                <div class="d-flex align-items-lg-center flex-lg-row flex-column">
                                    <div class="flex-grow-1">
                                        <h4 class="fs-16 mb-1">
                                            {{greeting_msg()}}, {{ucfirst(Auth::user()->name)}}!</h4>
                                        <p class="text-muted mb-0">Here's what's happening with your website
                                            today.</p>
                                    </div>
                                    <div class="mt-3 mt-lg-0">
                                        <form action="javascript:void(0);">
                                            <div class="row g-3 mb-0 align-items-center">
                                                <!--end col-->
                                            {{--                                                    <div class="col-auto">--}}
                                            {{--                                                        <button type="button" class="btn btn-soft-success"><i--}}
                                            {{--                                                                class="ri-add-circle-line align-middle me-1"></i>--}}
                                            {{--                                                            Add Product</button>--}}
                                            {{--                                                    </div>--}}
                                            <!--end col-->
                                            {{--                                                    <div class="col-auto">--}}
                                            {{--                                                        <button type="button"--}}
                                            {{--                                                                class="btn btn-soft-info btn-icon waves-effect waves-light layout-rightside-btn"><i--}}
                                            {{--                                                                class="ri-pulse-line"></i></button>--}}
                                            {{--                                                    </div>--}}
                                            <!--end col-->
                                            </div>
                                            <!--end row-->
                                        </form>
                                    </div>
                                </div><!-- end card header -->
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p
                                                    class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                    Total Menu</p>
                                            </div>
                                            {{--                                                <div class="flex-shrink-0">--}}
                                            {{--                                                    <h5 class="text-success fs-14 mb-0">--}}
                                            {{--                                                        <i class="ri-arrow-right-up-line fs-13 align-middle"></i>--}}
                                            {{--                                                        +16.24 %--}}
                                            {{--                                                    </h5>--}}
                                            {{--                                                </div>--}}
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">Total: <span
                                                        class="counter-value" data-target="{{$data['menus']}}">{{$data['menus']}}</span>
                                                </h4>
                                                <a href="{{route('backend.menu.index')}}" class="text-decoration-underline">Manage menus</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-soft-success rounded fs-3">
                                                            <i class="bx bx-spreadsheet text-success"></i>
                                                        </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p
                                                    class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                    Total Pages</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">Total: <span
                                                        class="counter-value" data-target="{{ $data['pages']  }}">{{ $data['pages']  }}</span></h4>
                                                <a href="{{route('backend.page.index')}}" class="text-decoration-underline">Manage Pages</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-soft-info rounded fs-3">
                                                            <i class="bx bx-receipt text-info"></i>
                                                        </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p
                                                    class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                    Total Blog Category</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">Total: <span
                                                        class="counter-value" data-target="{{$data['blog_category']}}">{{$data['blog_category']}}</span>
                                                </h4>
                                                <a href="{{route('backend.news.basic_setup.category.index')}}" class="text-decoration-underline">See all category</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-soft-warning rounded fs-3">
                                                            <i class="bx bx-category-alt text-warning"></i>
                                                        </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xl-3 col-md-6">
                                <!-- card -->
                                <div class="card card-animate">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="flex-grow-1 overflow-hidden">
                                                <p
                                                    class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                                    Total Jobs</p>
                                            </div>
                                        </div>
                                        <div class="d-flex align-items-end justify-content-between mt-4">
                                            <div>
                                                <h4 class="fs-22 fw-semibold ff-secondary mb-4">Total: <span
                                                        class="counter-value" data-target="{{$data['jobs'] }}">{{$data['jobs'] }}</span>
                                                </h4>
                                                <a href="{{route('backend.career.job.index')}}" class="text-decoration-underline">View all Jobs</a>
                                            </div>
                                            <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-soft-primary rounded fs-3">
                                                            <i class="bx bx bx-slider text-primary"></i>
                                                        </span>
                                            </div>
                                        </div>
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div> <!-- end row-->

                        <div class="row">
                            <div class="col-xxl-4 col-lg-6">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">System Users</h4>
                                        <div>
                                            <a href="{{route('backend.user.user-management.index')}}" type="button" class="btn btn-soft-primary btn-sm">
                                                All Users
                                            </a>
                                        </div>
                                    </div><!-- end card header -->

                                    <div class="card-body">

                                        <div class="table-responsive table-card">
                                            <table class="table table-borderless table-nowrap align-middle mb-0">
                                                <thead class="table-light text-muted">
                                                <tr>
                                                    <th scope="col">Member</th>
                                                    <th scope="col">Contact</th>
                                                    <th scope="col">Gender</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($data['all_users'] as $user)
                                                    <tr>
                                                        <td class="d-flex">
                                                            <img src="{{  asset(imagePath($user->image)) }}" alt=""
                                                                 class="avatar-xs rounded-3 me-2">
                                                            <div>
                                                                <h5 class="fs-13 mb-0">{{ucwords(@$user->name)}}</h5>
                                                                <p class="fs-12 mb-0 text-muted">{{ucwords(@$user->user_type)}}</p>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            <h6 class="mb-0">{{($user->contact == null) ? 'Not Added':@$user->contact}}</span>
                                                            </h6>
                                                        </td>
                                                        <td>
                                                            {{ucwords($user->gender)}}
                                                        </td>
                                                        <td style="width:5%;">
                                                            @if($user->status == 0) <span class="badge badge-soft-danger">Inactive</span> @else <span class="badge badge-soft-success">Active</span>   @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                                </tbody><!-- end tbody -->
                                            </table><!-- end table -->
                                        </div>
                                    </div><!-- end cardbody -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xxl-4 col-lg-6">
                                <div class="card card-height-100">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">Latest Services</h4>
                                        <a href="#" type="button" class="btn btn-soft-primary btn-sm">
                                            View all
                                        </a>
                                    </div><!-- end card-header -->
                                    <div class="card-body p-0">
                                        <ul class="list-group list-group-flush border-dashed mb-0">
                                            @if(count( $data['services'])>0)
                                                @foreach( $data['services'] as $service)
                                                    <li class="list-group-item d-flex align-items-center">
                                                        <div class="flex-shrink-0">
                                                            <img src="{{asset(imagePath($service->image))}}" class="avatar-xs"
                                                                 alt="">
                                                        </div>
                                                        <div class="flex-grow-1 ms-3">
                                                            <h6 class="fs-14 mb-1">{{$service->title}}</h6>
                                                            <p class="text-muted mb-0">{{$service->slug}}</p>
                                                        </div>
                                                        <div class="flex-shrink-0 text-end">
                                                            <h6 class="fs-14 mb-1">{{  $service->createdBy()->name ?? '' }}</h6>
                                                            <p class="text-success fs-12 mb-0">{{\Carbon\Carbon::parse(@$service->created_at)->isoFormat('MMMM Do, YYYY')}}</p>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            @else
                                                <li class="list-group-item align-items-center">
                                                    <div class="ms-3">
                                                        <h6 class="fs-14 mb-1">There are no new services created yet !</h6>
                                                        <p class="text-muted mb-0"> <a href="{{route('backend.service.index')}}"> click here </a> to create one.</p>
                                                    </div>
                                                </li>
                                            @endif
                                        </ul><!-- end ul -->
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->

                            <div class="col-xxl-4">
                                <div class="card">
                                    <div class="card-header align-items-center d-flex">
                                        <h4 class="card-title mb-0 flex-grow-1">News Feed</h4>
                                        <div>
                                            <a href="{{route('backend.news.blog.index')}}" type="button" class="btn btn-soft-primary btn-sm">
                                                View all
                                            </a>
                                        </div>
                                    </div><!-- end card-header -->

                                    <div class="card-body">
                                        @if(count($data['feeds'] )>0)
                                            @foreach($data['feeds']  as $feed)
                                                <div class="d-flex {{($loop->first) ? "":"mt-4"}} align-middle">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{asset($feed->image)}}" class="rounded img-fluid"
                                                             style="height: 60px;" alt="">
                                                    </div>
                                                    <div class="flex-grow-1 ms-3">
                                                        <h6 class="mb-1 lh-base"><a href="#" class="text-reset">
                                                                {{ ucwords(@$feed->title) }}
                                                            </a></h6>
                                                        <p class="text-muted fs-12 mb-0">{{ucfirst(@$feed->category->name)}} <i
                                                                class="mdi mdi-circle-medium align-middle mx-1"></i>{{\Carbon\Carbon::parse(@$feed->created_at)->isoFormat('MMMM Do, YYYY')}}</p>
                                                    </div>
                                                </div>
                                            @endforeach
                                        @else
                                            <li class="list-group-item align-items-center">
                                                <div class="ms-3">
                                                    <h6 class="fs-14 mb-1">There are no new blog created yet !</h6>
                                                    <p class="text-muted mb-0"> <a href="{{route('backend.news.blog.index')}}"> click here </a> to create one.</p>
                                                </div>
                                            </li>
                                        @endif
                                    </div><!-- end card body -->
                                </div><!-- end card -->
                            </div><!-- end col -->
                        </div><!-- end row -->


                    </div> <!-- end .h-100-->

                </div> <!-- end col -->

            </div>

        </div>
        <!-- container-fluid -->
    </div>

@endsection

@section('js')
@endsection

