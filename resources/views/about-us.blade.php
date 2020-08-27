@extends('layouts.home')

@section('content')
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>About</h3>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="about section">
    <div class="container">
        <div class="row">
            <div class="col-lg-1 col-md-1 col-xs-12"></div>
            <div class="col-lg-10 col-md-10 col-xs-12 card border-success">
                <div class="about-content card-body"><br>
                    <h3 class="text-center">Get to know
                        how the best <span class="text-success">P2P</span> platform works</h3><br>

                    <img class="img-fluid float-right" src="{{asset('home/assets/img/guide.jpg')}}" alt=""><br>
                    <ul>
                        <li><i class="fa fa-check-circle text-success"></i >Registration
                            <p class="text-secondary">STEP 1: Fill out the registration form on the registration page with your correct
                                information.
                            </p>
                            <p class="text-secondary">STEP 2: After your registration is complete you will be notified to make an
                                activation payment of 1,000 to a designated guider on the platform before you can
                                proceed to fill your bank account information and access your dashboard.
                            </p></li>
                        <li><i class="fa fa-check-circle text-success"></i>MAKING A PLEDGE
                            <p class="text-secondary">STEP 3: When your account has been fully activated, on your dashboard you will see a
                                make a pledge request. You are entitled to make a pledge of between N5,000 to
                                N1,000,000.</p>
                            <p class="text-secondary">STEP 4: As soon as you have made your pledge you will receive a notification on your
                                dashboard to wait while the system merges you available participants to pay.
                            </p>
                            <p class="text-secondary">STEP 5: The merging process to complete your pledge request might range between 1hour
                                to 24hours depends on influx and designated withdrawals of users.x
                            </p>
                            <p class="text-secondary">STEP 6: Within the time frame listed above you will be merged to make the payment
                                which you inputed in your pledge request. You can be merged to 1 or more
                                participants. It all depends on available withdrawal requests. Better9ja Investment
                                is fully automated.
                            </p>
                        </li>
                        <li><i class="fa fa-check-circle text-success"></i>SUSPENSION
                            <p class="text-secondary">STEP 7: Sender and Reciever both have equal 24hours to complete all merging options
                                on the dashboard. Failure to complete transactions within the 24hours time frame
                                will lead to immediate suspension of both the reciever and payer. After you have
                                made your payment upload your proof of payment and ensure to call your Reciever to
                                facilitate your confirmation as soon as possible.</p>
                        </li>
                        <li><i class="fa fa-check-circle text-success"></i>RECOMMITMENT
                            <p class="text-secondary">STEP 8: After your pledge request has been confirmed by the reciever, before you can
                                make your withdrawal from the system we have implored a 100% or more recommitment
                                option. Whereby you have to use the recommit button and make another pledge of equal
                                or more value on your previous pledge.
                            </p>
                            <p class="text-secondary">STEP 9: When you open the recommitment page the first option uptop is to click the
                                selection bar and select your previous pledge, next option is to input the amount of
                                your recommitment pledge which will be atleast 100% of your previous pledge which
                                you can still choose to increase to any amount of your choice
                            </p>
                            <p class="text-secondary">STEP 10: After successfully making your recommitment pledge you will receive a
                                notification on your dashboard to wait for your merging options.
                            </p>
                            <p class="text-secondary">STEP 11: Proceed to complete transactions with your merging options and become
                                eligible to withdraw your first pledge.
                            </p>
                        </li>
                        <p class="text-content">THIS IS BETTER9JA INVESTMENT ! TAKING AFRICA TO THE NEXT LEVEL!!
                        </p>
                        <br>


                        <p><b>IMPORTANT NOTICE:</b> <span>ALWAYS USE THE RECOMITTMENT OPTION ON YOUR
                                DASHBOARD TO MAKE YOUR RECOMMITMENTS AFTER MAKING YOUR INITIAL PLEDGE
                                </span>
                        </p>

                        <li><i class="fa fa-check-circle text-success"></i>WITHDRAWAL
                            <p class="text-secondary">STEP 12: Congrats on your successful pledge and recommitment pledge. You can now see
                                the withdrawal option on your dashboard. Your withdrawal request will become
                                successful after 3 days.
                            </p>
                            <p class="text-secondary">STEP 13: On the 3rd day after completing your withdrawal request, you will recieve a
                                notification on your dashboard indicating to wait for your receiving merging orders.
                            </p>
                            <p class="text-secondary">STEP 14: When your receiving merging orders arrive, you and your payers have 24 hours
                                to complete and confirm your transactions.
                            </p>
                        </li>

                        <li><i class="fa fa-check-circle text-success"></i> REFERRAL
                            <p class="text-secondary">STEP 15: For every user you refer to the platform with your link you will receive 5%
                                bonus and also 5% bonus on subsequent transactions made by your referred. When you
                                refer 15 people that are active in the system with at least 150k on your own
                                dashboard you will become a guider and become eligible to earn 2% from your
                                downliners.
                            </p>
                        </li>

                        <br>
                        <p class="text-secondary">Invite your friends & family, earn rewards.</p>
                        <p class="text-secondary">This is no time to keep people in the dark, carry them along.</p>
                        <p class="text-secondary">Invite a friend.</p>

                    </ul>
                </div>
            </div>
            <div class="col-lg-1 col-md-1 col-xs-12"></div>
        </div>
    </div>
</div>

@endsection