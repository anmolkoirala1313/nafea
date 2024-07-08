@if($page_method == 'edit')
    {!! Form::model($data['row'], ['route' => [$base_route.'update',$data['row']->id ], 'method' => 'PUT','class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $base_route.'store', 'method'=>'POST', 'class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@endif


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-4">
                <div class="mb-3">
                    {!! Form::label('first_name', 'First Name', ['class' => 'form-label required']) !!}
                    {!! Form::text('first_name', null,['class'=>'form-control','id'=>'first_name','placeholder'=>'Enter first name']) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                    {!! Form::label('middle_name', 'Middle Name', ['class' => 'form-label']) !!}
                    {!! Form::text('middle_name', null,['class'=>'form-control','id'=>'middle_name','placeholder'=>'Enter middle name']) !!}
                </div>
            </div>
            <div class="col-lg-4">
                <div class="mb-3">
                    {!! Form::label('last_name', 'Last Name', ['class' => 'form-label required']) !!}
                    {!! Form::text('last_name', null,['class'=>'form-control','id'=>'last_name','placeholder'=>'Enter last name']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('contact', 'Contact', ['class' => 'form-label required']) !!}
                    {!! Form::number('contact', null,['class'=>'form-control','id'=>'contact','placeholder'=>'Enter contact']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('email', 'Email', ['class' => 'form-label required']) !!}
                    {!! Form::text('email', $data['row']->user->email,['class'=>'form-control', 'disabled'=>'disabled']) !!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    {!! Form::label('passport_number', 'Passport Number', ['class' => 'form-label required']) !!}
                    {!! Form::text('passport_number',  null,['class'=>'form-control','id'=>'passport_number','placeholder'=>'Enter passport number']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('passport_issue_date', 'Issue Date', ['class' => 'form-label required']) !!}
                    {!! Form::date('passport_issue_date', null,['class'=>'form-control','id'=>'passport_issue_date','placeholder'=>'Enter issue date']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('passport_expiry_date', 'Expiry Date', ['class' => 'form-label']) !!}
                    {!! Form::text('passport_expiry_date', null,['class'=>'form-control','id'=>'passport_expiry_date','placeholder'=>'Enter expiry date','readonly']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('issue_place', 'Issue Place', ['class' => 'form-label required']) !!}
                    {!! Form::text('issue_place', null,['class'=>'form-control','id'=>'issue_place','placeholder'=>'Enter issue place']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('state', 'State', ['class' => 'form-label']) !!}
                    {!! Form::text('state', null,['class'=>'form-control','id'=>'state','placeholder'=>'Enter state']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('district', 'District', ['class' => 'form-label']) !!}
                    {!! Form::text('district', null,['class'=>'form-control','id'=>'district','placeholder'=>'Enter district']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('address_candidate', 'Address', ['class' => 'form-label']) !!}
                    {!! Form::text('address', null,['class'=>'form-control','id'=>'address_candidate','placeholder'=>'Enter address']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('father_name', 'Father Name', ['class' => 'form-label']) !!}
                    {!! Form::text('father_name', null,['class'=>'form-control','id'=>'father_name','placeholder'=>'Enter father name']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('mother_name', 'Mother Name', ['class' => 'form-label']) !!}
                    {!! Form::text('mother_name', null,['class'=>'form-control','id'=>'mother_name','placeholder'=>'Enter mother name']) !!}
                </div>
            </div>
            <div class="col-lg-12">
                {!! Form::label('martial_status', 'Martial Status', ['class' => 'form-label']) !!}
                <div class="mb-3 mt-2">
                    <div class="form-check form-check-inline form-radio-success">
                        {!! Form::radio('martial_status', 1, true,['class'=>'form-check-input','id'=>'martial_status1']) !!}
                        {!! Form::label('martial_status1', 'Yes', ['class' => 'form-check-label']) !!}
                    </div>
                    <div class="form-check form-check-inline form-radio-danger">
                        {!! Form::radio('martial_status', 0, true,['class'=>'form-check-input','id'=>'martial_status2']) !!}
                        {!! Form::label('martial_status2', 'No', ['class' => 'form-check-label']) !!}
                    </div>
                </div>
            </div>
            <div class="col-lg-12 martial-status-result">
                <div class="mb-3">
                    {!! Form::label('wife_name', 'Wife Name', ['class' => 'form-label']) !!}
                    {!! Form::text('wife_name', null,['class'=>'form-control','id'=>'wife_name','placeholder'=>'Enter Wife Name']) !!}
                </div>
            </div>
            <div class="col-lg-12 martial-status-result">
                <div class="mb-3">
                    {!! Form::label('children_name', 'Children Name', ['class' => 'form-label']) !!}
                    {!! Form::textarea('children_name', null,['class'=>'form-control','id'=>'children_name','placeholder'=>'Enter Children Names']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('applied_country', 'Applied Country', ['class' => 'form-label required']) !!}
                    {!! Form::select('applied_country', $data['country'], null,['class'=>'form-select mb-3 select2 width-100','id'=>'applied_country','placeholder'=>'Select country']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('applied_for', 'Applied For (Job)', ['class' => 'form-label required']) !!}
                    {!! Form::text('applied_for', null,['class'=>'form-control','id'=>'applied_for','placeholder'=>'Enter applied for']) !!}
                </div>
            </div>
            <div class="col-lg-6">
                <div class="mb-4">
                    {!! Form::label('candidate_input', 'Candidate Photo', ['class' => 'form-label']) !!}
                    {!! Form::file('candidate_input', ['class'=>'form-control']) !!}
                </div>
                @if($data['row']->photo)
                    <div class="col-xxl-4 col-xl-4 col-sm-6">
                        <div class="gallery-box card">
                            <div class="gallery-container">
                                <a class="image-popup" href="{{ asset(imagePath($data['row']->photo))}}" title="">
                                    <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->photo))}}" alt="" />
                                    <div class="gallery-overlay">
                                        <h5 class="overlay-caption">Candidate Image</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="mb-4">
                    {!! Form::label('passport_input', 'Passport Photo', ['class' => 'form-label required']) !!}
                    {!! Form::file('passport_input', ['class'=>'form-control']) !!}
                </div>
                @if($data['row']->passport_photo)
                    <div class="col-xxl-4 col-xl-4 col-sm-6">
                        <div class="gallery-box card">
                            <div class="gallery-container">
                                <a class="image-popup" href="{{ asset(imagePath($data['row']->passport_photo))}}" title="">
                                    <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->passport_photo))}}" alt="" />
                                    <div class="gallery-overlay">
                                        <h5 class="overlay-caption">Passport File</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-lg-6">
                <div class="mb-3">
                    {!! Form::label('case_id', 'Case ID', ['class' => 'form-label']) !!}
                    {!! Form::text('case_id',  null,['class'=>'form-control','id'=>'case_id','placeholder'=>'Enter case Id']) !!}
                </div>
            </div>

            <div class="col-lg-6">
                <div class="mb-4">
                    {!! Form::label('case_file_input', 'Case File', ['class' => 'form-label']) !!}
                    {!! Form::file('case_file_input', ['class'=>'form-control']) !!}
                </div>
                @if($data['row']->case_file_type == 'image')
                    <div class="col-xxl-4 col-xl-4 col-sm-6">
                        <div class="gallery-box card">
                            <div class="gallery-container">
                                <a class="image-popup" href="{{ asset(imagePath($data['row']->case_file))}}" title="">
                                    <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->case_file))}}" alt="" />
                                    <div class="gallery-overlay">
                                        <h5 class="overlay-caption">Case File</h5>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @elseif($data['row']->case_file_type == 'file' && $data['row']->case_file)
                    <div class="d-flex justify-content-sm-end gap-2 mt-1">
                        <a href="{{ asset(filePath($data['row']->case_file))}}" target="_blank" title="Download Case File"
                           class="btn btn-outline-info waves-effect waves-light" download>
                            <i class="ri-download-cloud-2-line align-bottom me-1"></i>
                        </a>
                    </div>
                @endif
            </div>

            <div class="col-lg-12 border-top mt-3">
                <div class="hstack gap-2">
                    {!! Form::submit($page_method == 'edit' ? 'Update':'Save',['class'=>'btn btn-success mt-3','id'=>'user-add-button']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

{!! Form::close() !!}
