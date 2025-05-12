@extends('frontend.layouts.master')

@section('title', __('Login'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
@endsection

<!-- Page Title -->
@section('breadcrumbs')
    @include('frontend.layouts.partials.breadcrumb', [
        'title' => 'Login',
        'breadcrumbs' => [
            // ['label' => 'Home', 'url' => route('frontend.home')],
            ['label' => 'Login'],
        ],
    ])
@endsection

@section('content')
    <!-- login area -->
    <div class="login-area py-120">
        <div class="container">
            <div class="col-md-5 mx-auto">
                <div class="login-form">
                    <div class="login-header">
                        <img src="{{ asset(\App\Helpers\Helper::getLogoDark()) }}" alt="{{ env('APP_NAME') }}">
                        <p>Login with your account</p>
                    </div>
                    <form id="frontFormLogin" action="{{route('frontend.login.attempt')}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Email Address</label>
                                <input type="email" name="email_username" id="email_username" class="form-control @error('email_username') is-invalid @enderror" placeholder="Your Email" autofocus required>
                            @error('email_username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            {{-- <input type="password" class="form-control" placeholder="Your Password"> --}}
                            <div class="input-group input-group-merge">
                                <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                    placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                    aria-describedby="password" required/>
                            </div>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="my-8">
                            @if(config('captcha.version') === 'v3')
                                {!! \App\Helpers\Helper::renderRecaptcha('frontFormLogin', 'register') !!}
                            @elseif(config('captcha.version') === 'v2')
                                <div class="form-field-block">
                                    {!! app('captcha')->display() !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                        <span class="text-danger">{{ $errors->first('g-recaptcha-response') }}</span>
                                    @endif
                                </div>
                            @endif
                        </div>
                        <div class="d-flex justify-content-between mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="remember">
                                <label class="form-check-label" for="remember">
                                    Remember Me
                                </label>
                            </div>
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}" class="forgot-pass">{{__('Forgot Password?')}}</a>
                            @endif
                        </div>
                        <div class="d-flex align-items-center">
                            <button type="submit" class="theme-btn"><i class="far fa-sign-in"></i> Login</button>
                        </div>
                    </form>
                    <div class="login-footer">
                        <p>Don't have an account? <a href="{{route('frontend.register')}}">Register.</a></p>
                        {{-- <div class="social-login">
                            <p>Continue with social media</p>
                            <div class="social-login-list">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-google"></i></a>
                                <a href="#"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login area end -->
@endsection

@section('script')
    {!! NoCaptcha::renderJs() !!}
@endsection
