@extends('layouts.errors.master')

@section('title', 'Account Deactivated')

@section('css')
@endsection

@section('content')
    <div class="misc-wrapper text-center">
        <h1 class="mb-2 mx-2 text-danger" style="line-height: 6rem; font-size: 6rem">🚫</h1>
        <h4 class="mb-2 mx-2">{{__('Your Account Has Been Deactivated')}}</h4>
        <p class="mb-6 mx-2">{{__('It looks like your account is inactive. Please contact support if you believe this is a mistake.')}}</p>
        <div class="d-flex">
            <a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger mb-10 mx-4">{{__('Logout')}}</a>
            <a href="#" class="btn btn-primary mb-10">{{__('Contact Support')}}</a>
        </div>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
        <div class="mt-4">
            <img src="{{ asset('assets/img/illustrations/page-misc-error.png') }}" alt="Account Deactivated" width="225" class="img-fluid" />
        </div>
    </div>
@endsection

@section('script')
@endsection
