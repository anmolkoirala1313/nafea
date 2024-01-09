@php $map_and_description = $data['section_elements']['map_and_description']->first();
 @endphp
@if(count($data['section_elements']['map_and_description'])>0)
    {!! Form::open(['url'=>route($module.'section-element.update', $map_and_description->id),'id'=>'submit_form','class'=>'needs-validation submit_form','method'=>'PUT','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $module.'section-element.store','method'=>'post','class'=>'needs-validation submit_form','id'=>'submit_form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
@endif
<div class="row" id="map-form-ajax">
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
                    <div class="col-lg-6 mt-3">
                        <div class="mb-1">
                            <label class="form-label required">Title </label>
                            <input type="text" class="form-control" name="title" value="{{$map_and_description->title ?? null}}" maxlength="35" required>
                            <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                            <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                            <input type="hidden" class="form-control" value="{{ $data['row']->id }}" name="page_id" required>
                            <div class="invalid-feedback">
                                Please enter the basic section title.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 mt-3">
                        <div class="mb-1">
                            <label>Sub Title </label>
                            <input type="text" class="form-control" maxlength="35" name="subtitle" value="{{$map_and_description->subtitle ?? null}}">
                            <div class="invalid-feedback">
                                Please enter the basic section sub title.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-1 mt-2">
                            <label class="form-label required"> Description <span class="text-danger">* write 1000 characters only</span></label>
                            <textarea class="form-control" maxlength="1000" rows="14" name="description" id="basic_editor" required>{!! $map_and_description->description ?? null !!}</textarea>
                            <div class="invalid-feedback">
                                Please write the small summary for basic section.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-1">
                            <label>Button Text </label>
                            <input type="text" maxlength="20" class="form-control" value="{{@$map_and_description->button ?? null}}" name="button">
                            <div class="invalid-feedback">
                                Please enter the button text.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-1">
                            <label>Button Link </label>
                            <input type="text" class="form-control" value="{{@$map_and_description->button_link ?? null}}" name="button_link">
                            <div class="invalid-feedback">
                                Please enter the button link.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center mt-3 mb-3">
    <button type="submit" class="btn btn-success w-sm">{{(@$map_and_description !== null)? "Update":"Create"}}</button>
</div>
{!! Form::close() !!}
