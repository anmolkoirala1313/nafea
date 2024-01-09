@php $document = $data['section_elements']['document']; $document_section = $data['row']->pageSections->where('slug','document')->first();  @endphp
@if(count($document))
    {!! Form::open(['url'=>route($module.'section-element.multiple-section-update'),'id'=>'submit_form','class'=>'needs-validation submit_form','method'=>'POST','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $module.'section-element.store','method'=>'post','class'=>'needs-validation submit_form','id'=>'submit_form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
@endif
<div class="row" id="document-form-ajax">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <img class="img-responsive pb-4 border-bottom lazy" data-src="{{asset('assets/backend/images/pages/sections/'.$value.'.png')}}" width="100%"/>
                <div class="row mt-3">
                    <div class="col-lg-12">
                        <div class="mb-3">
                            {!! Form::label('title', 'Title', ['class' => 'form-label required']) !!}
                            {!! Form::text('title[]', $document[0]->title ?? null, ['class'=>'form-control', 'id'=>'title','placeholder'=>'Enter title']) !!}
                            <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                            <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                            <input type="hidden" class="form-control" value="{{ $data['row']->id }}" name="page_id" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            {!! Form::label('subtitle', 'Subtitle', ['class' => 'form-label']) !!}
                            {!! Form::text('subtitle[]', $document[0]->subtitle ?? null,['class'=>'form-control','id'=>'subtitle','placeholder'=>'Enter subtitle']) !!}
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-3">
                            {!! Form::label('description', 'Description', ['class' => 'form-label']) !!}
                            {!! Form::textarea('description[]', $document[0]->description ?? null,['class'=>'form-control','id'=>'description','placeholder'=>'Enter description']) !!}
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
                            <h4 class="card-title mb-0 flex-grow-1">Document Details</h4>
                        </div><!-- end card header -->

                        <div class="card-body">
                            <div class="table-responsive table-card">
                                <table class="table table-borderless table-striped table-centered
                        align-middle table-nowrap mb-0" id="document-table">
                                    <thead class="text-muted table-light">
                                    <tr>
                                        <th scope="col" class="required">Title</th>
                                        <th scope="col">Description</th>
                                        <th scope="col" class="required">File</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($document))
                                        @foreach($document as $i => $detail)
                                            @include($view_path.'partials.document_detail')
                                        @endforeach
                                    @else
                                        @include($view_path.'partials.document_detail')
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-lg-12 border-top mt-3 mb-3">
                                <div class="hstack gap-2 pt-2">
                                    <button type="button" title="Add Files" id="add_document"
                                            class="btn btn-outline-success waves-effect waves-light"><i class="ri-add-line"></i> Add File</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center mt-3 mb-3">
    <button type="submit" class="btn btn-success w-sm">{{(count(@$document) > 0)? "Update":"Create"}}</button>
</div>
{!! Form::close() !!}
