@extends('backend.layouts.master')
@section('title', $page_title)
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/custom_css/datatable_style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/libs/glightbox/css/glightbox.min.css')}}" />
    <link href="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid" style="position:relative;">
            @include($module.'includes.breadcrumb')

            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ $page_title }}</h4>
                    <div class="flex-shrink-0">

                        <div class="d-flex justify-content-sm-end gap-2">
                            <a href="{{ route($base_route.'edit',$data['row']->id) }}" title="Edit"
                               class="btn btn-outline-success waves-effect waves-light"><i class="ri-pencil-fill"></i></a>

                            <a class="btn btn-outline-success waves-effect waves-light" href="{{route($base_route.'index')}}">
                                <i class="ri-menu-2-line align-bottom me-1"></i> {{ $page . ' List'}} </a>
                        </div>

                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-tabs-custom card-header-tabs border-bottom-0" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-bs-toggle="tab" href="#general-info" role="tab" aria-selected="true">
                                Agency Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#proprietor-info" role="tab" aria-selected="false">
                                Proprietor Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#labor-representative-info" role="tab" aria-selected="false">
                                Labor Representative Data
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
                                        <th scope="row" style="width: 200px;">order</th>
                                        <td>{{ $data['row']->order }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Permission Number</th>
                                        <td>{{ $data['row']->permission_number }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Title</th>
                                        <td>{{ $data['row']->title }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Description</th>
                                        <td>{{ $data['row']->description ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>{{ $data['row']->address ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Contact Number</th>
                                        <td>{{ $data['row']->contact_number ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>{{ $data['row']->email ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Image</th>
                                        <td>
                                            @if($data['row'] && $data['row']->image)
                                                <div class="col-xxl-4 col-xl-4 col-sm-6">
                                                    <div class="gallery-box card">
                                                        <div class="gallery-container">
                                                            <a class="image-popup" href="{{ asset(imagePath($data['row']->image))}}" title="">
                                                                <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->image))}}" alt="" />
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
                                            @include($module.'includes.status_display',['status'=>$data['row']->status])
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Created By</th>
                                        <td>{{ $data['row']->createdBy->name ?? '' }}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="tab-pane" id="proprietor-info" role="tabpanel">
                           @include($view_path.'proprietor.index')
                        </div>

                        <div class="tab-pane" id="labor-representative-info" role="tabpanel">
                            @include($view_path.'labor_representative.index')
                        </div>
                        <!-- end tab pane -->
                    </div>
                    <!-- end tab content -->
                </div>
                <!-- end card body -->
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/backend/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    <script src="{{asset('assets/backend/js/jquery-ui.min.js')}}"></script>

    @include($module.'includes.toast_message')
    @include($module.'includes/gallery')
    @include($view_path.'includes.script')

    <script>
        let selector =  $('#NormalDataTable2');
        if(selector.length > 0){
            dataTable = $(selector).DataTable({
                paging: true,
                searching: true,
                ordering:  true,
                lengthMenu: [[10, 25, 50, 100, -1], [ 10, 25, 50, 100, "All"]],
            });
        }
    </script>



@endsection
