<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="ti ti-menu-2 ti-md"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item navbar-search-wrapper mb-0">
                <a class="nav-item nav-link search-toggler d-flex align-items-center px-0" href="javascript:void(0);">
                    <i class="ti ti-search ti-md me-2 me-lg-4 ti-lg"></i>
                    <span class="d-none d-md-inline-block text-muted fw-normal">{{ __('Search (Ctrl+/)') }}</span>
                </a>
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Time -->
            <li class="nav-item dropdown-language dropdown">
                <span id="current-time" class="nav-link"></span>
            </li>
            <!--/ Time -->

            <!-- Language -->
            @if (env('ALLOW_TRANSLATION') == true)
                <li class="nav-item dropdown-language dropdown">
                    <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow"
                        href="javascript:void(0);" data-bs-toggle="dropdown">
                        <i class="ti ti-language rounded-circle ti-md"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li>
                            <a class="dropdown-item {{ App::getLocale() == 'en' ? 'active' : '' }}"
                                href="{{ route('lang', ['lang' => 'en']) }}">
                                <span>English<span> (US)</span></span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ App::getLocale() == 'fr' ? 'active' : '' }}"
                                href="{{ route('lang', ['lang' => 'fr']) }}">
                                <span>Français<span> (FR)</span></span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ App::getLocale() == 'ar' ? 'active' : '' }}"
                                href="{{ route('lang', ['lang' => 'ar']) }}">
                                <span>لعربية<span> (AE)</span></span>
                            </a>
                        </li>
                        <li>
                            <a class="dropdown-item {{ App::getLocale() == 'de' ? 'active' : '' }}"
                                href="{{ route('lang', ['lang' => 'de']) }}">
                                <span>Deutsch<span> (DE)</span></span>
                            </a>
                        </li>
                    </ul>
                </li>
            @endif
            <!--/ Language -->

            <!-- Style Switcher -->
            <li class="nav-item dropdown-style-switcher dropdown">
                <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow"
                    href="javascript:void(0);" data-bs-toggle="dropdown">
                    <i class="ti ti-md"></i>
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-styles">
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="light">
                            <span class="align-middle"><i class="ti ti-sun ti-md me-3"></i>Light</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="javascript:void(0);" data-theme="dark">
                            <span class="align-middle"><i class="ti ti-moon-stars ti-md me-3"></i>Dark</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!-- / Style Switcher-->

            <!-- Notification -->
            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-2">
                <a class="nav-link btn btn-text-secondary btn-icon rounded-pill dropdown-toggle hide-arrow"
                    href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                    aria-expanded="false">
                    <span class="position-relative">
                        <i class="ti ti-bell ti-md"></i>
                        <span class="badge rounded-pill bg-danger badge-dot badge-notifications border"></span>
                    </span>
                </a>
                <ul class="dropdown-menu dropdown-menu-end p-0">
                    <li class="dropdown-menu-header border-bottom">
                        <div class="dropdown-header d-flex align-items-center py-3">
                            <h6 class="mb-0 me-auto">{{ __('Notification') }}</h6>
                            <div class="d-flex align-items-center h6 mb-0">
                                <span class="badge bg-label-primary me-2 badge-unread-count"></span>
                                <a href="javascript:void(0)"
                                    class="btn btn-text-secondary rounded-pill btn-icon dropdown-notifications-all"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i
                                        class="ti ti-mail-opened text-heading"></i></a>
                            </div>
                        </div>
                    </li>
                    <li class="dropdown-notifications-list scrollable-container">
                        <ul class="list-group list-group-flush">

                        </ul>
                    </li>
                    <li class="border-top">
                        <div class="d-grid p-4">
                            <a class="btn btn-primary btn-sm d-flex" href="javascript:void(0);">
                                <small class="align-middle">{{ __('View all notifications') }}</small>
                            </a>
                        </div>
                    </li>
                </ul>
            </li>
            <!--/ Notification -->

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow p-0" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <div class="avatar avatar-online">
                        <img src="{{ asset(Auth::user()->profile->profile_image ?? 'assets/img/default/user.png') }}"
                            alt="{{ env('APP_NAME') }}" class="rounded-circle" />
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item mt-0" href="{{ route('profile.index') }}">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0 me-2">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset(Auth::user()->profile->profile_image ?? 'assets/img/default/user.png') }}"
                                            alt="{{ env('APP_NAME') }}" class="rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                                    <small class="text-muted">{{ Auth::user()->username }}</small>
                                    {{-- <small class="text-muted">{{ Str::title(str_replace('-', ' ', Auth::user()->getRoleNames()->first())) }}</small> --}}
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1 mx-n2"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.index') }}">
                            <i class="ti ti-user me-3 ti-md"></i><span
                                class="align-middle">{{ __('My Profile') }}</span>
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.index', ['tab' => 'account']) }}">
                            <i class="ti ti-settings me-3 ti-md"></i><span
                                class="align-middle">{{ __('Settings') }}</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider my-1 mx-n2"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="pages-faq.html">
                            <i class="ti ti-question-mark me-3 ti-md"></i><span
                                class="align-middle">{{ __('FAQ') }}</span>
                        </a>
                    </li>
                    <li>
                        <div class="d-grid px-2 pt-2 pb-1">
                            <a class="btn btn-sm btn-danger d-flex" style="color: #fff ;"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <small class="align-middle">{{ __('Logout') }}</small>
                                <i class="ti ti-logout ms-2 ti-14px"></i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </div>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>

    <!-- Search Small Screens -->
    <div class="navbar-search-wrapper search-input-wrapper d-none">
        <input type="text" class="form-control search-input container-xxl border-0"
            placeholder="{{ __('Search...') }}" aria-label="{{ __('Search...') }}" />
        <i class="ti ti-x search-toggler cursor-pointer"></i>
    </div>
</nav>
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
