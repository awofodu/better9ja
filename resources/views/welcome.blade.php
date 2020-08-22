<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Mirrored from specthemes.com/lumire/demo-preview/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Jul 2020 19:41:52 GMT -->
<head><title>Better9ja</title>
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

        .footer-news strong i{
            color: #26b575;
        }

        .footer-subscribe-form button:hover{
            color: #26b575;
        }

        .footer-subscribe-form button{
            background: #26b575;
        }
    </style>
</head>
<body>
<div id="preloader">
    <div class="lds-ellipsis">
        <img src="{{asset('images/logo/loader.gif')}}" alt="">
    </div>
</div>
<a href="https://api.whatsapp.com/send?phone=2349047032306&text=Hello! Importdeals.ng, ." class="float" target="_blank">
    <i class="fab fa-whatsapp my-float"></i>
</a>
<header id="nav-transparent">
    <nav id="navigation4" class="container navigation">
        <div class="nav-header"><a class="nav-brand" href="/"> <img src="{{asset('images/logo/better_9ja.png')}}" alt="logo"
                                                                             class="main-logo" id="light_logo"> <img
                        src="{{asset('images/logo/better_9ja.png')}}" alt="logo" class="main-logo" id="main_logo"></a>
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
<div class="rev_slider_wrapper fs-slider-wrap bg-arrows">
    <div id="rev_slider" class="rev_slider fullscreenbanner">
        <ul>
            <li data-delay="5000" data-transition="parallaxtotop" data-slotamount="7" data-masterspeed="2500"
                data-fsmasterspeed="1000"><img src="{{asset('images/bg1.jpg')}}" alt=""
                                               data-bgposition="right center" data-bgfit="cover"
                                               data-bgrepeat="no-repeat" class="rev-slidebg">
                <div class="slide-title tp-caption tp-resizeme text-left text-center-sm"
                     data-x="['left','left','center','center']" data-hoffset="['0','0','0','0']"
                     data-y="['middle','middle','middle','middle']" data-voffset="['-20','-20', '-150', '-350']"
                     data-fontsize="['70','60', '60', '125']" data-fontweight="600"
                     data-lineheight="['80','70', '70', '135']" data-width="['700','700','650']" data-height="none"
                     data-color="#fff" data-whitespace="normal" data-transform_idle="o:1;"
                     data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
                     data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                     data-mask_in="x:50px;y:0px;s:inherit;e:inherit;"
                     data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                     data-frames='[{"delay":0,"split":"chars","splitdelay":0.05,"speed":2000,"frame":"0","from":"y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                     data-start="500" data-responsive_offset="on" data-elementdelay="0.05">Raise your business above the
                    rest
                </div>
                <div class="slide-subtitle tp-caption tp-resizeme text-left text-center-sm"
                     data-x="['left','left','center','center']" data-hoffset="['0','0','0','0']"
                     data-y="['middle','middle','middle','middle']" data-voffset="['90','90', '15', '15']"
                     data-fontsize="['18', '18', '18', '18']" data-fontweight="300" data-lineheight="['30']"
                     data-width="['1200','1000','550']" data-whitespace="nowrap" data-transform_idle="o:1;"
                     data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1200;e:Power1.easeInOut;"
                     data-transform_out="opacity:0;s:1000;s:1000;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                     data-start="1500" data-color="#fff" data-splitin="none" data-splitout="none">Brand marketing that
                    puts your vision into action! Putting vision into action. <br>Accurate data for precision marketing.
                    Your outsourced marketing team.
                </div>
                <div class="tp-caption rev-btn tp-resizeme slider-btn button-primary" id="slide-1081-layer-13"
                     data-x="['left','left','center','center']" data-hoffset="['0','0','0','0']"
                     data-y="['middle','middle','middle','middle']" data-voffset="['160','160','160','30']"
                     data-fontsize="['15','15','15','15']" data-fontweight="600" data-lineheight="['50','50','50','50']"
                     data-width="['200','200','200','200']" data-height="none" data-whitespace="nowrap"
                     data-start="1500" data-type="button"
                     data-actions='[{"event":"click","action":"scrollbelow","offset":"-70px","delay":"","speed":"2500","ease":"Power1.easeInOut"}]'
                     data-responsive_offset="on" data-splitin="none" data-splitout="none"
                     data-frames='[{"delay":900,"speed":1000,"frame":"0","from":"y:50px;opacity:0;fb:10px;fbr:100;","to":"o:1;fb:0;fbr:100;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;fbr:100;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;fb:0;fbr:110%;","style":"c:rgba(255,255,255,1);bs:solid;bw:0 0 0 0;"}]'
                     data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                     data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="">
                    Learn More
                </div>
            </li>
            <li data-delay="5000" data-transition="parallaxhorizontal" data-slotamount="7" data-masterspeed="2500"
                data-fsmasterspeed="1000"><img src="{{asset('images/bg2.jpg')}}" alt=""
                                               data-bgposition="center right" data-bgfit="cover"
                                               data-bgrepeat="no-repeat" class="rev-slidebg">
                <div class="slide-title tp-caption tp-resizeme text-center"
                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                     data-y="['middle','middle','middle','middle']" data-voffset="['-35','-35', '-150', '-350']"
                     data-fontsize="['70','60', '60', '125']" data-fontweight="600"
                     data-lineheight="['80','70', '70', '135']" data-width="['800','700','650']" data-height="none"
                     data-color="#fff" data-whitespace="normal" data-transform_idle="o:1;"
                     data-transform_in="x:[105%];z:0;rX:45deg;rY:0deg;rZ:90deg;sX:1;sY:1;skX:0;skY:0;s:2000;e:Power2.easeInOut;"
                     data-transform_out="y:[100%];s:1000;e:Power2.easeInOut;s:1000;e:Power2.easeInOut;"
                     data-mask_in="x:50px;y:0px;s:inherit;e:inherit;"
                     data-mask_out="x:inherit;y:inherit;s:inherit;e:inherit;"
                     data-frames='[{"delay":0,"split":"chars","splitdelay":0.05,"speed":2000,"frame":"0","from":"y:[100%];z:0;rZ:-35deg;sX:1;sY:1;skX:0;skY:0;","mask":"x:0px;y:0px;s:inherit;e:inherit;","to":"o:1;","ease":"Power4.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                     data-start="500" data-responsive_offset="on" data-elementdelay="0.05">A marketing company focused
                    on results
                </div>
                <div class="slide-subtitle tp-caption tp-resizeme text-center"
                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                     data-y="['middle','middle','middle','middle']" data-voffset="['75','75', '15', '15']"
                     data-fontsize="['18', '18', '18', '18']" data-fontweight="300" data-lineheight="['30']"
                     data-width="['1200','1000','550']" data-whitespace="nowrap" data-color="#fff"
                     data-transform_idle="o:1;"
                     data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;s:1200;e:Power1.easeInOut;"
                     data-transform_out="opacity:0;s:1000;s:1000;" data-mask_in="x:0px;y:0px;s:inherit;e:inherit;"
                     data-start="1500" data-splitin="none" data-splitout="none">Brand marketing that puts your vision
                    into action! Putting vision into action. <br>Accurate data for precision marketing. Your outsourced
                    marketing team.
                </div>
                <div class="tp-caption rev-btn tp-resizeme slider-btn button-primary" id="slide-1081-layer-14"
                     data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                     data-y="['middle','middle','middle','middle']" data-voffset="['150','150','160','30']"
                     data-fontsize="['15','15','15','15']" data-fontweight="600" data-lineheight="['50','50','50','50']"
                     data-width="['200','200','200','200']" data-height="none" data-whitespace="nowrap"
                     data-start="1500" data-type="button"
                     data-actions='[{"event":"click","action":"scrollbelow","offset":"-70px","delay":"","speed":"2500","ease":"Power1.easeInOut"}]'
                     data-responsive_offset="on" data-splitin="none" data-splitout="none"
                     data-frames='[{"delay":900,"speed":1000,"frame":"0","from":"y:50px;opacity:0;fb:10px;fbr:100;","to":"o:1;fb:0;fbr:100;","ease":"Power4.easeOut"},{"delay":"wait","speed":300,"frame":"999","to":"opacity:0;fb:0;fbr:100;","ease":"Power3.easeInOut"},{"frame":"hover","speed":"200","ease":"Linear.easeNone","to":"o:1;rX:0;rY:0;rZ:0;z:0;fb:0;fbr:110%;","style":"c:rgba(255,255,255,1);bs:solid;bw:0 0 0 0;"}]'
                     data-textAlign="['center','center','center','center']" data-paddingtop="[0,0,0,0]"
                     data-paddingright="[0,0,0,0]" data-paddingbottom="[0,0,0,0]" data-paddingleft="[0,0,0,0]" style="">
                    Learn More
                </div>
            </li>
        </ul>
    </div>
</div>
<div class="section-block">
    <div class="section-angle"></div>
    <div class="container">
        <div class="section-heading text-center">
            <small>PROFESSIONAL SERVICES</small>
            <h2 class="semi-bold font-size-35">Planning & Consulting</h2>
            <div class="section-heading-line line-thin"></div>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt<br>ut labore
                et dolore magna aliqua. Ut enim ad minim veniam.</p></div>
        <div class="row mt-30">
            <div class="col-md-3 col-sm-6 col-12">
                <div class="features-box-2">
                    <div class="features-box-2-icon"><i class="icon-search-2"></i></div>
                    <h4>Easy Registration</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p></div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="features-box-2">
                    <div class="features-box-2-icon"><i class="icon-megaphone"></i></div>
                    <h4>Business Services</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p></div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="features-box-2">
                    <div class="features-box-2-icon"><i class="icon-graph"></i></div>
                    <h4>Quality Resourcing</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p></div>
            </div>
            <div class="col-md-3 col-sm-6 col-12">
                <div class="features-box-2">
                    <div class="features-box-2-icon"><i class="icon-wallet"></i></div>
                    <h4>Business Services</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod.</p></div>
            </div>
        </div>
    </div>
</div>
<div class="section-block-grey background-center jarallax" data-jarallax data-speed="0.6"
     style="background-image: url('images/testimony.jpeg')">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-12 col-12 offset-md-6">
                <div class="owl-carousel owl-theme testmonials-carousel-2 shadow-light mt-40">
                    <div class="testmonial-item"><p>The seller has been incredibily helpfull in getting this layout to
                            work for me and my client, ne has provided me with quick advice and support, i would
                            recommend this seller to the community and will certainly aquire more of his designs as i
                            need them 5 STARS</p>
                        <h4>Andrew Bright <span> / HR Specialist</span></h4></div>
                    <div class="testmonial-item"><p>The seller has been incredibily helpfull in getting this layout to
                            work for me and my client, ne has provided me with quick advice and support, i would
                            recommend this seller to the community and will certainly aquire more of his designs as i
                            need them 5 STARS</p>
                        <h4>Andrew Bright <span> / HR Specialist</span></h4></div>
                </div>
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
                                <li><a href="{{route('how-it-works')}}"></a></li>
                                <li><a href="{{route('contact-us')}}">Contact Us</a></li>
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
<!-- Mirrored from specthemes.com/lumire/demo-preview/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 23 Jul 2020 19:42:50 GMT -->
</html>