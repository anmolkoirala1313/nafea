<div class="row">
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('passport_number', 'Passport Number', ['class' => 'form-label required']) !!}
            {!! Form::text('passport_number', $page_method == 'edit' && $data['row']->user_type == 'general' && $data['row']->candidate ? $data['row']->candidate->passport_number : null,['class'=>'form-control','id'=>'passport_number','placeholder'=>'Enter passport number']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('passport_issue_date', 'Issue Date', ['class' => 'form-label required']) !!}
            {!! Form::date('passport_issue_date', $page_method == 'edit' && $data['row']->user_type == 'general' && $data['row']->candidate ? $data['row']->candidate->passport_issue_date : null,['class'=>'form-control','id'=>'contact','placeholder'=>'Enter issue date']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('passport_expiry_date', 'Expiry Date', ['class' => 'form-label']) !!}
            {!! Form::text('passport_expiry_date', $page_method == 'edit' && $data['row']->user_type == 'general' && $data['row']->candidate ? $data['row']->candidate->passport_expiry_date : null,['class'=>'form-control','id'=>'passport_expiry_date','placeholder'=>'Enter expiry date','readonly']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('issue_place', 'Issue Place', ['class' => 'form-label']) !!}
            {!! Form::text('issue_place', $page_method == 'edit' && $data['row']->user_type == 'general' && $data['row']->candidate ? $data['row']->candidate->issue_place : null,['class'=>'form-control','id'=>'issue_place','placeholder'=>'Enter issue place']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('state', 'State', ['class' => 'form-label']) !!}
            {!! Form::text('state', $page_method == 'edit' && $data['row']->user_type == 'general' && $data['row']->candidate ? $data['row']->candidate->state : null,['class'=>'form-control','id'=>'state','placeholder'=>'Enter state']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('district', 'District', ['class' => 'form-label']) !!}
            {!! Form::text('district', $page_method == 'edit' && $data['row']->user_type == 'general' && $data['row']->candidate  ? $data['row']->candidate->district : null,['class'=>'form-control','id'=>'district','placeholder'=>'Enter district']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('address', 'Address', ['class' => 'form-label']) !!}
            {!! Form::text('address', $page_method == 'edit' && $data['row']->user_type == 'general' && $data['row']->candidate  ? $data['row']->candidate->address : null,['class'=>'form-control','id'=>'address','placeholder'=>'Enter address']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('father_name', 'Father Name', ['class' => 'form-label']) !!}
            {!! Form::text('father_name', $page_method == 'edit' && $data['row']->user_type == 'general' && $data['row']->candidate ? $data['row']->candidate->father_name : null,['class'=>'form-control','id'=>'father_name','placeholder'=>'Enter father name']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('mother_name', 'Mother Name', ['class' => 'form-label']) !!}
            {!! Form::text('mother_name', $page_method == 'edit' && $data['row']->user_type == 'general' && $data['row']->candidate ? $data['row']->candidate->mother_name : null,['class'=>'form-control','id'=>'mother_name','placeholder'=>'Enter mother name']) !!}
        </div>
    </div>
    <div class="col-lg-12">
        {!! Form::label('martial_status', 'Martial Status', ['class' => 'form-label']) !!}
        <div class="mb-3 mt-2">
            <div class="form-check form-check-inline form-radio-success">
                @if ($page_method == 'edit' )
                    {!! Form::radio('martial_status', 1, $data['row']->user_type == 'general' && $data['row']->candidate ? $data['row']->candidate->martial_status == 1:false,['class'=>'form-check-input','id'=>'martial_status1']) !!}
                @else
                    {!! Form::radio('martial_status', 1, true,['class'=>'form-check-input','id'=>'martial_status1']) !!}
                @endif
                {!! Form::label('martial_status1', 'Yes', ['class' => 'form-check-label']) !!}
            </div>
            <div class="form-check form-check-inline form-radio-danger">
                @if ($page_method == 'edit' )
                    {!! Form::radio('martial_status', 0, $data['row']->user_type == 'general' && $data['row']->candidate  ? $data['row']->candidate->martial_status == 0:true,['class'=>'form-check-input','id'=>'martial_status2']) !!}
                @else
                    {!! Form::radio('martial_status', 0, true,['class'=>'form-check-input','id'=>'martial_status2']) !!}
                @endif
                {!! Form::label('martial_status2', 'No', ['class' => 'form-check-label']) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-12 martial-status-result">
        <div class="mb-3">
            {!! Form::label('wife_name', 'Wife Name', ['class' => 'form-label']) !!}
            {!! Form::text('wife_name', $page_method == 'edit' && $data['row']->user_type == 'general' && $data['row']->candidate ? $data['row']->candidate->wife_name : null,['class'=>'form-control','id'=>'wife_name','placeholder'=>'Enter Wife Name']) !!}
        </div>
    </div>
    <div class="col-lg-12 martial-status-result">
        <div class="mb-3">
            {!! Form::label('children_name', 'Children Name', ['class' => 'form-label']) !!}
            {!! Form::textarea('children_name', $page_method == 'edit' && $data['row']->user_type == 'general' && $data['row']->candidate ? $data['row']->candidate->children_name : null,['class'=>'form-control','id'=>'children_name','placeholder'=>'Enter Children Names']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('applied_country', 'Applied Country', ['class' => 'form-label']) !!}
            {!! Form::select('applied_country', $data['country'], $page_method == 'edit' && $data['row']->user_type == 'general' && $data['row']->candidate ? $data['row']->candidate->applied_country : null,['class'=>'form-select mb-3 select2 width-100','id'=>'applied_country','placeholder'=>'Select country']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('applied_for', 'Applied For (Job)', ['class' => 'form-label']) !!}
            {!! Form::text('applied_for', $page_method == 'edit' && $data['row']->user_type == 'general' && $data['row']->candidate ? $data['row']->candidate->applied_for : null,['class'=>'form-control','id'=>'applied_for','placeholder'=>'Enter applied for']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-4">
            {!! Form::label('candidate_input', 'Candidate Photo', ['class' => 'form-label']) !!}
            {!! Form::file('candidate_input', ['class'=>'form-control']) !!}
        </div>
        @if($page_method=='edit' && $data['row']->candidate && $data['row']->is_candidate && $data['row']->candidate->photo)
            <div class="col-xxl-4 col-xl-4 col-sm-6">
                <div class="gallery-box card">
                    <div class="gallery-container">
                        <a class="image-popup" href="{{ asset(imagePath($data['row']->candidate->photo))}}" title="">
                            <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->candidate->photo))}}" alt="" />
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
            {!! Form::label('passport_input', 'Passport Photo', ['class' => 'form-label']) !!}
            {!! Form::file('passport_input', ['class'=>'form-control']) !!}
        </div>
        @if($page_method=='edit' && $data['row']->candidate && $data['row']->is_candidate && $data['row']->candidate->passport_photo)
            <div class="col-xxl-4 col-xl-4 col-sm-6">
                <div class="gallery-box card">
                    <div class="gallery-container">
                        <a class="image-popup" href="{{ asset(imagePath($data['row']->candidate->passport_photo))}}" title="">
                            <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->candidate->passport_photo))}}" alt="" />
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
            {!! Form::text('case_id', $page_method == 'edit' && $data['row']->user_type == 'general' && $data['row']->is_candidate ? $data['row']->candidate->case_id : null,['class'=>'form-control','id'=>'case_id','placeholder'=>'Enter case Id']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-4">
            {!! Form::label('case_file_input', 'Case File', ['class' => 'form-label']) !!}
            {!! Form::file('case_file_input', ['class'=>'form-control']) !!}
        </div>
        @if($page_method=='edit' && $data['row']->candidate && $data['row']->is_candidate && $data['row']->candidate->case_file && $data['row']->candidate->case_file_type == 'image')
            <div class="col-xxl-4 col-xl-4 col-sm-6">
                <div class="gallery-box card">
                    <div class="gallery-container">
                        <a class="image-popup" href="{{ asset(imagePath($data['row']->candidate->case_file))}}" title="">
                            <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->candidate->case_file))}}" alt="" />
                            <div class="gallery-overlay">
                                <h5 class="overlay-caption">Case File</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @elseif($page_method=='edit' && $data['row']->candidate && $data['row']->is_candidate && $data['row']->candidate->case_file_type == 'file' && $data['row']->candidate->case_file)
            <div class="d-flex justify-content-sm-end gap-2 mt-1">
                <a href="{{ asset(filePath($data['row']->candidate->case_file))}}" target="_blank" title="Download Case File"
                   class="btn btn-outline-info waves-effect waves-light" download>
                    <i class="ri-download-cloud-2-line align-bottom me-1"></i>
                </a>
{{--                <button class="btn btn-outline-danger waves-effect waves-light remove-brochure" title="remove brochure" type="button"  id="remove-brochure">--}}
{{--                    <i class="ri-delete-bin-6-line align-bottom me-1"></i></button>--}}
            </div>
        @endif
    </div>

</div>
