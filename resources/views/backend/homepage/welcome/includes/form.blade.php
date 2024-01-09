@if(isset($data['row']))
    {!! Form::model($data['row'], ['route' => [$base_route.'update',$data['row']->id ], 'method' => 'PUT','class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $base_route.'store', 'method'=>'POST', 'class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('title', 'Title', ['class' => 'form-label required']) !!}
            {!! Form::text('title', isset($data['row']) ? $data['row']->title : null,['class'=>'form-control','id'=>'title','placeholder'=>'Enter title']) !!}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('subtitle', 'Subtitle', ['class' => 'form-label']) !!}
            {!! Form::text('subtitle', isset($data['row']) ? $data['row']->subtitle : null,['class'=>'form-control','id'=>'subtitle','placeholder'=>'Enter subtitle']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('button', 'Button', ['class' => 'form-label']) !!}
            {!! Form::text('button', isset($data['row']) ? $data['row']->button : null,['class'=>'form-control','id'=>'button','placeholder'=>'Enter button']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('link', 'Link', ['class' => 'form-label']) !!}
            {!! Form::text('link', isset($data['row']) ? $data['row']->link : null,['class'=>'form-control','id'=>'link','placeholder'=>'Enter link']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('video', 'Video', ['class' => 'form-label']) !!}
            {!! Form::text('video', isset($data['row']) ? $data['row']->video : null,['class'=>'form-control','id'=>'video','placeholder'=>'Enter video link']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('image_position', 'Image Position', ['class' => 'form-label required']) !!}
            {!! Form::select('image_position', ['left'=>'Left','right'=>'Right'], isset($data['row']) ? $data['row']->image_position : 'left',['class'=>'form-select mb-3 select2','id'=>'package_category_id','placeholder'=>'Select category']) !!}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3 editor">
            {!! Form::label('description', 'Description', ['class' => 'form-label required']) !!}
            {!! Form::textarea('description', null,['class'=>'form-control ck-editor','id'=>'description','placeholder'=>'Enter description']) !!}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('image_input', 'Images', ['class' => 'form-label request']) !!}
            {!! Form::file('image_input', ['class'=>'form-control','id'=>'image_input']) !!}
        </div>
        @if(isset($data['row']) && $data['row']->image)
            <div class="col-xxl-4 col-xl-4 col-sm-6">
                <div class="gallery-box card">
                    <div class="gallery-container">
                        <a class="image-popup" href="{{ asset(imagePath($data['row']->image))}}" title="">
                            <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($data['row']->image))}}" alt="" />
                            <div class="gallery-overlay">
                                <h5 class="overlay-caption">Image</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="col-lg-12">
        {!! Form::label('status', 'Status', ['class' => 'form-label']) !!}
        <div class="mb-3 mt-2">
            <div class="form-check form-check-inline form-radio-success">
                {!! Form::radio('status', 1, isset($data['row']) ? $data['row']->status == 1 : true ,['class'=>'form-check-input','id'=>'status1']) !!}
                {!! Form::label('status1', 'Active', ['class' => 'form-check-label']) !!}
            </div>
            <div class="form-check form-check-inline form-radio-danger">
                {!! Form::radio('status', 0, isset($data['row']) ? $data['row']->status == 0 : false,['class'=>'form-check-input','id'=>'status2']) !!}
                {!! Form::label('status2', 'Inactive', ['class' => 'form-check-label']) !!}
            </div>
        </div>
    </div>
    <div class="col-lg-12 border-top mt-3">
        <div class="hstack gap-2">
            {!! Form::submit(isset($data['row']) ? 'Update':'Create',['class'=>'btn btn-success mt-3','id'=>'user-add-button']) !!}
        </div>
    </div>
</div>

{!! Form::close() !!}
