{!! Form::open(['route' => $base_route.'store', 'method'=>'POST', 'class'=>'submit_form','enctype'=>'multipart/form-data']) !!}
<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-3">
                    {!! Form::label('title', 'Title', ['class' => 'form-label required']) !!}
                    {!! Form::text('title[]', count($data['rows']) ? $data['rows']->first()->title:null, ['class'=>'form-control', 'id'=>'title','placeholder'=>'Enter title']) !!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    {!! Form::label('subtitle', 'Subtitle', ['class' => 'form-label']) !!}
                    {!! Form::text('subtitle[]', count($data['rows']) ? $data['rows']->first()->subtitle:null,['class'=>'form-control','id'=>'subtitle','placeholder'=>'Enter subtitle']) !!}
                </div>
            </div>
            <div class="col-lg-12">
                <div class="mb-3">
                    {!! Form::label('description', 'Description', ['class' => 'form-label']) !!}
                    {!! Form::textarea('description[]', count($data['rows']) ? $data['rows']->first()->description:null,['class'=>'form-control','id'=>'description','placeholder'=>'Enter description']) !!}
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
                                <th scope="col">Description</th>
                                <th scope="col" class="required">File</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @if(isset($data['rows']) && $data['rows']->count())
                                    @foreach($data['rows'] as $i => $detail)
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
                            <button type="button" title="Add Files" id="add_row"
                                    class="btn btn-outline-success waves-effect waves-light"><i class="ri-add-line"></i> Add File</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-12 border-top mb-3">
        <div class="hstack gap-2">
            {!! Form::submit(count($data['rows']) ? 'Update':'Create',['class'=>'btn btn-success mt-3','id'=>'user-add-button']) !!}
        </div>
    </div>
</div>


{!! Form::close() !!}
