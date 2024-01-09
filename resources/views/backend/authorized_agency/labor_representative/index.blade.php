<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row g-4">
                    <div class="col-sm-auto">
                        <h4 class="card-title mb-0">Labor Representative List</h4>
                    </div>
                    <div class="col-sm">
                        <div class="d-flex justify-content-sm-end gap-2">
                            <button class="btn btn-outline-success waves-effect waves-light" type="button" data-bs-toggle="offcanvas"
                                    data-bs-target="#offcanvasRight2" aria-controls="offcanvasRight">
                                <i class="ri-add-line align-bottom me-1"></i> Add Labor Representative</button>
                            <a class="btn btn-outline-danger waves-effect waves-light" href="{{ route($base_route.'labor_representative.trash', $data['row']->id) }}">
                                <i class="ri-delete-bin-7-line align-bottom me-1"></i>  Trash </a>
                        </div>
                        @include($view_path.'labor_representative.create')
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive  mt-3 mb-1">
                    <table id="NormalDataTable2" class="table align-middle table-nowrap table-striped">
                        <thead class="table-light">
                        <tr>
                            <th>S.N</th>
{{--                            <th>Agency</th>--}}
                            <th>Title</th>
                            <th>Office Number</th>
                            <th>Address</th>
                            <th>Status</th>
                            <th class="text-right">Action</th>
                        </tr>
                        </thead>
                        <tbody id="sortable_rows">
                        @foreach($data['laborRepresentatives'] as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
{{--                                <td>{{ $row->authorizedAgency->title ?? '' }}</td>--}}
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->office_number ?? '' }}</td>
                                <td>{{ $row->address ?? '' }}</td>
                                <td>
                                    @include($module.'includes.status_display',['status'=>$row->status])
                                </td>
                                <td>
                                    @include($module.'includes.dataTable_action',['params'=>['id'=>$row->id,'base_route'=>$base_route.'labor_representative.']])
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
