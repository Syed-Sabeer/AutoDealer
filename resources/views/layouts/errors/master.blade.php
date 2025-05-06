<!doctype html>

<html lang="en" class="light-style layout-wide customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="vertical-menu-template-no-customizer" data-style="light">

<head>
    <title>{{ \App\Helpers\Helper::getCompanyName() }} - @yield('title')</title>
    @include('layouts.meta')
    @include('layouts.css')
    <!-- Page CSS -->
    <!-- Page -->
    <link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-misc.css')}}" />
</head>

<body>
    <!-- Content -->

    <!-- Error -->
    <div class="container-xxl container-p-y">
        @yield('content')
    </div>
    <div class="container-fluid misc-bg-wrapper">
        <img src="{{asset('assets/img/illustrations/bg-shape-image-light.png')}}" height="355" alt="page-misc-error"
            data-app-light-img="illustrations/bg-shape-image-light.png"
            data-app-dark-img="illustrations/bg-shape-image-dark.png" />
    </div>
    <!-- /Error -->

    <!-- / Content -->

    <!-- Core JS -->
    @include('layouts.script')
</body>

</html>
