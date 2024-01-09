@php $call_to_action = $data['section_elements']['call_to_action']->first() @endphp
@if($call_to_action)
    {!! Form::open(['url'=>route($module.'section-element.update', $call_to_action->id),'id'=>'submit_form','class'=>'needs-validation submit_form','method'=>'PUT','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
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
                    <div class="col-lg-6 mt-3">
                        <div class="mb-1">
                            <label class="form-label required">Title </label>
                            <input type="text" class="form-control" name="title" value="{{$call_to_action->title ?? null}}" maxlength="180" required>
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
                            <input type="text" class="form-control" maxlength="40" name="subtitle" value="{{$call_to_action->subtitle ?? null}}">
                            <div class="invalid-feedback">
                                Please enter the basic section sub title.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-1">
                            <label>Button Text </label>
                            <input type="text" maxlength="20" class="form-control" value="{{$call_to_action->button ?? null}}" name="button">
                            <div class="invalid-feedback">
                                Please enter the button text.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-1">
                            <label>Button Link </label>
                            <input type="text" class="form-control" value="{{$call_to_action->button_link ?? null}}" name="button_link">
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
    <button type="submit" class="btn btn-success w-sm">{{(@$call_to_action !== null)? "Update":"Create"}}</button>
</div>
{!! Form::close() !!}
