@if(isset($data['row']))
    {!! Form::model($data['row'], ['route' => [$base_route.'update',$data['row']->id ], 'method' => 'PUT','class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $base_route.'store', 'method'=>'POST', 'class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@endif

<div class="row">
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('mission', 'Mission', ['class' => 'form-label required']) !!}
            {!! Form::textarea('mission', null,['class'=>'form-control','id'=>'mission','placeholder'=>'Enter mission']) !!}
            {!! Form::hidden('id', isset($data['row']) ? $data['row']->id : null,['class'=>'form-control','id'=>'id','placeholder'=>'Enter title']) !!}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('vision', 'Vision', ['class' => 'form-label required']) !!}
            {!! Form::textarea('vision', null,['class'=>'form-control','id'=>'vision','placeholder'=>'Enter vision']) !!}
        </div>
    </div>
    <div class="col-lg-12">
        <div class="mb-3">
            {!! Form::label('value', 'Value', ['class' => 'form-label required']) !!}
            {!! Form::textarea('value', null,['class'=>'form-control','id'=>'value','placeholder'=>'Enter value']) !!}
        </div>
    </div>
    <div class="col-lg-12 border-top mt-3">
        <div class="hstack gap-2">
            {!! Form::submit(isset($data['row']) ? 'Update':'Create',['class'=>'btn btn-success mt-3','id'=>'user-add-button']) !!}
        </div>
    </div>
</div>

{!! Form::close() !!}
