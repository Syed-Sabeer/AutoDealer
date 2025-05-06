@extends('layouts.errors.master')

@section('title', 'Error 404')

@section('css')
@endsection

@section('content')
    <div class="misc-wrapper">
        <h1 class="mb-2 mx-2" style="line-height: 6rem; font-size: 6rem">429</h1>
        <h4 class="mb-2 mx-2">{{__('Too Many Requests')}} ⚠️</h4>
        <p class="mb-6 mx-2">{{__("You've sent too many requests in a given amount of time. Please try again later.")}}</p>
        <a href="{{ route('dashboard') }}" class="btn btn-primary mb-10">{{__("Back to home")}}</a>
        <div class="mt-4">
            <img src="{{ asset('assets/img/illustrations/page-misc-error.png') }}" alt="page-misc-error" width="225"
                class="img-fluid" />
        </div>
    </div>
@endsection

@section('script')
@endsection
