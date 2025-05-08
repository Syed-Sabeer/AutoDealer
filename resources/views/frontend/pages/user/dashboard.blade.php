@extends('frontend.layouts.master')

@section('title', __('Dashboard'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
@endsection

<!-- Page Title -->
@section('breadcrumbs')
    @include('frontend.layouts.partials.breadcrumb', [
        'title' => 'Dashboard',
        'breadcrumbs' => [
            // ['label' => 'Home', 'url' => route('frontend.home')],
            ['label' => 'Dashboard'],
        ],
    ])
@endsection

@section('content')
    <!-- user-profile -->
    <div class="user-profile py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.pages.user.sections.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="user-profile-wrapper">
                        <div class="row">
                            <div class="col-md-6 col-lg-4">
                                <div class="dashboard-widget dashboard-widget-color-1">
                                    <div class="dashboard-widget-info">
                                        <h1>450</h1>
                                        <span>Active Listing</span>
                                    </div>
                                    <div class="dashboard-widget-icon">
                                        <i class="fal fa-list"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="dashboard-widget dashboard-widget-color-2">
                                    <div class="dashboard-widget-info">
                                        <h1>18.6k</h1>
                                        <span>Total Views</span>
                                    </div>
                                    <div class="dashboard-widget-icon">
                                        <i class="fal fa-eye"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-4">
                                <div class="dashboard-widget dashboard-widget-color-3">
                                    <div class="dashboard-widget-info">
                                        <h1>1560</h1>
                                        <span>Total Listing</span>
                                    </div>
                                    <div class="dashboard-widget-icon">
                                        <i class="fal fa-layer-group"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="user-profile-card">
                                    <h4 class="user-profile-card-title">Recent Listing</h4>
                                    <div class="table-responsive">
                                        <table class="table text-nowrap">
                                            <thead>
                                                <tr>
                                                    <th>Car Info</th>
                                                    <th>Brand</th>
                                                    <th>Model</th>
                                                    <th>Price</th>
                                                    <th>Body</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (isset($carListings) && count($carListings) > 0)
                                                    @foreach ($carListings as $carListing)
                                                        <tr>
                                                            <td>
                                                                <div class="table-list-info">
                                                                    <a
                                                                        href="{{ route('frontend.inventory.details', $carListing->car_id) }}">
                                                                        <img src="{{ asset($carListing->main_image) }}"
                                                                            alt="{{ $carListing->title }}">
                                                                        <div class="table-list-content">
                                                                            <h6>{{ $carListing->title }}</h6>
                                                                            <span>Car ID: #{{ $carListing->car_id }}</span>
                                                                        </div>
                                                                    </a>
                                                                </div>
                                                            </td>
                                                            <td>{{ $carListing->carBrand->name }}</td>
                                                            <td>{{ $carListing->carModel->name }}</td>
                                                            <td>{{ \App\Helpers\Helper::formatCurrency($carListing->price) }}
                                                            </td>
                                                            <td>{{ $carListing->carBodyType->name }}</td>
                                                            <td>
                                                                @php
                                                                    $statuses = [
                                                                        'draft' => 'primary',
                                                                        'published' => 'success',
                                                                        'sold' => 'info',
                                                                        'archived' => 'warning',
                                                                        'expired' => 'danger',
                                                                    ];

                                                                    $statusBadge =
                                                                        $statuses[$carListing->status] ?? 'primary';
                                                                    $statusLabel = $statuses[$carListing->status];
                                                                @endphp
                                                                <span class="badge badge-{{ $statusBadge }}">
                                                                    {{ ucfirst($carListing->status) }}
                                                                </span>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- user-profile end -->
@endsection

@section('script')
    <script></script>
@endsection
