@php $flash_card = $data['section_elements']['flash_card']; $flash_card_section = $data['row']->pageSections->where('slug','flash_card')->first();  @endphp
@if(count($flash_card)>0)
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
                            <input type="text" class="form-control" name="title[]" value="{{ $flash_card[0]->title ?? null}}" maxlength="50" required>
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
                            <input type="text" class="form-control" maxlength="45" name="subtitle[]" value="{{ $flash_card[0]->subtitle ?? null}}">
                            <div class="invalid-feedback">
                                Please enter the basic section sub title.
                            </div>
                        </div>
                    </div>
                </div>
{{--                <div class="accordion custom-accordionwithicon custom-accordion-border accordion-border-box accordion-primary mt-3" id="accordionBorderedFlash">--}}
{{--                    <input type="hidden" class="form-control" value="{{@$flash_card}}" name="flash_card_section">--}}
{{--                    @for ($i = 1; $i <=3; $i++)--}}
{{--                        <div class="accordion-item">--}}
{{--                            <h2 class="accordion-header" id="accordian-heading-f-{{$i}}">--}}
{{--                                <button class="accordion-button {{($i==1) ? '':'collapsed'}}" type="button" data-bs-toggle="collapse" data-bs-target="#flash_borderedExamplecollapse_{{$i}}" aria-expanded="{{($i==1) ? 'true':'false'}}" aria-controls="flash_borderedExamplecollapse_{{$i}}">--}}
{{--                                    Card {{$i}} details--}}
{{--                                </button>--}}
{{--                            </h2>--}}
{{--                            <div id="flash_borderedExamplecollapse_{{$i}}" class="accordion-collapse collapse {{($i==1) ? 'show':''}} " aria-labelledby="accordian-heading-f-{{$i}}" data-bs-parent="#accordionBorderedFlash">--}}
{{--                                <div class="accordion-body">--}}
{{--                                    <div class="row">--}}
{{--                                        <div class="col-md-12">--}}
{{--                                            <div class="form-group mb-3">--}}
{{--                                                <label class="required">Heading</label>--}}
{{--                                                <input type="hidden" class="form-control" value="{{$key}}"    name="page_section_id" required>--}}
{{--                                                <input type="hidden" class="form-control" value="{{$value}}"  name="section_name" required>--}}
{{--                                                <input type="hidden" class="form-control" value="3" name="list_number_1" required>--}}
{{--                                                <input type="hidden" class="form-control" value="{{$flash_card[$i-1]->id ?? null}}" name="id[]">--}}
{{--                                                <input type="text" class="form-control" name="list_title[]" value="{{@$flash_card[$i-1]->list_title ?? null}}" required>--}}
{{--                                                <div class="invalid-feedback">--}}
{{--                                                    Please enter the heading.--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="form-group mb-3">--}}
{{--                                                <label>Description </label>--}}
{{--                                                <textarea class="form-control" maxlength="600" rows="6" name="list_description[]" id="accordian_two_editor_{{$i}}">{{$flash_card[$i-1]->list_description ?? null}}</textarea>--}}
{{--                                                <div class="invalid-feedback">--}}
{{--                                                    Please write the description.--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endfor--}}

{{--                </div>--}}

                <div class="flash-details mt-4">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-striped table-centered
                        align-middle table-nowrap mb-0" id="flash-table">
                            <thead class="text-muted table-light">
                            <tr>
                                <th scope="col" class="required">Title</th>
                                {{--                                <th scope="col">Icon</th>--}}
                                <th scope="col" >Description</th>
                                <th scope="col" width="350px">Image</th>
                                <th scope="col" >Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($flash_card))
                                @foreach($flash_card as $i => $detail)
                                    @include($view_path.'partials.flash_detail')
                                @endforeach
                            @else
                                @include($view_path.'partials.flash_detail')
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12 border-top mt-3 mb-3">
                        <div class="hstack gap-2 pt-2">
                            <button type="button" title="Add Process" id="add_flash"
                                    class="btn btn-outline-success waves-effect waves-light"><i class="ri-add-line"></i> Add Card</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="text-center mt-3 mb-3">
    <button type="submit" class="btn btn-success w-sm">{{(count(@$flash_card) > 0)? "Update":"Create"}}</button>
</div>
{!! Form::close() !!}
