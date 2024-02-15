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
            @if($data['heading'])
                <div class="row">
                    <div class="col-xl-12 col-lg-12 text-center">
                        <div class="about__four-right-title mb-0">
                            <span class="subtitle-four" style="margin-bottom: 0px;">{{ $data['heading']->subtitle ?? '' }}</span>
                            <h2 style="width: 50%;margin:auto;line-height: 50px;">{{ $data['heading']->title ?? '' }}</h2>
                        </div>
                    </div>
                    <div class="custom-description text-align-justify text-center mt-3">
                        {!! $data['heading']->description ?? ''  !!}
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-xl-12 col-lg-12 lg-mb-50">
                    <div class="row">
                        <table class="table" id="dataTable">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col">S.N</th>
                                <th scope="col">Permission No.</th>
                                <th scope="col">Name</th>
                                <th scope="col">Membership No.</th>
                                <th scope="col">Address</th>
                                <th scope="col">Contact</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include($view_path.'includes.modal')
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
            order:[],
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
                {data:'membership_number', name: 'permission_number', orderable: true},
                {data:'address', name: 'address', searchable:true, orderable: true},
                {data:'contact_number', name: 'contact_number', searchable:true, orderable: false},
                {data:'action', name: 'action', searchable:false, orderable: false},
            ]
        })

        $(document).on('click','.view-agency-modal', function (e) {
            e.preventDefault();
            let agency_id = $(this).data('value');
            $.ajax({
                type: "POST",
                dataType: "json",
                url: "{{ route($base_route.'details') }}",
                data: {
                    _token: "{{ csrf_token() }}",
                    agency_id: agency_id,
                },
                success: function(response) {
                    let rendered_view = response.rendered_view;
                    $('#table-details').empty();
                    $('#table-details').html(rendered_view);
                },
                error: function(response) {

                }
            });
            $("#authorized-agency_details").modal('toggle');
        });
    </script>
@endsection
