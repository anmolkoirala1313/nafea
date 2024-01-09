@php $basic_image_section = $data['section_elements']['background_image_section']->first();
 @endphp
@if(count($data['section_elements']['background_image_section'])>0)
    {!! Form::open(['url'=>route($module.'section-element.update', $basic_image_section->id),'id'=>'submit_form','class'=>'needs-validation submit_form','method'=>'PUT','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
@else
    {!! Form::open(['route' => $module.'section-element.store','method'=>'post','class'=>'needs-validation submit_form','id'=>'submit_form','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
@endif
<div class="row" id="background-form-ajax">
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
                            <input type="text" class="form-control" name="title" value="{{$basic_image_section->title ?? null}}" maxlength="35" required>
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
                            <input type="text" class="form-control" maxlength="35" name="subtitle" value="{{$basic_image_section->subtitle ?? null}}">
                            <div class="invalid-feedback">
                                Please enter the basic section sub title.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-1 mt-2">
                            <label class="form-label required"> Description <span class="text-danger">* write 800 characters only</span></label>
                            <textarea class="form-control" maxlength="1000" rows="14" name="description" id="basic_editor" required>{!! $basic_image_section->description ?? null !!}</textarea>
                            <div class="invalid-feedback">
                                Please write the small summary for basic section.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="mb-1">
                            {!! Form::label('image_input', 'Images', ['class' => 'form-label required']) !!}
                            {!! Form::file('image_input', ['class'=>'form-control','id'=>'background_image_section']) !!}
                            <p class="text-muted mb-2">Recommended size: 600 x 550px</p>
                        </div>
                        @if($basic_image_section && $basic_image_section->image)
                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="gallery-box card">
                                    <div class="gallery-container">
                                        <a class="image-popup" href="{{ asset(imagePath($basic_image_section->image))}}" title="">
                                            <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($basic_image_section->image))}}" alt="" />
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
    <button type="submit" class="btn btn-success w-sm">{{(@$basic_image_section !== null)? "Update":"Create"}}</button>
</div>
{!! Form::close() !!}
