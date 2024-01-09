@extends('formbuilder::front_layout')
@section('title') {{ ucfirst($pageTitle) }} @endsection
@section('css')

    <style>
        /* .footable .btn .caret {
            margin-left: 0;
            display: none;
        } */

        .rendered-form h1{
            font-size: 36px;
            font-weight: 700;
            line-height: 46px;
        }
        .rendered-form p, .contact-page__sub-title{
            font-size: 16px;
            font-weight: 400;
            text-transform: uppercase;
            color: #26292E;
            margin-top: 14px;
            margin-bottom: 10px;
        }

        .rendered-form label{
            color: var(--bixola-black);
            font-size: 14px;
            font-weight: 400;
            letter-spacing: 1.12px;
            text-transform: uppercase;
            font-family: var(--bixola-font);
            margin-bottom: 2px;
        }


        .rendered-form input[type="text"], .rendered-form input[type="email"] {
            height: 38px;
            width: 100%;
            border: none;
            padding-right: 30px;
            outline: none;
            font-size: 14px;
            color: var(--bixola-gray);
            display: block;
            font-weight: 400;
            background-color: transparent;
            border-bottom: 1px solid #EAECF0;
            -webkit-transition: all 500ms ease;
            transition: all 500ms ease;
        }

        .rendered-form input[type="text"]:focus, .rendered-form input[type="email"]:focus {
            border-bottom: 1px solid var(--bixola-black);
        }

        .rendered-form .form-control:focus {
            /* outline: 0; */
            box-shadow: inset 0 1px 1px rgb(0 0 0 / 0%), 0 0 8px rgb(102 175 233 / 0%) !important;
        }

        .card-footer {
            padding: 0.5rem 1rem;
            background-color: transparent;
            border-top: 1px solid transparent;
        }

        .card-footer button {
            position: relative;
            display: inline-block;
            vertical-align: middle;
            -webkit-appearance: none;
            outline: none !important;
            background-color: var(--bixola-base);
            color: var(--bixola-white);
            font-size: 16px;
            font-weight: 500;
            padding: 10px 33px 10px;
            border-radius: 5px;
            overflow: hidden;
            transition: all 0.5s linear;
            z-index: 1;
            width: 20%!important;
            border-color: var(--bixola-base);
        }

    </style>
@endsection
@section('content')

    @include($module.'includes.breadcrumb',['breadcrumb_image'=> 'background_action.jpeg'])

    <!--Contact Page Start-->
    <section class="contact-page mt-5">
        <div class="container">
            <div class="row">
                <div class="col-xl-12 col-lg-12">
                    <div class="contact-page__left">
{{--                        <h3 class="contact-page__title">Get in Touch</h3>--}}
{{--                        <p class="contact-page__sub-title">LEAVE US A MESSAGE</p>--}}
                        <div class="contact-page__form-box">
                            <form action="{{ route('formbuilder::form.submit', $form->identifier) }}" method="POST" id="submitForm" enctype="multipart/form-data">
                                @csrf
                                @if ($message = Session::get('success'))
                                    <div class="alert alert-success alert-block">
                                        <strong class="sent-success">{{ $message }}</strong>
                                    </div>
                                @endif
                                @if ($message = Session::get('error'))
                                    <div class="alert alert-danger alert-block">
                                        <strong class="error-sent">{{ $message }}</strong>
                                    </div>
                                @endif
                                <div class="card-body">
                                    <div id="fb-render"></div>
                                </div>


                                <div class="card-footer">
                                    <button type="submit" class="theme-btn w-100 confirm-form" data-form="submitForm" data-message="Submit your entry for '{{ $form->name }}'?">
                                        <i class="fa fa-submit"></i> Submit Form
                                    </button>
                                </div>
                            </form>
                            <div class="result"></div>
                        </div>
                    </div>
                </div>
{{--                <div class="col-xl-6 col-lg-6">--}}
{{--                    <div class="contact-page__right">--}}
{{--                        @if($data['setting_data'] && $data['setting_data']->google_map)--}}
{{--                            <iframe src="{{$data['setting_data']->google_map}}" style="border:0;width: 625px;height: 100%;" allowfullscreen="" loading="lazy"></iframe>--}}
{{--                        @endif--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </section>
    <!--Contact Page End-->



    @if(@$setting_data->google_map)

        <section class="google-map-two">
            <iframe
                src="{{@$setting_data->google_map}}"
                class="google-map__two" allowfullscreen></iframe>

        </section>
    @endif

@endsection

@push(config('formbuilder.layout_js_stack', 'scripts'))
    <script type="text/javascript">
        window._form_builder_content = {!! json_encode($form->form_builder_json) !!}
    </script>
    <script src="{{ asset('vendor/formbuilder/js/render-form.js') }}{{ jazmy\FormBuilder\Helper::bustCache() }}" defer></script>
@endpush
