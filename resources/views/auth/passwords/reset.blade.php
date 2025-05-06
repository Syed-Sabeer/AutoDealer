@extends('layouts.authentication.master')
@section('title', 'Reset Password')

@section('css')
@endsection

@section('css')
@endsection

@section('content')
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-8 p-0">
        <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
            <img src="{{ asset('assets/img/illustrations/auth-reset-password-illustration-light.png') }}"
                alt="auth-reset-password-cover" class="my-5 auth-illustration"
                data-app-light-img="illustrations/auth-reset-password-illustration-light.png"
                data-app-dark-img="illustrations/auth-reset-password-illustration-dark.png" />

            <img src="{{ asset('assets/img/illustrations/bg-shape-image-light.png') }}" alt="auth-reset-password-cover"
                class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png"
                data-app-dark-img="illustrations/bg-shape-image-dark.png" />
        </div>
    </div>
    <!-- /Left Text -->

    <!-- Reset Password -->
    <div class="d-flex col-12 col-lg-4 align-items-center authentication-bg p-6 p-sm-12">
        <div class="w-px-400 mx-auto mt-12 pt-5">
            <h4 class="mb-1">{{__('Reset Password 🔒')}}</h4>
            <p class="mb-6">
                <span class="fw-medium">{{__('Your new password must be different from previously used passwords')}}</span>
            </p>
            <form id="formAuthentication" class="mb-6" action="{{ route('password.update') }}" method="POST">
                @csrf
                <input type="hidden" name="token" value="{{ request()->route('token') }}">
                <input type="hidden" name="email" value="{{ request()->email }}">
                <div class="mb-6 form-password-toggle">
                    <label class="form-label" for="password">{{__('New Password')}}</label><span class="text-danger">*</span>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                            name="password"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password" />
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-6 form-password-toggle">
                    <label class="form-label" for="password_confirmation">{{__('Confirm New Password')}}</label><span class="text-danger">*</span>
                    <div class="input-group input-group-merge">
                        <input type="password" id="password_confirmation"
                            class="form-control @error('password_confirmation') is-invalid @enderror"
                            name="password_confirmation"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                            aria-describedby="password_confirmation" />
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                    @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary d-grid w-100 mb-6">{{__('Set new password')}}</button>
                <div class="text-center">
                    <a href="{{ route('login') }}">
                        <i class="ti ti-chevron-left scaleX-n1-rtl me-1_5"></i>
                        {{__('Back to login')}}
                    </a>
                </div>
            </form>
        </div>
    </div>
    <!-- /Reset Password -->
@endsection

@section('script')

@endsection
