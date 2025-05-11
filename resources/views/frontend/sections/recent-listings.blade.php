<!-- car area -->
<div class="car-area bg py-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="site-heading text-center">
                    <span class="site-title-tagline"><i class="flaticon-drive"></i> New Arrivals</span>
                    <h2 class="site-title">Let's Check Latest <span>Cars</span></h2>
                    <div class="heading-divider"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @if (count(\App\Helpers\Helper::getLatestCarListings()) > 0)
                @foreach (\App\Helpers\Helper::getLatestCarListings() as $car)
                    @php
                        $isFavourited = auth()->check() && auth()->user()->userFavourites->contains('car_listing_id', $car->id);
                    @endphp
                    <div class="col-md-6 col-lg-4 col-xl-3">
                        <div class="car-item wow fadeInUp" data-wow-delay=".25s">
                            <div class="car-img">
                                <span
                                    class="car-status status-{{ $car->condition == 'new' ? '2' : '1' }}">{{ ucfirst($car->condition) }}</span>
                                <img src="{{ asset($car->main_image) }}" alt="">
                                <div class="car-btns">
                                    <a href="{{ route('frontend.add.favourites', $car->id) }}"><i class="{{ $isFavourited ? 'fas' : 'far' }} fa-heart"></i></a>
                                    {{-- <a href="#"><i class="far fa-arrows-repeat"></i></a> --}}
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
            @endif
        </div>
        <div class="text-center mt-4">
            <a href="{{ route('frontend.inventory') }}" class="theme-btn">Load More <i class="far fa-arrow-rotate-right"></i> </a>
        </div>
    </div>
</div>
<!-- car area end -->
