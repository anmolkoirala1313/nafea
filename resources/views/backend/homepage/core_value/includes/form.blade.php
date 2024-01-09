@if(isset($data['row']))
    {!! Form::model($data['row'], ['route' => [$base_route.'update',$data['row']->id ], 'method' => 'PUT','class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $base_route.'store', 'method'=>'POST', 'class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
@endif
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    {!! Form::label('core_title', 'Title', ['class' => 'form-label required']) !!}
                    {!! Form::text('core_title', null, ['class'=>'form-control', 'id'=>'action_title','placeholder'=>'Enter title']) !!}
                    {!! Form::hidden('id', isset($data['row']) ? $data['row']->id : null,['class'=>'form-control','id'=>'id','readonly']) !!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    {!! Form::label('core_subtitle', 'Subtitle', ['class' => 'form-label']) !!}
                    {!! Form::text('core_subtitle', null,['class'=>'form-control','id'=>'action_subtitle','placeholder'=>'Enter subtitle']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-2">
    @if(isset($data['row']) && count($data['row']->coreValueDetail))
        @foreach($data['row']->coreValueDetail as $i => $detail)
            @include($view_path.'includes.details')
        @endforeach
    @else
        @for ($i = 0; $i <= 5; $i++)
            @include($view_path.'includes.details')
        @endfor
    @endif


    <div class="col-lg-12 border-top mb-3">
        <div class="hstack gap-2">
            {!! Form::submit(isset($data['row']) ? 'Update':'Create',['class'=>'btn btn-success mt-3','id'=>'user-add-button']) !!}
        </div>
    </div>
</div>


{!! Form::close() !!}
