<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('frontend.dashboard') }}" class="app-brand-link">
            <span class="">
                <img style="width: 30px !important; height: 30px;" src="{{ asset(\App\Helpers\Helper::getLogoDark()) }}" alt="{{env('APP_NAME')}}">
            </span>
            <span class="app-brand-text demo menu-text fw-bold" style="font-size: 16px;">{{\App\Helpers\Helper::getCompanyName()}}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-md align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div>{{__('Dashboard')}}</div>
            </a>
        </li>

        <!-- Apps & Pages -->
        <li class="menu-header small">
            <span class="menu-header-text">{{__('Apps & Pages')}}</span>
        </li>
        @canany(['view car listing', 'view archived car listing'])
            <li class="menu-item {{ request()->routeIs('dashboard.car-listings.*') || request()->routeIs('dashboard.archived-car-listings.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-car-suv"></i>
                    <div>{{__('Car Listings')}}</div>
                </a>
                <ul class="menu-sub">
                    @can(['view car listing'])
                        <li class="menu-item {{ request()->routeIs('dashboard.car-listings.*') ? 'active' : '' }}">
                            <a href="{{route('dashboard.car-listings.index')}}" class="menu-link">
                                <div>{{__('All Car Listings')}}</div>
                            </a>
                        </li>
                    @endcan
                    @can(['view archived car listing'])
                        <li class="menu-item {{ request()->routeIs('dashboard.archived-car-listings.*') ? 'active' : '' }}">
                            <a href="{{route('dashboard.archived-car-listings.index')}}" class="menu-link">
                                <div>{{__('Archived Car Listings')}}</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can(['view car brand'])
            <li class="menu-item {{ request()->routeIs('dashboard.car-brands.*') ? 'active' : '' }}">
                <a href="{{ route('dashboard.car-brands.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-steering-wheel"></i>
                    <div>{{__('Car Brands')}}</div>
                </a>
            </li>
        @endcan
        @canany(['view user', 'view archived user'])
            <li class="menu-item {{ request()->routeIs('dashboard.user.*') || request()->routeIs('dashboard.archived-user.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-users"></i>
                    <div>{{__('Users')}}</div>
                </a>
                <ul class="menu-sub">
                    @can(['view user'])
                        <li class="menu-item {{ request()->routeIs('dashboard.user.*') ? 'active' : '' }}">
                            <a href="{{route('dashboard.user.index')}}" class="menu-link">
                                <div>{{__('All Users')}}</div>
                            </a>
                        </li>
                    @endcan
                    @can(['view archived user'])
                        <li class="menu-item {{ request()->routeIs('dashboard.archived-user.*') ? 'active' : '' }}">
                            <a href="{{route('dashboard.archived-user.index')}}" class="menu-link">
                                <div>{{__('Archived Users')}}</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @canany(['view role', 'view permission'])
            <li class="menu-item {{ request()->routeIs('dashboard.roles.*') || request()->routeIs('dashboard.permissions.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    {{-- <i class="menu-icon tf-icons ti ti-settings"></i> --}}
                    <i class="menu-icon tf-icons ti ti-shield-lock"></i>
                    <div>{{__('Roles & Permissions')}}</div>
                </a>
                <ul class="menu-sub">
                    @can(['view role'])
                        <li class="menu-item {{ request()->routeIs('dashboard.roles.*') ? 'active' : '' }}">
                            <a href="{{route('dashboard.roles.index')}}" class="menu-link">
                                <div>{{__('Roles')}}</div>
                            </a>
                        </li>
                    @endcan
                    @can(['view permission'])
                        <li class="menu-item {{ request()->routeIs('dashboard.permissions.*') ? 'active' : '' }}">
                            <a href="{{route('dashboard.permissions.index')}}" class="menu-link">
                                <div>{{__('Permissions')}}</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @canany(['view body type', 'view fuel type', 'view feature'])
            <li class="menu-item {{ request()->routeIs('dashboard.body-types.*') || request()->routeIs('dashboard.fuel-types.*') || request()->routeIs('dashboard.features.*') ? 'open' : '' }}">
                <a href="javascript:void(0);" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ti ti-adjustments"></i>
                    <div>{{__('Setup')}}</div>
                </a>
                <ul class="menu-sub">
                    @can(['view body type'])
                        <li class="menu-item {{ request()->routeIs('dashboard.body-types.*') ? 'active' : '' }}">
                            <a href="{{route('dashboard.body-types.index')}}" class="menu-link">
                                <div>{{__('Body Types')}}</div>
                            </a>
                        </li>
                    @endcan
                    @can(['view fuel type'])
                        <li class="menu-item {{ request()->routeIs('dashboard.fuel-types.*') ? 'active' : '' }}">
                            <a href="{{route('dashboard.fuel-types.index')}}" class="menu-link">
                                <div>{{__('Fuel Types')}}</div>
                            </a>
                        </li>
                    @endcan
                    @can(['view feature'])
                        <li class="menu-item {{ request()->routeIs('dashboard.features.*') ? 'active' : '' }}">
                            <a href="{{route('dashboard.features.index')}}" class="menu-link">
                                <div>{{__('Features')}}</div>
                            </a>
                        </li>
                    @endcan
                </ul>
            </li>
        @endcan
        @can(['view setting'])
            <li class="menu-item {{ request()->routeIs('dashboard.setting.*') ? 'active' : '' }}">
                <a href="{{ route('dashboard.setting.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons ti ti-settings"></i>
                    <div>{{__('Settings')}}</div>
                </a>
            </li>
        @endcan
    </ul>
</aside>
