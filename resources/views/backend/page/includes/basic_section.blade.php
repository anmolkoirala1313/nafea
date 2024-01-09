@php $basic_element = $data['section_elements']['basic_section']->first() @endphp
@if(count($data['section_elements']['basic_section'])>0)
    {!! Form::open(['url'=>route($module.'section-element.update', $basic_element->id),'id'=>'submit_form','class'=>'needs-validation submit_form','method'=>'PUT','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
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
                        <div class="mb-2">
                            <label class="form-label required">Title </label>
                            <input type="text" class="form-control" name="title" value="{{$basic_element->title ?? null}}" maxlength="40" required>
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
                            <input type="text" class="form-control" maxlength="35" name="subtitle" value="{{$basic_element->subtitle ?? null}}">
                            <div class="invalid-feedback">
                                Please enter the basic section sub title.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-2 mt-2">
                            <label class="form-label required"> Description <span class="text-danger">* write 800 characters only</span></label>
                            <textarea class="form-control" maxlength="1000" rows="14" name="description" id="basic_editor" required>{!! $basic_element->description ?? null !!}</textarea>
                            <div class="invalid-feedback">
                                Please write the small summary for basic section.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-2">
                            <label>Button Text </label>
                            <input type="text" maxlength="20" class="form-control" value="{{@$basic_element->button ?? null}}" name="button">
                            <div class="invalid-feedback">
                                Please enter the button text.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="mb-2">
                            <label>Button Link </label>
                            <input type="text" class="form-control" value="{{@$basic_element->button_link ?? null}}" name="button_link">
                            <div class="invalid-feedback">
                                Please enter the button link.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-2">
                            {!! Form::label('image_input', 'Images', ['class' => 'form-label required']) !!}
                            {!! Form::file('image_input', ['class'=>'form-control','id'=>'basic_image_input']) !!}
                            <p class="text-muted mb-2">Recommended size: 600 x 550px</p>
                        </div>
                        @if($basic_element && $basic_element->image)
                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="gallery-box card">
                                    <div class="gallery-container">
                                        <a class="image-popup" href="{{ asset(imagePath($basic_element->image))}}" title="">
                                            <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($basic_element->image))}}" alt="" />
                                            <div class="gallery-overlay">
                                                <h5 class="overlay-caption">Feature Image</h5>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center mt-3 mb-3">
    <button type="submit" class="btn btn-success w-sm">{{(@$basic_element !== null)? "Update":"Create"}}</button>
</div>
{!! Form::close() !!}
