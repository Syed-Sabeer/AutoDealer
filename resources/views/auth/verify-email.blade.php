@extends('layouts.authentication.master')
@section('title', 'Verify Email')

@section('css')
@endsection

@section('content')
    <!-- /Left Text -->
    <div class="d-none d-lg-flex col-lg-8 p-0">
        <div class="auth-cover-bg auth-cover-bg-color d-flex justify-content-center align-items-center">
            <img src="{{asset('assets/img/illustrations/auth-verify-email-illustration-light.png')}}" alt="auth-verify-email-cover"
                class="my-5 auth-illustration" data-app-light-img="illustrations/auth-verify-email-illustration-light.png"
                data-app-dark-img="illustrations/auth-verify-email-illustration-dark.png" />

            <img src="{{asset('assets/img/illustrations/bg-shape-image-light.png')}}" alt="auth-verify-email-cover"
                class="platform-bg" data-app-light-img="illustrations/bg-shape-image-light.png"
                data-app-dark-img="illustrations/bg-shape-image-dark.png" />
        </div>
    </div>
    <!-- /Left Text -->

    <!--  Verify email -->
    <div class="d-flex col-12 col-lg-4 align-items-center authentication-bg p-6 p-sm-12">
        <div class="w-px-400 mx-auto mt-12 mt-5">
            <h4 class="mb-1">{{__('Verify your email ✉️')}}</h4>
            <p class="text-start mb-0">
                {{__('Account activation link sent to your email address. Please follow the link inside to continue.')}}
            </p>
            <a class="btn btn-primary w-100 my-6" href="#" onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"> {{__('Skip for now')}} </a>
            <form action="{{ route('logout') }}" id="logout-form" method="POST" class="d-none">
                @csrf
            </form>
            <p class="text-center mb-0">
                {{__("Didn't get the mail?")}}
                <a href="#" onclick="event.preventDefault();
                document.getElementById('resend-form').submit();"> {{__('Resend')}} </a>
                <form id="resend-form" class="d-none" method="POST" action="{{ route('verification.send') }}">
                    @csrf
                </form>
            </p>
        </div>
    </div>
    <!-- / Verify email -->
@endsection

@section('script')
    <script type="text/javascript"></script>
@endsection
