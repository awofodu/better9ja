@extends('layouts.app')

@section('content')


    <div class="card mt-15 mb-10">
        <div class="card-body">
            <div class="login-content login-content-signup d-flex flex-column">
                <!--begin::Aside Top-->
                <div class="d-flex flex-column-auto flex-column px-10">
                    <!--begin::Aside header-->
                    <a href="#" class="login-logo pb-lg-4 pb-10 text-center">
                        <img src="{{asset('images/logo/better_9ja.png')}}" class="max-h-70px" width="180"
                             alt="">
                    </a>
                    <!--end::Aside header-->
                    <!--begin: Wizard Nav-->
                    <div class="wizard wizard-1" id="kt_contact_add" data-wizard-state="first"
                         data-wizard-clickable="true">
                        <div class="row justify-content-center my-10 px-8 my-lg-15 px-lg-10">
                            <div class="col-xl-12 col-xxl-7">
                                <!--begin::Form Wizard Form-->
                                <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_contact_add_form"
                                      method="POST" action="{{ route('register') }}">
                                @csrf
                                <!--begin::Form Wizard Step 1-->
                                    <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                                        <h2 class="mb-10 font-weight-bold text-dark font-size-h2 font-size-h3-lg">Create
                                            An Account</h2>
                                        <div class="row">
                                            <div class="col-xl-12">
                                                <input type="hidden" name="referred_by" value="{{$referral_id??''}}">
                                                <div class="form-group row fv-plugins-icon-container has-success">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Full Name</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input class="form-control form-control-lg form-control-solid
                                                        is-valid @error('name') is-invalid @enderror"
                                                               name="name" type="text" id="name" placeholder="Your name"
                                                               value="{{ old('name') }}" autocomplete="name" autofocus>
                                                        @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row fv-plugins-icon-container has-success">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Email
                                                        Address</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
																					<span class="input-group-text">
																						<i class="la la-at"></i>
																					</span>
                                                            </div>
                                                            <input type="email" id="email"
                                                                   class="form-control @error('email') is-invalid @enderror
                                                                           form-control-lg form-control-solid"
                                                                   placeholder="Email"
                                                                   name="email" value="{{ old('email') }}"
                                                                   autocomplete="email" autofocus>
                                                            @error('email')
                                                            <span class="invalid-feedback bg-white" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="form-group row fv-plugins-icon-container has-success">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Contact
                                                        Phone</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <div class="input-group input-group-lg input-group-solid">
                                                            <div class="input-group-prepend">
																					<span class="input-group-text">
																						<i class="la la-phone"></i>
																					</span>
                                                            </div>
                                                            <input type="text" id="phone"
                                                                   class="form-control form-control-lg form-control-solid
                                                                   is-valid @error('phone') is-invalid @enderror"
                                                                   name="phone" placeholder="+2349079798730"
                                                                   value="{{ old('phone') }}" autocomplete="phone"
                                                                   autofocus>
                                                            @error('phone')
                                                            <span class="invalid-feedback bg-white" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row fv-plugins-icon-container has-success">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Password</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input typeof="password" id="password"
                                                               class="form-control form-control-lg form-control-solid
                                                               is-valid @error('password') is-invalid @enderror"
                                                               name="password" type="password"
                                                               placeholder="Enter Password"
                                                               autocomplete="new-password">
                                                        @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="form-group row fv-plugins-icon-container has-success">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Confirm
                                                        Password</label>
                                                    <div class="col-lg-9 col-xl-9">
                                                        <input typeof="password" id="password-confirm"
                                                               class="form-control form-control-lg form-control-solid is-valid"
                                                               autocomplete="new-password" type="password"
                                                               name="password_confirmation"
                                                               placeholder="Confirm Password">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-3 col-form-label"></label>
                                                    <div class="col-9 col-form-label">
                                                        <div class="checkbox-list">
                                                            <label class="checkbox">
                                                                <input type="checkbox" name="terms_and_policy"
                                                                       value="1">
                                                                <span></span>
                                                                By continuing, I agree to Better9ja's
                                                                <a href="#" data-toggle="modal"
                                                                   data-target="#termsModal">Terms and Conditions</a>
                                                            </label>
                                                            @if ($errors->has('terms_and_policy'))
                                                                <span style="display: block;width: 100%;margin-top: .25rem;font-size: 90%;color: #F64E60;"
                                                                      role="alert">
                                                                    <strong>{{ $errors->first('terms_and_policy') }}</strong>
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3"></div>
                                        <div class="col-lg-6">
                                            <button type="submit" class="btn btn-success mr-2">Submit</button>
                                            <button type="reset" class="btn btn-secondary">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                                <!--end::Form Wizard Form-->


                                <div class="modal fade" id="termsModal" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Better9ja Investment
                                                    Privacy, Terms and Conditions</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                    <i aria-hidden="true" class="ki ki-close"></i>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="col-lg-12">
                                                    <div class="row text-justify col-md-12">
                                                        <ol>
                                                            <li>By using this website and facilities provided, the
                                                                Better9ja Investment Members hereby confirm that they
                                                                have the possibility and right to review these Terms and
                                                                Conditions each time they access this website, and
                                                                thereby also to be bound by them.
                                                            </li>
                                                            <li>By using this website and facilities provided, Better9ja
                                                                Investment Members hereby confirm that they understand
                                                                that Better9ja Investment admins will never chat them up
                                                                on any of her social media platforms that they are
                                                                merged to pay money to any account that will not reflet
                                                                on your dashboard. This means that you must only make
                                                                payments to the account details given to you on your
                                                                dashboard. Members are equally aware of the existence of
                                                                telegram, Instagram, Whatsapp, and other social media
                                                                scammers and how they operate and that they will not
                                                                fall prey to them but that if they fall to scam that
                                                                they indemnify Better9ja Investment or any of her
                                                                associate(s) from blame and that Better9ja Investment
                                                                members must bear the full brunt of their actions.
                                                            </li>
                                                            <li>By using this website, using the provided facilities or
                                                                purchasing products, Users are entering into a binding
                                                                agreement with the Company and hereby agree to be bound
                                                                by these Terms and Conditions and any additional Terms
                                                                and Conditions, guidelines, restrictions, or rules
                                                                posted on this website or any other related websites and
                                                                applicable for any other products and or services.
                                                            </li>
                                                            <li>Better9ja Investment hereby reserves the right to make
                                                                changes to this website and/or Terms and Conditions at
                                                                any time with prior notice and in lines with what the
                                                                management of Better9ja Investment sees serves the
                                                                interest of the Company and her members
                                                            </li>
                                                            <li>By using this website and facilities provided Members
                                                                hereby confirm that user information including user’s
                                                                images, banks details, and member’s names will not be
                                                                posted on any social media which includes but not
                                                                limited to Facebook, Telegram and Instagram.
                                                            </li>
                                                            <li>By using this platform, members agree that they must
                                                                promote and represent the interest of Better9ja
                                                                Investment at all time and if ever you’re found guilty
                                                                of Demarketing Better9ja Investment, that Better9ja
                                                                Investment reserves the right to take whatever action it
                                                                deems fit against such members.
                                                            </li>
                                                            <li>Members also agree that they must not make any
                                                                donation/payments with money gotten from nefarious
                                                                activities which is against the law of the country which
                                                                he/she resides.
                                                            </li>
                                                            <li>By using this website and facilities provided, the
                                                                Better9ja Investment Members hereby confirm that they
                                                                have the possibility and right to review these Terms and
                                                                Conditions each time they access this website, and
                                                                thereby also to be bound by them.
                                                            </li>
                                                            <li>In case of non-acceptance of the present Terms and
                                                                Conditions the Company kindly asks visitors to not use
                                                                this website and/or the facilities provided.
                                                            </li>
                                                            <li>By using this website and/or any of the facilities
                                                                provided, Members hereby agrees to not hold Better9ja
                                                                Investment or any of her promoters responsible for any
                                                                loss and/or damage that may occur as a result of delay
                                                                in the process of executing a transaction or when
                                                                participating in any of her programme.
                                                            </li>
                                                            <li> As is standard practice on many websites, the platform
                                                                also logs non-personally-identifiable information
                                                                including IP address, profile information, aggregate
                                                                User data, and browser type, from Users and other
                                                                visitors to the site or application. This data is used
                                                                to improve the Services, to analyse trends, to
                                                                administer the Services, to track Users’ movements
                                                                around the Service and to gather demographic information
                                                                about our User base as a whole. Better9ja Investment
                                                                will not use the information collected to market
                                                                directly to that person. This
                                                                non-personally-identifiable information may be shared
                                                                with third parties to provide more relevant services and
                                                                special offers to Users. User IP addresses are recorded
                                                                for security and monitoring purposes
                                                            </li>
                                                        </ol>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <form class="vld-parent" ref="formContainer">
                                                    <button type="button" class="btn btn-light-primary font-weight-bold"
                                                            data-dismiss="modal">Close
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end: Wizard Nav-->
                </div>
                <!--end::Aside Top-->
            </div>
        </div>
    </div>
@endsection
