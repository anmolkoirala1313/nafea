<div class="row p-4 modal-details">
    <div class="news-one__img-box">
        @if ($data['agency']->image)
            <div class="news-one__img" style="display: flex; justify-content: center; align-items: center;">
                <img src="{{ asset(imagePath($data['agency']->image)) }}" style="width: 30%;" alt="">
            </div>
        @endif
        @if ($data['agency']->image)
            <div class="custom-description text-align-justify mt-3">
                {!! $data['agency']->description ?? ''  !!}
            </div>
        @endif
    </div>
    <div class="properitors-data mb-2 mt-4">
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
