<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Táo Non</title>
    <meta name="description"
          content="The most advanced Bootstrap Admin Theme on Themeforest trusted by 94,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue &amp; Laravel versions. Grab your copy now and get life-time updates for free."/>
    <meta name="keywords"
          content="Metronic, bootstrap, bootstrap 5, Angular, VueJs, React, Laravel, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon"/>
    <link rel="canonical" href="Https://preview.keenthemes.com/metronic8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="{{asset('demo1/media/logos/favicon.ico')}}"/>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>


    <link rel="preload" href="{{asset('css/plugins.bundle.css')}}" as="style"
          onload="this.onload=null;this.rel='stylesheet'" type="text/css">
    <noscript>
        <link rel="stylesheet"
              href="{{asset('css/plugins.bundle.css')}}">
    </noscript>
    <link rel="preload" href="{{asset('css/plugins-custom.bundle.css')}}" as="style"
          onload="this.onload=null;this.rel='stylesheet'" type="text/css">
    <noscript>
        <link rel="stylesheet"
              href="{{asset('css/plugins-custom.bundle.css')}}">
    </noscript>
    <link href="{{asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>


</head>


<body id="kt_body" class="bg-body">


<div class="d-flex flex-column flex-root">
    <!--begin::Authentication-->
    <div
        class="d-flex flex-column flex-column-fluid bgi-position-y-bottom position-x-center bgi-no-repeat bgi-size-contain bgi-attachment-fixed"
        style="background-image: url(https://preview.keenthemes.com/metronic8/laravel/demo1/media/illustrations/sketchy-1/14.png)">

        <!--begin::Content-->
        <div class="d-flex flex-center flex-column flex-column-fluid p-10 pb-lg-20">
            <!--begin::Wrapper-->
            <div class="w-lg-500px bg-body rounded shadow-sm p-10 p-lg-15 mx-auto">
                <!--begin::Signin Form-->
                <form method="post" action="{{route('login')}}" class="form w-100" id="kt_sign_in_form">
                @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">
                            Đăng nhập Táo Non
                        </h1>
                        <!--end::Title-->

                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">
                            New Here?

                            <a href="https://preview.keenthemes.com/metronic8/laravel/register?demo=demo1"
                               class="link-primary fw-bolder">
                                Create an Account
                            </a>
                        </div>
                        <!--end::Link-->
                    </div>
                    <!--begin::Heading-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Label-->
                        <label class="form-label fs-6 fw-bolder text-dark">Email</label>
                        <!--end::Label-->

                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid" type="email" name="email"
                               autocomplete="off" required autofocus/>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack mb-2">
                            <!--begin::Label-->
                            <label class="form-label fw-bolder text-dark fs-6 mb-0">Password</label>
                            <!--end::Label-->

                            <!--begin::Link-->
                            <a href="https://preview.keenthemes.com/metronic8/laravel/forgot-password?demo=demo1"
                               class="link-primary fs-6 fw-bolder">
                                Forgot Password ?
                            </a>
                            <!--end::Link-->
                        </div>
                        <!--end::Wrapper-->

                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid" type="password" name="password"
                               autocomplete="off" required/>
                        <!--end::Input-->
                    </div>
                    <!--end::Input group-->

                    <!--begin::Input group-->
                    <div class="fv-row mb-10">
                        <label class="form-check form-check-custom form-check-solid">
                            <input class="form-check-input" type="checkbox" name="remember"/>
                            <span class="form-check-label fw-bold text-gray-700 fs-6">Remember me
            </span>
                        </label>
                    </div>
                    <!--end::Input group-->

                    <!--begin::Actions-->
                    <div class="text-center">
                        <!--begin::Submit button-->
                        <button type="submit" id="kt_sign_in_submit" class="btn btn-lg btn-primary w-100 mb-5">
                            <!--begin::Indicator-->
                            <span class="indicator-label">
    Continue
</span>
                            <span class="indicator-progress">
    Please wait...
    <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
</span>
                            <!--end::Indicator-->
                        </button>
                        <!--end::Submit button-->

                        <!--begin::Separator-->
                        <div class="text-center text-muted text-uppercase fw-bolder mb-5">or</div>
                        <!--end::Separator-->

                        <!--begin::Google link-->
                        <a href="https://preview.keenthemes.com/metronic8/laravel/auth/redirect/google?redirect_uri=https://keenthemes.com/"
                           class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                            <img alt="Logo"
                                 src="https://preview.keenthemes.com/metronic8/laravel/demo1/media/svg/brand-logos/google-icon.svg"
                                 class="h-20px me-3"/>
                            Continue with Google
                        </a>
                        <!--end::Google link-->

                        <!--begin::Facebook link-->
                        <a href="https://preview.keenthemes.com/metronic8/laravel/auth/redirect/facebook?redirect_uri=https://keenthemes.com/"
                           class="btn btn-flex flex-center btn-light btn-lg w-100 mb-5">
                            <img alt="Logo"
                                 src="https://preview.keenthemes.com/metronic8/laravel/demo1/media/svg/brand-logos/facebook-4.svg"
                                 class="h-20px me-3"/>
                            Continue with Facebook
                        </a>
                        <!--end::Facebook link-->
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Signin Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->

        <!--begin::Footer-->
        <div class="d-flex flex-center flex-column-auto p-10">
            <!--begin::Links-->
            <div class="d-flex align-items-center fw-bold fs-6">
                <a href="https://keenthemes.com" class="text-muted text-hover-primary px-2">About</a>

                <a href="mailto:support@keenthemes.com" class="text-muted text-hover-primary px-2">Contact Us</a>

                <a href="https://1.envato.market/EA4JP" class="text-muted text-hover-primary px-2">Purchase</a>
            </div>
            <!--end::Links-->
        </div>
        <!--end::Footer-->
    </div>
    <!--end::Authentication-->
</div>


<script src="{{asset("js/}plugins.bundle.js")}}"></script>
<script src="{{asset('js/scripts.bundle.js')}}"></script>
<script src="{{asset('js/custom/widgets.js')}}"></script>


<script src="{{asset('js/general.js')}}"></script>


</body>

</html>
