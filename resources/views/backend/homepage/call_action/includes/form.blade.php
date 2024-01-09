@if(isset($data['row']))
    {!! Form::model($data['row'], ['route' => [$base_route.'update',$data['row']->id ], 'method' => 'PUT','class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $base_route.'store', 'method'=>'POST', 'class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('action_title', 'Title', ['class' => 'form-label required']) !!}
            {!! Form::text('action_title', null,['class'=>'form-control','id'=>'action_title','placeholder'=>'Enter title']) !!}
            {!! Form::hidden('id', isset($data['row']) ? $data['row']->id : null,['class'=>'form-control','id'=>'id','placeholder'=>'Enter title']) !!}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('action_subtitle', 'Subtitle', ['class' => 'form-label']) !!}
            {!! Form::text('action_subtitle', null,['class'=>'form-control','id'=>'action_subtitle','placeholder'=>'Enter subtitle']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('action_button', 'Button', ['class' => 'form-label']) !!}
            {!! Form::text('action_button', null,['class'=>'form-control','id'=>'action_button','placeholder'=>'Enter button']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('action_link', 'Link', ['class' => 'form-label']) !!}
            {!! Form::text('action_link', null,['class'=>'form-control','id'=>'action_link','placeholder'=>'Enter link']) !!}
        </div>
    </div>
    <div class="col-lg-12 border-top mt-3">
        <div class="hstack gap-2">
            {!! Form::submit(isset($data['row']) ? 'Update':'Create',['class'=>'btn btn-success mt-3','id'=>'user-add-button']) !!}
        </div>
    </div>
</div>

{!! Form::close() !!}
