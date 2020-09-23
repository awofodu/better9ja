<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Better9ja | Admin</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <meta name="description" content="Updates and statistics"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700"/>
    <!--end::Fonts-->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!--begin::Page Vendors Styles(used by this page)-->
    <link href="{{asset('investor/theme/html/demo1/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundlec3e8.css?v=7.0.6')}}"
          rel="stylesheet" type="text/css"/>
    <!--end::Page Vendors Styles-->
    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{asset('investor/theme/html/demo1/dist/assets/plugins/global/plugins.bundlec3e8.css?v=7.0.6')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('investor/theme/html/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundlec3e8.css?v=7.0.6')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('investor/theme/html/demo1/dist/assets/css/style.bundlec3e8.css?v=7.0.6')}}" rel="stylesheet"
          type="text/css"/>
    <!--end::Global Theme Styles-->
    <!--begin::Layout Themes(used by all pages)-->
    <link href="{{asset('investor/theme/html/demo1/dist/assets/css/themes/layout/header/base/lightc3e8.css?v=7.0.6')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('investor/theme/html/demo1/dist/assets/css/themes/layout/header/menu/lightc3e8.css?v=7.0.6')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('investor/theme/html/demo1/dist/assets/css/themes/layout/brand/darkc3e8.css?v=7.0.6')}}"
          rel="stylesheet" type="text/css"/>
    <link href="{{asset('investor/theme/html/demo1/dist/assets/css/themes/layout/aside/darkc3e8.css?v=7.0.6')}}"
          rel="stylesheet" type="text/css"/>
    <!--end::Layout Themes-->
{{--    <link rel="shortcut icon"--}}
{{--          href="https://preview.keenthemes.com/metronic/theme/html/demo1/dist/assets/media/logos/favicon.ico"/>--}}
    <link rel="shortcut icon" href="{{asset('images/logo/better.ico')}}">
    <!-- Hotjar Tracking Code for keenthemes.com -->
    <script>(function (h, o, t, j, a, r) {
            h.hj = h.hj || function () {
                (h.hj.q = h.hj.q || []).push(arguments)
            };
            h._hjSettings = {hjid: 1070954, hjsv: 6};
            a = o.getElementsByTagName('head')[0];
            r = o.createElement('script');
            r.async = 1;
            r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
            a.appendChild(r);
        })(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');</script>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async="async" src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>
    <script>window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }

        gtag('js', new Date());
        gtag('config', 'UA-37564768-1');</script>

    <style>
        .aside{
            background-color: #af1a1a !important;
        }
        .aside-menu{
            background-color: #541b1b !important;
            /*height: 100% !important;*/
        }
        .brand{
            background-color: #fff !important;
        }
        a.menu-link:hover{
            background-color: #271d15e0 !important;
        }
        .aside-menu .menu-nav > .menu-item.menu-item-active-dashboard > .menu-link{
            background-color: #271d15e0 !important;
        }
        /*.aside-menu .menu-nav > .menu-item.menu-item-open > .menu-link{*/
        /*    background-color: #271d15e0 !important;*/
        /*}*/
        .aside-menu .menu-nav > .menu-item > .menu-link .menu-text{
            color: #efefef !important;
        }
        .aside-menu .menu-nav > .menu-item .menu-submenu .menu-item.menu-item-active > .menu-link{
            background-color: #271d15e0 !important;
        }
        .header-mobile
        {
            background-color: #fff !important;
        }
        .header-mobile .burger-icon span {
            background-color: #541b1b;
        }
        .header-mobile .burger-icon span::before, .header-mobile .burger-icon span::after {
            background-color: #541b1b;
        }
        .router-link-active{
            background: #271d15e0;
        }
    </style>
</head>
<!--end::Head-->
<!--begin::Body-->
<body id="kt_body"
      class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
<div id="app">
    <!--begin::Main-->
    <!--begin::Header Mobile-->
    <div id="kt_header_mobile" class="header-mobile align-items-center header-mobile-fixed">
        <!--begin::Logo-->
        <a href="{{route('main')}}">
            <img alt="Logo" src="{{asset('images/logo/better_9ja.png')}}" width="150"/>
        </a>
        <!--end::Logo-->
        <!--begin::Toolbar-->
        <div class="d-flex align-items-center">
        {{--            <!--begin::Aside Mobile Toggle-->--}}
        {{--            <button class="btn p-0 burger-icon burger-icon-left" id="kt_aside_mobile_toggle">--}}
        {{--                <span></span>--}}
        {{--            </button>--}}
        {{--            <!--end::Aside Mobile Toggle-->--}}
        <!--begin::Header Menu Mobile Toggle-->
            <button class="btn p-0 burger-icon ml-4" id="kt_aside_mobile_toggle">
                <span></span>
            </button>
            <!--end::Header Menu Mobile Toggle-->
            <!--begin::Topbar Mobile Toggle-->
            <button class="btn btn-hover-text-primary p-0 ml-2" id="kt_header_mobile_topbar_toggle">
					<span class="svg-icon svg-icon-xl">
						<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/User.svg-->
						<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                             height="24px" viewBox="0 0 24 24" version="1.1">
							<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
								<polygon points="0 0 24 0 24 24 0 24"/>
								<path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                      fill="#000000" fill-rule="nonzero" opacity="0.3"/>
								<path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                      fill="#000000" fill-rule="nonzero"/>
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
                    <!--begin::Logo-->
                    <a href="{{route('main')}}" class="brand-logo">
                        <img alt="Logo" src="{{asset('images/logo/better_9ja.png')}}" width="150"/>
                    </a>
                    <!--end::Logo-->
                </div>
                <!--end::Brand-->
                <!--begin::Aside Menu-->
                <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                    <!--begin::Menu Container-->
                    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
                         data-menu-dropdown-timeout="500">
                        <!--begin::Menu Nav-->
                        <ul class="menu-nav">
                            <li class="menu-item menu-item-active" aria-haspopup="true">
                                <router-link to="/admin/dashboard" class="menu-link">
										<span class="svg-icon menu-icon svg-icon-white">
											<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<polygon points="0 0 24 0 24 24 0 24"/>
													<path d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                          fill="#000000" fill-rule="nonzero"/>
													<path d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                          fill="#000000" opacity="0.3"/>
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
                                    <span class="menu-text">Dashboard</span>
                                </router-link>
                            </li>
                            <li class="menu-section">
                                <h4 class="menu-text">Actions</h4>
                                <i class="menu-icon ki ki-bold-more-hor icon-md"></i>
                            </li>

                            <li class="menu-item {{Request::is('admin/investors') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                <router-link to="/admin/investors" class="menu-link">
										<span class="svg-icon menu-icon svg-icon-white">
											<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Bucket.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <polygon points="0 0 24 0 24 24 0 24"/>
                                                    <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                          fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                    <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                          fill="#000000" fill-rule="nonzero"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
										</span>
                                    <span class="menu-text">Investors</span>
                                </router-link>
                            </li>

                            <li class="menu-item {{Request::is('admin/investments') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                <router-link to="/admin/investments" class="menu-link">
										<span class="svg-icon menu-icon svg-icon-white">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z" fill="#000000" opacity="0.3" transform="translate(11.500000, 12.000000) rotate(-345.000000) translate(-11.500000, -12.000000) "/>
                                                    <path d="M2,6 L21,6 C21.5522847,6 22,6.44771525 22,7 L22,17 C22,17.5522847 21.5522847,18 21,18 L2,18 C1.44771525,18 1,17.5522847 1,17 L1,7 C1,6.44771525 1.44771525,6 2,6 Z M11.5,16 C13.709139,16 15.5,14.209139 15.5,12 C15.5,9.790861 13.709139,8 11.5,8 C9.290861,8 7.5,9.790861 7.5,12 C7.5,14.209139 9.290861,16 11.5,16 Z M11.5,14 C12.6045695,14 13.5,13.1045695 13.5,12 C13.5,10.8954305 12.6045695,10 11.5,10 C10.3954305,10 9.5,10.8954305 9.5,12 C9.5,13.1045695 10.3954305,14 11.5,14 Z" fill="#000000"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
										</span>
                                    <span class="menu-text">Investments</span>
                                </router-link>
                            </li>

                            <li class="menu-item {{Request::is('admin/withdrawals') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                <router-link to="/admin/withdrawals" class="menu-link">
										<span class="svg-icon menu-icon svg-icon-white">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 Z" fill="#000000" opacity="0.3"/>
                                                    <path d="M18.5,11 L5.5,11 C4.67157288,11 4,11.6715729 4,12.5 L4,13 L8.58578644,13 C8.85100293,13 9.10535684,13.1053568 9.29289322,13.2928932 L10.2928932,14.2928932 C10.7456461,14.7456461 11.3597108,15 12,15 C12.6402892,15 13.2543539,14.7456461 13.7071068,14.2928932 L14.7071068,13.2928932 C14.8946432,13.1053568 15.1489971,13 15.4142136,13 L20,13 L20,12.5 C20,11.6715729 19.3284271,11 18.5,11 Z" fill="#000000"/>
                                                    <path d="M5.5,6 C4.67157288,6 4,6.67157288 4,7.5 L4,8 L20,8 L20,7.5 C20,6.67157288 19.3284271,6 18.5,6 L5.5,6 Z" fill="#000000"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
										</span>
                                    <span class="menu-text">Withdrawals</span>
                                </router-link>
                            </li>

                            <li class="menu-item {{Request::is('admin/maintenances') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                <router-link to="/admin/maintenances" class="menu-link">
										<span class="svg-icon svg-icon-white svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo1/dist/../src/media/svg/icons/Communication/Shield-user.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    <span class="menu-text">Maintenance</span>
                                </router-link>
                            </li>

                            @if(Auth::user()->user_type == 2)
                            <li class="menu-item {{Request::is('admin/manage-admin') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                <router-link to="/admin/manage-admin" class="menu-link">
										<span class="svg-icon svg-icon-white svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo1/dist/../src/media/svg/icons/Code/Settings4.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z" fill="#000000" fill-rule="nonzero" opacity="0.3"/>
                                                <path d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z" fill="#000000"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    <span class="menu-text">Manage Admin</span>
                                </router-link>
                            </li>
                            @endif

                            <li class="menu-item {{Request::is('admin/reports') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                <router-link to="/admin/reports" class="menu-link">
										<span class="svg-icon svg-icon-white svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo1/dist/../src/media/svg/icons/Communication/Safe-chat.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M8,17 C8.55228475,17 9,17.4477153 9,18 L9,21 C9,21.5522847 8.55228475,22 8,22 L3,22 C2.44771525,22 2,21.5522847 2,21 L2,18 C2,17.4477153 2.44771525,17 3,17 L3,16.5 C3,15.1192881 4.11928813,14 5.5,14 C6.88071187,14 8,15.1192881 8,16.5 L8,17 Z M5.5,15 C4.67157288,15 4,15.6715729 4,16.5 L4,17 L7,17 L7,16.5 C7,15.6715729 6.32842712,15 5.5,15 Z" fill="#000000" opacity="0.3"/>
                                                <path d="M2,11.8650466 L2,6 C2,4.34314575 3.34314575,3 5,3 L19,3 C20.6568542,3 22,4.34314575 22,6 L22,15 C22,15.0032706 21.9999948,15.0065399 21.9999843,15.009808 L22.0249378,15 L22.0249378,19.5857864 C22.0249378,20.1380712 21.5772226,20.5857864 21.0249378,20.5857864 C20.7597213,20.5857864 20.5053674,20.4804296 20.317831,20.2928932 L18.0249378,18 L12.9835977,18 C12.7263047,14.0909841 9.47412135,11 5.5,11 C4.23590829,11 3.04485894,11.3127315 2,11.8650466 Z M6,7 C5.44771525,7 5,7.44771525 5,8 C5,8.55228475 5.44771525,9 6,9 L15,9 C15.5522847,9 16,8.55228475 16,8 C16,7.44771525 15.5522847,7 15,7 L6,7 Z" fill="#000000"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    <span class="menu-text">Reports</span>
                                </router-link>
                            </li>

                            <li class="menu-item {{Request::is('admin/messages') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                <router-link to="/admin/messages" class="menu-link">
										<span class="svg-icon svg-icon-white svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo1/dist/../src/media/svg/icons/Communication/Incoming-mail.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M5,9 L19,9 C20.1045695,9 21,9.8954305 21,11 L21,20 C21,21.1045695 20.1045695,22 19,22 L5,22 C3.8954305,22 3,21.1045695 3,20 L3,11 C3,9.8954305 3.8954305,9 5,9 Z M18.1444251,10.8396467 L12,14.1481833 L5.85557487,10.8396467 C5.4908718,10.6432681 5.03602525,10.7797221 4.83964668,11.1444251 C4.6432681,11.5091282 4.77972206,11.9639747 5.14442513,12.1603533 L11.6444251,15.6603533 C11.8664074,15.7798822 12.1335926,15.7798822 12.3555749,15.6603533 L18.8555749,12.1603533 C19.2202779,11.9639747 19.3567319,11.5091282 19.1603533,11.1444251 C18.9639747,10.7797221 18.5091282,10.6432681 18.1444251,10.8396467 Z" fill="#000000"/>
                                                <path d="M11.1288761,0.733697713 L11.1288761,2.69017121 L9.12120481,2.69017121 C8.84506244,2.69017121 8.62120481,2.91402884 8.62120481,3.19017121 L8.62120481,4.21346991 C8.62120481,4.48961229 8.84506244,4.71346991 9.12120481,4.71346991 L11.1288761,4.71346991 L11.1288761,6.66994341 C11.1288761,6.94608579 11.3527337,7.16994341 11.6288761,7.16994341 C11.7471877,7.16994341 11.8616664,7.12798964 11.951961,7.05154023 L15.4576222,4.08341738 C15.6683723,3.90498251 15.6945689,3.58948575 15.5161341,3.37873564 C15.4982803,3.35764848 15.4787093,3.33807751 15.4576222,3.32022374 L11.951961,0.352100892 C11.7412109,0.173666017 11.4257142,0.199862688 11.2472793,0.410612793 C11.1708299,0.500907473 11.1288761,0.615386087 11.1288761,0.733697713 Z" fill="#000000" fill-rule="nonzero" opacity="0.3" transform="translate(11.959697, 3.661508) rotate(-270.000000) translate(-11.959697, -3.661508) "/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    <span class="menu-text">Messages</span>
                                </router-link>
                            </li>

                            <li class="menu-item {{Request::is('admin/testimonies') ? 'menu-item-active' : ''}}" aria-haspopup="true">
                                <router-link to="/admin/testimonies" class="menu-link">
										<span class="svg-icon svg-icon-white svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo1/dist/../src/media/svg/icons/Home/Book-open.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z" fill="#000000"/>
                                                <path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z" fill="#000000" opacity="0.3"/>
                                            </g>
                                        </svg><!--end::Svg Icon--></span>
                                    <span class="menu-text">Testimonies</span>
                                </router-link>
                            </li>

                            <li class="menu-item"
                                aria-haspopup="true">
                                <a class="menu-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
										<span class="svg-icon menu-icon svg-icon-white">
											<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M14.0069431,7.00607258 C13.4546584,7.00607258 13.0069431,6.55855153 13.0069431,6.00650634 C13.0069431,5.45446114 13.4546584,5.00694009 14.0069431,5.00694009 L15.0069431,5.00694009 C17.2160821,5.00694009 19.0069431,6.7970243 19.0069431,9.00520507 L19.0069431,15.001735 C19.0069431,17.2099158 17.2160821,19 15.0069431,19 L3.00694311,19 C0.797804106,19 -0.993056895,17.2099158 -0.993056895,15.001735 L-0.993056895,8.99826498 C-0.993056895,6.7900842 0.797804106,5 3.00694311,5 L4.00694793,5 C4.55923268,5 5.00694793,5.44752105 5.00694793,5.99956624 C5.00694793,6.55161144 4.55923268,6.99913249 4.00694793,6.99913249 L3.00694311,6.99913249 C1.90237361,6.99913249 1.00694311,7.89417459 1.00694311,8.99826498 L1.00694311,15.001735 C1.00694311,16.1058254 1.90237361,17.0008675 3.00694311,17.0008675 L15.0069431,17.0008675 C16.1115126,17.0008675 17.0069431,16.1058254 17.0069431,15.001735 L17.0069431,9.00520507 C17.0069431,7.90111468 16.1115126,7.00607258 15.0069431,7.00607258 L14.0069431,7.00607258 Z"
                                                          fill="#000000" fill-rule="nonzero" opacity="0.3"
                                                          transform="translate(9.006943, 12.000000) scale(-1, 1) rotate(-90.000000) translate(-9.006943, -12.000000) "/>
                                                    <rect fill="#000000" opacity="0.3"
                                                          transform="translate(14.000000, 12.000000) rotate(-270.000000) translate(-14.000000, -12.000000) "
                                                          x="13" y="6" width="2" height="12" rx="1"/>
                                                    <path d="M21.7928932,9.79289322 C22.1834175,9.40236893 22.8165825,9.40236893 23.2071068,9.79289322 C23.5976311,10.1834175 23.5976311,10.8165825 23.2071068,11.2071068 L20.2071068,14.2071068 C19.8165825,14.5976311 19.1834175,14.5976311 18.7928932,14.2071068 L15.7928932,11.2071068 C15.4023689,10.8165825 15.4023689,10.1834175 15.7928932,9.79289322 C16.1834175,9.40236893 16.8165825,9.40236893 17.2071068,9.79289322 L19.5,12.0857864 L21.7928932,9.79289322 Z"
                                                          fill="#000000" fill-rule="nonzero"
                                                          transform="translate(19.500000, 12.000000) rotate(-90.000000) translate(-19.500000, -12.000000) "/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
										</span>
                                    <span class="menu-text">
                                    {{ __('Logout') }}</span>
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                        <!--end::Menu Nav-->
                    </div>
                    <!--end::Menu Container-->
                </div>
                <!--end::Aside Menu-->
            </div>
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
                            </div>
                            <!--end::Header Menu-->
                        </div>
                        <!--end::Header Menu Wrapper-->
                        <!--begin::Topbar-->
                        <div class="topbar">
                            <!--begin::Notifications-->
                            <div class="dropdown">
                                <!--begin::Toggle-->
                                <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                    <a onclick="window.location.href='/dashboard'">
                                        <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
                                                <span class="svg-icon svg-icon-success svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo1/dist/../src/media/svg/icons/Media/Repeat.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                                    <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                        <rect x="0" y="0" width="24" height="24"/>
                                                        <path d="M12,8 L8,8 C5.790861,8 4,9.790861 4,12 L4,13 C4,14.6568542 5.34314575,16 7,16 L7,18 C4.23857625,18 2,15.7614237 2,13 L2,12 C2,8.6862915 4.6862915,6 8,6 L12,6 L12,4.72799742 C12,4.62015048 12.0348702,4.51519416 12.0994077,4.42878885 C12.264656,4.2075478 12.5779675,4.16215674 12.7992086,4.32740507 L15.656242,6.46136716 C15.6951359,6.49041758 15.7295917,6.52497737 15.7585249,6.56395854 C15.9231063,6.78569617 15.876772,7.09886961 15.6550344,7.263451 L12.798001,9.3840407 C12.7118152,9.44801079 12.607332,9.48254921 12.5,9.48254921 C12.2238576,9.48254921 12,9.25869158 12,8.98254921 L12,8 Z" fill="#000000"/>
                                                        <path d="M12.0583175,16 L16,16 C18.209139,16 20,14.209139 20,12 L20,11 C20,9.34314575 18.6568542,8 17,8 L17,6 C19.7614237,6 22,8.23857625 22,11 L22,12 C22,15.3137085 19.3137085,18 16,18 L12.0583175,18 L12.0583175,18.9825492 C12.0583175,19.2586916 11.8344599,19.4825492 11.5583175,19.4825492 C11.4509855,19.4825492 11.3465023,19.4480108 11.2603165,19.3840407 L8.40328311,17.263451 C8.18154548,17.0988696 8.13521119,16.7856962 8.29979258,16.5639585 C8.32872576,16.5249774 8.36318164,16.4904176 8.40207551,16.4613672 L11.2591089,14.3274051 C11.48035,14.1621567 11.7936615,14.2075478 11.9589099,14.4287888 C12.0234473,14.5151942 12.0583175,14.6201505 12.0583175,14.7279974 L12.0583175,16 Z" fill="#000000" opacity="0.3"/>
                                                    </g>
                                                </svg><!--end::Svg Icon--></span>
                                            <span class="pulse-ring"></span>
                                        </div>
                                    </a>
                                </div>
                                <!--end::Toggle-->
                                <!--begin::Dropdown-->
                                <div class="dropdown-menu p-0 m-0 dropdown-menu-right dropdown-menu-anim-up dropdown-menu-lg">
                                    <form>
                                        <!--begin::Header-->
                                        <div class="d-flex flex-column pt-12 bgi-size-cover bgi-no-repeat rounded-top"
                                             style="background-image: url(../theme/html/demo1/dist/assets/media/misc/bg-1.jpg)">
                                            <!--begin::Title-->
                                            <h4 class="d-flex flex-center rounded-top">
                                                <span class="text-white">User Notifications</span>
                                                <span class="btn btn-text btn-success btn-sm font-weight-bold btn-font-md ml-2">23 new</span>
                                            </h4>
                                            <!--end::Title-->
                                            <!--begin::Tabs-->
                                            <ul class="nav nav-bold nav-tabs nav-tabs-line nav-tabs-line-3x nav-tabs-line-transparent-white nav-tabs-line-active-border-success mt-3 px-8"
                                                role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active show" data-toggle="tab"
                                                       href="#topbar_notifications_notifications">Alerts</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab"
                                                       href="#topbar_notifications_events">Events</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" data-toggle="tab"
                                                       href="#topbar_notifications_logs">Logs</a>
                                                </li>
                                            </ul>
                                            <!--end::Tabs-->
                                        </div>
                                        <!--end::Header-->
                                        <!--begin::Content-->
                                        <div class="tab-content">
                                            <!--begin::Tabpane-->
                                            <div class="tab-pane active show p-8"
                                                 id="topbar_notifications_notifications" role="tabpanel">
                                                <!--begin::Scroll-->
                                                <div class="scroll pr-7 mr-n7" data-scroll="true" data-height="300"
                                                     data-mobile-height="200">
                                                    <!--begin::Item-->
                                                    <div class="d-flex align-items-center mb-6">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-40 symbol-light-primary mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-white">
																		<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Home/Library.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24"
                                                                                      height="24"/>
																				<path d="M5,3 L6,3 C6.55228475,3 7,3.44771525 7,4 L7,20 C7,20.5522847 6.55228475,21 6,21 L5,21 C4.44771525,21 4,20.5522847 4,20 L4,4 C4,3.44771525 4.44771525,3 5,3 Z M10,3 L11,3 C11.5522847,3 12,3.44771525 12,4 L12,20 C12,20.5522847 11.5522847,21 11,21 L10,21 C9.44771525,21 9,20.5522847 9,20 L9,4 C9,3.44771525 9.44771525,3 10,3 Z"
                                                                                      fill="#000000"/>
																				<rect fill="#000000" opacity="0.3"
                                                                                      transform="translate(17.825568, 11.945519) rotate(-19.000000) translate(-17.825568, -11.945519)"
                                                                                      x="16.3255682" y="2.94551858"
                                                                                      width="3" height="18" rx="1"/>
																			</g>
																		</svg>
                                                                        <!--end::Svg Icon-->
																	</span>
																</span>
                                                        </div>
                                                        <!--end::Symbol-->
                                                        <!--begin::Text-->
                                                        <div class="d-flex flex-column font-weight-bold">
                                                            <a href="#"
                                                               class="text-dark text-hover-primary mb-1 font-size-lg">Cool
                                                                App</a>
                                                            <span class="text-muted">Marketing campaign planning</span>
                                                        </div>
                                                        <!--end::Text-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex align-items-center mb-6">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-40 symbol-light-warning mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-warning">
																		<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Write.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24"
                                                                                      height="24"/>
																				<path d="M12.2674799,18.2323597 L12.0084872,5.45852451 C12.0004303,5.06114792 12.1504154,4.6768183 12.4255037,4.38993949 L15.0030167,1.70195304 L17.5910752,4.40093695 C17.8599071,4.6812911 18.0095067,5.05499603 18.0083938,5.44341307 L17.9718262,18.2062508 C17.9694575,19.0329966 17.2985816,19.701953 16.4718324,19.701953 L13.7671717,19.701953 C12.9505952,19.701953 12.2840328,19.0487684 12.2674799,18.2323597 Z"
                                                                                      fill="#000000" fill-rule="nonzero"
                                                                                      transform="translate(14.701953, 10.701953) rotate(-135.000000) translate(-14.701953, -10.701953)"/>
																				<path d="M12.9,2 C13.4522847,2 13.9,2.44771525 13.9,3 C13.9,3.55228475 13.4522847,4 12.9,4 L6,4 C4.8954305,4 4,4.8954305 4,6 L4,18 C4,19.1045695 4.8954305,20 6,20 L18,20 C19.1045695,20 20,19.1045695 20,18 L20,13 C20,12.4477153 20.4477153,12 21,12 C21.5522847,12 22,12.4477153 22,13 L22,18 C22,20.209139 20.209139,22 18,22 L6,22 C3.790861,22 2,20.209139 2,18 L2,6 C2,3.790861 3.790861,2 6,2 L12.9,2 Z"
                                                                                      fill="#000000" fill-rule="nonzero"
                                                                                      opacity="0.3"/>
																			</g>
																		</svg>
                                                                        <!--end::Svg Icon-->
																	</span>
																</span>
                                                        </div>
                                                        <!--end::Symbol-->
                                                        <!--begin::Text-->
                                                        <div class="d-flex flex-column font-weight-bold">
                                                            <a href="#"
                                                               class="text-dark-75 text-hover-primary mb-1 font-size-lg">Awesome
                                                                SAAS</a>
                                                            <span class="text-muted">Project status update meeting</span>
                                                        </div>
                                                        <!--end::Text-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex align-items-center mb-6">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-40 symbol-light-success mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-white">
																		<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Group-chat.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24"
                                                                                      height="24"/>
																				<path d="M16,15.6315789 L16,12 C16,10.3431458 14.6568542,9 13,9 L6.16183229,9 L6.16183229,5.52631579 C6.16183229,4.13107011 7.29290239,3 8.68814808,3 L20.4776218,3 C21.8728674,3 23.0039375,4.13107011 23.0039375,5.52631579 L23.0039375,13.1052632 L23.0206157,17.786793 C23.0215995,18.0629336 22.7985408,18.2875874 22.5224001,18.2885711 C22.3891754,18.2890457 22.2612702,18.2363324 22.1670655,18.1421277 L19.6565168,15.6315789 L16,15.6315789 Z"
                                                                                      fill="#000000"/>
																				<path d="M1.98505595,18 L1.98505595,13 C1.98505595,11.8954305 2.88048645,11 3.98505595,11 L11.9850559,11 C13.0896254,11 13.9850559,11.8954305 13.9850559,13 L13.9850559,18 C13.9850559,19.1045695 13.0896254,20 11.9850559,20 L4.10078614,20 L2.85693427,21.1905292 C2.65744295,21.3814685 2.34093638,21.3745358 2.14999706,21.1750444 C2.06092565,21.0819836 2.01120804,20.958136 2.01120804,20.8293182 L2.01120804,18.32426 C1.99400175,18.2187196 1.98505595,18.1104045 1.98505595,18 Z M6.5,14 C6.22385763,14 6,14.2238576 6,14.5 C6,14.7761424 6.22385763,15 6.5,15 L11.5,15 C11.7761424,15 12,14.7761424 12,14.5 C12,14.2238576 11.7761424,14 11.5,14 L6.5,14 Z M9.5,16 C9.22385763,16 9,16.2238576 9,16.5 C9,16.7761424 9.22385763,17 9.5,17 L11.5,17 C11.7761424,17 12,16.7761424 12,16.5 C12,16.2238576 11.7761424,16 11.5,16 L9.5,16 Z"
                                                                                      fill="#000000" opacity="0.3"/>
																			</g>
																		</svg>
                                                                        <!--end::Svg Icon-->
																	</span>
																</span>
                                                        </div>
                                                        <!--end::Symbol-->
                                                        <!--begin::Text-->
                                                        <div class="d-flex flex-column font-weight-bold">
                                                            <a href="#"
                                                               class="text-dark text-hover-primary mb-1 font-size-lg">Claudy
                                                                Sys</a>
                                                            <span class="text-muted">Project Deployment &amp; Launch</span>
                                                        </div>
                                                        <!--end::Text-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex align-items-center mb-6">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-40 symbol-light-danger mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-danger">
																		<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/General/Attachment2.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24"
                                                                                      height="24"/>
																				<path d="M11.7573593,15.2426407 L8.75735931,15.2426407 C8.20507456,15.2426407 7.75735931,15.6903559 7.75735931,16.2426407 C7.75735931,16.7949254 8.20507456,17.2426407 8.75735931,17.2426407 L11.7573593,17.2426407 L11.7573593,18.2426407 C11.7573593,19.3472102 10.8619288,20.2426407 9.75735931,20.2426407 L5.75735931,20.2426407 C4.65278981,20.2426407 3.75735931,19.3472102 3.75735931,18.2426407 L3.75735931,14.2426407 C3.75735931,13.1380712 4.65278981,12.2426407 5.75735931,12.2426407 L9.75735931,12.2426407 C10.8619288,12.2426407 11.7573593,13.1380712 11.7573593,14.2426407 L11.7573593,15.2426407 Z"
                                                                                      fill="#000000" opacity="0.3"
                                                                                      transform="translate(7.757359, 16.242641) rotate(-45.000000) translate(-7.757359, -16.242641)"/>
																				<path d="M12.2426407,8.75735931 L15.2426407,8.75735931 C15.7949254,8.75735931 16.2426407,8.30964406 16.2426407,7.75735931 C16.2426407,7.20507456 15.7949254,6.75735931 15.2426407,6.75735931 L12.2426407,6.75735931 L12.2426407,5.75735931 C12.2426407,4.65278981 13.1380712,3.75735931 14.2426407,3.75735931 L18.2426407,3.75735931 C19.3472102,3.75735931 20.2426407,4.65278981 20.2426407,5.75735931 L20.2426407,9.75735931 C20.2426407,10.8619288 19.3472102,11.7573593 18.2426407,11.7573593 L14.2426407,11.7573593 C13.1380712,11.7573593 12.2426407,10.8619288 12.2426407,9.75735931 L12.2426407,8.75735931 Z"
                                                                                      fill="#000000"
                                                                                      transform="translate(16.242641, 7.757359) rotate(-45.000000) translate(-16.242641, -7.757359)"/>
																				<path d="M5.89339828,3.42893219 C6.44568303,3.42893219 6.89339828,3.87664744 6.89339828,4.42893219 L6.89339828,6.42893219 C6.89339828,6.98121694 6.44568303,7.42893219 5.89339828,7.42893219 C5.34111353,7.42893219 4.89339828,6.98121694 4.89339828,6.42893219 L4.89339828,4.42893219 C4.89339828,3.87664744 5.34111353,3.42893219 5.89339828,3.42893219 Z M11.4289322,5.13603897 C11.8194565,5.52656326 11.8194565,6.15972824 11.4289322,6.55025253 L10.0147186,7.96446609 C9.62419433,8.35499039 8.99102936,8.35499039 8.60050506,7.96446609 C8.20998077,7.5739418 8.20998077,6.94077682 8.60050506,6.55025253 L10.0147186,5.13603897 C10.4052429,4.74551468 11.0384079,4.74551468 11.4289322,5.13603897 Z M0.600505063,5.13603897 C0.991029355,4.74551468 1.62419433,4.74551468 2.01471863,5.13603897 L3.42893219,6.55025253 C3.81945648,6.94077682 3.81945648,7.5739418 3.42893219,7.96446609 C3.0384079,8.35499039 2.40524292,8.35499039 2.01471863,7.96446609 L0.600505063,6.55025253 C0.209980772,6.15972824 0.209980772,5.52656326 0.600505063,5.13603897 Z"
                                                                                      fill="#000000" opacity="0.3"
                                                                                      transform="translate(6.014719, 5.843146) rotate(-45.000000) translate(-6.014719, -5.843146)"/>
																				<path d="M17.9142136,15.4497475 C18.4664983,15.4497475 18.9142136,15.8974627 18.9142136,16.4497475 L18.9142136,18.4497475 C18.9142136,19.0020322 18.4664983,19.4497475 17.9142136,19.4497475 C17.3619288,19.4497475 16.9142136,19.0020322 16.9142136,18.4497475 L16.9142136,16.4497475 C16.9142136,15.8974627 17.3619288,15.4497475 17.9142136,15.4497475 Z M23.4497475,17.1568542 C23.8402718,17.5473785 23.8402718,18.1805435 23.4497475,18.5710678 L22.0355339,19.9852814 C21.6450096,20.3758057 21.0118446,20.3758057 20.6213203,19.9852814 C20.2307961,19.5947571 20.2307961,18.9615921 20.6213203,18.5710678 L22.0355339,17.1568542 C22.4260582,16.76633 23.0592232,16.76633 23.4497475,17.1568542 Z M12.6213203,17.1568542 C13.0118446,16.76633 13.6450096,16.76633 14.0355339,17.1568542 L15.4497475,18.5710678 C15.8402718,18.9615921 15.8402718,19.5947571 15.4497475,19.9852814 C15.0592232,20.3758057 14.4260582,20.3758057 14.0355339,19.9852814 L12.6213203,18.5710678 C12.2307961,18.1805435 12.2307961,17.5473785 12.6213203,17.1568542 Z"
                                                                                      fill="#000000" opacity="0.3"
                                                                                      transform="translate(18.035534, 17.863961) scale(1, -1) rotate(45.000000) translate(-18.035534, -17.863961)"/>
																			</g>
																		</svg>
                                                                        <!--end::Svg Icon-->
																	</span>
																</span>
                                                        </div>
                                                        <!--end::Symbol-->
                                                        <!--begin::Text-->
                                                        <div class="d-flex flex-column font-weight-bold">
                                                            <a href="#"
                                                               class="text-dark text-hover-primary mb-1 font-size-lg">Trilo
                                                                Service</a>
                                                            <span class="text-muted">Analytics &amp; Requirement Study</span>
                                                        </div>
                                                        <!--end::Text-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex align-items-center mb-6">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-40 symbol-light-info mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-info">
																		<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Shield-user.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24"
                                                                                      height="24"/>
																				<path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z"
                                                                                      fill="#000000" opacity="0.3"/>
																				<path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z"
                                                                                      fill="#000000" opacity="0.3"/>
																				<path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z"
                                                                                      fill="#000000" opacity="0.3"/>
																			</g>
																		</svg>
                                                                        <!--end::Svg Icon-->
																	</span>
																</span>
                                                        </div>
                                                        <!--end::Symbol-->
                                                        <!--begin::Text-->
                                                        <div class="d-flex flex-column font-weight-bold">
                                                            <a href="#"
                                                               class="text-dark text-hover-primary mb-1 font-size-lg">Bravia
                                                                SAAS</a>
                                                            <span class="text-muted">Reporting Application</span>
                                                        </div>
                                                        <!--end::Text-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex align-items-center mb-6">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-40 symbol-light-danger mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-danger">
																		<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Mail-notification.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24"
                                                                                      height="24"/>
																				<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                                                      fill="#000000"/>
																				<circle fill="#000000" opacity="0.3"
                                                                                        cx="19.5" cy="17.5" r="2.5"/>
																			</g>
																		</svg>
                                                                        <!--end::Svg Icon-->
																	</span>
																</span>
                                                        </div>
                                                        <!--end::Symbol-->
                                                        <!--begin::Text-->
                                                        <div class="d-flex flex-column font-weight-bold">
                                                            <a href="#"
                                                               class="text-dark text-hover-primary mb-1 font-size-lg">Express
                                                                Wind</a>
                                                            <span class="text-muted">Software Analytics &amp; Design</span>
                                                        </div>
                                                        <!--end::Text-->
                                                    </div>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <div class="d-flex align-items-center mb-6">
                                                        <!--begin::Symbol-->
                                                        <div class="symbol symbol-40 symbol-light-success mr-5">
																<span class="symbol-label">
																	<span class="svg-icon svg-icon-lg svg-icon-white">
																		<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Bucket.svg-->
																		<svg xmlns="http://www.w3.org/2000/svg"
                                                                             xmlns:xlink="http://www.w3.org/1999/xlink"
                                                                             width="24px" height="24px"
                                                                             viewBox="0 0 24 24" version="1.1">
																			<g stroke="none" stroke-width="1"
                                                                               fill="none" fill-rule="evenodd">
																				<rect x="0" y="0" width="24"
                                                                                      height="24"/>
																				<path d="M5,5 L5,15 C5,15.5948613 5.25970314,16.1290656 5.6719139,16.4954176 C5.71978107,16.5379595 5.76682388,16.5788906 5.81365532,16.6178662 C5.82524933,16.6294602 15,7.45470952 15,7.45470952 C15,6.9962515 15,6.17801499 15,5 L5,5 Z M5,3 L15,3 C16.1045695,3 17,3.8954305 17,5 L17,15 C17,17.209139 15.209139,19 13,19 L7,19 C4.790861,19 3,17.209139 3,15 L3,5 C3,3.8954305 3.8954305,3 5,3 Z"
                                                                                      fill="#000000" fill-rule="nonzero"
                                                                                      transform="translate(10.000000, 11.000000) rotate(-315.000000) translate(-10.000000, -11.000000)"/>
																				<path d="M20,22 C21.6568542,22 23,20.6568542 23,19 C23,17.8954305 22,16.2287638 20,14 C18,16.2287638 17,17.8954305 17,19 C17,20.6568542 18.3431458,22 20,22 Z"
                                                                                      fill="#000000" opacity="0.3"/>
																			</g>
																		</svg>
                                                                        <!--end::Svg Icon-->
																	</span>
																</span>
                                                        </div>
                                                        <!--end::Symbol-->
                                                        <!--begin::Text-->
                                                        <div class="d-flex flex-column font-weight-bold">
                                                            <a href="#"
                                                               class="text-dark text-hover-primary mb-1 font-size-lg">Bruk
                                                                Fitness</a>
                                                            <span class="text-muted">Web Design &amp; Development</span>
                                                        </div>
                                                        <!--end::Text-->
                                                    </div>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Scroll-->
                                                <!--begin::Action-->
                                                <div class="d-flex flex-center pt-7">
                                                    <a href="#"
                                                       class="btn btn-light-primary font-weight-bold text-center">See
                                                        All</a>
                                                </div>
                                                <!--end::Action-->
                                            </div>
                                            <!--end::Tabpane-->
                                            <!--begin::Tabpane-->
                                            <div class="tab-pane" id="topbar_notifications_events" role="tabpanel">
                                                <!--begin::Nav-->
                                                <div class="navi navi-hover scroll my-4" data-scroll="true"
                                                     data-height="300" data-mobile-height="200">
                                                    <!--begin::Item-->
                                                    <a href="#" class="navi-item">
                                                        <div class="navi-link">
                                                            <div class="navi-icon mr-2">
                                                                <i class="flaticon2-line-chart text-success"></i>
                                                            </div>
                                                            <div class="navi-text">
                                                                <div class="font-weight-bold">New report has been
                                                                    received
                                                                </div>
                                                                <div class="text-muted">23 hrs ago</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <a href="#" class="navi-item">
                                                        <div class="navi-link">
                                                            <div class="navi-icon mr-2">
                                                                <i class="flaticon2-paper-plane text-danger"></i>
                                                            </div>
                                                            <div class="navi-text">
                                                                <div class="font-weight-bold">Finance report has been
                                                                    generated
                                                                </div>
                                                                <div class="text-muted">25 hrs ago</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <a href="#" class="navi-item">
                                                        <div class="navi-link">
                                                            <div class="navi-icon mr-2">
                                                                <i class="flaticon2-user flaticon2-line- text-success"></i>
                                                            </div>
                                                            <div class="navi-text">
                                                                <div class="font-weight-bold">New order has been
                                                                    received
                                                                </div>
                                                                <div class="text-muted">2 hrs ago</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <a href="#" class="navi-item">
                                                        <div class="navi-link">
                                                            <div class="navi-icon mr-2">
                                                                <i class="flaticon2-pin text-primary"></i>
                                                            </div>
                                                            <div class="navi-text">
                                                                <div class="font-weight-bold">New customer is
                                                                    registered
                                                                </div>
                                                                <div class="text-muted">3 hrs ago</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <a href="#" class="navi-item">
                                                        <div class="navi-link">
                                                            <div class="navi-icon mr-2">
                                                                <i class="flaticon2-sms text-danger"></i>
                                                            </div>
                                                            <div class="navi-text">
                                                                <div class="font-weight-bold">Application has been
                                                                    approved
                                                                </div>
                                                                <div class="text-muted">3 hrs ago</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <a href="#" class="navi-item">
                                                        <div class="navi-link">
                                                            <div class="navi-icon mr-2">
                                                                <i class="flaticon2-pie-chart-3 text-warning"></i>
                                                            </div>
                                                            <div class="navinavinavi-text">
                                                                <div class="font-weight-bold">New file has been
                                                                    uploaded
                                                                </div>
                                                                <div class="text-muted">5 hrs ago</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <a href="#" class="navi-item">
                                                        <div class="navi-link">
                                                            <div class="navi-icon mr-2">
                                                                <i class="flaticon-pie-chart-1 text-info"></i>
                                                            </div>
                                                            <div class="navi-text">
                                                                <div class="font-weight-bold">New user feedback
                                                                    received
                                                                </div>
                                                                <div class="text-muted">8 hrs ago</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <a href="#" class="navi-item">
                                                        <div class="navi-link">
                                                            <div class="navi-icon mr-2">
                                                                <i class="flaticon2-settings text-success"></i>
                                                            </div>
                                                            <div class="navi-text">
                                                                <div class="font-weight-bold">System reboot has been
                                                                    successfully completed
                                                                </div>
                                                                <div class="text-muted">12 hrs ago</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <a href="#" class="navi-item">
                                                        <div class="navi-link">
                                                            <div class="navi-icon mr-2">
                                                                <i class="flaticon-safe-shield-protection text-primary"></i>
                                                            </div>
                                                            <div class="navi-text">
                                                                <div class="font-weight-bold">New order has been
                                                                    placed
                                                                </div>
                                                                <div class="text-muted">15 hrs ago</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <a href="#" class="navi-item">
                                                        <div class="navi-link">
                                                            <div class="navi-icon mr-2">
                                                                <i class="flaticon2-notification text-primary"></i>
                                                            </div>
                                                            <div class="navi-text">
                                                                <div class="font-weight-bold">Company meeting canceled
                                                                </div>
                                                                <div class="text-muted">19 hrs ago</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <a href="#" class="navi-item">
                                                        <div class="navi-link">
                                                            <div class="navi-icon mr-2">
                                                                <i class="flaticon2-fax text-success"></i>
                                                            </div>
                                                            <div class="navi-text">
                                                                <div class="font-weight-bold">New report has been
                                                                    received
                                                                </div>
                                                                <div class="text-muted">23 hrs ago</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <a href="#" class="navi-item">
                                                        <div class="navi-link">
                                                            <div class="navi-icon mr-2">
                                                                <i class="flaticon-download-1 text-danger"></i>
                                                            </div>
                                                            <div class="navi-text">
                                                                <div class="font-weight-bold">Finance report has been
                                                                    generated
                                                                </div>
                                                                <div class="text-muted">25 hrs ago</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <a href="#" class="navi-item">
                                                        <div class="navi-link">
                                                            <div class="navi-icon mr-2">
                                                                <i class="flaticon-security text-warning"></i>
                                                            </div>
                                                            <div class="navi-text">
                                                                <div class="font-weight-bold">New customer comment
                                                                    recieved
                                                                </div>
                                                                <div class="text-muted">2 days ago</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!--end::Item-->
                                                    <!--begin::Item-->
                                                    <a href="#" class="navi-item">
                                                        <div class="navi-link">
                                                            <div class="navi-icon mr-2">
                                                                <i class="flaticon2-analytics-1 text-success"></i>
                                                            </div>
                                                            <div class="navi-text">
                                                                <div class="font-weight-bold">New customer is
                                                                    registered
                                                                </div>
                                                                <div class="text-muted">3 days ago</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                    <!--end::Item-->
                                                </div>
                                                <!--end::Nav-->
                                            </div>
                                            <!--end::Tabpane-->
                                            <!--begin::Tabpane-->
                                            <div class="tab-pane" id="topbar_notifications_logs" role="tabpanel">
                                                <!--begin::Nav-->
                                                <div class="d-flex flex-center text-center text-muted min-h-200px">All
                                                    caught up!
                                                    <br/>No new notifications.
                                                </div>
                                                <!--end::Nav-->
                                            </div>
                                            <!--end::Tabpane-->
                                        </div>
                                        <!--end::Content-->
                                    </form>
                                </div>
                                <!--end::Dropdown-->
                            </div>
                            <!--end::Notifications-->
                            <!--begin::User-->
                            <div class="topbar-item">
                                <div class="btn btn-icon btn-icon-mobile w-auto btn-clean d-flex align-items-center btn-lg px-2"
                                     id="kt_quick_user_toggle">
                                    <span class="text-muted font-weight-bold font-size-base d-none d-md-inline mr-1">Hi,</span>
                                    <span class="text-dark-50 font-weight-bolder font-size-base d-none d-md-inline mr-3">{{Auth::user()->name}}</span>
                                    <span class="symbol symbol-lg-35 symbol-25 symbol-light-success">
											<span class="symbol-label font-size-h5 font-weight-bold">{{strtoupper(Auth::user()->name[0])}}</span>
										</span>
                                </div>
                            </div>
                            <!--end::User-->
                        </div>
                        <!--end::Topbar-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Header-->
                <!--begin::Content-->
                <div class="content d-flex flex-column flex-column-fluid" id="kt_content">

                    @yield('content')

                </div>
                <!--end::Content-->
                <!--begin::Footer-->
                <div class="footer bg-white py-4 d-flex flex-lg-column" id="kt_footer">
                    <!--begin::Container-->
                    <div class="container-fluid d-flex flex-column flex-md-row align-items-center justify-content-between">
                        <!--begin::Copyright-->
                        <div class="text-dark order-2 order-md-1">
                            <span class="text-muted font-weight-bold mr-2">2020©</span>
                            <a href="http://keenthemes.com/metronic" target="_blank"
                               class="text-dark-75 text-hover-primary">Better9ja</a>
                        </div>
                        <!--end::Copyright-->
                        <!--begin::Nav-->
                        <div class="nav nav-dark">
                            <a href="{{route('how-it-works')}}" target="_blank"
                               class="nav-link pl-0 pr-5">How It Works</a>
                            <a href="{{route('contact-us')}}" target="_blank"
                               class="nav-link pl-0 pr-0">Contact</a>
                        </div>
                        <!--end::Nav-->
                    </div>
                    <!--end::Container-->
                </div>
                <!--end::Footer-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::Main-->
    <!-- begin::User Panel-->
    <div id="kt_quick_user" class="offcanvas offcanvas-right p-10">
        <!--begin::Header-->
        <div class="offcanvas-header d-flex align-items-center justify-content-between pb-5">
            <h3 class="font-weight-bold m-0">User Profile
                <small class="text-muted font-size-sm ml-2">12 messages</small>
            </h3>
            <a href="#" class="btn btn-xs btn-icon btn-light btn-hover-primary" id="kt_quick_user_close">
                <i class="ki ki-close icon-xs text-muted"></i>
            </a>
        </div>
        <!--end::Header-->
        <!--begin::Content-->
        <div class="offcanvas-content pr-5 mr-n5">
            <!--begin::Header-->
            <div class="d-flex align-items-center mt-5">
                <div class="symbol symbol-100 mr-5">
                    <div class="symbol-label"
                         style="background-image:url('../../uploads/{{$user->photo ?? '../../images/logo/better9ja_icon.png'}}')"></div>
                    <i class="symbol-badge bg-success"></i>
                </div>
                <div class="d-flex flex-column">
                    <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">James Jones</a>
                    <div class="text-muted mt-1">Application Developer</div>
                    <div class="navi mt-2">
                        <a href="#" class="navi-item">
								<span class="navi-link p-0 pb-2">
									<span class="navi-icon mr-1">
										<span class="svg-icon svg-icon-lg svg-icon-primary">
											<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Communication/Mail-notification.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"/>
													<path d="M21,12.0829584 C20.6747915,12.0283988 20.3407122,12 20,12 C16.6862915,12 14,14.6862915 14,18 C14,18.3407122 14.0283988,18.6747915 14.0829584,19 L5,19 C3.8954305,19 3,18.1045695 3,17 L3,8 C3,6.8954305 3.8954305,6 5,6 L19,6 C20.1045695,6 21,6.8954305 21,8 L21,12.0829584 Z M18.1444251,7.83964668 L12,11.1481833 L5.85557487,7.83964668 C5.4908718,7.6432681 5.03602525,7.77972206 4.83964668,8.14442513 C4.6432681,8.5091282 4.77972206,8.96397475 5.14442513,9.16035332 L11.6444251,12.6603533 C11.8664074,12.7798822 12.1335926,12.7798822 12.3555749,12.6603533 L18.8555749,9.16035332 C19.2202779,8.96397475 19.3567319,8.5091282 19.1603533,8.14442513 C18.9639747,7.77972206 18.5091282,7.6432681 18.1444251,7.83964668 Z"
                                                          fill="#000000"/>
													<circle fill="#000000" opacity="0.3" cx="19.5" cy="17.5" r="2.5"/>
												</g>
											</svg>
                                            <!--end::Svg Icon-->
										</span>
									</span>
									<span class="navi-text text-muted text-hover-primary">jm@softplus.com</span>
								</span>
                        </a>
                        <a href="#" class="btn btn-sm btn-light-primary font-weight-bolder py-2 px-5">Sign Out</a>
                    </div>
                </div>
            </div>
            <!--end::Header-->
        </div>
        <!--end::Content-->
    </div>
    <!-- end::User Panel-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop bg-success">
			<span class="svg-icon svg-icon-white">
				<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Navigation/Up-2.svg-->
				<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px"
                     height="24px" viewBox="0 0 24 24" version="1.1">
					<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
						<polygon points="0 0 24 0 24 24 0 24"/>
						<rect fill="#000000" opacity="0.3" x="11" y="10" width="2" height="10" rx="1"/>
						<path d="M6.70710678,12.7071068 C6.31658249,13.0976311 5.68341751,13.0976311 5.29289322,12.7071068 C4.90236893,12.3165825 4.90236893,11.6834175 5.29289322,11.2928932 L11.2928932,5.29289322 C11.6714722,4.91431428 12.2810586,4.90106866 12.6757246,5.26284586 L18.6757246,10.7628459 C19.0828436,11.1360383 19.1103465,11.7686056 18.7371541,12.1757246 C18.3639617,12.5828436 17.7313944,12.6103465 17.3242754,12.2371541 L12.0300757,7.38413782 L6.70710678,12.7071068 Z"
                              fill="#000000" fill-rule="nonzero"/>
					</g>
				</svg>
                <!--end::Svg Icon-->
			</span>
    </div>
    <!--end::Scrolltop-->
</div>
<!--end::Demo Panel-->
<script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script>
<!--begin::Global Config(global config for global JS scripts)-->
<script>var KTAppSettings = {
        "breakpoints": {"sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400},
        "colors": {
            "theme": {
                "base": {
                    "white": "#ffffff",
                    "primary": "#3699FF",
                    "secondary": "#E5EAEE",
                    "success": "#1BC5BD",
                    "info": "#8950FC",
                    "warning": "#FFA800",
                    "danger": "#F64E60",
                    "light": "#E4E6EF",
                    "dark": "#181C32"
                },
                "light": {
                    "white": "#ffffff",
                    "primary": "#E1F0FF",
                    "secondary": "#EBEDF3",
                    "success": "#C9F7F5",
                    "info": "#EEE5FF",
                    "warning": "#FFF4DE",
                    "danger": "#FFE2E5",
                    "light": "#F3F6F9",
                    "dark": "#D6D6E0"
                },
                "inverse": {
                    "white": "#ffffff",
                    "primary": "#ffffff",
                    "secondary": "#3F4254",
                    "success": "#ffffff",
                    "info": "#ffffff",
                    "warning": "#ffffff",
                    "danger": "#ffffff",
                    "light": "#464E5F",
                    "dark": "#ffffff"
                }
            },
            "gray": {
                "gray-100": "#F3F6F9",
                "gray-200": "#EBEDF3",
                "gray-300": "#E4E6EF",
                "gray-400": "#D1D3E0",
                "gray-500": "#B5B5C3",
                "gray-600": "#7E8299",
                "gray-700": "#5E6278",
                "gray-800": "#3F4254",
                "gray-900": "#181C32"
            }
        },
        "font-family": "Poppins"
    };</script>
<!--end::Global Config-->
<!--begin::Global Theme Bundle(used by all pages)-->
<script src="{{asset('investor/theme/html/demo1/dist/assets/plugins/global/plugins.bundlec3e8.js?v=7.0.6')}}"></script>
<script src="{{asset('investor/theme/html/demo1/dist/assets/plugins/custom/prismjs/prismjs.bundlec3e8.js?v=7.0.6')}}"></script>
<script src="{{asset('investor/theme/html/demo1/dist/assets/js/scripts.bundlec3e8.js?v=7.0.6')}}"></script>
<!--end::Global Theme Bundle-->
<!--begin::Page Vendors(used by this page)-->
<script src="{{asset('investor/theme/html/demo1/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundlec3e8.js?v=7.0.6')}}"></script>
<!--end::Page Vendors-->
<!--begin::Page Scripts(used by this page)-->
<script src="{{asset('investor/theme/html/demo1/dist/assets/js/pages/widgetsc3e8.js?v=7.0.6')}}"></script>
<!--end::Page Scripts-->

<script src="{{asset('js/scripts.js')}}"></script>
</body>
<!--end::Body-->

<!-- Mirrored from preview.keenthemes.com/metronic/demo1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Jul 2020 16:29:04 GMT -->
</html>
