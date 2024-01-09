<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <script>document.write(new Date().getFullYear())</script> © {{ucwords(@$setting_data->website_name)}}
            </div>
            <div class="col-sm-6">
                <div class="text-sm-end d-none d-sm-block">
                    Developed by Canosoft Technology
                </div>
            </div>
        </div>
    </div>
</footer>
</div>
<!-- end main content-->
</div>
<!-- END layout-wrapper -->



<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->

@include('backend.partials.customizer')


<!-- JAVASCRIPT -->
<script src="{{asset('assets/backend/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('assets/backend/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/backend/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/backend/libs/node-waves/waves.min.js')}}"></script>
<script src="{{asset('assets/backend/libs/feather-icons/feather.min.js')}}"></script>
<script src="{{asset('assets/backend/js/pages/plugins/lord-icon-2.1.0.js')}}"></script>
<script src="{{asset('assets/backend/js/plugins.js')}}"></script>
<script src="{{asset('assets/backend/js/pages/notifications.init.js')}}"></script>
<script src="{{asset('assets/backend/js/select2.min.js')}}"></script>
<script>
    // $(document).ready(function () {
    //     $('#theme-settings-offcanvas').removeClass('show');
    //     $('#theme-settings-offcanvas').removeClass('show');
    //     $('.offcanvas-backdrop').removeClass('show');
    // });
</script>
<!-- Vector map-->
<script src="{{asset('assets/backend/libs/jsvectormap/js/jsvectormap.min.js')}}"></script>
<script src="{{asset('assets/backend/libs/jsvectormap/maps/world-merc.js')}}"></script>

<!--Swiper slider js-->
<script src="{{asset('assets/backend/libs/swiper/swiper-bundle.min.js')}}"></script>
<!-- App js -->
<script src="{{asset('assets/backend/js/app.js')}}"></script>
@yield('js')
@stack('scripts')
<script>
        var set_id  = "{{@$setting_data->id}}";
</script>
<script src="{{asset('assets/backend/custom_js/theme-mode.js')}}"></script>
</body>
</html>
