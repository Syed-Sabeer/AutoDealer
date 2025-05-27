@extends('layouts.master')

@section('title', 'Dashboard')

@section('css')
@endsection

@section('breadcrumb-items')
    {{-- <li class="breadcrumb-item active">{{ __('Dashboard') }}</li> --}}
@endsection

@section('content')
    <div class="row g-6">
        <!-- View sales -->
        <div class="col-xl-4">
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-7">
                        <div class="card-body text-nowrap">
                            <h5 class="card-title mb-0">Hi {{ Auth::user()->name }}! 🎉</h5>
                            <p class="mb-2">Here what's happening in <br> your account today!</p>
                            <a href="{{ route('profile.index') }}" class="btn btn-primary">View Profile</a>
                        </div>
                    </div>
                    <div class="col-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="{{ asset('assets/img/illustrations/card-advance-sale.png') }}" height="140"
                                alt="view profile" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- View sales -->

        <!-- Statistics -->
        <div class="col-xl-8 col-md-12">
            <div class="card h-100">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="card-title mb-0">Statistics</h5>
                    <small class="text-body-secondary">Overall Stats</small>
                </div>
                <div class="card-body d-flex align-items-end">
                    <div class="w-100">
                        <div class="row gy-3">
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded bg-label-primary me-4 p-2">
                                        <i class="icon-base ti ti-car icon-lg"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ $totalCarListed }}</h5>
                                        <small>Listings</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded bg-label-info me-4 p-2">
                                        <i class="icon-base ti ti-pencil icon-lg"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ $draftedCarListings }}</h5>
                                        <small>Drafted</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded bg-label-success me-4 p-2">
                                        <i class="icon-base ti ti-broadcast icon-lg"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ $publishedCarListings }}</h5>
                                        <small>Published</small>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 col-6">
                                <div class="d-flex align-items-center">
                                    <div class="badge rounded bg-label-warning me-4 p-2">
                                        <i class="icon-base ti ti-check icon-lg"></i>
                                    </div>
                                    <div class="card-info">
                                        <h5 class="mb-0">{{ $soldCarListings }}</h5>
                                        <small>Sold</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Statistics -->

        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="text-heading">{{ __('Sellers') }}</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{ $totalSellers }}</h4>
                            </div>
                            <small class="mb-0">{{ __('Total Sellers') }}</small>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-primary">
                                <i class="ti ti-users ti-26px"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="text-heading">{{ __('Deactivated Sellers') }}</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">
                                    {{ $totalDeactivatedSellers }}
                                </h4>
                            </div>
                            <small class="mb-0">{{ __('Total Deactive Sellers') }} </small>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-danger">
                                <i class="ti ti-user-off ti-26px"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="text-heading">{{ __('Active Sellers') }}</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{ $totalActiveSellers }}</h4>
                            </div>
                            <small class="mb-0">{{ __('Total Active Sellers') }}</small>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-success">
                                <i class="ti ti-user-check ti-26px"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex align-items-start justify-content-between">
                        <div class="content-left">
                            <span class="text-heading">{{ __('Archived Sellers') }}</span>
                            <div class="d-flex align-items-center my-1">
                                <h4 class="mb-0 me-2">{{ $totalArchivedSellers }}</h4>
                            </div>
                            <small class="mb-0">{{ __('Total Archived Sellers') }}</small>
                        </div>
                        <div class="avatar">
                            <span class="avatar-initial rounded bg-label-warning">
                                <i class="ti ti-archive ti-26px"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
@endsection