@extends('frontend.layouts.master')

@section('title', __('Inventory'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
    <style>
        .nice-select ul {
            height: 150px;
            overflow-y: auto !important;
        }

        /* Modal overlay */
        #filtersModal .modal.fade .modal-dialog {
            transition: transform 0.3s ease-out, opacity 0.3s ease-out;
            transform: translateY(-20px);
            opacity: 0;
        }

        #filtersModal .modal.fade.show .modal-dialog {
            transform: translateY(0);
            opacity: 1;
        }

        /* Modal content */
        #filtersModal .modal-content {
            border-radius: 16px;
            border: none;
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.2);
            background-color: #ffffff;
            padding: 20px;
        }

        #filtersModal .modal-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
        }

        /* Modal body styling */
        #filtersModal .modal-body {
            padding-top: 0;
        }

        /* Form groups */
        #filtersModal .form-group {
            margin-bottom: 15px;
        }

        #filtersModal .form-group label {
            font-weight: 500;
            margin-bottom: 5px;
            display: block;
            color: #333;
        }

        /* Submit button styling */
        #filtersModal .theme-btn {
            padding: 10px 24px;
            font-size: 1rem;
            font-weight: 500;
            border-radius: 50px;
            transition: background-color 0.3s, transform 0.2s;
        }

        #filtersModal .theme-btn:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
        }

        /* Button icon spacing */
        #filtersModal button[type="submit"] i {
            margin-left: 5px;
        }

        /* Small improvements for spacing */
        #filtersModal .car-widget {
            background: #f9f9f9;
            padding: 20px;
            border-radius: 12px;
            margin-bottom: 20px !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
        }

        #filtersModal .modal-footer {
            border-top: none;
            justify-content: flex-end;
        }
    </style>
@endsection

<!-- Page Title -->
@section('breadcrumbs')
    @include('frontend.layouts.partials.breadcrumb', [
        'title' => 'Inventory',
        'breadcrumbs' => [
            // ['label' => 'Home', 'url' => route('frontend.home')],
            ['label' => 'Inventory'],
        ],
    ])
@endsection
<!-- End Page Title -->

{{-- @dd($carListings) --}}
@section('content')
    <!-- car area -->
    <div class="car-area {{ request('view') == 'list' ? 'list' : 'grid' }} bg py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.pages.inventory.sidebar')
                </div>
                <div class="col-lg-9">
                    @if (isset($carListings) && count($carListings) > 0)
                        <div class="col-md-12">
                            <div class="car-sort">
                                <h6>
                                    Showing {{ $carListings->firstItem() }} - {{ $carListings->lastItem() }} of
                                    {{ $carListings->total() }} Results
                                </h6>
                                <div class="car-sort-list-grid">
                                    <a class="car-sort-grid {{ request('view') !== 'list' ? 'active' : '' }}"
                                        href="{{ request()->fullUrlWithQuery(['view' => 'grid']) }}"><i
                                            class="far fa-grid-2"></i></a>
                                    <a class="car-sort-list {{ request('view') === 'list' ? 'active' : '' }}"
                                        href="{{ request()->fullUrlWithQuery(['view' => 'list']) }}"><i
                                            class="far fa-list-ul"></i></a>
                                </div>
                                <div class="col-md-3 car-sort-box">
                                    <form method="GET" id="sortForm">
                                        <select class="select" name="sort"
                                            onchange="document.getElementById('sortForm').submit();">
                                            <option value="default" {{ request('sort') == 'default' ? 'selected' : '' }}>
                                                Sort By Default</option>
                                            <option value="featured" {{ request('sort') == 'featured' ? 'selected' : '' }}>
                                                Sort By Featured</option>
                                            <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Sort
                                                By Latest</option>
                                            <option value="low_price"
                                                {{ request('sort') == 'low_price' ? 'selected' : '' }}>Sort By Low Price
                                            </option>
                                            <option value="high_price"
                                                {{ request('sort') == 'high_price' ? 'selected' : '' }}>Sort By High Price
                                            </option>
                                        </select>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @foreach ($carListings as $car)
                                @php
                                    $isFavourited =
                                        auth()->check() &&
                                        auth()->user()->userFavourites->contains('car_listing_id', $car->id);
                                @endphp
                                @if (request('view') === 'list')
                                    {{-- List View --}}
                                    <div class="col-md-6 col-lg-12">
                                        <div class="car-item">
                                            <div class="car-img">
                                                <span
                                                    class="car-status status-{{ $car->condition == 'new' ? '2' : '1' }}">{{ ucfirst($car->condition) }}</span>
                                                <img src="{{ asset($car->main_image) }}" alt="">
                                                <div class="car-btns">
                                                    <a href="{{ route('frontend.add.favourites', $car->id) }}"><i
                                                            class="{{ $isFavourited ? 'fas' : 'far' }} fa-heart"></i></a>
                                                    {{-- <a href="#"><i class="far fa-arrows-repeat"></i></a> --}}
                                                </div>
                                            </div>
                                            <div class="car-content">
                                                <div class="car-top">
                                                    <span>{{ $car->carBrand->name }} {{ $car->carModel->name }}</span>
                                                    <h4><a
                                                            href="{{ route('frontend.inventory.details', $car->car_id) }}">{{ $car->title }}</a>
                                                    </h4>
                                                    {{-- <div class="car-rate">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>5.0 (58.5k Review)</span>
                                                    </div> --}}
                                                </div>
                                                <ul class="car-list">
                                                    <li><i
                                                            class="far fa-steering-wheel"></i>{{ ucfirst($car->transmission) }}
                                                    </li>
                                                    @if ($car->fuel_efficiency)
                                                        <li><i class="far fa-road"></i>{{ $car->fuel_efficiency }}km / 1-litre
                                                    @endif
                                                    </li>
                                                    <li><i class="far fa-car"></i>Model: {{ $car->year }}</li>
                                                    <li><i class="far fa-gas-pump"></i>{{ $car->carFuelType->name }}</li>
                                                </ul>
                                                <p>
                                                    {{ $car->description }}
                                                </p>
                                                <!-- Additional Tags -->
                                                <div class="car-tags" style="margin-top: 10px;">
                                                    <span>{{ $car->color ?? 'N/A' }}</span> |
                                                    <span>{{ $car->mileage ? number_format($car->mileage) . ' miles' : 'N/A' }}</span>
                                                </div>
                                                <div class="car-footer">
                                                    <div class="d-flex flex-column">
                                                        <span class="car-price">{{ \App\Helpers\Helper::formatCurrency($car->price) }}</span>
                                                        <span style="font-size: 12px;">
                                                            <i class="far fa-location"></i>
                                                            {{ $car->city }}
                                                            @if (isset($car->calculated_distance))
                                                                ({{ number_format($car->calculated_distance) }} miles)
                                                            @endif
                                                        </span>
                                                    </div>
                                                    <a href="{{ route('frontend.inventory.details', $car->car_id) }}"
                                                        class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    {{-- Grid View --}}
                                    <div class="col-md-6 col-lg-4">
                                        <div class="car-item">
                                            <div class="car-img">
                                                <span
                                                    class="car-status status-{{ $car->condition == 'new' ? '2' : '1' }}">{{ ucfirst($car->condition) }}</span>
                                                <img src="{{ asset($car->main_image) }}" alt="">
                                                <div class="car-btns">
                                                    <a href="{{ route('frontend.add.favourites', $car->id) }}"><i
                                                            class="{{ $isFavourited ? 'fas' : 'far' }} fa-heart"></i></a>
                                                    {{-- <a href="#"><i class="far fa-arrows-repeat"></i></a> --}}
                                                </div>
                                            </div>
                                            <div class="car-content">
                                                <div class="car-top">
                                                    <span>{{ $car->carBrand->name }} {{ $car->carModel->name }}</span>
                                                    <h4><a href="{{ route('frontend.inventory.details', $car->car_id) }}">{{ $car->title }}</a></h4>
                                                    {{-- <div class="car-rate">
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <i class="fas fa-star"></i>
                                                        <span>5.0 (58.5k Review)</span>
                                                    </div> --}}
                                                </div>
                                                <ul class="car-list">
                                                    <li><i
                                                            class="far fa-steering-wheel"></i>{{ ucfirst($car->transmission) }}
                                                    </li>
                                                    @if ($car->fuel_efficiency)
                                                        <li><i class="far fa-road"></i>{{ $car->fuel_efficiency }}km / 1-litre
                                                    @endif
                                                    </li>
                                                    <li><i class="far fa-car"></i>Model: {{ $car->year }}</li>
                                                    <li><i class="far fa-gas-pump"></i>{{ $car->carFuelType->name }}</li>
                                                </ul>
                                                <!-- Additional Tags -->
                                                <div class="car-tags" style="margin-top: 10px;">
                                                    <span>{{ $car->color ?? 'N/A' }}</span> |
                                                    <span>{{ $car->mileage ? number_format($car->mileage) . ' miles' : 'N/A' }}</span>
                                                </div>
                                                <div class="car-footer">
                                                    <div class="d-flex flex-column">
                                                        <span class="car-price">{{ \App\Helpers\Helper::formatCurrency($car->price) }}</span>
                                                        <span style="font-size: 12px;">
                                                            <i class="far fa-location"></i>
                                                            {{ $car->city }}
                                                            @if (isset($car->calculated_distance))
                                                                ({{ number_format($car->calculated_distance) }} miles)
                                                            @endif
                                                        </span>
                                                    </div>
                                                    {{-- <a href="{{ route('frontend.inventory.details', $car->car_id) }}"
                                                        class="theme-btn"><span class="far fa-eye"></span>Details</a> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
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
                        <!-- pagination end -->
                    @else
                        <div style="text-align: center; padding: 40px; font-size: 20px; color: #888;">
                            😞 <br>
                            <strong>No Listings Found</strong>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- car area end -->

    <!-- Filters Modal -->
    <div class="modal fade" id="filtersModal" tabindex="-1" aria-labelledby="filtersModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="filtersModalLabel">Additional Filters</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="additionalFilterForm" method="GET" action="{{ route('frontend.inventory') }}">
                        <div class="car-sidebar row">
                            <!-- Search Widget -->
                            {{-- <div class="car-widget col-lg-12">
                                <div class="car-search-form">
                                    <h4 class="car-widget-title">Search</h4>
                                    <div class="form-group">
                                        <input type="text" name="search" class="form-control" placeholder="Search">
                                        <button type="submit"><i class="far fa-search"></i></button>
                                    </div>
                                </div>
                            </div> --}}

                            <div class="car-widget col-lg-12" style="margin-bottom: 0px !important;">
                                <h4 class="car-widget-title">Filters</h4>
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label>Brand Name</label>
                                            <select name="brands[]" id="brandSelect" class="select" multiple>
                                                <option {{ !request('brands') ? 'selected' : '' }} disabled>Choose Brand
                                                </option>
                                                @if (isset($allBrands) && count($allBrands) > 0)
                                                    @foreach ($allBrands as $brand)
                                                        <option value="{{ $brand->id }}"
                                                            {{ in_array($brand->id, request('brands', [])) ? 'selected' : '' }}>
                                                            {{ $brand->name }}
                                                        </option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="form-group">
                                            <label>Transmission</label>
                                            <select name="transmission[]" class="select">
                                                <option selected disabled>Choose Transmissions</option>
                                                <option value="automatic"
                                                    {{ in_array('automatic', request('transmission', [])) ? 'selected' : '' }}>
                                                    Automatic</option>
                                                <option value="manual"
                                                    {{ in_array('manual', request('transmission', [])) ? 'checked' : '' }}>
                                                    Manual</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Body Type</label>
                                            <select name="body_types[]" class="select">
                                                <option {{ !request('body_types') ? 'selected' : '' }} disabled>Choose Body
                                                    Type</option>
                                                @if (isset($carBodyTypes) && count($carBodyTypes) > 0)
                                                    @foreach ($carBodyTypes as $carBodyType)
                                                        <option value="{{ $carBodyType->id }}"
                                                            {{ in_array($carBodyType->id, request('body_types', [])) ? 'selected' : '' }}>
                                                            {{ $carBodyType->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Fuel Type</label>
                                            <select name="fuel_types[]" class="select">
                                                <option {{ !request('fuel_types') ? 'selected' : '' }} disabled>Choose Fuel
                                                    Types</option>
                                                @if (isset($carFuelTypes) && count($carFuelTypes) > 0)
                                                    @foreach ($carFuelTypes as $fuelType)
                                                        <option value="{{ $fuelType->id }}"
                                                            {{ in_array($fuelType->id, request('fuel_types', [])) ? 'selected' : '' }}>
                                                            {{ $fuelType->name }}</option>
                                                    @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="car-widget col-lg-12" style="margin-bottom: 0px !important;">
                                <h4 class="car-widget-title">Distance from You (miles)</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Postcode</label>
                                            <input class="form-control" type="text" placeholder="Enter your postcode" name="postcode"
                                                value="{{ request('postcode') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Distance (within miles)</label>
                                            <input class="form-control" type="number" placeholder="Enter distance within miles" name="distance"
                                                value="{{ request('distance') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="car-widget col-lg-12" style="margin-bottom: 0px !important;">
                                <h4 class="car-widget-title">Year</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>From</label>
                                            <select name="from_year" id="fromYearSelect2" class="select">
                                                <option selected disabled>Year</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>To</label>
                                            <select name="to_year" id="toYearSelect2" class="select">
                                                <option selected disabled>Year</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="car-widget col-lg-12" style="margin-bottom: 0px !important;">
                                <h4 class="car-widget-title">Price ({{ \App\Helpers\Helper::currencySymbol() }})</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>From</label>
                                            <input class="form-control" type="number" name="min_price"
                                                value="{{ request('min_price', 0) }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>To</label>
                                            <input class="form-control" type="number" name="max_price"
                                                value="{{ request('max_price', $maxPrice) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="car-widget col-lg-12" style="margin-bottom: 0px !important;">
                                <h4 class="car-widget-title">Mileage (miles)</h4>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>From</label>
                                            <input class="form-control" type="number" name="from_mileage"
                                                value="{{ request('from_mileage', 0) }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>To</label>
                                            <input class="form-control" type="number" name="to_mileage"
                                                value="{{ request('to_mileage', 50000) }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="car-widget col-lg-12" style="margin-bottom: 0px !important;">
                                <h4 class="car-widget-title">Other Filters</h4>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Seats</label>
                                            <input class="form-control" type="number" name="seats"
                                                placeholder="Enter Number of Seats" value="{{ request('seats') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Doors</label>
                                            <input class="form-control" type="number" name="doors"
                                                placeholder="Enter Number of Doors" value="{{ request('doors') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Color</label>
                                            <input class="form-control" type="text" name="color"
                                                placeholder="Enter name of Color" value="{{ request('color') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                    <button type="submit" class="theme-btn" form="additionalFilterForm">Apply Filters</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            @php
                $fromYear = request('from_year', 1955);
                $toYear = request('to_year', now()->year);
            @endphp
            const currentYear = new Date().getFullYear();
            const startYear = 1955;
            const defaultFromYear = {{ $fromYear }};
            const defaultToYear = {{ $toYear }};

            let fromOptions = '<option disabled>Year</option>';
            let toOptions = '<option disabled>Year</option>';

            for (let year = currentYear; year >= startYear; year--) {
                const selectedFrom = (year === defaultFromYear) ? 'selected' : '';
                const selectedTo = (year === defaultToYear) ? 'selected' : '';

                fromOptions += `<option value="${year}" ${selectedFrom}>${year}</option>`;
                toOptions += `<option value="${year}" ${selectedTo}>${year}</option>`;
            }

            $('#fromYearSelect').html(fromOptions);
            $('#toYearSelect').html(toOptions);
            $('#fromYearSelect2').html(fromOptions);
            $('#toYearSelect2').html(toOptions);

            if ($.fn.niceSelect) {
                $('#fromYearSelect').niceSelect('destroy').niceSelect();
                $('#toYearSelect').niceSelect('destroy').niceSelect();
                $('#fromYearSelect2').niceSelect('destroy').niceSelect();
                $('#toYearSelect2').niceSelect('destroy').niceSelect();
            }
            // Auto-submit form on checkbox change
            $('#filterForm input[type="checkbox"]').on('change', function() {
                $('#filterForm').submit();
            });
            $('#fromYearSelect, #toYearSelect').on('change', function() {
                $('#filterForm').submit();
            });

            // jQuery UI slider
            var maxPrice = parseInt($('.price-range').data('max'));
            var currency = $('.price-range').data('symbol');
            var minVal = parseInt("{{ request('min_price', 0) }}");
            var maxVal = parseInt("{{ request('max_price', $maxPrice) }}");

            $(".price-range").slider({
                range: true,
                min: 0,
                max: maxPrice,
                values: [minVal, maxVal],
                slide: function(event, ui) {
                    $("#price-amount").val(currency + ui.values[0] + " - " + currency + ui.values[1]);
                },
                change: function(event, ui) {
                    // Set hidden inputs
                    $('#min_price').val(ui.values[0]);
                    $('#max_price').val(ui.values[1]);
                    // Submit the form
                    $('#filterForm').submit();
                }
            });

            // Initial set
            $("#price-amount").val(currency + $(".price-range").slider("values", 0) +
                " - " + currency + $(".price-range").slider("values", 1));
        });
    </script>
@endsection


{{-- @section('script')
    <script>
        if ($(".price-range").length) {
            var $priceRange = $(".price-range");
            var maxPrice = parseInt($priceRange.data('max')) || 1000;
            var currencySymbol = $priceRange.data('symbol') || '$';

            $priceRange.slider({
                range: true,
                min: 0,
                max: maxPrice,
                values: [0, maxPrice],
                slide: function(event, ui) {
                    $("#price-amount").val(currencySymbol + ui.values[0] + " - " + currencySymbol + ui.values[
                        1]);
                }
            });

            $("#price-amount").val(
                currencySymbol + $priceRange.slider("values", 0) +
                " - " + currencySymbol + $priceRange.slider("values", 1)
            );
        }

        $('#filterForm input[type="checkbox"]').on('change', function () {
            $('#filterForm').submit();
        });
    </script>
@endsection --}}
