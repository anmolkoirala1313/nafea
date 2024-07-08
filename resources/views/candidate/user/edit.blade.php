@extends('candidate.layouts.master')
@section('title', $page_title)
@section('css')
    <link rel="stylesheet" href="{{asset('assets/backend/libs/glightbox/css/glightbox.min.css')}}" />

@endsection
@section('content')
    <div class="page-content">
        <div class="container-fluid" style="position:relative;">
            @include($module.'includes.breadcrumb')

            <div class="card">
                <div class="card-header align-items-center d-flex">
                    <h4 class="card-title mb-0 flex-grow-1">{{ $page_title }}</h4>
                </div>
            </div>
            @include($view_path.'includes.form')
        </div>
    </div>
    </div>
@endsection

@section('js')
    <script src="{{asset('assets/backend/js/pages/form-validation.init.js')}}"></script>
    <script src="{{asset('assets/backend/plugins/ckeditor/ckeditor.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes/gallery')
    @include($module.'includes.toast_message')
    @include($view_path.'includes.script')

    <script>
    let INCOMING_MARTIAL_STATUS    = '{{ $data['row']->martial_status }}';

    if (INCOMING_MARTIAL_STATUS == 1){
        $(MARRIAGE_SECTION).removeClass('d-none');
    }else{
        $(MARRIAGE_SECTION).addClass('d-none');
    }
    </script>

@endsection
