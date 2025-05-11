@extends('frontend.layouts.master')

@section('title', __('My Listing'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
@endsection

<!-- Page Title -->
@section('breadcrumbs')
    @include('frontend.layouts.partials.breadcrumb', [
        'title' => 'My Listing',
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('frontend.dashboard')],
            ['label' => 'My Listing'],
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
                        <div class="user-profile-card profile-ad">
                            <div class="user-profile-card-header">
                                <h4 class="user-profile-card-title">My Listing</h4>
                                <div class="user-profile-card-header-right">
                                    <div class="user-profile-search">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search...">
                                            <i class="far fa-search"></i>
                                        </div>
                                    </div>
                                    <a href="#" class="theme-btn"><span class="far fa-plus-circle"></span>Add Listing</a>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Car Info</th>
                                                <th>Brand</th>
                                                <th>Model</th>
                                                <th>Price</th>
                                                {{-- <th>Body</th> --}}
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($carListings) && count($carListings) > 0)
                                                @foreach ($carListings as $carListing)
                                                    <tr>
                                                        <td>
                                                            <div class="table-list-info">
                                                                <a href="{{route('frontend.inventory.details',$carListing->car_id)}}">
                                                                    <img src="{{ asset($carListing->main_image) }}" alt="{{ $carListing->title }}">
                                                                    <div class="table-list-content">
                                                                        <h6>{{ $carListing->title }}</h6>
                                                                        <span>Car ID: #{{ $carListing->car_id }}</span>
                                                                    </div>
                                                                </a>
                                                            </div>
                                                        </td>
                                                        <td>{{ $carListing->carBrand->name }}</td>
                                                        <td>{{ $carListing->carModel->name }}</td>
                                                        <td>{{ \App\Helpers\Helper::formatCurrency($carListing->price) }}</td>
                                                        {{-- <td>{{ $carListing->carBodyType->name }}</td> --}}
                                                        <td>
                                                            @php
                                                                $statuses = [
                                                                    'draft' => 'primary',
                                                                    'published' => 'success',
                                                                    'sold' => 'info',
                                                                    'archived' => 'warning',
                                                                    'expired' => 'danger',
                                                                ];

                                                                $statusBadge = $statuses[$carListing->status] ?? 'primary';
                                                                $statusLabel = $statuses[$carListing->status]
                                                            @endphp
                                                            <span class="badge badge-{{ $statusBadge }}">
                                                                {{ ucfirst($carListing->status) }}
                                                            </span>
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('frontend.inventory.details',$carListing->car_id) }}" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Details"><i class="far fa-eye"></i></a>
                                                            <a href="{{ route('frontend.car-listings.edit', $carListing->id) }}" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Edit"><i class="far fa-pen"></i></a>
                                                            <a href="{{ route('frontend.car-listings.destroy', $carListing->id) }}" class="btn btn-outline-danger btn-sm rounded-2" data-bs-toggle="tooltip" title="Delete">
                                                                <i class="far fa-trash-can"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        </tbody>
                                    </table>
                                </div>
                                <!-- pagination -->
                                <div class="pagination-area">
                                    <div aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                @if ($carListings->onFirstPage())
                                                    <a class="page-link" href="javascript:void(0);" aria-label="Previous">
                                                        <span aria-hidden="true"><i class="far fa-arrow-left"></i></span>
                                                    </a>
                                                @else
                                                    <a class="page-link" href="{{ $carListings->previousPageUrl() }}"
                                                        aria-label="Previous">
                                                        <span aria-hidden="true"><i class="far fa-arrow-left"></i></span>
                                                    </a>
                                                @endif
                                            </li>
                                            @foreach ($carListings->getUrlRange(1, $carListings->lastPage()) as $page => $url)
                                                <li class="page-item {{ $page == $carListings->currentPage() ? 'active' : '' }}"><a
                                                        class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                                            @endforeach

                                            <li class="page-item">
                                                @if ($carListings->hasMorePages())
                                                    <a class="page-link" href="{{ $carListings->nextPageUrl() }}"
                                                        aria-label="Next">
                                                        <span aria-hidden="true"><i class="far fa-arrow-right"></i></span>
                                                    </a>
                                                @else
                                                    <a class="page-link" href="javascript:void(0);" aria-label="Next">
                                                        <span aria-hidden="true"><i class="far fa-arrow-right"></i></span>
                                                    </a>
                                                @endif
                                            </li>
                                        </ul>
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
