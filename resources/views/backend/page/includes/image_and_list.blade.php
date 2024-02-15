@php $image_and_list = $data['section_elements']['image_and_list']; $image_and_list_section = $data['row']->pageSections->where('slug','image_and_list')->first();  @endphp
@if(count($image_and_list)>0)
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
                            <input type="text" class="form-control" name="title[]" value="{{ $image_and_list[0]->title ?? null}}" maxlength="50" required>
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
                            <input type="text" class="form-control" maxlength="45" name="subtitle[]" value="{{ $image_and_list[0]->subtitle ?? null}}">
                            <div class="invalid-feedback">
                                Please enter the basic section sub title.
                            </div>
                        </div>
                    </div>
                </div>
                <div class="image-details mt-4">
                    <div class="table-responsive table-card">
                        <table class="table table-borderless table-striped table-centered
                        align-middle table-nowrap mb-0" id="image-detail-table">
                            <thead class="text-muted table-light">
                            <tr>
                                <th scope="col" class="required">Title</th>
                                <th scope="col" >Description</th>
                                <th scope="col" width="350px">Image</th>
                                <th scope="col" >Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if(count($image_and_list))
                                @foreach($image_and_list as $i => $detail)
                                    @include($view_path.'partials.image_and_list_detail')
                                @endforeach
                            @else
                                @include($view_path.'partials.image_and_list_detail')
                            @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="col-lg-12 border-top mt-3 mb-3">
                        <div class="hstack gap-2 pt-2">
                            <button type="button" title="Add Process" id="add_image_detail"
                                    class="btn btn-outline-success waves-effect waves-light"><i class="ri-add-line"></i> Add Card</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="text-center mt-3 mb-3">
    <button type="submit" class="btn btn-success w-sm">{{(count(@$image_and_list) > 0)? "Update":"Create"}}</button>
</div>
{!! Form::close() !!}
