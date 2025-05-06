<!doctype html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="vertical-menu-template-no-customizer" data-style="light">

<head>
    <title>{{ \App\Helpers\Helper::getCompanyName() }} - @yield('title')</title>
    @include('layouts.meta')
    @include('layouts.css')
    <!-- Vendor -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/@form-validation/form-validation.css') }}" />
    <!-- Page -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/pages/page-auth.css') }}" />
</head>

<body>
    <!-- Content -->

    <div class="authentication-wrapper authentication-cover">
        <!-- Logo -->
        <a href="" class="app-brand auth-cover-brand">
            <span class="app-brand-logo demo">
                <img src="{{ asset(\App\Helpers\Helper::getLogoLight()) }}" alt="{{\App\Helpers\Helper::getCompanyName()}}">
            </span>
            <span class="app-brand-text demo text-heading fw-bold">{{\App\Helpers\Helper::getCompanyName()}}</span>
        </a>
        <!-- /Logo -->
        <div class="authentication-inner row m-0">
            @yield('content')
        </div>
    </div>

    <!-- / Content -->

    @include('layouts.script')

    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/@form-validation/popular.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/@form-validation/auto-focus.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/pages-auth.js') }}"></script>
</body>

</html>
