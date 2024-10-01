@extends('candidate.layouts.master')
@section('title','Dashboard')
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/libs/glightbox/css/glightbox.min.css')}}" />
@endsection

@section('content')

    <div class="page-content">
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Dashboard</h4>
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


                    </div> <!-- end .h-100-->

                </div> <!-- end col -->

            </div>

            <div class="row">
                <div class="col-xl-6 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p
                                        class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                        Total Candidates in {{auth()->user()->authorizedAgency->title ?? ''}}</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">Total: <span
                                            class="counter-value" data-target="{{$data['your_agency']}}">{{$data['your_agency']}}</span>
                                    </h4>
                                    <a href="{{route('candidate.information_list.index')}}" class="text-decoration-underline">Manage candidates</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-soft-success rounded fs-3">
                                                            <i class="bx bx-spreadsheet text-success"></i>
                                                        </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
                <div class="col-xl-6 col-md-6">
                    <!-- card -->
                    <div class="card card-animate">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div class="flex-grow-1 overflow-hidden">
                                    <p
                                        class="text-uppercase fw-medium text-muted text-truncate mb-0">
                                        Total Candidates</p>
                                </div>
                            </div>
                            <div class="d-flex align-items-end justify-content-between mt-4">
                                <div>
                                    <h4 class="fs-22 fw-semibold ff-secondary mb-4">Total: <span
                                            class="counter-value" data-target="{{ $data['all_agency']  }}">{{ $data['all_agency']  }}</span></h4>
                                    <a href="{{route('candidate.information_list.index')}}" class="text-decoration-underline">Manage Candidates</a>
                                </div>
                                <div class="avatar-sm flex-shrink-0">
                                                        <span class="avatar-title bg-soft-info rounded fs-3">
                                                            <i class="bx bx-receipt text-info"></i>
                                                        </span>
                                </div>
                            </div>
                        </div><!-- end card body -->
                    </div><!-- end card -->
                </div>
            </div>

            <div class="row">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-bs-toggle="tab" href="#general-info" role="tab" aria-selected="true">
                                    {{auth()->user()->authorizedAgency->title ?? ''}} 's Agency Information
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- end card header -->
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane active" id="general-info" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <tbody>
                                        <tr>
                                            <th scope="row">Permission Number</th>
                                            <td>{{ $data['current_agency']->permission_number ?? ''}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Title</th>
                                            <td>{{ $data['current_agency']->title ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Description</th>
                                            <td>{{ $data['current_agency']->description ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Address</th>
                                            <td>{{ $data['current_agency']->address ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Contact Number</th>
                                            <td>{{ $data['current_agency']->contact_number ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Email</th>
                                            <td>{{ $data['current_agency']->email ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Image</th>
                                            <td>
                                                @if($data['current_agency'] && $data['current_agency']->image)
                                                    <div class="col-xxl-4 col-xl-4 col-sm-6">
                                                        <div class="gallery-box card">
                                                            <div class="gallery-container">
                                                                <a class="image-popup" href="{{ asset(imagePath($data['current_agency']->image))}}" title="">
                                                                    <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['current_agency']->image))}}" alt="" />
                                                                    <div class="gallery-overlay">
                                                                        <h5 class="overlay-caption">Image</h5>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Status</th>
                                            <td>
                                                @include($module.'includes.status_display',['status'=>$data['current_agency']->status])
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Created By</th>
                                            <td>{{ $data['current_agency']->createdBy->name ?? '' }}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- end tab content -->
                    </div>
                    <!-- end card body -->
                </div>
            </div>


        </div>
        <!-- container-fluid -->
    </div>

@endsection

@section('js')

    @include($module.'includes/gallery')
@endsection

