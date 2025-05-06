<!-- Fonts -->
<link rel="preconnect" href="https://fonts.googleapis.com" />
{{-- <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin /> --}}
<link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&ampdisplay=swap" rel="stylesheet" />
<link rel="preload" href="https://fonts.gstatic.com/s/publicsans/v18/ijwRs572Xtc6ZYQws9YVwnNGfJ4.woff2" as="font" type="font/woff2" crossorigin="anonymous">

<!-- Icons -->
<link rel="stylesheet" href="{{asset('assets/vendor/fonts/fontawesome.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/fonts/tabler-icons.css')}}" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
<link rel="stylesheet" href="{{asset('assets/vendor/fonts/flag-icons.css')}}" />

<!-- Core CSS -->

<link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/core.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/rtl/theme-default.css')}}" />

<link rel="stylesheet" href="{{asset('assets/css/demo.css')}}" />

<!-- Vendors CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/libs/node-waves/node-waves.css')}}" />

<link rel="stylesheet" href="{{asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/typeahead-js/typeahead.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/apex-charts/apex-charts.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/swiper/swiper.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/sweetalert2/sweetalert2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/select2/select2.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/@form-validation/form-validation.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/libs/spinkit/spinkit.css')}}" />
<!-- Page CSS -->
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/cards-advance.css')}}" />
<link rel="stylesheet" href="{{asset('assets/vendor/css/pages/page-profile.css')}}" />

<!-- Helpers -->
<script src="{{asset('assets/vendor/js/helpers.js')}}"></script>
<!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
<!--? Template customizer: To hide customizer set displayCustomizer value false in config.js.  -->
<script src="{{asset('assets/vendor/js/template-customizer.js')}}"></script>
<!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
<script src="{{asset('assets/js/config.js')}}"></script>
<style>
    .table:not(.table-borderless):not(.table-dark) > :not(caption) > *:not(.table-dark) > * {
        border-top-width: 0px !important;
    }
</style>
@yield('css')