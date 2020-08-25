
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="keywords" content="Bootstrap, Landing page, Template, Registration, Landing">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="author" content="Grayrids">
    <title>Better9ja| Home</title>

    <link rel="stylesheet" href="{{asset('home/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('home/assets/css/line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('home/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('home/assets/css/owl.theme.default.css')}}">
    <link rel="stylesheet" href="{{asset('home/assets/css/slicknav.min.css')}}">
    <link rel="stylesheet" href="{{asset('home/assets/css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('home/assets/css/main.css')}}">
    <link rel="stylesheet" href="{{asset('home/assets/css/responsive.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/fontawesome-all.css')}}">

    <style>
        .float {
            position: fixed;
            width: 60px;
            height: 60px;
            bottom: 140px;
            right: 35px;
            background-color: #25d366;
            color: #FFF;
            border-radius: 50px;
            text-align: center;
            font-size: 30px;
            box-shadow: 2px 2px 3px #999;
            z-index: 100;
        }

        .my-float {
            margin-top: 16px;
        }

        /*.slicknav_menu > a.image-responsive{*/
        /*    width: 50%;*/
        /*}*/
    </style>
</head>
<body>

<header id="home" class="hero-area">

    <nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
        <div class="container">
            <div class="theme-header clearfix">

                <div class="navbar-header">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        <span class="lni-menu"></span>
                        <span class="lni-menu"></span>
                        <span class="lni-menu"></span>
                    </button>
                    <a href="/" class="navbar-brand"><img src="{{asset('images/logo/better_9ja.png')}}" width="150" alt=""></a>
                </div>
                <div class="collapse navbar-collapse" id="main-navbar">
                    <ul class="navbar-nav mr-auto w-100 justify-content-end">
                        <li class="nav-item active">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                How It Works
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contact.html">
                                Contact
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">Sign In</a>
                        </li>
                        <li class="button-group">
                            <a href="{{route('login')}}" class="button btn btn-common">Sign Up</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="mobile-menu" data-logo="{{asset('images/logo/better_9ja.png')}}"></div>
    </nav>

    <div class="container">
        <div class="row space-100">
            <div class="col-lg-7 col-md-12 col-xs-12">
                <div class="contents">
                    <h2 class="head-title">Register your income <br> above the rest</h2>
                    <p>Join thousands of members, emjoy safe 50% returns.</p>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-xs-12">
                <div class="intro-img">
                    <img src="{{asset('home/assets/img/intro.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>
</header>


    @yield('content')


<footer>

    <section class="footer-Content">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-xs-12">
                    <div class="widget">
                        <div class="footer-logo"><img src="{{asset('images/logo/better_9ja.png')}}" width="150" alt=""></div>
                        <div class="textwidget">
                            <p>Walking in financial freedom.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-12">
                    <div class="widget">
                        <h3 class="block-title">Quick Links</h3>
                        <ul class="menu">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Support</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-12">
                    <div class="widget">
                        <h3 class="block-title">Customer Helpline</h3>
                        <ul class="menu">
                            <li><a href="tel:09079798730">09079798730</a> <strong><i
                                            class="fa fa-map-marker-alt"></i> Nigeria</strong></li>
                            <li><a href="tel:+971557131545">+971557131545</a> <strong><i
                                            class="fa fa-map-marker-alt"></i> UAE</strong></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-xs-12">
                    <div class="widget">
                        <h3 class="block-title">Subscribe Now</h3>
                        <form method="post" id="subscribe-form" name="subscribe-form" class="validate">
                            <div class="form-group is-empty">
                                <input type="email" value="" name="Email" class="form-control" id="EMAIL" placeholder="Enter Email..." required="">
                                <button type="submit" name="subscribe" id="subscribes" class="btn btn-common sub-btn"><i class="lni-envelope"></i></button>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                        <ul class="mt-3 footer-social">
                            <li><a class="facebook" href="#"><i class="lni-facebook-filled"></i></a></li>
                            <li><a class="twitter" href="#"><i class="lni-twitter-filled"></i></a></li>
                            <li><a class="linkedin" href="#"><i class="lni-linkedin-fill"></i></a></li>
                            <li><a class="google-plus" href="#"><i class="lni-google-plus"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>


        <a href="https://chat.whatsapp.com/EecurBLdt6O7xgsLgNHVUP" class="float" target="_blank">
            <i class="bx bxl-whatsapp my-float"></i>
        </a>
    </section>


    <div id="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="site-info text-center">
                        <p>Designed and Developed by <a href="https://uideck.com" rel="nofollow">UIdeck</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</footer>


<a href="#" class="back-to-top">
    <i class="lni-arrow-up"></i>
</a>

<div id="preloader">
    <div class="loader" id="loader-1"></div>
</div>


<script src="{{asset('home/assets/js/jquery-min.js')}}"></script>
<script src="{{asset('home/assets/js/popper.min.js')}}"></script>
<script src="{{asset('home/assets/js/bootstrap.min.js')}}"></script>
{{--<script src="{{asset('home/assets/js/color-switcher.js')}}"></script>--}}
<script src="{{asset('home/assets/js/owl.carousel.min.js')}}"></script>
<script src="{{asset('home/assets/js/jquery.slicknav.js')}}"></script>
<script src="{{asset('home/assets/js/jquery.counterup.min.js')}}"></script>
<script src="{{asset('home/assets/js/waypoints.min.js')}}"></script>
<script src="{{asset('home/assets/js/form-validator.min.js')}}"></script>
<script src="{{asset('home/assets/js/contact-form-script.js')}}"></script>
<script src="{{asset('home/assets/js/main.js')}}"></script>
</body>
</html>