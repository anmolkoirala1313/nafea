<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header">
                <div class="row g-4">
                    <div class="col-sm-auto">
                        <h4 class="card-title mb-0">Labor Representative List</h4>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive  mt-3 mb-1">
                    <table id="NormalDataTable2" class="table align-middle table-nowrap table-striped">
                        <thead class="table-light">
                        <tr>
                            <th>S.N</th>
                            <th>Agency</th>
                            <th>Title</th>
                            <th>Office Number</th>
                            <th>Address</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody id="sortable_rows">
                        @foreach($data['laborRepresentatives'] as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->authorizedAgency->title ?? '' }}</td>
                                <td>{{ $row->title }}</td>
                                <td>{{ $row->office_number ?? '' }}</td>
                                <td>{{ $row->address ?? '' }}</td>
                                <td>
                                    @include($module.'includes.status_display',['status'=>$row->status])
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
