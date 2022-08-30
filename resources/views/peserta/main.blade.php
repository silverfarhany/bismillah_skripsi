<!DOCTYPE html>
<!--
Template Name: Keen - The Ultimate Bootstrap 4 HTML Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://themes.getbootstrap.com/product/keen-the-ultimate-bootstrap-admin-theme/
Support: https://keenthemes.com/theme-support
License: You must have a valid license purchased only from themes.getbootstrap.com(the above link) in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<head>
    <!-- Google Tag Manager -->
    <script>

    </script>
    <!-- End Google Tag Manager -->
    <meta charset="utf-8" />
    <title>PT. Len Industri (Persero)</title>
    <meta name="description" content="No subheader example" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->
    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{asset('theme/demo1/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle1036.css?v=2.1.1')}}" rel="stylesheet" type="text/css" />
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('theme/demo1/dist/assets/plugins/global/plugins.bundle1036.css?v=2.1.1')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle1036.css?v=2.1.1')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/demo1/dist/assets/css/style.bundle1036.css?v=2.1.1')}}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{asset('theme/demo1/dist/assets/css/themes/layout/header/base/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/demo1/dist/assets/css/themes/layout/header/menu/light.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/demo1/dist/assets/css/themes/layout/brand/dark.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('theme/demo1/dist/assets/css/themes/layout/aside/dark.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/6.0.0-beta.2/dropzone.min.css" integrity="sha512-qkeymXyips4Xo5rbFhX+IDuWMDEmSn7Qo7KpPMmZ1BmuIA95IPVYsVZNn8n4NH/N30EY7PUZS3gTeTPoAGo1mA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!--end::Layout Themes-->
    <link rel="shortcut icon" href="https://preview.keenthemes.com/keen/theme/demo1/dist/assets/media/logos/favicon.ico" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Hotjar Tracking Code for keenthemes.com -->
    <script>
        (function(h, o, t, j, a, r) {
            h.hj = h.hj || function() {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {
                hjid: 1070954,
                hjsv: 6
            };
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
    </script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="quick-panel-right demo-panel-right offcanvas-right header-fixed header-mobile-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
    <!-- Google Tag Manager (noscript) -->
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FS8GGP" height="0" width="0" style="display:none;visibility:hidden"></iframe>
    </noscript>
    <!-- End Google Tag Manager (noscript) -->
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
        {{-- <!--begin::Logo-->
        <a href="../../index.html">
            <img alt="Logo" src="https://preview.keenthemes.com/keen/theme/demo1/dist/assets/media/logos/logo-1.svg" />
        </a>
        <!--end::Logo--> --}}
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
            <!--begin::Aside Mobile Toggle-->
            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">
                <span></span>
            </button>
            <!--end::Aside Mobile Toggle-->
            <!--begin::Header Menu Mobile Toggle-->
            <button class="btn p-0 burger-icon ml-5" id="kt_header_mobile_toggle">
                <span></span>
            </button>
            <!--end::Header Menu Mobile Toggle-->
            <!--begin::Topbar Mobile Toggle-->
            <button class="btn btn-hover-text-primary p-0 ml-3" id="kt_header_mobile_topbar_toggle">
                <span class="svg-icon svg-icon-xl">
                    <!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/General/User.svg-->
                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <polygon points="0 0 24 0 24 24 0 24" />
                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" fill="#000000" fill-rule="nonzero" />
                        </g>
                    </svg>
                    <!--end::Svg Icon-->
                </span>
            </button>
            <!--end::Topbar Mobile Toggle-->
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header Mobile-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Page-->
        <div class="d-flex flex-row flex-column-fluid page">
            <!--begin::Aside-->
            <div class="aside aside-left aside-fixed d-flex flex-column flex-row-auto" id="kt_aside">
                <!--begin::Brand-->
                <div class="brand flex-column-auto" id="kt_brand">
                    {{-- <!--begin::Logo-->
                    <a href="../../index.html" class="brand-logo">
                        <img alt="Logo" src="https://preview.keenthemes.com/keen/theme/demo1/dist/assets/media/logos/logo-1.svg" class="h-30px" />
                    </a>
                    <!--end::Logo--> --}}
                    <!--begin::Toggle-->
                    <button class="brand-toggle btn btn-sm px-0" id="kt_aside_toggle">
                        <span class="svg-icon svg-icon svg-icon-xl">
                            <!--begin::Svg Icon | path:/keen/theme/demo1/dist/assets/media/svg/icons/Text/Toggle-Right.svg-->
                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                    <rect x="0" y="0" width="24" height="24" />
                                    <path fill-rule="evenodd" clip-rule="evenodd" d="M22 11.5C22 12.3284 21.3284 13 20.5 13H3.5C2.6716 13 2 12.3284 2 11.5C2 10.6716 2.6716 10 3.5 10H20.5C21.3284 10 22 10.6716 22 11.5Z" fill="black" />
                                    <path opacity="0.5" fill-rule="evenodd" clip-rule="evenodd" d="M14.5 20C15.3284 20 16 19.3284 16 18.5C16 17.6716 15.3284 17 14.5 17H3.5C2.6716 17 2 17.6716 2 18.5C2 19.3284 2.6716 20 3.5 20H14.5ZM8.5 6C9.3284 6 10 5.32843 10 4.5C10 3.67157 9.3284 3 8.5 3H3.5C2.6716 3 2 3.67157 2 4.5C2 5.32843 2.6716 6 3.5 6H8.5Z" fill="black" />
                                </g>
                            </svg>
                            <!--end::Svg Icon-->
                        </span>
                    </button>
                    <!--end::Toolbar-->
                </div>
                <!--end::Brand-->

                <!--begin::Aside Menu-->
                <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                    <!--begin::Menu Container-->
                    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1" data-menu-dropdown-timeout="500">
                        <!--begin::Menu Nav-->
                        <ul class="menu-nav">
                            <li class="menu-item" aria-haspopup="true">
                                <a href="/homepeserta" class="menu-link">
                                    <i class="menu-icon flaticon2-poll-symbol"></i>
                                    <span class="menu-text">Dashboard</span>
                                </a>
                            </li>
                            {{-- @if(count($cek) <= 0) --}}
                            <li class="menu-section">
                                <h4 class="menu-text">On-Going</h4>
                                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                            </li>
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="/readtask" class="menu-link menu-toggle">
                                    <i class="menu-icon flaticon2-list-1"></i>
                                    <span class="menu-text">Tugas Anda</span>
                                </a>
                            </li>
                            {{-- menu 2 --}}
                            <li class=" menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="/readpresensi" class="menu-link menu-toggle">
                                    <i class="menu-icon flaticon2-user"></i>
                                    <span class="menu-text">Presensi Anda</span>
                                </a>
                            </li>
                            {{-- @endif --}}
                            <li class="menu-section">
                                <h4 class="menu-text">Final</h4>
                                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                            </li>
                            <li class="menu-item menu-item-submenu" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="/final" class="menu-link menu-toggle">
                                    <i class="menu-icon flaticon2-box"></i>
                                    <span class="menu-text">Hasil PKL</span>

                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
                <!--end::Menu Nav-->
            </div>
            <!--end::Aside Menu-->
            <!--end::Aside-->


            <!--begin::Wrapper-->
            <div class="d-flex flex-column flex-row-fluid wrapper" id="kt_wrapper">
                <!--begin::Header-->
                <div id="kt_header" class="header header-fixed">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex align-items-stretch justify-content-between">
                        <!--begin::Header Menu Wrapper-->
                        <div class="header-menu-wrapper header-menu-wrapper-left" id="kt_header_menu_wrapper">
                            <!--begin::Header Menu-->
                            <div id="kt_header_menu" class="header-menu header-menu-mobile header-menu-layout-default">
                                <!--begin::Header Nav-->
                                <ul class="menu-nav">
                                    <li class="menu-item menu-item-submenu menu-item-rel menu-item-active" data-menu-toggle="click" aria-haspopup="true">
                                    </li>

                                </ul>
                                <!--end::Header Nav-->
                            </div>
                            <!--end::Header Menu-->
                        </div>
                        <!--end::Header Menu Wrapper-->
                        <!--begin::Topbar-->
                        <div class="topbar">
                            <!--begin::User-->
                            <div class="topbar-item ml-4">
                                <div class="btn btn-icon btn-light-primary h-40px w-40px p-0" id="kt_quick_user_toggle">
                                    <img src="https://preview.keenthemes.com/keen/theme/demo1/dist/assets/media/svg/avatars/004-boy-1.svg" class="h-30px align-self-end" alt="" />
                                </div>
                                <div class="btn btn-icon w-auto btn-clean d-flex align-items-center btn-lg px-2" id="kt_quick_user_toggle">
                                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{Session::get('name')}}</span>
                                </div>
                            </div>
                            <!--end::User-->
                            <!-- begin::User Panel-->
                            <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
                                <!--begin::Header-->
                                <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
                                    <h3 class="font-weight-bold m-0">{{Session::get('name')}}
                                        <small class="text-muted font-size-sm ml-2">Peserta</small>
                                    </h3>
                                    <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                                        <i class="ki ki-close icon-xs text-muted"></i>
                                    </a>
                                </div>
                                <!--end::Header-->
                                <!--begin::Content-->
                                <div class="offcanvas-content pr-5 mr-n5">
                                    <a href="/editProfile" class="btn btn-hover-bg-primary btn-text-primary btn-hover-text-white border-0 font-weight-bold mr-2">Edit
                                        Profile</a>
                                    <a href="/logout" class="btn btn-hover-bg-danger btn-text-danger btn-hover-text-white border-0 font-weight-bold mr-2">Logout</a>
                                </div>
                            </div>
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
                    <!--begin::Entry-->
                    <div class="d-flex flex-column-fluid">
                        <!--begin::Container-->
                        <div class="container">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('theme/demo1/dist/assets/plugins/global/plugins.bundle1036.js?v=2.1.1')}}"></script>
<script src="{{asset('theme/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundle1036.js?v=2.1.1')}}"></script>
<script src="{{asset('theme/demo1/dist/assets/js/scripts.bundle1036.js?v=2.1.1')}}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('theme/demo1/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle1036.js?v=2.1.1')}}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('theme/demo1/dist/assets/js/pages/widgets1036.js?v=2.1.1')}}"></script>
<!--end::Page Scripts-->
@yield('script')

<!--end::Body-->

</html>