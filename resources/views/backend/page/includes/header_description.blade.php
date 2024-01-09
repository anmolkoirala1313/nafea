@php $header_description = $data['section_elements']['header_description']->first() @endphp
@if($header_description)
    {!! Form::open(['url'=>route($module.'section-element.update', $header_description->id),'id'=>'submit_form','class'=>'needs-validation submit_form','method'=>'PUT','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $module.'section-element.store','method'=>'post','class'=>'needs-validation submit_form','id'=>'submit_form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
@endif
<div class="row" id="basic-form-ajax">
    <div class="col-md-12">
        <div class="card ctm-border-radius shadow-sm flex-fill">
            <div class="card-header">
                <h4 class="card-title mb-0">
                    {{ucfirst(str_replace('_',' ',$value))}} details
                </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <img class="img-responsive pb-4 border-bottom lazy" data-src="{{asset('assets/backend/images/pages/sections/'.$value.'.png')}}" width="100%"/>

                    <div class="col-lg-12 mt-3">
                        <div class="mb-1">
                            <label class="form-label">Title </label>
                            <input type="text" class="form-control" name="subtitle" value="{{$header_description->subtitle ?? null}}" maxlength="100" required>
                            <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                            <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                            <input type="hidden" class="form-control" value="{{ $data['row']->id }}" name="page_id" required>
                            <div class="invalid-feedback">
                                Please enter the basic section title.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-1 mt-2 editor">
                            <label class="form-label required"> Description </label>
                            <textarea class="form-control ck-editor" maxlength="1200" rows="14" name="description" id="header_editor" required>{!! $header_description->description ?? null !!}</textarea>
                            <div class="invalid-feedback">
                                Please write the small summary for basic section.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center mt-3 mb-3">
    <button type="submit" class="btn btn-success w-sm">{{(@$header_description !== null)? "Update":"Create"}}</button>
</div>
{!! Form::close() !!}
