<!-- header area -->
<header class="header">
    <!-- top header -->
    <div class="header-top">
        <div class="container">
            <div class="header-top-wrapper">
                <div class="header-top-left">
                    <div class="header-top-contact">
                        <ul>
                            <li><a href="mailto:{{ \App\Helpers\Helper::getCompanyEmail() }}"><i class="far fa-envelopes"></i>
                                    <span>{{ \App\Helpers\Helper::getCompanyEmail() }}</span></a>
                            </li>
                            <li><a href="tel:{{ \App\Helpers\Helper::getCompanyPhone() }}"><i class="far fa-phone-volume"></i> {{ \App\Helpers\Helper::getCompanyPhone() }}</a>
                            </li>
                            <li><a href="#"><i class="far fa-alarm-clock"></i> Sun - Fri (08AM - 10PM)</a></li>
                        </ul>
                    </div>
                </div>
                <div class="header-top-right">
                    <div class="header-top-link">
                        @if (Auth::check())
                            <a href="#"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="far fa-arrow-right-to-arc"></i> Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        @else
                            <a href="{{ route('frontend.login') }}"><i class="far fa-arrow-right-to-arc"></i> Login</a>
                            <a href="{{ route('frontend.register') }}"><i class="far fa-user-vneck"></i> Register</a>
                        @endif
                    </div>
                    <div class="header-top-social">
                        <span>Follow Us: </span>
                        @if (\App\Helpers\Helper::getCompanyFacebook() !== null)
                            <a href="{{ \App\Helpers\Helper::getCompanyFacebook() }}">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        @endif
                        @if (\App\Helpers\Helper::getCompanyInstagram() !== null)
                            <a href="{{ \App\Helpers\Helper::getCompanyInstagram() }}">
                                <i class="fab fa-instagram"></i>
                            </a>
                        @endif
                        @if (\App\Helpers\Helper::getCompanyTwitter() !== null)
                            <a href="{{ \App\Helpers\Helper::getCompanyTwitter() }}">
                                <i class="fab fa-twitter"></i>
                            </a>
                        @endif
                        @if (\App\Helpers\Helper::getCompanyLinkedin() !== null)
                            <a href="{{ \App\Helpers\Helper::getCompanyLinkedin() }}">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-navigation">
        <nav class="navbar navbar-expand-lg" style="background-color: #B3C8CF !important;">
            <div class="container position-relative">
                <a class="navbar-brand" href="{{ route('frontend.home') }}">
                    <img src="{{ asset(\App\Helpers\Helper::getLogoDark()) }}" style="width: 80px !important" alt="logo">
                </a>
                <div class="mobile-menu-right">
                    @if (Auth::check())
                        <div class="nav-right-account">
                            <div class="dropdown">
                                <div data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ asset(Auth::user()->profile->profile_image ?? 'assets/img/default/user.png') }}"
                                        alt="">
                                </div>
                                <ul class="dropdown-menu dropdown-menu-end">
                                    <li>
                                        <a class="dropdown-item" href="{{ route('frontend.dashboard') }}">
                                            <i class="far fa-gauge-high"></i>
                                            Dashboard
                                        </a>
                                    </li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.profile') }}"><i class="far fa-user"></i> My
                                            Profile</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.my-listings') }}"><i
                                                class="far fa-layer-group"></i> My Listing</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.my-favourites') }}"><i
                                                class="far fa-heart"></i>
                                            My Favorites</a></li>
                                    <li><a class="dropdown-item" href="{{ route('frontend.settings') }}"><i class="far fa-cog"></i>
                                            Settings</a></li>
                                    <li>
                                        <a class="dropdown-item" href="#"
                                            onclick="event.preventDefault(); document.getElementById('logout-form2').submit();">
                                            <i class="far fa-sign-out"></i> Log Out
                                        </a>
                                        <form id="logout-form2" action="{{ route('logout') }}" method="POST"
                                            class="d-none">
                                            @csrf
                                        </form>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    @else
                        <a href="{{ route('frontend.login') }}"><i class="far fa-arrow-right-to-arc"></i> Login</a>
                    @endif
                    {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-mobile-icon"><i class="far fa-bars"></i></span>
                    </button> --}}
                    <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasMenu"
                        aria-controls="offcanvasMenu" aria-label="Toggle navigation">
                        <span class="navbar-toggler-mobile-icon"><i class="far fa-bars"></i></span>
                    </button>
                </div>
                <div class="collapse navbar-collapse" id="main_nav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('frontend.home') ? 'active' : '' }}"
                                href="{{ route('frontend.home') }}">Home</a>
                        </li>
                        <li class="nav-item"><a
                                class="nav-link {{ request()->routeIs('frontend.about') ? 'active' : '' }}"
                                href="{{ route('frontend.about') }}">About</a></li>
                        <li class="nav-item"><a
                                class="nav-link {{ request()->routeIs('frontend.inventory') ? 'active' : '' }}"
                                href="{{ route('frontend.inventory') }}">Vehicles</a></li>
                        {{-- <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">Blog</a>
                            <ul class="dropdown-menu fade-down">
                                <li><a class="dropdown-item" href="blog.html">Blog</a></li>
                                <li><a class="dropdown-item" href="blog-single.html">Blog Single</a></li>
                            </ul>
                        </li> --}}
                        <li class="nav-item">
                            <a class="nav-link {{ request()->routeIs('frontend.contact') ? 'active' : '' }}"
                                href="{{ route('frontend.contact') }}">Contact</a>
                        </li>
                    </ul>
                    <div class="nav-right">
                        {{-- <div class="cart-btn">
                            <a href="#" class="nav-right-link"><i
                                    class="far fa-cart-plus"></i><span>0</span></a>
                        </div> --}}
                        @if (Auth::check())
                            <div class="nav-right-account">
                                <div class="dropdown">
                                    <div data-bs-toggle="dropdown" aria-expanded="false">
                                        <img src="{{ asset(Auth::user()->profile->profile_image ?? 'assets/img/default/user.png') }}"
                                            alt="">
                                    </div>
                                    <ul class="dropdown-menu dropdown-menu-end">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('frontend.dashboard') }}">
                                                <i class="far fa-gauge-high"></i>
                                                Dashboard
                                            </a>
                                        </li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.profile') }}"><i class="far fa-user"></i>
                                                My
                                                Profile</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.my-listings') }}"><i
                                                    class="far fa-layer-group"></i> My Listing</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.my-favourites') }}"><i
                                                    class="far fa-heart"></i> My Favorites</a></li>
                                        <li><a class="dropdown-item" href="{{ route('frontend.settings') }}"><i
                                                    class="far fa-cog"></i> Settings</a></li>
                                        <li>
                                            <a class="dropdown-item" href="#"
                                                onclick="event.preventDefault(); document.getElementById('logout-form3').submit();">
                                                <i class="far fa-sign-out"></i> Log Out
                                            </a>
                                            <form id="logout-form3" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        @endif
                        <div class="search-btn">
                            <button type="button" class="nav-right-link"><i class="far fa-search"></i></button>
                        </div>
                        @if (Auth::check())
                            <div class="nav-right-btn mt-2">
                                <a href="{{ route('frontend.add-listings') }}" class="theme-btn"><span class="far fa-plus-circle"></span>Add
                                    Listing</a>
                            </div>
                        @endif
                        <div class="sidebar-btn">
                            <button type="button" class="nav-right-link"><i class="far fa-bars-sort"></i></button>
                        </div>
                    </div>
                    <!-- search area -->
                        <div class="search-area">
                            <form action="{{ route('frontend.inventory') }}" method="GET">
                                <div class="form-group">
                                    <input type="text" name="search" class="form-control" placeholder="Type Keyword...">
                                    <button type="submit" class="search-icon-btn"><i class="far fa-search"></i></button>
                                </div>
                            </form>
                        </div>
                    <!-- search area end -->
                </div>
            </div>
        </nav>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasMenu" aria-labelledby="offcanvasMenuLabel" style="background-color: #B3C8CF !important;">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="offcanvasMenuLabel"><a class="navbar-brand" href="{{ route('frontend.home') }}">
                    <img src="{{ asset(\App\Helpers\Helper::getLogoDark()) }}" alt="logo">
                </a></h5>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                    aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('frontend.home') ? 'active' : '' }}" href="{{ route('frontend.home') }}">Home</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('frontend.about') ? 'active' : '' }}" href="{{ route('frontend.about') }}">About</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('frontend.inventory') ? 'active' : '' }}" href="{{ route('frontend.inventory') }}">Vehicles</a></li>
                    <li class="nav-item"><a class="nav-link {{ request()->routeIs('frontend.contact') ? 'active' : '' }}" href="{{ route('frontend.contact') }}">Contact</a></li>
                </ul>
                @if (Auth::check())
                    <hr>
                    <ul class="navbar-nav">
                        <li><a class="nav-link" href="{{ route('frontend.dashboard') }}"><i class="far fa-gauge-high"></i> Dashboard</a></li>
                        <li><a class="nav-link" href="{{ route('frontend.profile') }}"><i class="far fa-user"></i> Profile</a></li>
                        <li><a class="nav-link" href="{{ route('frontend.my-listings') }}"><i class="far fa-layer-group"></i> My Listing</a></li>
                        <li><a class="nav-link" href="{{ route('frontend.my-favourites') }}"><i class="far fa-heart"></i> Favorites</a></li>
                        <li><a class="nav-link" href="{{ route('frontend.settings') }}"><i class="far fa-cog"></i> Settings</a></li>
                        <li><a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form-offcanvas').submit();"><i class="far fa-sign-out"></i> Logout</a></li>
                        <form id="logout-form-offcanvas" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
                    </ul>
                @else
                    <div class="mt-3">
                        <a href="{{ route('frontend.login') }}" class="btn btn-outline-primary w-100 mb-2">Login</a>
                        <a href="{{ route('frontend.register') }}" class="btn btn-primary w-100">Register</a>
                    </div>
                @endif
            </div>
        </div>
    </div>
</header>
<!-- header area end -->


