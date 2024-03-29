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
        <div class="container-fluid">
            @include($module.'includes.breadcrumb')
            <div class="row">
                <div class="col-lg-12">
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
                        <div class="card-body">
                            <div class="table-responsive  mt-3 mb-1">
                                <table id="dataTable" class="table align-middle table-nowrap table-striped">
                                    <thead class="table-light">
                                    <tr>
{{--                                        <th width="30px">#</th>--}}
                                        <th>S.N</th>
                                        <th>Permission Number</th>
                                        <th>Title</th>
                                        <th>Contact Number</th>
                                        <th>Status</th>
                                        <th class="text-right">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="sortable_rows">
{{--                                    @foreach($data['row'] as $row)--}}
{{--                                        <tr class="rows" data-id="{{ $row->id }}">--}}
{{--                                            <td class="pl-3"><i class=" ri-drag-move-2-fill"></i></td>--}}
{{--                                            <td>{{ $loop->iteration }}</td>--}}
{{--                                            <td>{{ $row->permission_number ?? '' }}</td>--}}
{{--                                            <td>{{ $row->title }}</td>--}}
{{--                                            <td>{{ $row->contact_number ?? '' }}</td>--}}
{{--                                            <td>--}}
{{--                                                @include($module.'includes.status_display',['status'=>$row->status])--}}
{{--                                            </td>--}}
{{--                                            <td>--}}
{{--                                                @include($view_path.'includes.dataTable_action',['params'=>['id'=>$row->id,'base_route'=>$base_route]])--}}
{{--                                            </td>--}}
{{--                                        </tr>--}}
{{--                                    @endforeach--}}
                                    </tbody>
                                </table>
                            </div>
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
    <script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    <script src="{{asset('assets/backend/js/jquery-ui.min.js')}}"></script>

    @include($module.'includes.toast_message')
    @include($module.'includes/gallery')
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
                {data:'permission_number', name: 'permission_number', orderable: true},
                {data:'title', name: 'title', searchable:true, orderable: false},
                {data:'contact_number', name: 'contact_number', searchable:true, orderable: true},
                {data:'status', name: 'status', searchable:false, orderable: false},
                {data:'action', name: 'action', searchable:false, orderable: false},
            ]
        })
    </script>

@endsection
