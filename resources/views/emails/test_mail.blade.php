@extends('layouts.mails.master')

@section('title', 'Test Mail')

@section('css')
@endsection

@section('content')
    <p>{{__('Hi')}} <strong>{{ $recipient }}</strong>,</p>
    <p>{{ $messageContent }}</p>

    <div class="credentials">
        @if ($emailSettings)
            <h3>{{__('Email Settings:')}}</h3>
            <ul>
                <p><strong>{{__('Mail Driver:')}}</strong> {{ $emailSettings->mail_driver }}</p>
                <p><strong>{{__('Mail Host:')}}</strong> {{ $emailSettings->mail_host }}</p>
                <p><strong>{{__('Mail Port:')}}</strong> {{ $emailSettings->mail_port }}</p>
                <p><strong>{{__('Mail Username:')}}</strong> {{ $emailSettings->mail_username }}</p>
                <p><strong>{{__('Mail Password:')}}</strong> {{ $emailSettings->mail_password }}</p>
                <p><strong>{{__('Mail Encryption:')}}</strong> {{ $emailSettings->mail_encryption }}</p>
                <p><strong>{{__('Mail From Address:')}}</strong> {{ $emailSettings->mail_from_address }}</p>
                <p><strong>{{__('Mail From Name:')}}</strong> {{ $emailSettings->mail_from_name }}</p>
            </ul>
        @else
            <h3>{{__('Default Email Settings:')}}</h3>
            <ul>
                <p><strong>{{__('Mail Driver:')}}</strong> {{ env('MAIL_MAILER', 'smtp') }}</p>
                <p><strong>{{__('Mail Host:')}}</strong> {{ env('MAIL_HOST', 'default_host') }}</p>
                <p><strong>{{__('Mail Port:')}}</strong> {{ env('MAIL_PORT', 587) }}</p>
                <p><strong>{{__('Mail Username:')}}</strong> {{ env('MAIL_USERNAME', 'default_username') }}</p>
                <p><strong>{{__('Mail Password:')}}</strong> {{ env('MAIL_PASSWORD', 'default_password') }}</p>
                <p><strong>{{__('Mail Encryption:')}}</strong> {{ env('MAIL_ENCRYPTION', 'tls') }}</p>
                <p><strong>{{__('Mail From Address:')}}</strong> {{ env('MAIL_FROM_ADDRESS', 'default_from@example.com') }}</p>
                <p><strong>{{__('Mail From Name:')}}</strong> {{ env('MAIL_FROM_NAME', 'Default Name') }}</p>
            </ul>
        @endif
    </div>

    <a href="{{ route('dashboard') }}" class="cta-button">{{__('Go to Dashboard')}}</a>
@endsection

@section('script')
@endsection
