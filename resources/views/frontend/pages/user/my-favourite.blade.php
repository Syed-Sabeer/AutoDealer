@extends('frontend.layouts.master')

@section('title', __('My Favourite'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
@endsection

<!-- Page Title -->
@section('breadcrumbs')
    @include('frontend.layouts.partials.breadcrumb', [
        'title' => 'My Favourite',
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('frontend.dashboard')],
            ['label' => 'My Favourite'],
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
                        <div class="user-profile-card profile-favorite">
                            <h4 class="user-profile-card-title">My Favorites</h4>
                            @if (isset($userFavourites) && count($userFavourites) > 0)
                                <div class="row">
                                    @foreach ($userFavourites as $favourite)
                                        <div class="col-md-6 col-lg-4">
                                            <div class="car-item">
                                                <div class="car-img">
                                                    <span
                                                        class="car-status status-{{ $favourite->carListing->condition == 'new' ? '2' : '1' }}">{{ ucfirst($favourite->carListing->condition) }}</span>
                                                    <img src="{{ asset($favourite->carListing->main_image) }}"
                                                        alt="">
                                                    <div class="car-btns">
                                                        <a
                                                            href="{{ route('frontend.add.favourites', $favourite->carListing->id) }}"><i class="fas fa-heart"></i> <!-- Solid filled heart -->
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="car-content">
                                                    <div class="car-top">
                                                        <h4><a
                                                                href="{{ route('frontend.inventory.details', $favourite->carListing->car_id) }}">{{ $favourite->carListing->title }}</a>
                                                        </h4>
                                                        <div class="car-rate">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <span>5.0 (58.5k Review)</span>
                                                        </div>
                                                    </div>
                                                    <ul class="car-list">
                                                        <li><i
                                                                class="far fa-steering-wheel"></i>{{ ucfirst($favourite->carListing->transmission) }}
                                                        </li>
                                                        <li><i
                                                                class="far fa-road"></i>{{ $favourite->carListing->fuel_efficiency }}km
                                                            / 1-litre</li>
                                                        <li><i class="far fa-car"></i>Model:
                                                            {{ $favourite->carListing->year }}</li>
                                                        <li><i
                                                                class="far fa-gas-pump"></i>{{ $favourite->carListing->carFuelType->name }}
                                                        </li>
                                                    </ul>
                                                    <div class="car-footer">
                                                        <span
                                                            class="car-price">{{ \App\Helpers\Helper::formatCurrency($favourite->carListing->price) }}</span>
                                                        <a href="{{ route('frontend.inventory.details', $favourite->carListing->car_id) }}"
                                                            class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <!-- pagination -->
                                <div class="pagination-area">
                                    <div aria-label="Page navigation example">
                                        <ul class="pagination">
                                            <li class="page-item">
                                                @if ($userFavourites->onFirstPage())
                                                    <a class="page-link" href="javascript:void(0);" aria-label="Previous">
                                                        <span aria-hidden="true"><i class="far fa-arrow-left"></i></span>
                                                    </a>
                                                @else
                                                    <a class="page-link" href="{{ $userFavourites->previousPageUrl() }}"
                                                        aria-label="Previous">
                                                        <span aria-hidden="true"><i class="far fa-arrow-left"></i></span>
                                                    </a>
                                                @endif
                                            </li>
                                            @foreach ($userFavourites->getUrlRange(1, $userFavourites->lastPage()) as $page => $url)
                                                <li
                                                    class="page-item {{ $page == $userFavourites->currentPage() ? 'active' : '' }}">
                                                    <a class="page-link"
                                                        href="{{ $url }}">{{ $page }}</a>
                                                </li>
                                            @endforeach

                                            <li class="page-item">
                                                @if ($userFavourites->hasMorePages())
                                                    <a class="page-link" href="{{ $userFavourites->nextPageUrl() }}"
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
                                <!-- pagination end -->
                            @else
                                {{-- Grid View --}}
                                <p>No Favourites</p>
                            @endif
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
