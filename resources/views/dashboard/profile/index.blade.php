@extends('layouts.master')

@section('title', 'Profile')

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
    <li class="breadcrumb-item active">{{ __('Profile') }}</li>
@endsection
{{-- @dd($profile) --}}
@section('content')
    <!-- Header -->
    <div class="row g-6">
        <div class="col-12">
            <div class="card mb-6">
                <div class="user-profile-header-banner">
                    <img src="{{ asset('assets/img/pages/profile-banner.png') }}" alt="Banner image" class="rounded-top" />
                </div>
                <div class="user-profile-header d-flex flex-column flex-lg-row text-sm-start text-center mb-5">
                    <div class="flex-shrink-0 mt-n2 mx-sm-0 mx-auto">
                        <img src="{{ asset($profile->profile_image ?? 'assets/img/default/user.png') }}" alt="user image"
                            class="d-block h-auto ms-0 ms-sm-6 rounded user-profile-img" />
                    </div>
                    <div class="flex-grow-1 mt-3 mt-lg-5">
                        <div
                            class="d-flex align-items-md-end align-items-sm-start align-items-center justify-content-md-between justify-content-start mx-5 flex-md-row flex-column gap-4">
                            <div class="user-profile-info">
                                <h4 class="mb-2 mt-lg-6">{{ $profile->user->name }}</h4>
                                <ul
                                    class="list-inline mb-0 d-flex align-items-center flex-wrap justify-content-sm-start justify-content-center gap-4 my-2">
                                    @if ($profile->designation)
                                        <li class="list-inline-item d-flex gap-2 align-items-center">
                                            <i class="ti ti-palette ti-lg"></i><span
                                                class="fw-medium">{{ $profile->designation->name }}</span>
                                        </li>
                                    @endif
                                    @if ($profile->country)
                                        <li class="list-inline-item d-flex gap-2 align-items-center">
                                            <i class="ti ti-map-pin ti-lg"></i><span
                                                class="fw-medium">{{ $profile->country->name }}</span>
                                        </li>
                                    @endif
                                    <li class="list-inline-item d-flex gap-2 align-items-center">
                                        <i class="ti ti-calendar ti-lg"></i><span class="fw-medium"> {{ __('Joined') }}
                                            {{ $profile->created_at->format('F Y') }}</span>
                                    </li>
                                </ul>
                            </div>
                            {{-- <a href="javascript:void(0)" class="btn btn-primary mb-1">
                                <i class="ti ti-user-check ti-xs me-2"></i>Connected
                            </a> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Header -->

    <!-- Navbar pills -->
    <div class="row">
        <div class="col-md-12">
            <div class="nav-align-top">
                <ul class="nav nav-pills flex-column flex-sm-row mb-6 gap-2 gap-lg-0">
                    <li class="nav-item">
                        <a class="nav-link profile-tab" href="#" data-target="#profile-section" data-query="profile">
                            <i class="ti-sm ti ti-user-check me-1_5"></i>
                            {{ __('Profile') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link profile-tab" href="#" data-target="#account-settings-section"
                            data-query="account">
                            <i class="ti-sm ti ti-settings me-1_5"></i>
                            {{ __('Account Settings') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link profile-tab" href="#" data-target="#security-section"
                            data-query="security">
                            <i class="ti-sm ti ti-lock me-1_5"></i>
                            {{ __('Security') }}
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--/ Navbar pills -->

    <!-- User Profile Content -->
    <div class="row">
        <div class="col-xl-4 col-lg-5 col-md-5">
            <!-- About User -->
            <div class="card mb-6">
                <div class="card-body">
                    <small class="card-text text-uppercase text-muted small"></small>
                    <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-4">
                            <i class="ti ti-user ti-lg"></i><span class="fw-medium mx-2">{{ __('Full Name') }}:</span>
                            <span>{{ $profile->user->name }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <i class="ti ti-at ti-lg"></i><span class="fw-medium mx-2">{{ __('Username') }}:</span>
                            <span>{{ $profile->user->username }}</span>
                            <i class="ti ti-copy ti-lg mx-2 copy-icon" style="cursor: pointer;" data-bs-toggle="tooltip"
                                data-popup="tooltip-custom" data-bs-placement="top" title="{{ __('Copy') }}"></i>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <i class="ti ti-{{ $profile->user->is_active == 'active' ? 'check' : 'lock' }} ti-lg"></i>
                            <span class="fw-medium mx-2">{{ __('Status') }}:</span>
                            <span>{{ ucfirst($profile->user->is_active) }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <i class="ti ti-crown ti-lg"></i><span class="fw-medium mx-2">{{ __('Role') }}:</span>
                            <span>{{ Str::title(str_replace('-', ' ', Auth::user()->getRoleNames()->first())) }}</span>
                        </li>
                        @if ($profile->designation)
                            <li class="d-flex align-items-center mb-4">
                                <i class="ti ti-briefcase ti-lg"></i><span class="fw-medium mx-2">{{ __('Designation') }}:</span>
                                <span>{{ $profile->designation->name }}</span>
                            </li>
                        @endif
                        @if ($profile->country)
                            <li class="d-flex align-items-center mb-4">
                                <i class="ti ti-world ti-lg"></i><span class="fw-medium mx-2">{{ __('Country') }}:</span>
                                <span>{{ $profile->country->name }}</span>
                            </li>
                        @endif
                        @if ($profile->language)
                            <li class="d-flex align-items-center mb-2">
                                <i class="ti ti-language ti-lg"></i><span class="fw-medium mx-2">{{ __('Language') }}:</span>
                                <span>{{ $profile->language->name }}</span>
                            </li>
                        @endif
                        @if ($profile->gender)
                            <li class="d-flex align-items-center mb-2">
                                <i class="ti ti-gender-bigender ti-lg"></i><span class="fw-medium mx-2">{{ __('Gender') }}:</span>
                                <span>{{ $profile->gender->name }}</span>
                            </li>
                        @endif
                        @if ($profile->maritalStatus)
                            <li class="d-flex align-items-center mb-2">
                                <i class="ti ti-heart ti-lg"></i><span class="fw-medium mx-2">{{ __('Marital Status') }}:</span>
                                <span>{{ $profile->maritalStatus->name }}</span>
                            </li>
                        @endif
                    </ul>
                    <small class="card-text text-uppercase text-muted small">{{ __('Contacts') }}</small>
                    <ul class="list-unstyled my-3 py-1">
                        <li class="d-flex align-items-center mb-4">
                            <i class="ti ti-phone-call ti-lg"></i><span class="fw-medium mx-2">{{ __('Contact') }}:</span>
                            <span>{{ $profile->phone_number }}</span>
                        </li>
                        <li class="d-flex align-items-center mb-4">
                            <i class="ti ti-mail ti-lg"></i><span class="fw-medium mx-2">{{ __('Email') }}:</span>
                            <span>{{ $profile->user->email }}</span>
                        </li>
                    </ul>
                    <small class="card-text text-uppercase text-muted small">{{ __('BIO') }}</small>
                    <ul class="list-unstyled mb-0 mt-3 pt-1">
                        <li class="d-flex flex-wrap mb-4">
                            <span class="fw-medium me-2">{{ $profile->bio }}</span>
                        </li>
                    </ul>
                </div>
            </div>
            <!--/ About User -->
            <!-- Profile Social -->
            <div class="card mb-6">
                <div class="card-body">
                    <small class="card-text text-uppercase text-muted small">{{ __('Social') }}</small>
                    <ul class="list-unstyled mb-0 mt-3 pt-1 d-flex flex-wrap justify-content-between">
                        @if ($profile->facebook_url)
                            <li class="d-flex align-items-end mb-4">
                                <a href="{{ $profile->facebook_url }}" style="color: inherit;">
                                    <i class="fab fa-facebook fa-lg"></i>
                                    <span class="fw-medium mx-2">{{ __('Facebook') }}</span>
                                </a>
                            </li>
                        @endif
                        @if ($profile->linkedin_url)
                            <li class="d-flex align-items-end mb-4">
                                <a href="{{ $profile->linkedin_url }}" style="color: inherit;">
                                    <i class="fab fa-linkedin fa-lg"></i>
                                    <span class="fw-medium mx-2">{{ __('Linkedin') }}</span>
                                </a>
                            </li>
                        @endif
                        @if ($profile->skype_url)
                            <li class="d-flex align-items-end mb-4">
                                <a href="{{ $profile->skype_url }}" style="color: inherit;">
                                    <i class="fab fa-skype fa-lg"></i>
                                    <span class="fw-medium mx-2">{{ __('Skype') }}</span>
                                </a>
                            </li>
                        @endif
                        @if ($profile->instagram_url)
                            <li class="d-flex align-items-end mb-4">
                                <a href="{{ $profile->instagram_url }}" style="color: inherit;">
                                    <i class="fab fa-instagram fa-lg"></i>
                                    <span class="fw-medium mx-2">{{ __('Instagram') }}</span>
                                </a>
                            </li>
                        @endif
                        @if ($profile->github_url)
                            <li class="d-flex align-items-end mb-4">
                                <a href="{{ $profile->github_url }}" style="color: inherit;">
                                    <i class="fab fa-github fa-lg"></i>
                                    <span class="fw-medium mx-2">{{ __('Github') }}</span>
                                </a>
                            </li>
                        @endif
                        @if(!$profile->github_url && !$profile->instagram_url && !$profile->skype_url && !$profile->linkedin_url && !$profile->facebook_url)
                            <li class="d-flex align-items-end mb-4">
                                <a style="color: inherit;">
                                    <i class="ti ti-link-off"></i>
                                    <span class="fw-medium mx-2">{{ __('No Social Links') }}</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
            <!--/ Profile Social -->
        </div>
        <div class="col-xl-8 col-lg-7 col-md-7">
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
            <div id="profile-section" style="display: none;">
                @include('dashboard.profile.sections.activity')
            </div>
            <div id="account-settings-section" style="display: none;">
                @include('dashboard.profile.sections.setting')
            </div>
            <div id="security-section" style="display: none;">
                @include('dashboard.profile.sections.security')
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
    <script src="{{ asset('assets/js/pages-account-settings-security.js') }}"></script>
    <script src="{{ asset('assets/js/modal-enable-otp.js') }}"></script>
    <script>
        $(document).ready(function() {
            function activateTabFromURL() {
                var urlParams = new URLSearchParams(window.location.search);
                var activeTab = urlParams.get('tab') || 'company'; // Default to 'company'

                var tabMapping = {
                    'profile': '#profile-section',
                    'account': '#account-settings-section',
                    'security': '#security-section',
                };

                var activeTabSelector = tabMapping[activeTab] || '#profile-section';

                $('.col-xl-8 > div').hide(); // Hide all sections initially

                setTimeout(function() {
                    $('.edit-loader').fadeOut(); // Hide loader
                    $(activeTabSelector).fadeIn(); // Show the selected section
                    $('a.profile-tab').removeClass('active');
                    $('a[data-target="' + activeTabSelector + '"]').addClass('active');
                }, 100); // 1-second delay to simulate loading effect
            }

            activateTabFromURL(); // Load the correct tab immediately on page load

            $('a.profile-tab').on('click', function(e) {
                e.preventDefault();

                $('.edit-loader').fadeIn(); // Show loader on tab switch
                $('a.profile-tab').removeClass('active');
                $('.col-xl-8 > div').hide();

                $(this).addClass('active');

                var target = $(this).data('target');
                var queryValue = $(this).data('query');

                setTimeout(function() {
                    $('.edit-loader').fadeOut();
                    $(target).fadeIn();
                }, 100); // Shorter delay for smoother experience

                var newURL = window.location.pathname + '?tab=' + queryValue;
                window.history.pushState({
                    path: newURL
                }, '', newURL);
            });

            window.addEventListener('popstate', activateTabFromURL);

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

                    $('.phone_code').text(countryCode + " (" + phoneCode + ")"); // Update phone prefix
                    $('#phone_number').attr('maxlength', phoneLimit); // Set max length
                }
            }

            // On page load, set phone code based on saved country
            let savedCountryId = "{{ $profile->country_id }}";
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
