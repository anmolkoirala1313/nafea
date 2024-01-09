@php $faq = $data['section_elements']['faq']; $faq_section = $data['row']->pageSections->where('slug','faq')->first();  @endphp
@if(count($faq)>0)
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
                    <div class="col-lg-12 mt-3">
                        <div class="mb-1">
                            <label class="form-label required">Title </label>
                            <input type="text" class="form-control" name="title[]" value="{{ $faq[0]->title ?? null}}" maxlength="35" required>
                            <input type="hidden" class="form-control" value="{{$key}}" name="page_section_id" required>
                            <input type="hidden" class="form-control" value="{{$value}}" name="section_name" required>
                            <input type="hidden" class="form-control" value="{{ $data['row']->id }}" name="page_id" required>
                            <div class="invalid-feedback">
                                Please enter the basic section title.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="accordion custom-accordionwithicon custom-accordion-border accordion-border-box accordion-primary mt-3" id="accordionBordered5">
                    <input type="hidden" class="form-control" value="{{@$faq_section->id}}" name="faq_section">
                    @for ($i = 1; $i <=$faq_section->list_number_1; $i++)
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="accordian-heading-{{$i}}">
                                <button class="accordion-button {{($i==1) ? '':'collapsed'}}" type="button" data-bs-toggle="collapse" data-bs-target="#accor_borderedExamplecollapse_{{$i}}" aria-expanded="{{($i==1) ? 'true':'false'}}" aria-controls="accor_borderedExamplecollapse_{{$i}}">
                                    Box {{$i}} details
                                </button>
                            </h2>
                            <div id="accor_borderedExamplecollapse_{{$i}}" class="accordion-collapse collapse {{($i==1) ? 'show':''}} " aria-labelledby="accordian-heading-{{$i}}" data-bs-parent="#accordionBordered5">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group mb-3">
                                                <label class="required">Heading </label>
                                                <input type="hidden" class="form-control" value="{{$key}}"    name="page_section_id" required>
                                                <input type="hidden" class="form-control" value="{{$value}}"  name="section_name" required>
                                                <input type="hidden" class="form-control" value="{{$faq_section->list_number_1}}" name="list_number_1" required>
                                                <input type="hidden" class="form-control" value="{{@$faq[$i-1]->id}}" name="id[]">
                                                <input type="text" class="form-control" maxlength="100" name="list_title[]" value="{{@$faq[$i-1]->list_title}}" required>
                                                <div class="invalid-feedback">
                                                    Please enter the heading.
                                                </div>
                                            </div>
                                            <div class="form-group mb-3">
                                                <label>Description </label>
                                                <textarea class="form-control" maxlength="300" rows="6" name="list_description[]" id="accordian_two_editor_{{$i}}">{{@$faq[$i-1]->list_description}}</textarea>
                                                <div class="invalid-feedback">
                                                    Please write the description.
                                                </div>
                                            </div>
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
    <button type="submit" class="btn btn-success w-sm">{{(count(@$faq) > 0)? "Update":"Create"}}</button>
</div>
{!! Form::close() !!}
