@extends('candidate.layouts.master')
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


                    </div> <!-- end .h-100-->

                </div> <!-- end col -->

            </div>

        </div>
        <!-- container-fluid -->
    </div>

@endsection

@section('js')
@endsection

