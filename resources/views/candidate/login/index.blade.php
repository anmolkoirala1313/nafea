<!doctype html>
<html lang="en" data-layout="vertical" data-topbar="light" data-sidebar="dark" data-sidebar-size="lg">
<head>

    <meta charset="utf-8" />
    <title>Sign In | {{@$setting_data->title}} - Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ucwords(@$setting_data->description ?? '') }}">
    <meta name="author" content="Canosoft Technology" />
    <!-- App favicon -->
    <link rel="shortcut icon" type="image/x-icon"  href="{{ $setting_data->favicon ?  asset(imagePath($setting_data->favicon)) : ''}}">

    <!-- Layout config Js -->
    <script src="{{asset('assets/backend/js/layout.js')}}"></script>
    <!-- Bootstrap Css -->
    <link href="{{asset('assets/backend/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{asset('assets/backend/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{asset('assets/backend/css/app.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- custom Css-->
    <link href="{{asset('assets/backend/css/custom.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>

<!-- auth-page wrapper -->
<div class="auth-page-wrapper auth-bg-cover py-5 d-flex justify-content-center align-items-center min-vh-100">
    <div class="bg-overlay"></div>
    <!-- auth-page content -->
    <div class="auth-page-content overflow-hidden pt-lg-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card overflow-hidden">
                        <div class="row g-0">
                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4 auth-one-bg h-100">
                                    <div class="bg-overlay"></div>
                                    <div class="position-relative h-100 d-flex flex-column">
                                        <div class="mb-4">
                                            <a href="/" class="d-inline-block auth-logo">
                                                <img class="lazy" src="{{ $setting_data->logo ?  asset(imagePath($setting_data->logo)) :asset(imagePath($setting_data->logo_white))}}" alt="Logo" height="80">
                                            </a>
                                        </div>
                                        <div class="mt-auto">
                                            <div class="mb-3">
                                                <i class="ri-double-quotes-l display-4 text-success"></i>
                                            </div>

                                            <div id="qoutescarouselIndicators" class="carousel slide" data-bs-ride="carousel">
                                                <div class="carousel-indicators">
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="0" class="active"
                                                            aria-current="true" aria-label="Slide 1"></button>
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="1"
                                                            aria-label="Slide 2"></button>
                                                    <button type="button" data-bs-target="#qoutescarouselIndicators" data-bs-slide-to="2"
                                                            aria-label="Slide 3"></button>
                                                </div>
                                                <div class="carousel-inner text-center text-white-50 pb-5">
                                                    <div class="carousel-item active">
                                                        <p class="fs-15 fst-italic">" Nepal Association of Foreign Employment Agencies-NAFEA is the umbrella organization of 853 recruiting agencies in Nepal "</p>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <p class="fs-15 fst-italic">" Umbrella organization of recruiting agencies in Nepal
                                                            "</p>
                                                    </div>
                                                    <div class="carousel-item">
                                                        <p class="fs-15 fst-italic">" NAFEA Candidate login allows general candidate user to handle and access data"</p>
                                                    </div>

                                                </div>
                                            </div>
                                            <!-- end carousel -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->

                            <div class="col-lg-6">
                                <div class="p-lg-5 p-4">
                                    <div>
                                        <h5 class="text-primary">Welcome Back !</h5>
                                        <p class="text-muted">Sign in to continue to Candidate dashboard.</p>
                                    </div>
                                    @error('email')
                                    <div class="alert alert-warning alert-border-left alert-dismissible fade show" role="alert">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle text-warning me-2 icon-sm"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>

                                        <strong> {{$message}}</strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                    @enderror
                                    @if(session('error'))
                                        <div class="alert alert-warning alert-border-left alert-dismissible fade show" role="alert">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-alert-triangle text-warning me-2 icon-sm"><path d="M10.29 3.86L1.82 18a2 2 0 0 0 1.71 3h16.94a2 2 0 0 0 1.71-3L13.71 3.86a2 2 0 0 0-3.42 0z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12.01" y2="17"></line></svg>

                                            <strong> {{session('error')}}</strong>
                                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                        </div>
                                    @endif
                                    <div class="mt-4">
                                        <form method="POST" action="{{ route('candidate.login') }}" class="row g-3 needs-validation"  novalidate="">
                                            @csrf
                                            <div class="mb-3 position-relative">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" placeholder="Enter email" required autocomplete="email" autofocus >
                                                <div class="invalid-tooltip">
                                                    Please enter a valid email.
                                                </div>
                                            </div>

                                            <div class="mb-2 position-relative">
                                                @if (Route::has('password.change'))
                                                    <div class="float-end">
                                                        <a href="{{ route('password.change') }}" class="text-muted">{{ __('Forgot Password?') }}</a>
                                                    </div>
                                                @endif
                                                <label class="form-label" for="password-input">Password</label>
                                                <div class="position-relative auth-pass-inputgroup mb-2">
                                                    <input type="password" class="form-control pe-5" placeholder="Enter password" id="password-input" name="password" required>
                                                    <button class="btn btn-link position-absolute end-0 top-0 text-decoration-none text-muted" type="button" id="password-addon"><i class="ri-eye-fill align-middle"></i></button>
                                                    <div class="invalid-tooltip">
                                                        Please enter a valid password.
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="auth-remember-check" {{ old('remember') ? 'checked' : '' }}>
                                                <label class="form-check-label" for="auth-remember-check">Remember me</label>
                                            </div>

                                            <div class="mt-4">
                                                <button class="btn btn-success w-100" type="submit">{{ __('Sign In') }}</button>
                                            </div>
                                        </form>
                                    </div>

                                    <div class="mt-5 text-center">
                                        <p class="mb-0">Don't have an account ? <a href="#" class="fw-semibold text-primary text-decoration-underline"> Signup</a> </p>
                                    </div>
                                </div>
                            </div>
                            <!-- end col -->
                        </div>
                        <!-- end row -->
                    </div>
                    <!-- end card -->
                </div>
                <!-- end col -->

            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end auth page content -->

    <!-- footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <p class="mb-0 text-muted">&copy; <script>document.write(new Date().getFullYear())</script> Crafted with <i class="mdi mdi-heart text-danger"></i> by Canosoft Technology</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->
</div>
<!-- end auth-page-wrapper -->

<!-- JAVASCRIPT -->
<script src="{{asset('assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/backend/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/backend/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/backend/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/backend/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{asset('assets/backend/js/plugins.js')}}"></script>
<!-- password-addon init -->
<script src="{{asset('assets/backend/js/pages/password-addon.init.js')}}"></script>
<script src="{{asset('assets/backend/libs/prismjs/prism.js')}}"></script>

<script src="{{asset('assets/backend/js/pages/form-validation.init.js')}}"></script>

<script src="{{asset('assets/backend/js/app.js')}}"></script>
</body>
</html>
