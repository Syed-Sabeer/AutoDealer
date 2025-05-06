<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
<meta name="csrf-token" content="{{ csrf_token() }}">
<meta name="description" content="@yield('description')">
<meta name="keywords" content="@yield('keywords')">
<meta name="author" content="@yield('author')">
<!-- Favicon -->
<link rel="icon" type="image/x-icon" href="{{asset(\App\Helpers\Helper::getFavicon())}}" />