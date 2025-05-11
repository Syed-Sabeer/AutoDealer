@extends('frontend.layouts.master')

@section('title', __('Home'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
<style>
    .nice-select ul{
        height: 150px;
        overflow-y: auto !important;
    }
</style>
@endsection

@section('content')
    <!-- hero slider -->
    <div class="hero-section">
        <div class="hero-slider owl-carousel owl-theme">
            <div class="hero-single" style="background: url({{ asset('frontAssets/img/slider/slider-1.jpg') }})">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-lg-6">
                            <div class="hero-content">
                                <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Welcome To
                                    Motex!</h6>
                                <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                    Best Way To Find Your <span>Dream</span> Car
                                </h1>
                                <p data-animation="fadeInLeft" data-delay=".75s">
                                    There are many variations of passages orem psum available but the majority have
                                    suffered alteration in some form by injected humour.
                                </p>
                                <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                    <a href="#" class="theme-btn">About More<i
                                            class="fas fa-arrow-right-long"></i></a>
                                    <a href="#" class="theme-btn theme-btn2">Learn More<i
                                            class="fas fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="hero-right">
                                <div class="hero-img">
                                    <img src="{{ asset('frontAssets/img/slider/hero-1.png') }}" alt="" data-animation="fadeInRight"
                                        data-delay=".25s">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-single" style="background: url({{ asset('frontAssets/img/slider/slider-2.jpg') }})">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-lg-6">
                            <div class="hero-content">
                                <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Welcome To
                                    Motex!</h6>
                                <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                    Best Way To Find Your <span>Dream</span> Car
                                </h1>
                                <p data-animation="fadeInLeft" data-delay=".75s">
                                    There are many variations of passages orem psum available but the majority have
                                    suffered alteration in some form by injected humour.
                                </p>
                                <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                    <a href="#" class="theme-btn">About More<i
                                            class="fas fa-arrow-right-long"></i></a>
                                    <a href="#" class="theme-btn theme-btn2">Learn More<i
                                            class="fas fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="hero-right">
                                <div class="hero-img">
                                    <img src="{{ asset('frontAssets/img/slider/hero-2.png') }}" alt="" data-animation="fadeInRight"
                                        data-delay=".25s">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-single" style="background: url({{ asset('frontAssets/img/slider/slider-3.jpg') }})">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-12 col-lg-6">
                            <div class="hero-content">
                                <h6 class="hero-sub-title" data-animation="fadeInUp" data-delay=".25s">Welcome To
                                    Motex!</h6>
                                <h1 class="hero-title" data-animation="fadeInRight" data-delay=".50s">
                                    Best Way To Find Your <span>Dream</span> Car
                                </h1>
                                <p data-animation="fadeInLeft" data-delay=".75s">
                                    There are many variations of passages orem psum available but the majority have
                                    suffered alteration in some form by injected humour.
                                </p>
                                <div class="hero-btn" data-animation="fadeInUp" data-delay="1s">
                                    <a href="#" class="theme-btn">About More<i
                                            class="fas fa-arrow-right-long"></i></a>
                                    <a href="#" class="theme-btn theme-btn2">Learn More<i
                                            class="fas fa-arrow-right-long"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-6">
                            <div class="hero-right">
                                <div class="hero-img">
                                    <img src="{{ asset('frontAssets/img/slider/hero-4.png') }}" alt="" data-animation="fadeInRight"
                                        data-delay=".25s">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- hero slider end -->


    <!-- find car form -->
    <div class="find-car">
        <div class="container">
            <div class="find-car-form">
                <h4 class="find-car-title">Let's Find Your Perfect Car</h4>
                <form  action="{{ route('frontend.inventory') }}" method="GET">
                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Car Condition</label>
                                <select name="condition[]" class="select">
                                    <option selected disabled>All Status</option>
                                    <option value="new">New Car</option>
                                    <option value="used">Used Car</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Brand Name</label>
                                <select name="brands[]" id="brandSelect" class="select">
                                    <option selected disabled>All Brand</option>
                                    @if (isset($carBrands) && count($carBrands) > 0)
                                        @foreach ($carBrands as $brand)
                                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Car Model</label>
                                <select name="models[]" id="modelSelect" class="select">
                                    <option selected disabled>All Models</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Choose Year</label>
                                <select name="year[]" id="yearSelect" class="select">
                                    <option selected disabled>All Year</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Choose Transmission</label>
                                <select name="transmission[]" class="select">
                                    <option selected disabled>All Transmissions</option>
                                    <option value="automatic">Automatic</option>
                                    <option value="manual">Manual</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Price Range</label>
                                <select id="priceSelect" class="select">
                                    <option value="1" data-min="0" data-max="10000000">All Price</option>
                                    <option value="2" data-min="1000" data-max="10000">$1,000 - $10,000</option>
                                    <option value="3" data-min="10000" data-max="20000">$10,000 - $20,000</option>
                                    <option value="4" data-min="20000" data-max="30000">$20,000 - $30,000</option>
                                    <option value="5" data-min="40000" data-max="50000">$40,000 - $50,000</option>
                                    <option value="6" data-min="50000" data-max="100000">$50,000 - $100,000</option>
                                </select>
                            </div>
                        </div>

                        <!-- Hidden fields to store the selected price range -->
                        <input type="hidden" name="min_price" id="min_price" value="{{ request('min_price', 0) }}">
                        <input type="hidden" name="max_price" id="max_price" value="{{ request('max_price', 1000000) }}">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <label>Body Type</label>
                                <select name="body_types[]" class="select">
                                    <option selected disabled>All Body Type</option>
                                    @if (isset($carBodyTypes) && count($carBodyTypes) > 0)
                                        @foreach ($carBodyTypes as $carBodyType)
                                            <option value="{{ $carBodyType->id }}">{{ $carBodyType->name }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 align-self-end">
                            <button class="theme-btn" type="submit"><span class="far fa-search"></span> Find Your
                                Car</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- findcar form end -->


    <!-- about area -->
    @include('frontend.sections.about-area')
    <!-- about area end -->


    <!-- counter area -->
    @include('frontend.sections.counter-area')
    <!-- counter area end -->


    <!-- car area -->
    @include('frontend.sections.recent-listings')
    <!-- car area end -->


    <!-- car category -->
    @include('frontend.sections.car-category')
    <!-- car category end-->


    <!-- video area -->
    <div class="video-area pb-120">
        <div class="container-fluid px-0">
            <div class="video-content" style="background-image: url({{ asset('frontAssets/img/video/01.jpg') }});">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="video-wrapper">
                            <a class="play-btn popup-youtube" href="https://www.youtube.com/watch?v=ckHzmP1evNU">
                                <i class="fas fa-play"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- video area end -->


    <!-- car dealer -->
    <div class="car-dealer pb-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline"><i class="flaticon-drive"></i> Car Dealers</span>
                        <h2 class="site-title">Best Dealers In <span>Your City</span></h2>
                        <div class="heading-divider"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="dealer-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="dealer-img">
                            <span class="dealer-listing">25 Listing</span>
                            <img src="{{ asset('frontAssets/img/dealer/01.png') }}" alt="">
                        </div>
                        <div class="dealer-content">
                            <h4><a href="#">Automotive Gear</a></h4>
                            <ul>
                                <li><i class="far fa-location-dot"></i> 25/B Milford Road, New York</li>
                                <li><i class="far fa-phone"></i> <a href="tel:+21236547898">+2 123 654 7898</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dealer-item wow fadeInUp" data-wow-delay=".50s">
                        <div class="dealer-img">
                            <span class="dealer-listing">35 Listing</span>
                            <img src="{{ asset('frontAssets/img/dealer/02.png') }}" alt="">
                        </div>
                        <div class="dealer-content">
                            <h4><a href="#">Keithson Car</a></h4>
                            <ul>
                                <li><i class="far fa-location-dot"></i> 25/B Milford Road, New York</li>
                                <li><i class="far fa-phone"></i> <a href="tel:+21236547898">+2 123 654 7898</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dealer-item wow fadeInUp" data-wow-delay=".75s">
                        <div class="dealer-img">
                            <span class="dealer-listing">15 Listing</span>
                            <img src="{{ asset('frontAssets/img/dealer/03.png') }}" alt="">
                        </div>
                        <div class="dealer-content">
                            <h4><a href="#">Superious Automotive</a></h4>
                            <ul>
                                <li><i class="far fa-location-dot"></i> 25/B Milford Road, New York</li>
                                <li><i class="far fa-phone"></i> <a href="tel:+21236547898">+2 123 654 7898</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dealer-item wow fadeInUp" data-wow-delay="1s">
                        <div class="dealer-img">
                            <span class="dealer-listing">20 Listing</span>
                            <img src="{{ asset('frontAssets/img/dealer/04.png') }}" alt="">
                        </div>
                        <div class="dealer-content">
                            <h4><a href="#">Racing Gear Car</a></h4>
                            <ul>
                                <li><i class="far fa-location-dot"></i> 25/B Milford Road, New York</li>
                                <li><i class="far fa-phone"></i> <a href="tel:+21236547898">+2 123 654 7898</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dealer-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="dealer-img">
                            <span class="dealer-listing">19 Listing</span>
                            <img src="{{ asset('frontAssets/img/dealer/05.png') }}" alt="">
                        </div>
                        <div class="dealer-content">
                            <h4><a href="#">Car Showromio</a></h4>
                            <ul>
                                <li><i class="far fa-location-dot"></i> 25/B Milford Road, New York</li>
                                <li><i class="far fa-phone"></i> <a href="tel:+21236547898">+2 123 654 7898</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dealer-item wow fadeInUp" data-wow-delay=".50s">
                        <div class="dealer-img">
                            <span class="dealer-listing">40 Listing</span>
                            <img src="{{ asset('frontAssets/img/dealer/06.png') }}" alt="">
                        </div>
                        <div class="dealer-content">
                            <h4><a href="#">Fastspeedio Car</a></h4>
                            <ul>
                                <li><i class="far fa-location-dot"></i> 25/B Milford Road, New York</li>
                                <li><i class="far fa-phone"></i> <a href="tel:+21236547898">+2 123 654 7898</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dealer-item wow fadeInUp" data-wow-delay=".75s">
                        <div class="dealer-img">
                            <span class="dealer-listing">59 Listing</span>
                            <img src="{{ asset('frontAssets/img/dealer/07.png') }}" alt="">
                        </div>
                        <div class="dealer-content">
                            <h4><a href="#">Star AutoMall</a></h4>
                            <ul>
                                <li><i class="far fa-location-dot"></i> 25/B Milford Road, New York</li>
                                <li><i class="far fa-phone"></i> <a href="tel:+21236547898">+2 123 654 7898</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="dealer-item wow fadeInUp" data-wow-delay="1s">
                        <div class="dealer-img">
                            <span class="dealer-listing">28 Listing</span>
                            <img src="{{ asset('frontAssets/img/dealer/08.png') }}" alt="">
                        </div>
                        <div class="dealer-content">
                            <h4><a href="#">Superspeed Auto</a></h4>
                            <ul>
                                <li><i class="far fa-location-dot"></i> 25/B Milford Road, New York</li>
                                <li><i class="far fa-phone"></i> <a href="tel:+21236547898">+2 123 654 7898</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- car dealer end-->


    <!-- choose area -->
    @include('frontend.sections.choose-area')
    <!-- choose area end -->


    <!-- car brand -->
    @include('frontend.sections.car-brands')
    <!-- car brand end-->


    <!-- testimonial area -->
    @include('frontend.sections.testimonials')
    <!-- testimonial area end -->


    <!-- blog area -->
    <div class="blog-area py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline"><i class="flaticon-drive"></i> Our Blog</span>
                        <h2 class="site-title">Latest News & <span>Blog</span></h2>
                        <div class="heading-divider"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="blog-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="blog-item-img">
                            <img src="{{ asset('frontAssets/img/blog/01.jpg') }}" alt="Thumb">
                        </div>
                        <div class="blog-item-info">
                            <div class="blog-item-meta">
                                <ul>
                                    <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                    <li><a href="#"><i class="far fa-calendar-alt"></i> January 29, 2023</a></li>
                                </ul>
                            </div>
                            <h4 class="blog-title">
                                <a href="#">There are many variations of passage available.</a>
                            </h4>
                            <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="blog-item wow fadeInUp" data-wow-delay=".50s">
                        <div class="blog-item-img">
                            <img src="{{ asset('frontAssets/img/blog/02.jpg') }}" alt="Thumb">
                        </div>
                        <div class="blog-item-info">
                            <div class="blog-item-meta">
                                <ul>
                                    <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                    <li><a href="#"><i class="far fa-calendar-alt"></i> January 29, 2023</a></li>
                                </ul>
                            </div>
                            <h4 class="blog-title">
                                <a href="#">There are many variations of passage available.</a>
                            </h4>
                            <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4">
                    <div class="blog-item wow fadeInUp" data-wow-delay=".75s">
                        <div class="blog-item-img">
                            <img src="{{ asset('frontAssets/img/blog/03.jpg') }}" alt="Thumb">
                        </div>
                        <div class="blog-item-info">
                            <div class="blog-item-meta">
                                <ul>
                                    <li><a href="#"><i class="far fa-user-circle"></i> By Alicia Davis</a></li>
                                    <li><a href="#"><i class="far fa-calendar-alt"></i> January 29, 2023</a></li>
                                </ul>
                            </div>
                            <h4 class="blog-title">
                                <a href="#">There are many variations of passage available.</a>
                            </h4>
                            <a class="theme-btn" href="#">Read More<i class="fas fa-arrow-right-long"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog area end -->

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            const currentYear = new Date().getFullYear();
            const startYear = 1955;
            let options = '<option selected disabled>All Year</option>';

            for (let year = currentYear; year >= startYear; year--) {
                options += `<option value="${year}">${year}</option>`;
            }

            $('#yearSelect').html(options); // update the HTML

            // Re-initialize niceSelect properly
            if ($.fn.niceSelect) {
                $('#yearSelect').niceSelect('destroy');
                $('#yearSelect').niceSelect();
            }

            $('#priceSelect').change(function() {
                var selectedOption = $(this).find('option:selected');
                var minPrice = selectedOption.data('min');
                var maxPrice = selectedOption.data('max');

                // Update the hidden fields with the selected price range
                $('#min_price').val(minPrice);
                $('#max_price').val(maxPrice);
            });

            // Trigger change event on page load to set the initial values
            if ($('#priceSelect').val() !== "") {
                $('#priceSelect').trigger('change');
            }

            $('#brandSelect').on('change', function () {
                var brandId = $(this).val();
                $('#modelSelect').empty().append('<option selected disabled>Loading...</option>');

                if (brandId) {
                    $.ajax({
                        url: '/get-models-by-brand/' + brandId,
                        type: 'GET',
                        success: function (response) {
                            let options = '<option selected disabled>All Models</option>';
                            $.each(response.models, function (index, model) {
                                options += '<option value="' + model.id + '">' + model.name + '</option>';
                            });

                            $('#modelSelect').html(options);

                            // Force refresh if using custom select plugin
                            if ($('.select').hasClass('nice-select')) {
                                $('.select').niceSelect('update');
                            }
                        },

                        error: function () {
                            $('#modelSelect').empty().append('<option selected disabled>Error loading models</option>');
                        }
                    });
                } else {
                    $('#modelSelect').empty().append('<option selected disabled>All Models</option>');
                }
            });
        });
    </script>
@endsection
