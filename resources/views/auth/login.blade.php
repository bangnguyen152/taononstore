<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="utf-8"/>
    <title>Táo Non</title>

    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link rel="shortcut icon" href="{{asset('demo1/media/logos/favicon.ico')}}"/>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

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
                <form method="post" action="{{route('login.perform')}}" class="form w-100" id="kt_sign_in_form">
                @csrf
                    <!--begin::Heading-->
                    <div class="text-center mb-10">
                        <!--begin::Title-->
                        <h1 class="text-dark mb-3">
                             Táo Non
                        </h1>
                        <!--end::Title-->

                        <!--begin::Link-->
                        <div class="text-gray-400 fw-bold fs-4">
                            New Here?

                            <a href="{{route('register')}}"
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
                        <p class="text-danger">{{ $errors->first('email') }}</p>
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
                            <a href="{{route('forget.password.get')}}"
                               class="link-primary fs-6 fw-bolder">
                                Forgot Password ?
                            </a>
                            <!--end::Link-->
                        </div>

                        <!--end::Wrapper-->

                        <!--begin::Input-->
                        <input class="form-control form-control-lg form-control-solid" type="password" name="password"
                               autocomplete="off" required/>
                        @error('msg')
                        <p class="text-danger">{{ $message }}</p>
                        @enderror
                        <p class="text-danger">{{ $errors->first('password') }}</p>
                        <!--end::Input-->
                    </div>



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
                    </div>
                    <!--end::Actions-->
                </form>
                <!--end::Signin Form-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Content-->

        <!--begin::Footer-->
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
