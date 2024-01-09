@extends('backend.layouts.master')
@section('title', $page_title)
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/libs/glightbox/css/glightbox.min.css')}}" />
    <link href="{{asset('assets/backend/libs/sweetalert2/sweetalert2.min.css')}}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid" style="position:relative;">
            @include($module.'includes.breadcrumb')
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">{{ $page_title }}</h4>
                            <div class="flex-shrink-0">
                                <div class="d-flex justify-content-sm-end gap-2">
                                    <a href="{{ route('frontend.page.document') }}" title="View in frontend" target="_blank"
                                       class="btn btn-outline-info waves-effect waves-light"><i class="ri-eye-line"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @include($view_path.'includes.form')
                </div>
            </div>

        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/backend/js/pages/form-validation.init.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_message')
    @include($view_path.'includes.script')

@endsection
