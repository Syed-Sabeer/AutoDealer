@extends('frontend.layouts.master')

@section('title', __('Settings'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
@endsection

<!-- Page Title -->
@section('breadcrumbs')
    @include('frontend.layouts.partials.breadcrumb', [
        'title' => 'Settings',
        'breadcrumbs' => [['label' => 'Dashboard', 'url' => route('frontend.dashboard')], ['label' => 'Settings']],
    ])
@endsection

@section('content')
    <!-- user-profile -->
    <div class="user-profile py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.pages.user.sections.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="user-profile-wrapper">
                        <div class="user-profile-card profile-setting">
                            <h4 class="user-profile-card-title">Settings</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="card">
                                        <h5 class="card-header">{{ __('Deactivate Account') }}</h5>
                                        <div class="card-body row">
                                            <div class="mb-6 col-12 mb-0">
                                                <div class="alert alert-warning">
                                                    <h5 class="alert-heading mb-1">
                                                        {{ __('Are you sure you want to deactivate your account?') }}</h5>
                                                    <p class="mb-0">
                                                        {{ __('Once you deactivate your account, there is no going back. Please be certain.') }}
                                                    </p>
                                                </div>
                                            </div>
                                            <form id="formAccountDeactivation" method="POST"
                                                action="{{ route('account.deactivate', $profile->user->id) }}">
                                                @csrf
                                                <div class="form-check my-8">
                                                    <input class="form-check-input" type="checkbox" name="accountActivation"
                                                        id="accountActivation" />
                                                    <label class="form-check-label"
                                                        for="accountActivation">{{ __('I confirm my account deactivation') }}</label>
                                                </div>
                                                <button class="btn btn-danger deactivate-account" disabled>
                                                    {{ __('Deactivate Account') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- user-profile end -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkbox = document.getElementById('accountActivation');
            const button = document.querySelector('.deactivate-account');

            checkbox.addEventListener('change', function() {
                button.disabled = !this.checked;
            });
        });
    </script>
@endsection

@section('script')
@endsection
