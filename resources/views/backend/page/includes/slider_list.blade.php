@php $slider_list = $data['section_elements']['slider_list']; $slider_list_section = $data['row']->pageSections->where('slug','slider_list')->first();  @endphp
@if(count($slider_list)>0)
    {!! Form::open(['url'=>route($module.'section-element.multiple-section-update'),'id'=>'submit_form','class'=>'needs-validation submit_form','method'=>'POST','novalidate'=>'','enctype'=>'multipart/form-data']) !!}
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
                            <input type="text" class="form-control" name="title[]" value="{{ $slider_list[0]->title ?? null}}" maxlength="50" required>
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
                            <input type="text" class="form-control" maxlength="45" name="subtitle[]" value="{{ $slider_list[0]->subtitle ?? null}}">
                            <div class="invalid-feedback">
                                Please enter the basic section sub title.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion custom-accordionwithicon custom-accordion-border accordion-border-box accordion-primary mt-3" id="accordionBorderedSlider">
                    <input type="hidden" class="form-control" value="{{@$slider_list_section->id}}" name="slider_list_section">
                    <input type="hidden" class="form-control" value="{{ $slider_list_section->list_number_1 ?? 3 }}" name="list_number_1" required>
                @for ($i = 1; $i <= $slider_list_section->list_number_1; $i++)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="accordian-heading-slider-{{$i}}">
                                <button class="accordion-button {{($i==1) ? '':'collapsed'}}" type="button" data-bs-toggle="collapse" data-bs-target="#flash_borderedSlidercollapse_{{$i}}" aria-expanded="{{($i==1) ? 'true':'false'}}" aria-controls="flash_borderedSlidercollapse_{{$i}}">
                                    Slider list {{$i}} details
                                </button>
                            </h2>
                            <div id="flash_borderedSlidercollapse_{{$i}}" class="accordion-collapse collapse {{($i==1) ? 'show':''}} " aria-labelledby="accordian-heading-slider-{{$i}}" data-bs-parent="#accordionBorderedSlider">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="form-group mb-3">
                                                <label class="required">Heading</label>
                                                <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                                                <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                                                <input type="hidden" class="form-control" value="{{$slider_list[$i-1]->id ?? null}}" name="id[]">
                                                <input type="text" class="form-control" name="list_title[]" value="{{@$slider_list[$i-1]->list_title ?? null}}" required>
                                                <div class="invalid-feedback">
                                                    Please enter the heading.
                                                </div>
                                            </div>
                                            <div class="form-group mb-3 {{ $slider_list_section->list_number_2 !== 'normal' ? 'editor':'' }}">
                                                <label>Description </label>
                                                <textarea class="form-control {{ $slider_list_section->list_number_2 !== 'normal' ? 'ck-editor':'' }}" maxlength="{{ $slider_list_section->list_number_2 == 'normal' ? '500':'' }}" rows="6" name="list_description[]" id="editor_{{$i}}">{{$slider_list[$i-1]->list_description ?? null}}</textarea>
                                                <div class="invalid-feedback">
                                                    Please write the description.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="mb-1">
                                                {!! Form::label('image_input', 'Images', ['class' => 'form-label required']) !!}
                                                {!! Form::file('image_input[]', ['class'=>'form-control','required'=>'required']) !!}
                                                <p class="text-muted mb-2">Recommended size: 776 x 464px</p>
                                            </div>
                                            @if( isset($slider_list[$i-1]) && $slider_list[$i-1]->image)
                                                <div class="col-xxl-4 col-xl-4 col-sm-6">
                                                    <div class="gallery-box card">
                                                        <div class="gallery-container">
                                                            <a class="image-popup" href="{{ asset(imagePath($slider_list[$i-1]->image))}}" title="">
                                                                <img class="gallery-img img-fluid mx-auto lazy" data-src="{{ asset(imagePath($slider_list[$i-1]->image))}}" alt="" />
                                                                <div class="gallery-overlay">
                                                                    <h5 class="overlay-caption">Image</h5>
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
                    @endfor

                </div>
            </div>
        </div>
    </div>
</div>
<div class="text-center mt-3 mb-3">
    <button type="submit" class="btn btn-success w-sm">{{(count(@$slider_list) > 0)? "Update":"Create"}}</button>
</div>
{!! Form::close() !!}
