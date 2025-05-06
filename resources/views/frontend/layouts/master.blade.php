<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ \App\Helpers\Helper::getCompanyName() }} - @yield('title')</title>
    @include('frontend.layouts.meta')
    @include('frontend.layouts.css')
    @yield('css')
</head>

<body>

    <!-- preloader -->
    <div class="preloader">
        <div class="loader-ripple">
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- preloader end -->

    <!-- header area -->
        @include('frontend.layouts.header')
    <!-- header area end -->


    <!-- sidebar-popup -->
        @include('frontend.layouts.sidebar')
    <!-- sidebar-popup end -->


    <main class="main">
        @yield('content')
    </main>



    <!-- footer area -->
        @include('frontend.layouts.footer')
    <!-- footer area end -->




    <!-- scroll-top -->
    <a href="#" id="scroll-top"><i class="far fa-arrow-up"></i></a>
    <!-- scroll-top end -->


    <!-- js -->
    @include('frontend.layouts.script')

</body>

</html>
