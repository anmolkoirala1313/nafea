@extends('backend.layouts.master')
@section('title', $page_title)
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/libs/glightbox/css/glightbox.min.css')}}" />

@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid" style="position:relative;">
            @include($module.'includes.breadcrumb')
            <div class="row">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-header align-items-center d-flex">
                            <h4 class="card-title mb-0 flex-grow-1">{{ $page_title }}</h4>
                        </div>
                    </div>
                     @include($view_path.'includes.form')
                </div>
                @include($base_group.'includes.sidebar')
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/backend/js/pages/form-validation.init.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_message')
    @include($module.'includes/gallery')

@endsection
