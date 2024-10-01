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
                    <h4 class="card-title mb-0 flex-grow-1">{{ 'Candidate Agency Info' }}</h4>
                    <div class="flex-shrink-0">


                        <div class="d-flex justify-content-sm-end gap-2">
                            @if ($data['row']->authorized_agency_id == auth()->user()->authorized_agency_id )
                                <a href="{{ route($base_route.'edit',$data['row']->id) }}" title="Edit"
                                   class="btn btn-outline-success waves-effect waves-light"><i class="ri-pencil-fill"></i></a>
                            @endif

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
                            <a class="nav-link active" data-bs-toggle="tab" href="#candidate-info" role="tab" aria-selected="true">
                                Candidate Info
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-bs-toggle="tab" href="#general-info" role="tab" aria-selected="true">
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
                        <div class="tab-pane active" id="candidate-info" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <th scope="row">Candidate Name</th>
                                        <td>{{ $data['row']->fullname ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>{{ $data['row']->email ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Passport number</th>
                                        <td>{{ $data['row']->passport_number ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Passport issued date</th>
                                        <td>{{ $data['row']->passport_issue_date ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Passport expiry date</th>
                                        <td>{{ $data['row']->passport_expiry_date ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Issued Place</th>
                                        <td>{{ $data['row']->issue_place ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">State</th>
                                        <td>{{ $data['row']->state ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">District</th>
                                        <td>{{ $data['row']->district ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>{{ $data['row']->address ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Contact</th>
                                        <td>{{ $data['row']->contact ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Father Name</th>
                                        <td>{{ $data['row']->father_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Mother Name</th>
                                        <td>{{ $data['row']->mother_name ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Martial Status</th>
                                        <td>{{ $data['row']->martial_status ? 'Married':'Unmarried' }}</td>
                                    </tr>
                                    @if ($data['row']->martial_status)
                                        <tr>
                                            <th scope="row">Wife Name</th>
                                            <td>{{ $data['row']->wife_name ?? '' }}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Wife Name</th>
                                            <td>{{ $data['row']->children_name ?? '' }}</td>
                                        </tr>
                                    @endif
                                    <tr>
                                        <th scope="row">Applied for</th>
                                        <td>{{ $data['row']->applied_for ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Applied country</th>
                                        <td>{{ $data['row']->getCountryName($data['row']->applied_country) ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Photo</th>
                                        <td>
                                            @if($data['row']->photo)
                                                <div class="col-xxl-4 col-xl-4 col-sm-6">
                                                    <div class="gallery-box card">
                                                        <div class="gallery-container">
                                                            <a class="image-popup" href="{{ asset(imagePath($data['row']->photo))}}" title="">
                                                                <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->photo))}}" alt="" />
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
                                        <th scope="row">Passport Photo</th>
                                        <td>
                                            @if($data['row']->passport_photo)
                                                <div class="col-xxl-4 col-xl-4 col-sm-6">
                                                    <div class="gallery-box card">
                                                        <div class="gallery-container">
                                                            <a class="image-popup" href="{{ asset(imagePath($data['row']->passport_photo))}}" title="">
                                                                <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->passport_photo))}}" alt="" />
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
                                        <th scope="row">Passport Photo</th>
                                        <td>
                                            @if($data['row']->case_file && $data['row']->case_file_type == 'image')
                                                <div class="col-xxl-4 col-xl-4 col-sm-6">
                                                    <div class="gallery-box card">
                                                        <div class="gallery-container">
                                                            <a class="image-popup" href="{{ asset(imagePath($data['row']->case_file))}}" title="">
                                                                <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->case_file))}}" alt="" />
                                                                <div class="gallery-overlay">
                                                                    <h5 class="overlay-caption">Passport File</h5>
                                                                </div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif ($data['row']->case_file && $data['row']->case_file_type == 'file')
                                                <div class="d-flex gap-2 mt-1">
                                                    <a href="{{ asset(filePath($data['row']->case_file))}}" target="_blank" title="Download Case File"
                                                       class="btn btn-outline-info waves-effect waves-light" download>
                                                        <i class="ri-download-cloud-2-line align-bottom me-1"></i>
                                                    </a>
                                                </div>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Grievance Message</th>
                                        <td>{{ $data['row']->grievance ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Status</th>
                                        <td>
                                            @include($module.'includes.status_display',['status'=>$data['row']->authorizedAgency->status])
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="general-info" role="tabpanel">
                            <div class="table-responsive">
                                <table class="table mb-0">
                                    <tbody>
                                    <tr>
                                        <th scope="row">Permission Number</th>
                                        <td>{{ $data['row']->authorizedAgency->permission_number ?? ''}}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Title</th>
                                        <td>{{ $data['row']->authorizedAgency->title ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Description</th>
                                        <td>{{ $data['row']->authorizedAgency->description ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Address</th>
                                        <td>{{ $data['row']->authorizedAgency->address ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Contact Number</th>
                                        <td>{{ $data['row']->authorizedAgency->contact_number ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Email</th>
                                        <td>{{ $data['row']->authorizedAgency->email ?? '' }}</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">Image</th>
                                        <td>
                                            @if($data['row']->authorizedAgency && $data['row']->authorizedAgency->image)
                                                <div class="col-xxl-4 col-xl-4 col-sm-6">
                                                    <div class="gallery-box card">
                                                        <div class="gallery-container">
                                                            <a class="image-popup" href="{{ asset(imagePath($data['row']->authorizedAgency->image))}}" title="">
                                                                <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->authorizedAgency->image))}}" alt="" />
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
                                            @include($module.'includes.status_display',['status'=>$data['row']->authorizedAgency->status])
                                        </td>
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
