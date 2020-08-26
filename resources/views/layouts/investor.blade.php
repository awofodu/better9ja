<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->

<!-- Mirrored from preview.keenthemes.com/metronic/demo1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Jul 2020 16:28:46 GMT -->
<!-- Added by HTTrack -->
<meta http-equiv="content-type" content="text/html;charset=UTF-8"/><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8"/>

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Better9ja | Dashboard</title>

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
        .aside-menu .menu-nav > .menu-item.menu-item-active > .menu-link{
            background-color: #271d15e0 !important;
        }
        .aside-menu .menu-nav > .menu-item.menu-item-open > .menu-link{
            background-color: #271d15e0 !important;
        }
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
        /*a.menu-item-active{*/
        /*    background-color: #2f1e0fe0 !important;*/
        /*}*/
        /*.aside-menu .menu-nav > .menu-item.menu-item-active > .menu-link{*/
        /*    background-color: #af1a1a !important;*/
        /*}*/
        /*.aside-menu .menu-nav > .menu-item.menu-item-active > .menu-link .menu-icon.svg-icon svg g [fill]{*/
        /*    fill: #008751;*/
        /*}*/
        /*.aside-menu .menu-nav > .menu-item.menu-item-active > .menu-link .menu-icon{*/
        /*    color: #008751;*/
        /*}*/
        /*.btn-primary{*/
        /*    background-color:#008751 !important;*/
        /*    border-color:#008751 !important;*/
        /*}*/
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
            <img alt="Logo" src="{{asset('images/logo/better_9ja.png')}}" width="130"/>
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
								<path style="fill: #541b1b;" d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                      fill="#000000" fill-rule="nonzero" opacity="0.3"/>
								<path style="fill: #541b1b;"  d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
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
                        <img alt="Logo" src="{{asset('images/logo/better_9ja.png')}}" width="130"/>
                    </a>
                    <!--end::Logo-->
                </div>
                <!--end::Brand-->
                <!--begin::Aside Menu-->
                <div class="aside-menu-wrapper flex-column-fluid" id="kt_aside_menu_wrapper">
                    <!--begin::Menu Container-->
                    <div id="kt_aside_menu" class="aside-menu my-4" data-menu-vertical="1" data-menu-scroll="1"
                         data-menu-dropdown-timeout="500" style="height: 100% !important;">
                        <!--begin::Menu Nav-->
                        <ul class="menu-nav">
                            <li class="menu-item menu-item-active" aria-haspopup="true">
                                <router-link to="/dashboard" class="menu-link">
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
                            <li class="menu-item {{Request::is('investments') ? 'menu-item-active' : ''}}"
                                aria-haspopup="true">
                                <router-link to="/investments" class="menu-link">
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
                            <li class="menu-item {{Request::is('withdrawals') ? 'menu-item-active' : ''}}"
                                aria-haspopup="true">
                                <router-link to="/withdrawals" class="menu-link">
										<span class="svg-icon menu-icon svg-icon-white">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg-->
                                            <svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <circle fill="#000000" opacity="0.3" cx="20.5" cy="12.5" r="1.5"/>
                                                    <rect fill="#000000" opacity="0.3"
                                                          transform="translate(12.000000, 6.500000) rotate(-15.000000) translate(-12.000000, -6.500000) "
                                                          x="3"
                                                          y="3" width="18" height="7" rx="1"/>
                                                    <path d="M22,9.33681558 C21.5453723,9.12084552 21.0367986,9 20.5,9 C18.5670034,9 17,10.5670034 17,12.5 C17,14.4329966 18.5670034,16 20.5,16 C21.0367986,16 21.5453723,15.8791545 22,15.6631844 L22,18 C22,19.1045695 21.1045695,20 20,20 L4,20 C2.8954305,20 2,19.1045695 2,18 L2,6 C2,4.8954305 2.8954305,4 4,4 L20,4 C21.1045695,4 22,4.8954305 22,6 L22,9.33681558 Z"
                                                          fill="#000000"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
										</span>
                                    <span class="menu-text">Withdrawals</span>
                                </router-link>
                            </li>
                            <li class="menu-item {{Request::is('transactions') ? 'menu-item-active' : ''}}"
                                aria-haspopup="true">
                                <router-link to="/transactions" class="menu-link">
                                    <span class="svg-icon menu-icon svg-icon-white">
											<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Media/Equalizer.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
												<g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
													<rect x="0" y="0" width="24" height="24"></rect>
													<rect fill="#000000" opacity="0.3" x="13" y="4" width="3"
                                                          height="16" rx="1.5"></rect>
													<rect fill="#000000" x="8" y="9" width="3" height="11"
                                                          rx="1.5"></rect>
													<rect fill="#000000" x="18" y="11" width="3" height="9"
                                                          rx="1.5"></rect>
													<rect fill="#000000" x="3" y="13" width="3" height="7"
                                                          rx="1.5"></rect>
												</g>
											</svg>
                                        <!--end::Svg Icon-->
										</span>
                                    <span class="menu-text">Transactions</span>
                                </router-link>
                            </li>
                            <li class="menu-item {{Request::is('referrals') ? 'menu-item-active' : ''}}"
                                aria-haspopup="true">
                                <router-link to="/referrals" class="menu-link">
										<span class="svg-icon svg-icon-white menu-icon">
											<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                            <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                <rect x="0" y="0" width="24" height="24"/>
                                                <circle fill="#000000" opacity="0.3" cx="8" cy="16" r="2"/>
                                                <path d="M9,19 L5.00096004,19 C4.96315967,14.3606423 6.04480907,10.9610276 8.41240045,8.89946335 C10.6738787,6.93029637 13.8932784,5.99355491 18.0040306,6.00000246 L17.9977567,9.99999754 C14.7751756,9.99494305 12.4778257,10.6633977 11.0391383,11.9161251 C9.70656404,13.0764552 8.97080234,15.4164797 9,19 Z"
                                                      fill="#000000" fill-rule="nonzero"
                                                      transform="translate(11.502017, 12.499985) scale(-1, 1) translate(-11.502017, -12.499985) "/>
                                            </g>
                                        </svg>
                                            <!--end::Svg Icon-->
										</span>
                                    <span class="menu-text">Referrals</span>
                                </router-link>
                            </li>
                            <li class="menu-item menu-item-submenu menu-item-open" aria-haspopup="true" data-menu-toggle="hover">
                                <a href="javascript:;" class="menu-link menu-toggle">
										<span class="svg-icon svg-icon-white menu-icon">
                                            <!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo1/dist/../src/media/svg/icons/General/User.svg-->
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
                                    <span class="menu-text">My Account</span>
                                    <i class="menu-arrow"></i>
                                </a>
                                <div class="menu-submenu" kt-hidden-height="80" style="">
                                    <i class="menu-arrow"></i>
                                    <ul class="menu-subnav">
                                        <li class="menu-item menu-item-parent" aria-haspopup="true">
												<span class="menu-link">
													<span class="menu-text">My Account</span>
												</span>
                                        </li>
                                        <li class="menu-item {{Request::is('profile') ? 'menu-item-active' : ''}}"
                                            aria-haspopup="true">
                                            <router-link to="/profile" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot text-success">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Profile</span>
                                            </router-link>
                                        </li>
                                        <li class="menu-item {{Request::is('change-password') ? 'menu-item-active' : ''}}"
                                            aria-haspopup="true">
                                            <router-link to="/change-password" class="menu-link">
                                                <i class="menu-bullet menu-bullet-dot text-success">
                                                    <span></span>
                                                </i>
                                                <span class="menu-text">Change Password</span>
                                            </router-link>
                                        </li>
                                    </ul>
                                </div>
                            </li>
                            <li class="menu-item {{Request::is('testimonies') ? 'menu-item-active' : ''}}"
                                aria-haspopup="true">
                                <router-link to="/testimonies" class="menu-link">
										<span class="svg-icon menu-icon svg-icon-white">
											<!--begin::Svg Icon | path:/metronic/theme/html/demo1/dist/assets/media/svg/icons/Design/Layers.svg-->
											<svg xmlns="http://www.w3.org/2000/svg"
                                                 xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px"
                                                 viewBox="0 0 24 24" version="1.1">
                                                <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                    <rect x="0" y="0" width="24" height="24"/>
                                                    <path d="M13.6855025,18.7082217 C15.9113859,17.8189707 18.682885,17.2495635 22,17 C22,16.9325178 22,13.1012863 22,5.50630526 L21.9999762,5.50630526 C21.9999762,5.23017604 21.7761292,5.00632908 21.5,5.00632908 C21.4957817,5.00632908 21.4915635,5.00638247 21.4873465,5.00648922 C18.658231,5.07811173 15.8291155,5.74261533 13,7 C13,7.04449645 13,10.79246 13,18.2438906 L12.9999854,18.2438906 C12.9999854,18.520041 13.2238496,18.7439052 13.5,18.7439052 C13.5635398,18.7439052 13.6264972,18.7317946 13.6855025,18.7082217 Z"
                                                          fill="#000000"/>
                                                    <path d="M10.3144829,18.7082217 C8.08859955,17.8189707 5.31710038,17.2495635 1.99998542,17 C1.99998542,16.9325178 1.99998542,13.1012863 1.99998542,5.50630526 L2.00000925,5.50630526 C2.00000925,5.23017604 2.22385621,5.00632908 2.49998542,5.00632908 C2.50420375,5.00632908 2.5084219,5.00638247 2.51263888,5.00648922 C5.34175439,5.07811173 8.17086991,5.74261533 10.9999854,7 C10.9999854,7.04449645 10.9999854,10.79246 10.9999854,18.2438906 L11,18.2438906 C11,18.520041 10.7761358,18.7439052 10.4999854,18.7439052 C10.4364457,18.7439052 10.3734882,18.7317946 10.3144829,18.7082217 Z"
                                                          fill="#000000" opacity="0.3"/>
                                                </g>
                                            </svg>
                                            <!--end::Svg Icon-->
										</span>
                                    <span class="menu-text">Testimonies</span>
                                </router-link>
                            </li>
                            <li class="menu-item {{Request::is('testimonies') ? 'menu-item-active' : ''}}"
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
                                @if((int)Auth::user()->is_admin === 1)
                                    <div class="topbar-item" data-toggle="dropdown" data-offset="10px,0px">
                                        <a onclick="window.location.href='/admin/dashboard'">
                                            <div class="btn btn-icon btn-clean btn-dropdown btn-lg mr-1 pulse pulse-primary">
                                                <span class="svg-icon svg-icon-white svg-icon-2x"><!--begin::Svg Icon | path:/var/www/preview.keenthemes.com/metronic/releases/2020-07-07-181510/theme/html/demo1/dist/../src/media/svg/icons/Media/Repeat.svg--><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
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
                                @endif
                                <!--end::Toggle-->
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
            <h3 class="font-weight-bold m-0">Investor Profile
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
                    <a href="#" class="font-weight-bold font-size-h5 text-dark-75 text-hover-primary">{{Auth::user()->name}}</a>
                    <div class="text-muted mt-1">{{(int)$user->is_guider === 0 ? 'Regular' : 'Guider'}}</div>
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
									<span class="navi-text text-muted text-hover-primary">{{$user->email}}</span>
								</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--end::Header-->
        </div>
        <!--end::Content-->
    </div>
    <!-- end::User Panel-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop">
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