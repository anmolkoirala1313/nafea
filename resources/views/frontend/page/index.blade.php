@extends('frontend.layouts.master')
@section('title') {{ $page_title }} @endsection
@section('css')

<link rel="stylesheet" href="{{ asset('assets/frontend/css/magnific-popup.css') }}" />
<link rel="stylesheet" href="{{asset('assets/common/frontend_datatable.css')}}">

<style>
    .image-dimension{
        height: 425px;
        width: 425px;
        object-fit: cover;
    }
</style>
@endsection
@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg', 'page_image'=> $data['row']->image])

    @foreach($data['section_elements'] as $index=>$element)
        @if($index == 'basic_section' && count($element)>0)
            @include($base_route.'includes.basic_section')
        @endif
        @if($index == 'background_image_section' && count($element)>0)
            @include($base_route.'includes.background_image_section')
        @endif
        @if($index == 'call_to_action' && count($element)>0)
            @include($base_route.'includes.call_to_action')
        @endif
        @if($index == 'map_and_description' && count($element)>0)
            @include($base_route.'includes.map_and_description')
        @endif
        @if($index == 'flash_card' && count($element)>0)
            @include($base_route.'includes.flash_card')
        @endif
        @if($index == 'gallery')
            @include($base_route.'includes.gallery')
        @endif
        @if($index == 'faq' && count($element)>0)
            @include($base_route.'includes.faq')
        @endif
        @if($index == 'header_description' && count($element)>0)
            @include($base_route.'includes.header_description')
        @endif
        @if($index == 'slider_list' && count($element)>0)
            @include($base_route.'includes.slider_list')
        @endif
        @if($index == 'document' && count($element)>0)
            @include($base_route.'includes.document')
        @endif
        @if($index == 'image_and_list' && count($element)>0)
            @include($base_route.'includes.image_and_list')
        @endif
    @endforeach
@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script>
        $( document ).ready(function() {
            let selector = $('.custom-description').find('table').length;
            if(selector>0){
                $('.custom-description').find('table').addClass('table table-bordered table-responsive');
            }
        });
    </script>
@endsection
