@extends('layouts.mails.master')

@section('title', 'Welcome to Your New Account')

@section('css')
@endsection

@section('content')
    <p>{{__('Hi')}} <strong>{{ $name }}</strong>,</p>
    <p>{{__("We're thrilled to have you join our community! Below are your account credentials to help you get started:")}}</p>

    <div class="credentials">
        <h3>{{__('Your Login Credentials:')}}</h3>
        <p><strong>{{__('Email:')}}</strong> {{ $email }}</p>
        <p><strong>{{__('Password:')}}</strong> {{ $password }}</p>
    </div>

    <p class="mt-3">{{__('Log in and explore all the amazing features waiting for you. If you have any questions or need assistance, our team is here to help!')}}</p>

    <a href="{{ route('dashboard') }}" class="cta-button">{{__('Go to Dashboard')}}</a>
@endsection

@section('script')
@endsection
