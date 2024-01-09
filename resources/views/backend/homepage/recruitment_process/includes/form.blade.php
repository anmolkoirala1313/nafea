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
                    {!! Form::label('recruitment_title', 'Title', ['class' => 'form-label required']) !!}
                    {!! Form::text('recruitment_title', null, ['class'=>'form-control', 'id'=>'recruitment_title','placeholder'=>'Enter title']) !!}
                    {!! Form::hidden('id', isset($data['row']) ? $data['row']->id : null,['class'=>'form-control','id'=>'id','readonly']) !!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    {!! Form::label('recruitment_subtitle', 'Subtitle', ['class' => 'form-label']) !!}
                    {!! Form::text('recruitment_subtitle', null,['class'=>'form-control','id'=>'recruitment_subtitle','placeholder'=>'Enter subtitle']) !!}
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row mb-2">
    <div class="col-lg-12">
        <div class="nosticky-side-div">
            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">Process Details</h4>
                </div><!-- end card header -->

                <div class="card-body">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-striped table-centered
                        align-middle table-nowrap mb-0" id="process-table">
                            <thead class="text-muted table-light">
                                <tr>
                                <th scope="col" class="required">Title</th>
{{--                                <th scope="col">Icon</th>--}}
                                <th scope="col">Description</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(isset($data['row']) && count($data['row']->recruitmentProcess))
                                    @foreach($data['row']->recruitmentProcess as $i => $detail)
                                        @include($view_path.'includes.details')
                                    @endforeach
                                @else
                                  @include($view_path.'includes.details')
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12 border-top mt-3 mb-3">
                        <div class="hstack gap-2 pt-2">
                            <button type="button" title="Add Process" id="add_process"
                                    class="btn btn-outline-success waves-effect waves-light"><i class="ri-add-line"></i> Add Process</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <div class="col-lg-12 border-top mb-3">
        <div class="hstack gap-2">
            {!! Form::submit(isset($data['row']) ? 'Update':'Create',['class'=>'btn btn-success mt-3','id'=>'user-add-button']) !!}
        </div>
    </div>
</div>


{!! Form::close() !!}
