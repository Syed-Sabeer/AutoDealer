@extends('layouts.authentication.master')
@section('title', 'Login')

@section('css')
@endsection

@section('content')
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-8 p-0">
        <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
            <img src="{{asset('assets/img/illustrations/auth-login-illustration-light.png')}}" alt="auth-login-cover"
                class="my-5 auth-illustration" data-app-light-img="illustrations/auth-login-illustration-light.png"
                data-app-dark-img="illustrations/auth-login-illustration-dark.png" />

            <img src="{{asset('assets/img/illustrations/bg-shape-image-light.png')}}" alt="auth-login-cover" class="platform-bg"
                data-app-light-img="illustrations/bg-shape-image-light.png"
                data-app-dark-img="illustrations/bg-shape-image-dark.png" />
        </div>
    </div>
    <!-- /Left Text -->

    <!-- Login -->
    <div class="d-flex col-12 col-lg-4 align-items-center authentication-bg p-sm-12 p-6">
        <div class="w-px-400 mx-auto mt-12 pt-5">
            <h4 class="mb-1">{{__('Welcome to')}} {{\App\Helpers\Helper::getCompanyName()}}! 👋</h4>
            <p class="mb-6">{{__('Please sign-in to your account and start the adventure')}}</p>

            <form id="formLogin" class="mb-6" action="{{route('login.attempt')}}" method="POST">
                @csrf
                <div class="mb-6">
                    <label for="email_username" class="form-label">{{__('Email/Username')}}</label><span class="text-danger">*</span>
                    <input type="text" class="form-control @error('email_username') is-invalid @enderror" id="email_username" name="email_username"
                        placeholder="{{__('Enter your email or username')}}" autofocus required/>
                    @error('email_username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-6 form-password-toggle">
                    <label class="form-label" for="password">{{__('Password')}}</label><span class="text-danger">*</span>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" required/>
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="my-8">
                    <div class="d-flex justify-content-between">
                        <div class="form-check mb-0 ms-2">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember-me" />
                            <label class="form-check-label" for="remember-me"> {{__('Remember Me')}} </label>
                        </div>
                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}">
                                <p class="mb-0">{{__('Forgot Password?')}}</p>
                            </a>
                        @endif
                    </div>
                </div>
                <div class="my-8">
                    @if(config('captcha.version') === 'v3')
                        {!! \App\Helpers\Helper::renderRecaptcha('formLogin', 'register') !!}
                    @elseif(config('captcha.version') === 'v2')
                        <div class="form-field-block">
                            {!! app('captcha')->display() !!}
                            @if ($errors->has('g-recaptcha-response'))
                                <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                            @endif
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100">{{__('Sign in')}}</button>
            </form>

            <p class="text-center">
                <span>{{__('New on our platform?')}}</span>
                <a href="{{route('register')}}">
                    <span>{{__('Create an account')}}</span>
                </a>
            </p>

            {{-- <div class="divider my-6">
                <div class="divider-text">{{__('or')}}</div>
            </div>

            <div class="d-flex justify-content-center">
                <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-facebook me-1_5">
                    <i class="tf-icons ti ti-brand-facebook-filled"></i>
                </a>

                <a href="javascript:;" class="btn btn-sm btn-icon rounded-pill btn-text-twitter me-1_5">
                    <i class="tf-icons ti ti-brand-twitter-filled"></i>
                </a>

                <a href="{{ route('auth.github.login') }}" class="btn btn-sm btn-icon rounded-pill btn-text-github me-1_5">
                    <i class="tf-icons ti ti-brand-github-filled"></i>
                </a>

                <a  href="{{ route('auth.google.login') }}" class="btn btn-sm btn-icon rounded-pill btn-text-google-plus">
                    <i class="tf-icons ti ti-brand-google-filled"></i>
                </a>
            </div> --}}
        </div>
    </div>
    <!-- /Login -->
@endsection

@section('script')
    {!! NoCaptcha::renderJs() !!}
@endsection
