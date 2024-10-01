<div class="row p-4 modal-details">
    <div class="news-one__img-box">
        @if ($data['agency']->image)
            <div class="news-one__img mb-3" style="display: flex; justify-content: center; align-items: center;">
                <img src="{{ asset(imagePath($data['agency']->image)) }}" style="width: 30%;" alt="">
            </div>
        @endif
            <div class="text-align-justify custom-description">
                <ol class="mt-0">
                    @if($data['agency']->title)
                        <li>Company Name: {{ $data['agency']->title ?? '' }}</li>
                    @endif
                    @if($data['agency']->email)
                        <li>Email: {{ $data['agency']->email ?? '' }}</li>
                    @endif
                    @if($data['agency']->contact_number)
                        <li>Number: {{ $data['agency']->contact_number ?? '' }}</li>
                    @endif
                    @if($data['agency']->address)
                        <li>Location: {{ $data['agency']->address ?? '' }}</li>
                    @endif
                    @if($data['agency']->website)
                        <li>Website: {{ $data['agency']->website ?? '' }}</li>
                    @endif
                </ol>
            </div>
        @if ($data['agency']->description)
            <div class="custom-description text-align-justify mt-3 mb-2" style="color: var(--text-heading-color);">
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
