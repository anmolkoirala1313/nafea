<div class="blog__standard section-padding">
    <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12 text-center">
                    <div class="about__four-right-title mb-0">
                        <span class="subtitle-four" style="margin-bottom: 10px;">{{ $element->first()->subtitle ?? '' }} </span>
                        <h2 style="width: 50%;margin:auto;line-height: 50px;">{{ $element->first()->title ?? '' }}</h2>
                    </div>
                </div>
                <p class="custom-description text-align-justify text-center mt-3">
                    {{ $element->first()->description ?? '' }}
                </p>
            </div>
        <div class="row mt-2">
            <div class="col-xl-12 col-lg-12 lg-mb-50">
                <div class="row">
                    <table class="table">
                        <thead class="thead-light">
                        <tr>
                            <th scope="col">S.N.</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th scope="col">Document</th>
                        </tr>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($element as $index=>$row)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $row->list_title ?? '' }}</td>
                                <td>{{ $row->list_description ?? '' }}</td>
                                <td>
                                    <a href="{{ asset(filePath($row->image))}}" class="fw-medium link-primary" download>Download File</a>
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
