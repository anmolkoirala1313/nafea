@if($page_method == 'edit')
    {!! Form::model($data['row'], ['route' => [$base_route.'update',$data['row']->id ], 'method' => 'PUT','class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@endif

<div class="row">
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('name', 'Title', ['class' => 'form-label required']) !!}
            {!! Form::text('name', null,['class'=>'form-control','id'=>'name','readonly']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('phone', 'Phone', ['class' => 'form-label required']) !!}
            {!! Form::text('phone', null,['class'=>'form-control','id'=>'phone','readonly']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('email', 'Email', ['class' => 'form-label']) !!}
            {!! Form::text('email', null,['class'=>'form-control','id'=>'email','readonly']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        <div class="mb-3">
            {!! Form::label('subject', 'Subject', ['class' => 'form-label']) !!}
            {!! Form::text('subject', null,['class'=>'form-control','id'=>'subject','readonly']) !!}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('message', 'Subject', ['class' => 'form-label']) !!}
            {!! Form::textarea('message', null,['class'=>'form-control','id'=>'message','readonly']) !!}
        </div>
    </div>
    <div class="col-lg-6">
        {!! Form::label('status', 'Status', ['class' => 'form-label']) !!}
        <div class="mb-3 mt-2">
            <div class="form-check form-check-inline form-radio-success">
                {!! Form::radio('status', 1, true,['class'=>'form-check-input','id'=>'status1']) !!}
                {!! Form::label('status1', 'Responded', ['class' => 'form-check-label']) !!}
            </div>
            <div class="form-check form-check-inline form-radio-danger">
                {!! Form::radio('status', 0, false,['class'=>'form-check-input','id'=>'status2']) !!}
                {!! Form::label('status2', 'Not responded', ['class' => 'form-check-label']) !!}
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
