@extends('backend.layouts.master')
@section('title', $page_title)
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/backend/custom_css/datatable_style.css')}}">
    <link href="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            @include($module.'includes.breadcrumb')
            <div class="card">
                <div class="card-header">
                    <div class="row g-4">
                        <div class="col-sm-auto">
                            <h4 class="card-title mb-0">{{ $page_title }}</h4>
                        </div>
                        <div class="col-sm">
                            <div class="d-flex justify-content-sm-end gap-2">
                                <button class="btn btn-outline-success waves-effect waves-light" type="button" data-bs-toggle="offcanvas"
                                        data-bs-target="#offcanvasRight" aria-controls="offcanvasRight">
                                    <i class="ri-add-line align-bottom me-1"></i> Add {{ $page }}</button>
                                <a class="btn btn-outline-danger waves-effect waves-light" href="{{ route($base_route.'trash') }}">
                                    <i class="ri-delete-bin-7-line align-bottom me-1"></i>  Trash </a>
                            </div>
                            @include($view_path.'create')
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">

                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs nav-tabs-custom nav-success nav-justified mb-3" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" data-bs-toggle="tab" href="#allusers" role="tab">
                                        All Users
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-bs-toggle="tab" href="#candidateusers" role="tab">
                                        General User List
                                    </a>
                                </li>
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content text-muted">
                                <div class="tab-pane active" id="allusers" role="tabpanel">
                                    <div class="table-responsive mt-3 mb-1">
                                        <table id="dataTable" class="table align-middle table-nowrap table-striped">
                                            <thead class="table-light">
                                            <tr>
                                                <th>S.N</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>User Type</th>
                                                <th>Status</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane" id="candidateusers" role="tabpanel">
                                    <div class="table-responsive mt-3 mb-1">
                                        <table id="candidateDataTable" class="table align-middle table-nowrap table-striped w-100">
                                            <thead class="table-light">
                                            <tr>
                                                <th>S.N</th>
                                                <th>Agency</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Contact</th>
                                                <th>User Type</th>
                                                <th>Status</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/backend/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/backend/js/pages/password-addon.init.js')}}"></script>
    <script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_message')
    @include($module.'includes.status_alert')
    @include($view_path.'includes.script')
    <script type="text/javascript">
        let dataTables = $('#dataTable').DataTable({
            processing:true,
            serverSide: true,
            searching: true,
            stateSave: true,
            order:[[1,'asc']],
            aaSorting: [],
            ajax: {
                "url": '{{ route($base_route.'data') }}',
                "type": 'POST',
                'data': function (d) {
                    d._token = '{{csrf_token()}}';
                }
            },
            columns :[
                {data:'DT_RowIndex', name: 'DT_RowIndex', searchable:false, orderable: false},
                {data:'name', name: 'name', orderable: true},
                {data:'email', name: 'email', orderable: false},
                {data:'contact', name: 'contact', orderable: true},
                {data:'user_type', name: 'user_type', orderable: true},
                {data:'status', name: 'status', searchable:false, orderable: false},
                {data:'action', name: 'action', searchable:false, orderable: false},
            ]
        });

        let candidateDataTables = $('#candidateDataTable').DataTable({
            processing:true,
            serverSide: true,
            searching: true,
            stateSave: true,
            order:[[1,'asc']],
            aaSorting: [],
            ajax: {
                "url": '{{ route($base_route.'candidate-data') }}',
                "type": 'POST',
                'data': function (d) {
                    d._token = '{{csrf_token()}}';
                }
            },
            columns :[
                {data:'DT_RowIndex', name: 'DT_RowIndex', searchable:false, orderable: false},
                {data:'agency', name: 'agency', orderable: false},
                {data:'name', name: 'name', orderable: true},
                {data:'email', name: 'email', orderable: false},
                {data:'contact', name: 'contact', orderable: true},
                {data:'user_type', name: 'user_type', orderable: true},
                {data:'status', name: 'status', searchable:false, orderable: false},
                {data:'action', name: 'action', searchable:false, orderable: false},
            ]
        })

    </script>

@endsection
