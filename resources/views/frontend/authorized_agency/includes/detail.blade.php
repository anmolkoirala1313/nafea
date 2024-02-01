<div class="row p-4 modal-details">
    <div class="properitors-data mb-2">
        <span class="subtitle-four">Proprietors</span>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">S.N</th>
                <th scope="col">Full Name</th>
                <th scope="col">Mobile Number</th>
                <th scope="col">Office Phone</th>
                <th scope="col">Address</th>
            </tr>
            </thead>
            <tbody>
            @if(count($data['agency']->proprietors))
                @foreach($data['agency']->proprietors as $proprietor)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $proprietor->title ?? '' }}</td>
                        <td>{{ $proprietor->contact_number ?? '' }}</td>
                        <td>{{ $proprietor->office_number ?? '' }}</td>
                        <td>{{ $proprietor->address ?? '' }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">No data found</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    <div class="properitors-data">
        <span class="subtitle-four">Labor Representatives</span>
        <table class="table">
            <thead class="thead-light">
            <tr>
                <th scope="col">S.N</th>
                <th scope="col">Full Name</th>
                <th scope="col">Mobile Number</th>
                <th scope="col">Office Phone</th>
                <th scope="col">Address</th>
            </tr>
            </thead>
            <tbody>
            @if(count($data['agency']->laborRepresentatives))
                @foreach($data['agency']->laborRepresentatives as $representative)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $representative->title ?? '' }}</td>
                        <td>{{ $representative->contact_number ?? '' }}</td>
                        <td>{{ $representative->office_number ?? '' }}</td>
                        <td>{{ $representative->address ?? '' }}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="5" class="text-center">No data found</td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>


</div>
