@extends('frontend.layouts.master')

@section('title', __('Inventory'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
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

@section('content')
    <!-- car area -->
    <div class="car-area grid bg py-120">
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
                                    <a class="car-sort-grid active" href="listing-grid.html"><i class="far fa-grid-2"></i></a>
                                    <a class="car-sort-list" href="listing-list.html"><i class="far fa-list-ul"></i></a>
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
                                <div class="col-md-6 col-lg-4">
                                    <div class="car-item">
                                        <div class="car-img">
                                            <span
                                                class="car-status status-{{ $car->condition == 'new' ? '2' : '1' }}">{{ ucfirst($car->condition) }}</span>
                                            <img src="{{ asset($car->main_image) }}" alt="">
                                            <div class="car-btns">
                                                <a href="#"><i class="far fa-heart"></i></a>
                                                <a href="#"><i class="far fa-arrows-repeat"></i></a>
                                            </div>
                                        </div>
                                        <div class="car-content">
                                            <div class="car-top">
                                                <h4><a
                                                        href="{{ route('frontend.inventory.details', $car->car_id) }}">{{ $car->title }}</a>
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
                                                <li><i class="far fa-steering-wheel"></i>{{ ucfirst($car->transmission) }}
                                                </li>
                                                <li><i class="far fa-road"></i>{{ $car->fuel_efficiency }}km / 1-litre</li>
                                                <li><i class="far fa-car"></i>Model: {{ $car->year }}</li>
                                                <li><i class="far fa-gas-pump"></i>{{ $car->carFuelType->name }}</li>
                                            </ul>
                                            <div class="car-footer">
                                                <span
                                                    class="car-price">{{ \App\Helpers\Helper::formatCurrency($car->price) }}</span>
                                                <a href="{{ route('frontend.inventory.details', $car->car_id) }}"
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
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Auto-submit form on checkbox change
            $('#filterForm input[type="checkbox"]').on('change', function() {
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
