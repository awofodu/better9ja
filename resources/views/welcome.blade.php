@extends('layouts.home')


@section('banner')

    <div class="container">
        <div class="row space-100">
            <div class="col-lg-7 col-md-12 col-xs-12">
                <div class="contents">
                    <h2 class="head-title">Register your income <br> above the rest</h2>
                    <p>Join thousands of members, enjoy safe 50% returns.</p>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-xs-12">
                <div class="intro-img">
                    <img src="{{asset('home/assets/img/intro.png')}}" alt="">
                </div>
            </div>
        </div>
    </div>

    @endsection

@section('content')


<section class="how-it-works section bg-gray">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">How It Works?</h2>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="work-process">
<span class="process-icon">
<i class="lni-user"></i>
</span>
                    <h4>Easy Registration</h4>
                    <p>Providing a valid personal details leads you on a go.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="work-process step-2">
<span class="process-icon">
<i class="lni-search"></i>
</span>
                    <h4>Business Service</h4>
                    <p>Make money by investing with us. Get 50% interest as profit in first 3days and subsequent profit in
                    7days using our unbeatable Investment Programme.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="work-process step-3">
<span class="process-icon">
<i class="lni-cup"></i>
</span>
                    <h4>Referral System</h4>
                    <p>Refer your friends and family and earn additional percentages.</p>
                </div>
            </div>


        </div>
        <br>
        <center>
        <a href="{{route('how-it-works')}}" class="btn btn-common">Learn More</a>
        </center>
    </div>
</section>


<section id="testimonial" class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Investor Review</h2>
            <p>Here's our testimonies</p>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
                <div id="testimonials" class="touch-slider owl-carousel">
                    <div class="item">
                        <div class="testimonial-item bg-success">
                            <div class="author">
                                <div class="img-thumb">
                                    <img src="assets/img/testimonial/img1.png" alt="">
                                </div>
                            </div>
                            <div class="content-inner">
                                <p class="description text-white-50">One of the best feelings anyone can think of is waking up to
                                alert. No other platform delivers like Better9ja.</p>
                                <div class="author-info">
                                    <h2><a href="#" class="text-white">Bukky</a></h2>
                                    <span class="text-white-50">Regular</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-item bg-success">
                            <div class="author">
                                <div class="img-thumb">
                                    <img src="assets/img/testimonial/img2.png" alt="">
                                </div>
                            </div>
                            <div class="content-inner">
                                <p class="description text-white-50">Am so happy and blesed been a partaker of Better9ja investment it really gives me
                                joy, knowing my investment grows with 50% with ease cashout.</p>
                                <div class="author-info">
                                    <h2><a href="#" class="text-white">John</a></h2>
                                    <span class="text-white-50">Regular</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-item bg-success">
                            <div class="author">
                                <div class="img-thumb">
                                    <img src="assets/img/testimonial/img3.png" alt="">
                                </div>
                            </div>
                            <div class="content-inner">
                                <p class="description text-white-50">I don't have much to say here but I can boldly say I've been a proud millionaire
                                by joining Better9ja investment.</p>
                                <div class="author-info">
                                    <h2><a href="#" class="text-white">Helen</a></h2>
                                    <span class="text-white-50">Guider</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-item bg-success">
                            <div class="author">
                                <div class="img-thumb">
                                    <img src="assets/img/testimonial/img3.png" alt="">
                                </div>
                            </div>
                            <div class="content-inner">
                                <p class="description text-white-50">i am so happy to join this platform, after ecountering
                                    different issues with other platform, I am so happy I got to know about better9ja.</p>
                                <div class="author-info">
                                    <h2><a href="#" class="text-white">Tope</a></h2>
                                    <span class="text-white-50">Regular</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

    @endsection