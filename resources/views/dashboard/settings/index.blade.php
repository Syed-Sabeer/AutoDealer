@extends('layouts.master')

@section('title', __('Settings'))

@section('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-account-settings.css') }}" />
    <style>
        .edit-loader {
            width: 100%;
        }

        .edit-loader .sk-chase {
            display: block;
            margin: 0 auto;
        }
    </style>
@endsection


@section('breadcrumb-items')
    <li class="breadcrumb-item active">{{ __('Settings') }}</li>
@endsection

@section('content')

    <!-- Navbar pills -->
    <div class="row">
        <div class="col-md-12">
            <div class="nav-align-top">
                <ul class="nav nav-pills flex-column flex-sm-row mb-6 gap-2 gap-lg-0">
                    <li class="nav-item">
                        <a class="nav-link profile-tab" href="#" data-target="#company-setting" data-query="company">
                            <i class="ti-sm ti ti-briefcase me-1_5"></i>
                            {{ __('Company Setting') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link profile-tab" href="#" data-target="#recaptcha-setting"
                            data-query="recaptcha">
                            <i class="ti-sm ti ti-shield me-1_5"></i>
                            {{ __('ReCaptcha Setting') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link profile-tab" href="#" data-target="#system-settings" data-query="system">
                            <i class="ti-sm ti ti-settings me-1_5"></i>
                            {{ __('System Settings') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link profile-tab" href="#" data-target="#email-settings" data-query="email">
                            <i class="ti-sm ti ti-mail me-1_5"></i>
                            {{ __('Email Settings') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/ Navbar pills -->

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12">
            <div class="edit-loader">
                <div class="sk-chase sk-primary">
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                    <div class="sk-chase-dot"></div>
                </div>
            </div>
            <div id="company-setting" style="display: none;">
                @include('dashboard.settings.sections.company-setting')
            </div>
            <div id="recaptcha-setting" style="display: none;">
                @include('dashboard.settings.sections.recaptcha-setting')
            </div>
            <div id="system-settings" style="display: none;">
                @include('dashboard.settings.sections.system-setting')
            </div>
            <div id="email-settings" style="display: none;">
                @include('dashboard.settings.sections.email-setting')
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/custom-js/settings.js') }}"></script>
    <script>
        $(document).ready(function() {
            let countryData = {
                @foreach ($countries as $country)
                    "{{ $country->id }}": {
                        code: "{{ $country->code }}",
                        phone_code: "{{ $country->phone_code }}",
                        phone_limit: {{ $country->phone_number_limit }}
                    },
                @endforeach
            };

            function updatePhoneCode(countryId) {
                if (countryId in countryData) {
                    let countryCode = countryData[countryId].code;
                    let phoneCode = countryData[countryId].phone_code;
                    let phoneLimit = countryData[countryId].phone_limit;

                    $('.input-group-text').text(countryCode + " (" + phoneCode + ")"); // Update phone prefix
                    $('#phone_number').attr('maxlength', phoneLimit); // Set max length
                }
            }

            // On page load, set phone code based on saved country
            let savedCountryId = "{{ $companySetting->country_id }}";
            if (savedCountryId) {
                updatePhoneCode(savedCountryId);
            }

            // When country is changed
            $('#country').change(function() {
                let selectedCountryId = $(this).val();
                updatePhoneCode(selectedCountryId);
                $('#phone_number').val(''); // Clear phone input on change
            });
        });
    </script>
@endsection
