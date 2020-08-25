@extends('layouts.home')

@section('content')


<section class="how-it-works section">
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
                    <p>Proving a valid personal details leads you on a go.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="work-process step-2">
<span class="process-icon">
<i class="lni-search"></i>
</span>
                    <h4>Business Service</h4>
                    <p>Make money by investing with us. Get 50% interest as profit in first 3days and subsequent profit in @
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
                        <div class="testimonial-item">
                            <div class="author">
                                <div class="img-thumb">
                                    <img src="assets/img/testimonial/img1.png" alt="">
                                </div>
                            </div>
                            <div class="content-inner">
                                <p class="description">One of the best feelings anyone can think of is waking up to
                                alert. No other platform delivers like Better9ja.</p>
                                <div class="author-info">
                                    <h2><a href="#">Bukky</a></h2>
                                    <span>Regular</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-item">
                            <div class="author">
                                <div class="img-thumb">
                                    <img src="assets/img/testimonial/img2.png" alt="">
                                </div>
                            </div>
                            <div class="content-inner">
                                <p class="description">Am so happy and blesed been a partaker of Better9ja investment it really gives me
                                joy, knowing my investment grows with 50% with ease cashout.</p>
                                <div class="author-info">
                                    <h2><a href="#">John</a></h2>
                                    <span>Regular</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testimonial-item">
                            <div class="author">
                                <div class="img-thumb">
                                    <img src="assets/img/testimonial/img3.png" alt="">
                                </div>
                            </div>
                            <div class="content-inner">
                                <p class="description">I don't have much to say here but I can boldly say I've been a proud millionaire
                                by joining Better9ja investment.</p>
                                <div class="author-info">
                                    <h2><a href="#">Helen</a></h2>
                                    <span>Guider</span>
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