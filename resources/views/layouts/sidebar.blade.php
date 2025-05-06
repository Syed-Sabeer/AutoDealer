<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="{{ asset(\App\Helpers\Helper::getLogoLight()) }}" alt="{{env('APP_NAME')}}">
            </span>
            <span class="app-brand-text demo menu-text fw-bold">{{\App\Helpers\Helper::getCompanyName()}}</span>
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
