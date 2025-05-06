<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keywords')">
<meta name="author" content="@yield('author')">
<!-- Favicon -->
<!-- favicon -->
<link rel="icon" type="image/x-icon" href="{{ asset('frontAssets/img/logo/favicon.png') }}">
{{-- <link rel="icon" type="image/x-icon" href="{{asset(\App\Helpers\Helper::getFavicon())}}" /> --}}