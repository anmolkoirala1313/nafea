@extends('frontend.layouts.master')
@section('title') {{ $page }} @endsection
@section('css')
    <link rel="stylesheet" href="{{asset('assets/common/frontend_datatable.css')}}">

@endsection

@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'image-2.png'])

    <div class="blog__standard section-padding">
        <div class="container">
            @if($data['rows']->first()->title)
                <div class="row">
                    <div class="col-xl-12 col-lg-12 text-center">
                        <div class="about__four-right-title mb-0">
                            <span class="subtitle-four" style="margin-bottom: 10px;">{{ $data['rows']->first()->subtitle ?? '' }} </span>
                            <h2 style="width: 50%;margin:auto;line-height: 50px;">{{ $data['rows']->first()->title ?? '' }}</h2>
                        </div>
                    </div>
                    <p class="custom-description text-align-justify text-center mt-3">
                        {{ $data['rows']->first()->description ?? '' }}
                    </p>
                </div>
            @endif
            <div class="row mt-2">
                <div class="col-xl-12 col-lg-12 lg-mb-50">
                    <div class="row">
                        <table class="table" id="dataTable">
                            <thead class="thead-light">
                            <tr>
                            <tr>
                                <th scope="col">S.N.</th>
                                <th scope="col">Title</th>
                                <th scope="col">Description</th>
                                <th scope="col">Document</th>
                            </tr>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data['rows'] as $row)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $row->list_title ?? '' }}</td>
                                    <td>{{ $row->list_description ?? '' }}</td>
                                    <td>
                                        <a href="{{ asset(filePath($row->list_file))}}" class="fw-medium link-primary" download>Download File</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js')
    <script src="{{asset('assets/common/lazyload.js')}}"></script>
    <script src="{{asset('assets/common/general.js')}}"></script>
    @include($module.'includes.toast_alert')
@endsection
