@if($page_method == 'edit')
    {!! Form::model($data['row'], ['route' => [$base_route.'update',$data['row']->id ], 'method' => 'PUT','class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $base_route.'store', 'method'=>'POST', 'class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('job_category_id', 'Category', ['class' => 'form-label']) !!}
            {!! Form::select('job_category_id[]', $data['categories'],$page_method == 'edit' && $data['row']->categories ? $data['row']->categories->pluck('id'): null,['class'=>'form-select mb-3 select2','id'=>'job_category_id','multiple'=>'multiple']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-2">
            {!! Form::label('title', 'Title', ['class' => 'form-label required']) !!}
            {!! Form::text('title', null,['class'=>'form-control','id'=>'title','placeholder'=>'Enter title']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('name', 'Name', ['class' => 'form-label']) !!}
            {!! Form::text('name', null,['class'=>'form-control','id'=>'name','placeholder'=>'Enter name']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('start_date', 'Start Date', ['class' => 'form-label required']) !!}
            {!! Form::date('start_date',null,['class'=>'form-control','id'=>'start_date','placeholder'=>'mm-dd-yyyy']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('end_date', 'End Date', ['class' => 'form-label required']) !!}
            {!! Form::date('end_date',null,['class'=>'form-control','id'=>'end_date','placeholder'=>'mm-dd-yyyy']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-2">
            {!! Form::label('required_number', 'Number Of Jobs', ['class' => 'form-label']) !!}
            {!! Form::number('required_number', null,['class'=>'form-control','id'=>'required_number','placeholder'=>'Required number of jobs']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('lt_number', 'LT Number', ['class' => 'form-label']) !!}
            {!! Form::text('lt_number', null,['class'=>'form-control','id'=>'lt_number','placeholder'=>'Enter LT Number']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-2">
            {!! Form::label('company', 'Company Name', ['class' => 'form-label']) !!}
            {!! Form::text('company', null,['class'=>'form-control','id'=>'company','placeholder'=>'Company 1, Company 2..']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('salary', 'Salary', ['class' => 'form-label']) !!}
            {!! Form::text('salary', null,['class'=>'form-control','id'=>'salary','placeholder'=>'Enter Salary']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3 editor">
            {!! Form::label('min_qualification', 'Min. Qualification', ['class' => 'form-label']) !!}
            {!! Form::select('min_qualification',$data['min_qualification'], null,['class'=>'form-control select2','id'=>'min_qualification','placeholder'=>'Select Min Qualification']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3 editor">
            {!! Form::label('formlink', 'Form Link', ['class' => 'form-label']) !!}
            {!! Form::text('formlink', null,['class'=>'form-control','id'=>'formlink','placeholder'=>'Enter form link']) !!}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3 editor">
            {!! Form::label('description', 'Description', ['class' => 'form-label']) !!}
            {!! Form::textarea('description', null,['class'=>'form-control ck-editor','id'=>'description','placeholder'=>'Enter description']) !!}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('image_input', 'Images', ['class' => 'form-label required']) !!}
            {!! Form::file('image_input', ['class'=>'form-control','id'=>'image_input']) !!}
        </div>
        @if($page_method=='edit' && $data['row']->image)
            <div class="col-xxl-4 col-xl-4 col-sm-6">
                <div class="gallery-box card">
                    <div class="gallery-container">
                        <a class="image-popup" href="{{ asset(imagePath($data['row']->image))}}" title="">
                            <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->image))}}" alt="" />
                            <div class="gallery-overlay">
                                <h5 class="overlay-caption">Feature Image</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="col-lg-12">
        <div class="separator">
            <h2><i class="ri-global-line"></i> Meta Data (SEO)</h2>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('meta_title', 'Meta Title', ['class' => 'form-label']) !!}
            {!! Form::text('meta_title', null,['class'=>'form-control','id'=>'meta_title','placeholder'=>'Enter meta title']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('meta_tags', 'Min. Qualification', ['class' => 'form-label']) !!}
            {!! Form::text('meta_tags', null,['class'=>'form-control','id'=>'meta_tags','data-choices','data-choices-text-unique-true']) !!}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('meta_description', 'Meta Description', ['class' => 'form-label']) !!}
            {!! Form::textarea('meta_description', null,['class'=>'form-control','id'=>'meta_description','placeholder'=>'Enter meta description']) !!}
        </div>
    </div>

    <div class="col-lg-12 border-top">
        {!! Form::label('status', 'Status', ['class' => 'form-label mt-3']) !!}
        <div class="mb-3 mt-2">
            <div class="form-check form-check-inline form-radio-success">
                {!! Form::radio('status', 1, true,['class'=>'form-check-input','id'=>'status1']) !!}
                {!! Form::label('status1', 'Active', ['class' => 'form-check-label']) !!}
            </div>
            <div class="form-check form-check-inline form-radio-danger">
                {!! Form::radio('status', 0, false,['class'=>'form-check-input','id'=>'status2']) !!}
                {!! Form::label('status2', 'Inactive', ['class' => 'form-check-label']) !!}
            </div>
        </div>
    </div>
</div>
<div class="row sticky-button">
    <div class="col-lg-12 border-top mb-2 mt-2">
        <div class="hstack gap-2">
            {!! Form::submit($button,['class'=>'btn btn-success mt-3','id'=>'user-add-button']) !!}
        </div>
    </div>
</div>

{!! Form::close() !!}
