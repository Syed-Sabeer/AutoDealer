<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ \App\Helpers\Helper::getCompanyName() }} - @yield('title')</title>
    @include('frontend.layouts.meta')
    @include('frontend.layouts.css')
    @yield('css')
    <style>
        .hero-single {
            padding-top: 180px;
            background: rgba(239, 29, 38, .05);
        }

        .hero-single::before {
            content: "";
            position: absolute;
            width: 600px;
            height: 600px;
            background: #0069a4;
            border-radius: 100px;
            opacity: .05;
            left: -150px;
            top: -150px;
            transform: rotate(-45deg);
        }

        .hero-single::after {
            content: "";
            position: absolute;
            width: 420px;
            height: 100%;
            background: #0069a4;
            opacity: .05;
            right: 0;
            top: 0;
            z-index: -2;
        }

        .hero-img::before {
            filter: none;
            bottom: -10px;
            width: 470px;
            height: 470px;
        }

        .hero-single .hero-title,
        .hero-single p {
            color: #111111;
        }
        .hero-content .hero-title,
        .hero-content p {
            color: #111111 !important;
        }

        .hero-single .hero-title span {
            -webkit-text-stroke: 2px #0069a4;
            -webkit-text-fill-color: transparent;
        }


        @media all and (max-width: 1199px) {
            .hero-single .hero-img::before {
                width: 450px;
                height: 450px;
            }
        }

        @media all and (max-width: 991px) {
            .hero-single {
                padding-top: 220px;
            }

            .hero-single .hero-img::before {
                width: 450px;
                height: 450px;
                top: -40px;
            }
        }

        @media all and (max-width: 767px) {
            .hero-single .hero-img::before {
                width: 250px;
                height: 250px;
                top: -10px;
                right: 50px;
            }
        }
    </style>
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
        <!-- Breadcrumb -->
        @yield('breadcrumbs')
        <!-- / Breadcrumb -->

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
