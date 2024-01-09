<!-- Left Sidebar start -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="{{route('backend.dashboard')}}" class="logo logo-dark">
                    <span class="logo-sm">
                       <img src="{{ $setting_data->favicon ?  asset(imagePath($setting_data->favicon)) : ''}}" height="25">
                    </span>
                    <span class="logo-lg">
                        <img src="{{ $setting_data->logo ?  asset(imagePath($setting_data->logo)) : ''}}" height="55">
                    </span>
        </a>
        <!-- Light Logo-->
        <a href="{{route('backend.dashboard')}}" class="logo logo-light">
                    <span class="logo-sm">
                        <img src="{{ $setting_data->favicon ?  asset(imagePath($setting_data->favicon)) : ''}}" height="40">
                    </span>
                     <span class="logo-lg">
                        <img src="{{ $setting_data->logo_white ?  asset(imagePath($setting_data->logo_white)) : ''}}" height="55">

                     </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
                id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>
    @include($module.'includes.menu')
</div>

<!-- Left Sidebar End -->
<div class="main-content">
