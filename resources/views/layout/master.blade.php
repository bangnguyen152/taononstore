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
    <link rel="shortcut icon" href="https://preview.keenthemes.com/metronic8/laravel/demo1/media/logos/favicon.ico"/>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>


    <link rel="preload" href="{{asset('css/plugins.bundle.css')}}" as="style"
          onload="this.onload=null;this.rel='stylesheet'" type="text/css">
    <noscript>
        <link rel="stylesheet"
              href="https://preview.keenthemes.com/metronic8/laravel/demo1/plugins/global/plugins.bundle.css">
    </noscript>
    <link rel="preload" href="{{asset('css/plugins-custom.bundle.css')}}" as="style"
          onload="this.onload=null;this.rel='stylesheet'" type="text/css">
    <noscript>
        <link rel="stylesheet"
              href="https://preview.keenthemes.com/metronic8/laravel/demo1/plugins/global/plugins-custom.bundle.css">
    </noscript>
    <link href="{{asset('css/style.bundle.css')}}" rel="stylesheet" type="text/css"/>
    <link href="{{asset('css/dashboard.css')}}" rel="stylesheet" type="text/css"/>
</head>


<body id="kt_body"
      class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled toolbar-fixed aside-enabled aside-fixed"
      style="--kt-toolbar-height:55px;--kt-toolbar-height-tablet-and-mobile:55px">


<!--begin::Main-->
<!--begin::Root-->
<div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
        <div
            id="kt_aside"
            class="aside  aside-dark aside-hoverable "
            data-kt-drawer="true"
            data-kt-drawer-name="aside"
            data-kt-drawer-activate="{default: true, lg: false}"
            data-kt-drawer-overlay="true"
            data-kt-drawer-width="{default:'200px', '300px': '250px'}"
            data-kt-drawer-direction="start"
            data-kt-drawer-toggle="#kt_aside_mobile_toggle"
        >


            <div class="aside-logo flex-column-auto" id="kt_aside_logo">

                <a href="{{route('master')}}">
                    <img alt="Logo"
                         src="http://logos.textgiraffe.com/custom-design/logo-name/Admin-designstyle-pastel-m.png"
                         class="h-100px logo"/>
                </a>


                <div id="kt_aside_toggle" class="btn btn-icon w-auto px-0 btn-active-color-primary aside-toggle"
                     data-kt-toggle="true"
                     data-kt-toggle-state="active"
                     data-kt-toggle-target="body"
                     data-kt-toggle-name="aside-minimize"
                >

                    <!--begin::Svg Icon | path: assets/media/icons/duotune/arrows/arr080.svg-->
                    <span class="svg-icon svg-icon-1 rotate-180"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                      height="24" viewBox="0 0 24 24" fill="none">
<path opacity="0.5"
      d="M9.63433 11.4343L5.45001 7.25C5.0358 6.83579 5.0358 6.16421 5.45001 5.75C5.86423 5.33579 6.5358 5.33579 6.95001 5.75L12.4929 11.2929C12.8834 11.6834 12.8834 12.3166 12.4929 12.7071L6.95001 18.25C6.5358 18.6642 5.86423 18.6642 5.45001 18.25C5.0358 17.8358 5.0358 17.1642 5.45001 16.75L9.63433 12.5657C9.94675 12.2533 9.94675 11.7467 9.63433 11.4343Z"
      fill="currentColor"/>
<path
    d="M15.6343 11.4343L11.45 7.25C11.0358 6.83579 11.0358 6.16421 11.45 5.75C11.8642 5.33579 12.5358 5.33579 12.95 5.75L18.4929 11.2929C18.8834 11.6834 18.8834 12.3166 18.4929 12.7071L12.95 18.25C12.5358 18.6642 11.8642 18.6642 11.45 18.25C11.0358 17.8358 11.0358 17.1642 11.45 16.75L15.6343 12.5657C15.9467 12.2533 15.9467 11.7467 15.6343 11.4343Z"
    fill="currentColor"/>
</svg></span>
                    <!--end::Svg Icon-->
                </div>

            </div>


            <div class="aside-menu flex-column-fluid">
                <div
                    class="hover-scroll-overlay-y my-5 my-lg-5"
                    id="kt_aside_menu_wrapper"
                    data-kt-scroll="true"
                    data-kt-scroll-activate="{default: false, lg: true}"
                    data-kt-scroll-height="auto"
                    data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_footer"
                    data-kt-scroll-wrappers="#kt_aside_menu"
                    data-kt-scroll-offset="0"
                >

                    <div
                        class="menu menu-column menu-title-gray-800 menu-state-title-primary menu-state-icon-primary menu-state-bullet-primary menu-arrow-gray-500"
                        id="#kt_aside_menu" data-kt-menu="true">
                        <div class="menu-item"><a class="menu-link active"
                                                  href="{{route('master')}}"><span
                                    class="menu-icon"><!--begin::Svg Icon | path: assets/media/icons/duotune/art/art002.svg-->
<span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="25" viewBox="0 0 24 25"
                                       fill="none">
<path opacity="0.3"
      d="M8.9 21L7.19999 22.6999C6.79999 23.0999 6.2 23.0999 5.8 22.6999L4.1 21H8.9ZM4 16.0999L2.3 17.8C1.9 18.2 1.9 18.7999 2.3 19.1999L4 20.9V16.0999ZM19.3 9.1999L15.8 5.6999C15.4 5.2999 14.8 5.2999 14.4 5.6999L9 11.0999V21L19.3 10.6999C19.7 10.2999 19.7 9.5999 19.3 9.1999Z"
      fill="currentColor"/>
<path
    d="M21 15V20C21 20.6 20.6 21 20 21H11.8L18.8 14H20C20.6 14 21 14.4 21 15ZM10 21V4C10 3.4 9.6 3 9 3H4C3.4 3 3 3.4 3 4V21C3 21.6 3.4 22 4 22H9C9.6 22 10 21.6 10 21ZM7.5 18.5C7.5 19.1 7.1 19.5 6.5 19.5C5.9 19.5 5.5 19.1 5.5 18.5C5.5 17.9 5.9 17.5 6.5 17.5C7.1 17.5 7.5 17.9 7.5 18.5Z"
    fill="currentColor"/>
</svg></span>
                                    <!--end::Svg Icon--></span><span class="menu-title">Home</span></a></div>
                        <div class="menu-item">
                            <div class="menu-content pt-8 pb-2"><span
                                    class="menu-section text-muted text-uppercase fs-8 ls-1">Modules</span></div>
                        </div>

                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion"><span class="menu-link"><span
                                    class="menu-icon"><!--begin::Svg Icon | path: assets/media/icons/duotune/communication/com006.svg-->
<span class="svg-icon svg-icon-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                       fill="none">
<path opacity="0.3"
      d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z"
      fill="currentColor"/>
<path
    d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z"
    fill="currentColor"/>
</svg></span>
                                    <!--end::Svg Icon--></span><span class="menu-title">Quản Lý</span><span
                                    class="menu-arrow"></span></span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                @if(checkSuperAdmin())
                                <div class="menu-item"><a class="menu-link" href="{{route('user')}}" title="Coming soon"
                                                          data-bs-toggle="tooltip" data-bs-trigger="hover"
                                                          data-bs-dismiss="click" data-bs-placement="right"><span
                                            class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                            class="menu-title">Quản lí nhân viên</span></a></div>
                                @endif
                                <div class="menu-item"><a class="menu-link"
                                                          href="{{route('product')}}"><span
                                            class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                            class="menu-title">Quản lí sản phẩm</span></a></div>
                                <div class="menu-item"><a class="menu-link"
                                                          href="{{route('order')}}"><span
                                            class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                            class="menu-title">Quản lí đơn hàng</span></a></div>
                                <div class="menu-item"><a class="menu-link"
                                                          href="{{route('voucher')}}"><span
                                            class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                            class="menu-title">Quản lí mã</span></a></div>
                                <div class="menu-item"><a class="menu-link"
                                                          href="{{route('category')}}"><span
                                            class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                            class="menu-title">Quản lí danh mục</span></a></div>
                                <div class="menu-item"><a class="menu-link"
                                                          href="{{route('banner')}}"><span
                                            class="menu-bullet"><span class="bullet bullet-dot"></span></span><span
                                            class="menu-title">Quản lí banner</span></a></div>
                            </div>
                        </div>
                        <div class="menu-item">
                            <div class="menu-content">
                                <div class="separator mx-1 my-4"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--begin::Wrapper-->
    <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <!--begin::Header-->
        <div id="kt_header" style="" class="header  align-items-stretch">
            <!--begin::Container-->
            <div class=" container-fluid  d-flex align-items-stretch justify-content-between">
                <!--begin::Aside mobile toggle-->
                <div class="d-flex align-items-center d-lg-none ms-n3 me-1" data-bs-toggle="tooltip"
                     title="Show aside menu">
                    <div class="btn btn-icon btn-active-light-primary" id="kt_aside_mobile_toggle">
                        <!--begin::Svg Icon | path: assets/media/icons/duotune/abstract/abs015.svg-->
                        <span class="svg-icon svg-icon-2x mt-1"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                     height="24" viewBox="0 0 24 24" fill="none">
<path d="M21 7H3C2.4 7 2 6.6 2 6V4C2 3.4 2.4 3 3 3H21C21.6 3 22 3.4 22 4V6C22 6.6 21.6 7 21 7Z" fill="currentColor"/>
<path opacity="0.3"
      d="M21 14H3C2.4 14 2 13.6 2 13V11C2 10.4 2.4 10 3 10H21C21.6 10 22 10.4 22 11V13C22 13.6 21.6 14 21 14ZM22 20V18C22 17.4 21.6 17 21 17H3C2.4 17 2 17.4 2 18V20C2 20.6 2.4 21 3 21H21C21.6 21 22 20.6 22 20Z"
      fill="currentColor"/>
</svg></span>
                        <!--end::Svg Icon-->
                    </div>
                </div>
                <!--end::Aside mobile toggle-->

                <!--begin::Mobile logo-->
                <div class="d-flex align-items-center flex-grow-1 flex-lg-grow-0">
                    <a href="https://preview.keenthemes.com/metronic8/laravel?demo=demo1" class="d-lg-none">
                        <img alt="Logo"
                             src="https://preview.keenthemes.com/metronic8/laravel/demo1/media/logos/logo-1.svg"
                             class="h-15px"/>
                    </a>
                </div>
                <!--end::Mobile logo-->

                <!--begin::Wrapper-->
                <div class="d-flex align-items-stretch justify-content-between flex-lg-grow-1">
                    <!--begin::Navbar-->
                    <div class="d-flex align-items-stretch" id="kt_header_nav">
                        <!--begin::Menu wrapper-->
                        <div class="header-menu align-items-stretch"
                             data-kt-drawer="true"
                             data-kt-drawer-name="header-menu"
                             data-kt-drawer-activate="{default: true, lg: false}"
                             data-kt-drawer-overlay="true"
                             data-kt-drawer-width="{default:'200px', '300px': '250px'}"
                             data-kt-drawer-direction="end"
                             data-kt-drawer-toggle="#kt_header_menu_mobile_toggle"
                             data-kt-swapper="true"
                             data-kt-swapper-mode="prepend"
                             data-kt-swapper-parent="{default: '#kt_body', lg: '#kt_header_nav'}"
                        >
                            <!--begin::Menu-->
                            <h1 class='d-flex text-dark fw-bolder fs-3 align-items-center my-1'>Xin
                                chào,<strong><b>{{session('full_name')}}</b></strong></h1>
                            <!--end::Menu-->
                        </div>
                        <!--end::Menu wrapper-->

                    </div>
                    <!--end::Navbar-->

                    <!--begin::Topbar-->
                    <div class="d-flex align-items-stretch flex-shrink-0">
                        <!--begin::Toolbar wrapper-->
                        <div class="d-flex align-items-stretch flex-shrink-0">
                            <!--begin::Search-->
                            <!--end::Search-->

                            <!--begin::Activities-->
                            <!--end::Activities-->

                            <!--begin::Notifications-->
                            <!--end::Notifications-->

                            <!--begin::Chat-->
                            <!--end::Chat-->

                            <!--begin::Quick links-->
                            <!--end::Quick links-->

                            <!--begin::Theme mode-->
                            <!--end::Theme mode-->

                            <!--begin::User menu-->
                            <div class="d-flex align-items-center ms-1 ms-lg-3" id="kt_header_user_menu_toggle">
                                <!--begin::Menu wrapper-->
                                <div class="cursor-pointer symbol symbol-30px symbol-md-40px"
                                     data-kt-menu-trigger="click" data-kt-menu-attach="parent"
                                     data-kt-menu-placement="bottom-end">
                                    <img
                                        src="{{ Avatar::create(session()->get('full_name'))->toBase64() }}"
                                        alt="user"/>
                                </div>
                                <!--begin::Menu-->
                                <div
                                    class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-primary fw-bold py-4 fs-6 w-275px"
                                    data-kt-menu="true">
                                    <!--begin::Menu item-->
                                    <div class="menu-item px-3">
                                        <div class="menu-content d-flex align-items-center px-3">
                                            <!--begin::Avatar-->
                                            <div class="symbol symbol-50px me-5">
                                                <img alt="Logo"
                                                     src="{{ Avatar::create(session()->get('full_name'))->toBase64() }}"/>
                                            </div>
                                            <!--end::Avatar-->

                                            <!--begin::Username-->
                                            <div class="d-flex flex-column">
                                                <div class="fw-bolder d-flex align-items-center fs-5">
                                                    <a href="{{route('profile',session()->get('id'))}}" class="fw-bold text-muted text-hover-primary fs-7">{{session()->get('full_name')}}</a>

                                                </div>
                                                <span
                                                    class="badge badge-light-danger fw-bolder fs-7 ">SuAdmin</span>
                                            </div>
                                            <!--end::Username-->
                                        </div>
                                    </div><!--end::Menu item-->

                                    <!--begin::Menu item-->
                                    <div class="menu-item px-5">
                                        <button type="button" onclick="location.href='{{route('logout')}}'"
                                                class="button-ajax menu-link px-5">
                                            Sign Out
                                        </button>
                                    </div>
                                    <!--end::Menu item-->

                                    <!--begin::Menu separator-->
                                    <div class="separator my-2"></div>
                                    <!--end::Menu separator-->

                                    <!--begin::Menu item-->
                                    <!--end::Menu item-->
                                </div>

                                <!--end::Menu-->

                                <!--end::Menu wrapper-->
                            </div>
                            <!--end::User menu-->

                            <!--begin::Header menu toggle-->
                            <div class="d-flex align-items-center d-lg-none ms-2 me-n3" data-bs-toggle="tooltip"
                                 title="Show header menu">
                                <div class="btn btn-icon btn-active-light-primary w-30px h-30px w-md-40px h-md-40px"
                                     id="kt_header_menu_mobile_toggle">
                                    <!--begin::Svg Icon | path: assets/media/icons/duotune/text/txt001.svg-->
                                    <span class="svg-icon svg-icon-1"><svg xmlns="http://www.w3.org/2000/svg"
                                                                           width="24" height="24"
                                                                           viewBox="0 0 24 24" fill="none">
<path
    d="M13 11H3C2.4 11 2 10.6 2 10V9C2 8.4 2.4 8 3 8H13C13.6 8 14 8.4 14 9V10C14 10.6 13.6 11 13 11ZM22 5V4C22 3.4 21.6 3 21 3H3C2.4 3 2 3.4 2 4V5C2 5.6 2.4 6 3 6H21C21.6 6 22 5.6 22 5Z"
    fill="currentColor"/>
<path opacity="0.3"
      d="M21 16H3C2.4 16 2 15.6 2 15V14C2 13.4 2.4 13 3 13H21C21.6 13 22 13.4 22 14V15C22 15.6 21.6 16 21 16ZM14 20V19C14 18.4 13.6 18 13 18H3C2.4 18 2 18.4 2 19V20C2 20.6 2.4 21 3 21H13C13.6 21 14 20.6 14 20Z"
      fill="currentColor"/>
</svg></span>
                                    <!--end::Svg Icon-->
                                </div>
                            </div>
                            <!--end::Header menu toggle-->
                        </div>
                        <!--end::Toolbar wrapper-->

                    </div>
                    <!--end::Topbar-->
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Container-->
        </div>
        <!--end::Header-->


        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid " id="kt_content">
            <!--begin::Toolbar-->
            <!--end::Toolbar-->


            <!--begin::Post-->
            @yield('content')
            <!--end::Content-->

            <!--begin::Footer-->
            <!--end::Footer-->
            <!--begin::Footer-->
            <!--end::Footer-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Page-->
</div>
<!--end::Root-->

<!--begin::Drawers-->
<!--begin::Activities drawer-->
<!--end::Activities drawer-->

<!--begin::Chat drawer-->
<!--end::Chat drawer-->

<!--end::Drawers-->

<!--begin::Engage-->
<!--begin::Engage drawers-->
<!--begin::Demos drawer-->
<!--end::Demos drawer-->


<!--begin::Help drawer-->
<!--end::Help drawer-->

<!--end::Engage drawers-->

<!--begin::Engage toolbar-->
<!--end::Engage toolbar-->

<!--end::Engage-->

<!--begin::Scrolltop-->
<!--end::Scrolltop-->

<!--end::Main-->


<script src="{{asset("js/plugins.bundle.js")}}"></script>
<script src="{{asset('js/scripts.bundle.js')}}"></script>
<script src="{{asset('js/custom/widgets.js')}}"></script>
<script src="{{asset('js/general.js')}}"></script>




</body>
</html>
