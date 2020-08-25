@extends('layouts.app')

@section('content')

    <div class="card mt-15">
        <div class="card-body">

            <div class="login login-4 wizard d-flex flex-column flex-lg-row flex-column-fluid">
                <!--begin::Content-->
                <div class="login-container order-2 order-lg-1 d-flex flex-center flex-row-fluid px-7 pt-lg-0 pb-lg-0 pt-4 pb-6 bg-white">
                    <!--begin::Wrapper-->
                    <div class="login-content d-flex flex-column pt-lg-0 pt-12">
                        <!--begin::Logo-->
                        <a href="/" class="login-logo pb-xl-20 pb-15 text-center">
                            <img src="{{asset('images/logo/better_9ja.png')}}"
                                 class="max-h-70px" alt="" width="150">
                        </a>
                        <!--end::Logo-->
                        <!--begin::Signin-->
                        <div class="login-form">
                            <!--begin::Form-->

                            @if(session('status_err'))
                                <div class="card-body" v-else>
                                    <div class="alert alert-custom alert-light-warning fade show mb-5" role="alert">
                                        <div class="alert-icon">
                                            <i class="flaticon-warning"></i>
                                        </div>
                                        <div class="alert-text"><b>{{session('status_err')}}</b></div>
                                    </div>
                                </div>
                            @endif
                            <form class="form fv-plugins-bootstrap fv-plugins-framework" id="kt_login_singin_form"
                                  novalidate="novalidate" method="POST" action="{{ route('login') }}">
                            @csrf
                            <!--begin::Title-->
                                <div class="pb-5 pb-lg-15">
                                    <h3 class="font-weight-bolder text-dark font-size-h3 font-size-h4-lg">Sign In</h3>
                                    <div class="text-muted font-weight-bold font-size-h6">New Here?
                                        <a href="{{route('register')}}" class="font-weight-bolder font-size-h6"
                                        style="color: #119815;">Create Account</a></div>
                                </div>
                                <!--begin::Title-->
                                <!--begin::Form group-->
                                <div class="form-group fv-plugins-icon-container">
                                    <label class="font-size-h6 font-weight-bolder text-dark">Email</label>
                                    <input id="email" name="email"
                                           class="form-control form-control-lg form-control-solid @error('email') is-invalid @enderror"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <div class="fv-plugins-message-container"></div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!--end::Form group-->
                                <!--begin::Form group-->
                                <div class="form-group fv-plugins-icon-container">
                                    <div class="d-flex justify-content-between mt-n5">
                                        <label class="font-size-h6 font-weight-bolder text-dark pt-5">Password</label>
                                        @if (Route::has('password.request'))
                                            <a href="{{route('password.request')}}"
                                               class="font-size-h6 font-weight-bolder pt-5"
                                               style="color: #119815;">Forgot
                                                Password?</a>
                                        @endif
                                    </div>
                                    <input id="password"
                                           class="form-control form-control-lg form-control-solid @error('password') is-invalid @enderror"
                                           type="password" name="password" required autocomplete="current-password">
                                    <div class="fv-plugins-message-container"></div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <!--end::Form group-->
                                <!--begin::Action-->
                                <div class="pb-lg-0 pb-5">
                                    <button type="submit" id="kt_login_singin_form_submit_button"
                                            class="btn btn-success font-weight-bolder mr-2">Sign In
                                    </button>
                                </div>
                                <!--end::Action-->
                                <input type="hidden">
                                <div></div>
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Signin-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--begin::Content-->
            </div>
        </div>
    </div>
@endsection
