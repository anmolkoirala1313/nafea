@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/css/jquery.dataTables.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/common/frontend_datatable.css')}}">

@endsection
@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=>'background_action.jpeg'])

    <div class="blog__standard section-padding">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 lg-mb-50">
                    <div class="row">
                        <table class="table" id="dataTable">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Permission No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Address</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>232423</td>
                                <td>Otto</td>
                                <td>@mdo</td>
                                <td>Kathmandu</td>
                                <td><button class="btn-two btn-sm" type="button">View</button></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/backend/js/jquery.dataTables.min.js')}}"></script>

    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script type="text/javascript">
        let dataTables = $('#dataTable').DataTable({
            processing:true,
            serverSide: true,
            searching: true,
            stateSave: true,
            order:[[1,'asc']],
            aaSorting: [],
            lengthChange: false,
            info: false,
            pageLength:25,
            language: { search: '', searchPlaceholder: "Search Here..." },
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
                {data:'address', name: 'address', searchable:true, orderable: true},
                {data:'contact_number', name: 'contact_number', searchable:true, orderable: false},
                {data:'action', name: 'action', searchable:false, orderable: false},
            ]
        })
    </script>
@endsection
