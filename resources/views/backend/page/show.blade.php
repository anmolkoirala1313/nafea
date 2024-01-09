@extends('backend.layouts.master')
@section('title', $page_title)
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/libs/glightbox/css/glightbox.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/backend/plugins/dropzone/dropzone.css')}}">
    <link href="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
    <style>
        .custom-verti-nav-pills .nav-link {
            background-color: #ffffff;!important;
        }
    </style>
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid">
            @include($module.'includes.breadcrumb')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">{{ $data['row']->title.' sections'  }}</h4>
                            <div class="flex-shrink-0">
                                <div class="d-flex justify-content-sm-end gap-2">
                                    <a href="{{ route('frontend.page.index', $data['row']->slug) }}" class="btn btn-outline-info waves-effect waves-light"
                                       target="_blank" title="View in Frontend">
                                        <i class="ri-eye-line align-bottom me-1"></i>
                                    </a>
                                    <a class="btn btn-outline-primary waves-effect waves-light" href="{{ route($base_route.'edit',$data['row']->id) }}" title="Edit Page">
                                            <i class="ri-pencil-fill align-bottom me-1"></i> Edit</a>
                                    <a class="btn btn-outline-success waves-effect waves-light" href="{{route($base_route.'index')}}" title="list">
                                        <i class="ri-menu-2-line align-bottom me-1"></i> Page List</a>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-2 mb-3">
                            <div class="sticky-side-div">
                                <div class="nav nav-pills flex-column nav-pills-tab custom-verti-nav-pills text-center" role="tablist" aria-orientation="vertical">
                                    @foreach($data['page_section'] as $key=>$value)
                                        <a class="nav-link {{ $loop->first ? 'active show':'' }}" id="custom-v-pills-{{$value}}-tab" data-bs-toggle="pill" href="#custom-v-pills-{{$value}}"
                                           role="tab" aria-controls="custom-v-pills-{{$value}}" aria-selected="true">
                                            <i class="{{ get_page_section_icons($value) }} d-block fs-20 mb-1"></i>
                                            {{ucfirst(str_replace('_',' ',$value))}}
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div> <!-- end col-->
                        <div class="col-lg-10">
                            <div class="tab-content text-muted mt-3 mt-lg-0">
                                @foreach($data['page_section'] as $key=>$value)
                                    <div class="tab-pane fade {{ $loop->first ? 'active show':'' }}" id="custom-v-pills-{{$value}}" role="tabpage" aria-labelledby="custom-v-pills-{{$value}}-tab">
                                        @if($value == 'basic_section')
                                            @include($view_path.'includes.basic_section')
                                        @endif
                                        @if($value == 'map_description')
                                            @include($view_path.'includes.map_description')
                                        @endif
                                        @if($value == 'call_to_action')
                                            @include($view_path.'includes.call_to_action')
                                        @endif
                                        @if($value == 'background_image_section')
                                            @include($view_path.'includes.background_image_section')
                                        @endif
                                        @if($value == 'faq')
                                            @include($view_path.'includes.faq')
                                        @endif
                                        @if($value == 'map_and_description')
                                            @include($view_path.'includes.map_and_description')
                                        @endif
                                        @if($value == 'header_description')
                                            @include($view_path.'includes.header_description')
                                        @endif
                                        @if($value == 'flash_card')
                                            @include($view_path.'includes.flash_card')
                                        @endif
                                        @if($value == 'slider_list')
                                            @include($view_path.'includes.slider_list')
                                        @endif
                                        @if($value == 'gallery')
                                            @include($view_path.'includes.gallery')
                                        @endif
                                        @if($value == 'document')
                                            @include($view_path.'includes.document')
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div> <!-- end col-->
                    </div> <!-- end row-->
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/backend/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/dropzone/dropzone.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/dropzone/dropzone.config.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($view_path.'partials.section_element_script')
    @include($module.'includes.toast_message')
    @include($module.'includes/gallery')
@endsection
