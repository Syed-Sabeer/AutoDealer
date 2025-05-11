{{-- @extends('layouts.authentication.master')
@section('title', 'Forgot Password')

@section('css')
@endsection


@section('content')
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-8 p-0">
        <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
            <img src="{{asset('assets/img/illustrations/auth-forgot-password-illustration-light.png')}}"
                alt="auth-forgot-password-cover" class="my-5 auth-illustration d-lg-block d-none"
                data-app-light-img="illustrations/auth-forgot-password-illustration-light.png"
                data-app-dark-img="illustrations/auth-forgot-password-illustration-dark.png" />

            <img src="{{asset('assets/img/illustrations/bg-shape-image-light.png')}}" alt="auth-forgot-password-cover"
                class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png"
                data-app-dark-img="illustrations/bg-shape-image-dark.png" />
        </div>
    </div>
    <!-- /Left Text -->

    <!-- Forgot Password -->
    <div class="d-flex col-12 col-lg-4 align-items-center authentication-bg p-sm-12 p-6">
        <div class="w-px-400 mx-auto mt-12 mt-5">
            <h4 class="mb-1">{{__('Forgot Password? 🔒')}}</h4>
            <p class="mb-6">{{__("Enter your email and we'll send you instructions to reset your password")}}</p>
            <form id="formAuthentication" class="mb-6" action="{{ route('password.email') }}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="email" class="form-label">{{__('Email')}}</label><span class="text-danger">*</span>
                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="{{__('Enter your email')}}" autofocus />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">{{__('Send Reset Link')}}</button>
            </form>
            <div class="text-center">
                <a href="{{ route('login') }}" class="d-flex align-items-center justify-content-center">
                    <i class="ti ti-chevron-left scaleX-n1-rtl me-1_5"></i>
                    {{__('Back to login')}}
                </a>
            </div>
        </div>
    </div>
    <!-- /Forgot Password -->
@endsection

@section('script')
@endsection --}}

@extends('frontend.layouts.master')

@section('title', __('Forgot Password'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
@endsection

<!-- Page Title -->
@section('breadcrumbs')
    @include('frontend.layouts.partials.breadcrumb', [
        'title' => 'Forgot Password',
        'breadcrumbs' => [
            // ['label' => 'Home', 'url' => route('frontend.home')],
            ['label' => 'Forgot Password'],
        ],
    ])
@endsection

@section('content')
    <!-- forgot password -->
    <div class="login-area py-120">
        <div class="container">
            <div class="col-md-5 mx-auto">
                <div class="login-form">
                    <div class="login-header">
                        <img src="{{ asset('FrontAssets/img/logo/logo.png') }}" alt="">
                        <p>Reset your motex account password</p>
                    </div>
                    <form action="{{ route('password.email') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="{{__('Enter your email')}}" autofocus />
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="theme-btn"><i class="far fa-key"></i> Send Reset
                                Link</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- forgot password end -->
@endsection

@section('script')
    {{-- {!! NoCaptcha::renderJs() !!} --}}
@endsection
