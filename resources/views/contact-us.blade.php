<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Mirrored from specthemes.com/lumire/demo-preview/page-contact-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Jul 2020 19:50:14 GMT -->
<head><title>Contact Us</title>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="{{asset('home/img/logos/logo-shortcut.png')}}"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/themify-icons.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/fontawesome-all.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/icomoon.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/plugins.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{asset('home/css/rev-settings.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/styles.css')}}" id="main_styles">
    <link rel="shortcut icon" href="{{asset('images/logo/better.ico')}}">

    <style>
        .features-box-2-icon i{
            color: #26b575;
        }

        .features-box-2-icon{
            background-image: linear-gradient(to bottom, rgb(120 222 175 / 15%), transparent);
        }

        .section-heading-line{
            background: #26b575 !important;
        }

        .section-heading small{
            color: #26b575 !important;
        }

        .float{
            position:fixed;
            width:60px;
            height:60px;
            bottom:140px;
            right:35px;
            background-color:#25d366;
            color:#FFF;
            border-radius:50px;
            text-align:center;
            font-size:30px;
            box-shadow: 2px 2px 3px #999;
            z-index:100;
        }

        .my-float{
            margin-top:16px;
        }

        #nav-transparent .navigation{
            padding-top: 1px;
        }

        .button-primary{
            background: #26b575 !important;
        }

        .button-primary:hover{
            background: #de1919 !important;
        }

        #nav-transparent .nav-menu > li:hover > a, #nav-transparent .nav-menu > li.focus > a
        {
            color: #26b575 !important;
        }

        .nav-menu > li:hover a, .nav-menu > li.focus > a
        {
            color: #26b575 !important;
        }

        .footer-news strong i{
            color: #26b575;
        }

        .footer-subscribe-form button:hover{
            color: #26b575;
        }

        .footer-subscribe-form button{
            background: #26b575;
        }

        a:hover{
            color: #26b575 !important;
        }
    </style>
</head>
<body>
<div id="preloader">
    <div class="lds-ellipsis">
        <img src="{{asset('images/logo/loader.gif')}}" alt="">
    </div>
</div>
<a href="https://chat.whatsapp.com/EecurBLdt6O7xgsLgNHVUP" class="float" target="_blank">
    <i class="fab fa-whatsapp my-float"></i>
</a>
<div id="top-bar" class="hidden-md-down">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-12">
                <ul class="top-bar-info">
                    <li><i class="fas fa-phone"></i> Phone: 09079798730</li>
                    <li><i class="fa fa-envelope"></i>Email: support@better9ja.com</li>
                </ul>
            </div>
            <div class="col-md-3 col-12">
                <ul class="social-icons hidden-sm">
                    <li><a href="https://chat.whatsapp.com/EecurBLdt6O7xgsLgNHVUP"><i class="fab fa-whatsapp"></i></a></li>
                    <li><a href="http://t.me/Better9ja"><i class="fab fa-telegram"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<header>
    <nav id="navigation4" class="container navigation">
        <div class="nav-header"><a class="nav-brand" href="/"> <img src="{{asset('images/logo/better_9ja.png')}}" alt="logo"
                                                                    class="main-logo" id="light_logo"> </a>
            <div class="nav-toggle"></div>
        </div>
        <div class="nav-menus-wrapper">
            <ul class="nav-menu align-to-right">
                <li><a href="/">Home</a></li>
                <li><a href="{{route('how-it-works')}}">How It Works</a></li>
                <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                <li><a href="{{route('login')}}">Login</a></li>
                <li><a href="{{route('register')}}">Sign Up</a></li>
            </ul>


        </div>
    </nav>
</header>
<div class="breadcrumb-section jarallax pixels-bg" data-jarallax data-speed="0.6">
    <div class="container text-center"><h1>Contact Us</h1>
        <ul>
            <li><a href="{{route('main')}}">Home</a></li>
            <li><a href="#">Contact Us </a></li>
        </ul>
    </div>
</div>
<div class="container-fluid pl-0 pr-0">
    @if(session('status'))
        <div class="alert alert-success text-center">
            {{session('status')}}
        </div>
    @endif
    <div class="row no-gutters">
        <div class="col-md-12 col-sm-12 col-12">
            <div class="padding-10-perc">
                <div class="section-heading text-left">
                    <small class="grey-color font-size-20 font-weight-normal">Get In Touch</small>
                    <h3 class="semi-bold font-size-32"></h3>
                    <div class="section-heading-line line-thin"></div>
                </div>
                <form method="post" action="{{url('/contact/send')}}" class="primary-form-3 mt-45">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-12"><input type="text" name="name" placeholder="Name*"
                            required></div>
                        <div class="col-md-6 col-sm-6 col-12"><input type="text" name="phone" required
                                                                     placeholder="Phone Number*"></div>
                        <div class="col-12"><select name="subject" required>
                                <option>Subject</option>
                                <option>Development Manager</option>
                                <option>Project Lead</option>
                                <option>Solutions Analyst</option>
                            </select></div>
                        <div class="col-12"><textarea placeholder="Message*" name="message" required></textarea></div>
                    </div>
                    <div>
                        <button type="submit" class="button-md button-primary text-uppercase ml-0">Send Message</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<footer>
    <div class="footer-1">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12"><a href="#"><img src="{{asset('images/logo/better_9ja.png')}}" id="footer_logo"
                                                                       alt="logo" width="170"></a>
                    <p class="mt-20">Walking to financial  freedom.</p>
                    <ul class="social-links-footer">
                        <li><a href="https://chat.whatsapp.com/EecurBLdt6O7xgsLgNHVUP"><i class="fab fa-whatsapp"></i></a></li>
                        <li><a href="http://t.me/Better9ja"><i class="fab fa-telegram"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 col-12"><h2>Extra Links</h2>
                    <div class="row mt-25">
                        <div class="col-md-6 col-sm-6">
                            <ul class="footer-nav">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Services</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-12"><h2>Customer Helpline</h2>
                    <ul class="footer-news mt-25">
                        <li><a href="tel:09079798730">09079798730</a> <strong><i
                                        class="fa fa-map-marker-alt"></i> Nigeria</strong></li>
                        <li><a href="tel:+971557131545">+971557131545</a> <strong><i
                                        class="fa fa-map-marker-alt"></i> UAE</strong></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 col-12"><h2>Subscribe</h2>
                    <form class="footer-subscribe-form mt-25">
                        <div class="d-table full-width">
                            <div class="d-table-cell"><input type="text" placeholder="Your Email adress"></div>
                            <div class="d-table-cell">
                                <button type="submit"><i class="fas fa-envelope"></i></button>
                            </div>
                        </div>
                    </form>
                    <p class="mt-10">Get latest updates and offers.</p></div>
            </div>
            <div class="footer-1-bar"><p>Better9ja © 2020. All Rights Reserved.</p></div>
        </div>
    </div>
</footer>
<a href="#" class="scroll-to-top"><i class="fas fa-chevron-up"></i></a>
<script src="{{asset('home/js/jquery.min.js')}}"></script>
<script src="{{asset('home/js/plugins.js')}}"></script>
<script src="{{asset('home/js/navigation.js')}}"></script>
<script src="{{asset('home/js/navigation.fixed.js')}}"></script>
<script src="{{asset('home/js/map.js')}}"></script>
<script src="{{asset('home/js/rev-slider/jquery.themepunch.tools.min.js')}}"></script>
<script src="{{asset('home/js/rev-slider/jquery.themepunch.revolution.min.js')}}"></script>
<script src="{{asset('home/js/rev-slider/revolution.extension.actions.min.js')}}"></script>
<script src="{{asset('home/js/rev-slider/revolution.extension.carousel.min.js')}}"></script>
<script src="{{asset('home/js/rev-slider/revolution.extension.kenburn.min.js')}}"></script>
<script src="{{asset('home/js/rev-slider/revolution.extension.layeranimation.min.js')}}"></script>
<script src="{{asset('home/js/rev-slider/revolution.extension.migration.min.js')}}"></script>
<script src="{{asset('home/js/rev-slider/revolution.extension.parallax.min.js')}}"></script>
<script src="{{asset('home/js/rev-slider/revolution.extension.navigation.min.js')}}"></script>
<script src="{{asset('home/js/rev-slider/revolution.extension.slideanims.min.js')}}"></script>
<script src="{{asset('home/js/rev-slider/revolution.extension.video.min.js')}}"></script>
<script src="{{asset('home/js/main.js')}}"></script>
</body>
<!-- Mirrored from specthemes.com/lumire/demo-preview/page-contact-1.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Jul 2020 19:50:14 GMT -->
</html>