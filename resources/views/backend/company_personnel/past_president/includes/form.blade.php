@if($page_method == 'edit')
    {!! Form::model($data['row'], ['route' => [$base_route.'update',$data['row']->id ], 'method' => 'PUT','class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $base_route.'store', 'method'=>'POST', 'class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('title', 'Title', ['class' => 'form-label required']) !!}
            {!! Form::text('title', null,['class'=>'form-control','id'=>'name','placeholder'=>'Enter title']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('designation', 'Designation', ['class' => 'form-label required']) !!}
            {!! Form::text('designation', $page_method == 'edit' ? $data['row']->designation:'Past President' ,['class'=>'form-control','id'=>'designation','placeholder'=>'Enter designation']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('duration', 'Duration', ['class' => 'form-label required']) !!}
            {!! Form::text('duration', null,['class'=>'form-control','id'=>'duration','placeholder'=>'Enter duration']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('fb_link', 'Facebook Link', ['class' => 'form-label']) !!}
            {!! Form::text('fb_link', null,['class'=>'form-control','id'=>'fb_link','placeholder'=>'Enter link']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('twitter_link', 'Twitter Link', ['class' => 'form-label']) !!}
            {!! Form::text('twitter_link', null,['class'=>'form-control','id'=>'fb_link','placeholder'=>'Enter link']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('instagram_link', 'Instagram Link', ['class' => 'form-label']) !!}
            {!! Form::text('instagram_link', null,['class'=>'form-control','id'=>'instagram_link','placeholder'=>'Enter link']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('linkedin_link', 'LinkedIn Link', ['class' => 'form-label']) !!}
            {!! Form::text('linkedin_link', null,['class'=>'form-control','id'=>'linkedin_link','placeholder'=>'Enter link']) !!}
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
                                <h5 class="overlay-caption">Image</h5>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="col-lg-6">
        {!! Form::label('status', 'Status', ['class' => 'form-label']) !!}
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
    <div class="col-lg-12 border-top mt-3">
        <div class="hstack gap-2">
            {!! Form::submit($button,['class'=>'btn btn-success mt-3','id'=>'user-add-button']) !!}
        </div>
    </div>
</div>

{!! Form::close() !!}
