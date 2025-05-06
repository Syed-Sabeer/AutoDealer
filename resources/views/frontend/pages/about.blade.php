@extends('frontend.layouts.master')

@section('title', __('About'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
@endsection


@section('content')
<!-- Page Title -->
@section('breadcrumbs')
    @include('frontend.layouts.partials.breadcrumb', [
        'title' => 'About',
        'breadcrumbs' => [
            // ['label' => 'Home', 'url' => route('frontend.home')],
            ['label' => 'About'],
        ],
    ])
@endsection
<!-- End Page Title -->
    <!-- about area -->
    <div class="about-area py-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6">
                    <div class="about-left wow fadeInLeft" data-wow-delay=".25s">
                        <div class="about-img">
                            <img src="{{ asset('frontAssets/img/about/01.png') }}" alt="">
                        </div>
                        <div class="about-experience">
                            <div class="about-experience-icon">
                                <i class="flaticon-car"></i>
                            </div>
                            <b>30 Years Of <br> Quality Service</b>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="about-right wow fadeInRight" data-wow-delay=".25s">
                        <div class="site-heading mb-3">
                            <span class="site-title-tagline justify-content-start">
                                <i class="flaticon-drive"></i> About Us
                            </span>
                            <h2 class="site-title">
                                World Largest <span>Car Dealer</span> Marketplace.
                            </h2>
                        </div>
                        <p class="about-text">
                            There are many variations of passages of Lorem Ipsum available, but the majority have
                            suffered alteration in some form, by injected humour.
                        </p>
                        <div class="about-list-wrapper">
                            <ul class="about-list list-unstyled">
                                <li>
                                    At vero eos et accusamus et iusto odio.
                                </li>
                                <li>
                                    Established fact that a reader will be distracted.
                                </li>
                                <li>
                                    Sed ut perspiciatis unde omnis iste natus sit.
                                </li>
                            </ul>
                        </div>
                        <a href="about.html" class="theme-btn mt-4">Discover More<i class="fas fa-arrow-right-long"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about area end -->


    <!-- counter area -->
    <div class="counter-area pt-30 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="icon">
                            <i class="flaticon-car-rental"></i>
                        </div>
                        <div>
                            <span class="counter" data-count="+" data-to="500" data-speed="3000">500</span>
                            <h6 class="title">+ Available Cars </h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="icon">
                            <i class="flaticon-car-key"></i>
                        </div>
                        <div>
                            <span class="counter" data-count="+" data-to="900" data-speed="3000">900</span>
                            <h6 class="title">+ Happy Clients</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="icon">
                            <i class="flaticon-screwdriver"></i>
                        </div>
                        <div>
                            <span class="counter" data-count="+" data-to="1500" data-speed="3000">1500</span>
                            <h6 class="title">+ Team Workers</h6>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="counter-box">
                        <div class="icon">
                            <i class="flaticon-review"></i>
                        </div>
                        <div>
                            <span class="counter" data-count="+" data-to="30" data-speed="3000">30</span>
                            <h6 class="title">+ Years Of Experience</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- counter area end -->


    <!-- testimonial area -->
    <div class="testimonial-area bg py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline"><i class="flaticon-drive"></i> Testimonials</span>
                        <h2 class="site-title">What Our Client <span>Say's</span></h2>
                        <div class="heading-divider"></div>
                    </div>
                </div>
            </div>
            <div class="testimonial-slider owl-carousel owl-theme">
                <div class="testimonial-single">
                    <div class="testimonial-content">
                        <div class="testimonial-author-img">
                            <img src="{{ asset('frontAssets/img/testimonial/01.jpg') }}" alt="">
                        </div>
                        <div class="testimonial-author-info">
                            <h4>Sylvia H Green</h4>
                            <p>Customer</p>
                        </div>
                    </div>
                    <div class="testimonial-quote">
                        <span class="testimonial-quote-icon"><i class="flaticon-quote"></i></span>
                        <p>
                            There are many variations of passages available but the majority have
                            suffered to the alteration in some injected.
                        </p>
                    </div>
                    <div class="testimonial-rate">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="testimonial-single">
                    <div class="testimonial-content">
                        <div class="testimonial-author-img">
                            <img src="{{ asset('frontAssets/img/testimonial/02.jpg') }}" alt="">
                        </div>
                        <div class="testimonial-author-info">
                            <h4>Gordo Novak</h4>
                            <p>Customer</p>
                        </div>
                    </div>
                    <div class="testimonial-quote">
                        <span class="testimonial-quote-icon"><i class="flaticon-quote"></i></span>
                        <p>
                            There are many variations of passages available but the majority have
                            suffered to the alteration in some injected.
                        </p>
                    </div>
                    <div class="testimonial-rate">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="testimonial-single">
                    <div class="testimonial-content">
                        <div class="testimonial-author-img">
                            <img src="{{ asset('frontAssets/img/testimonial/03.jpg') }}" alt="">
                        </div>
                        <div class="testimonial-author-info">
                            <h4>Reid E Butt</h4>
                            <p>Customer</p>
                        </div>
                    </div>
                    <div class="testimonial-quote">
                        <span class="testimonial-quote-icon"><i class="flaticon-quote"></i></span>
                        <p>
                            There are many variations of passages available but the majority have
                            suffered to the alteration in some injected.
                        </p>
                    </div>
                    <div class="testimonial-rate">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="testimonial-single">
                    <div class="testimonial-content">
                        <div class="testimonial-author-img">
                            <img src="{{ asset('frontAssets/img/testimonial/04.jpg') }}" alt="">
                        </div>
                        <div class="testimonial-author-info">
                            <h4>Parker Jimenez</h4>
                            <p>Customer</p>
                        </div>
                    </div>
                    <div class="testimonial-quote">
                        <span class="testimonial-quote-icon"><i class="flaticon-quote"></i></span>
                        <p>
                            There are many variations of passages available but the majority have
                            suffered to the alteration in some injected.
                        </p>
                    </div>
                    <div class="testimonial-rate">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
                <div class="testimonial-single">
                    <div class="testimonial-content">
                        <div class="testimonial-author-img">
                            <img src="{{ asset('frontAssets/img/testimonial/05.jpg') }}" alt="">
                        </div>
                        <div class="testimonial-author-info">
                            <h4>Heruli Nez</h4>
                            <p>Customer</p>
                        </div>
                    </div>
                    <div class="testimonial-quote">
                        <span class="testimonial-quote-icon"><i class="flaticon-quote"></i></span>
                        <p>
                            There are many variations of passages available but the majority have
                            suffered to the alteration in some injected.
                        </p>
                    </div>
                    <div class="testimonial-rate">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- testimonial area end -->


    <!-- team-area -->
    <div class="team-area pt-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline">Team</span>
                        <h2 class="site-title">Meet With Our <span>Team</span></h2>
                        <div class="heading-divider"></div>
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-md-6 col-lg-3">
                    <div class="team-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="team-img">
                            <img src="{{ asset('frontAssets/img/team/01.jpg') }}" alt="thumb">
                        </div>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="team-content">
                            <div class="team-bio">
                                <h5><a href="#">Chad Smith</a></h5>
                                <span>HR Manager</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="team-item wow fadeInUp" data-wow-delay=".50s">
                        <div class="team-img">
                            <img src="{{ asset('frontAssets/img/team/02.jpg') }}" alt="thumb">
                        </div>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="team-content">
                            <div class="team-bio">
                                <h5><a href="#">Malissa Fie</a></h5>
                                <span>Technician</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="team-item wow fadeInUp" data-wow-delay=".75s">
                        <div class="team-img">
                            <img src="{{ asset('frontAssets/img/team/03.jpg') }}" alt="thumb">
                        </div>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="team-content">
                            <div class="team-bio">
                                <h5><a href="#">Arron Rodri</a></h5>
                                <span>CEO & Founder</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="team-item wow fadeInUp" data-wow-delay="1s">
                        <div class="team-img">
                            <img src="{{ asset('frontAssets/img/team/04.jpg') }}" alt="thumb">
                        </div>
                        <div class="team-social">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-youtube"></i></a>
                        </div>
                        <div class="team-content">
                            <div class="team-bio">
                                <h5><a href="#">Tony Pinto</a></h5>
                                <span>Mechanical Engineer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team-area end -->


    <!-- car brand -->
    <div class="car-brand pb-120 pt-60">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <div class="site-heading text-center">
                        <span class="site-title-tagline"><i class="flaticon-drive"></i> Popular Brands</span>
                        <h2 class="site-title">Our Top Quality <span>Brands</span></h2>
                        <div class="heading-divider"></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="brand-item wow fadeInUp" data-wow-delay=".25s">
                        <div class="brand-img">
                            <img src="{{ asset('frontAssets/img/brand/01.png') }}" alt="">
                        </div>
                        <h5>Ferrari</h5>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="brand-item wow fadeInUp" data-wow-delay=".50s">
                        <div class="brand-img">
                            <img src="{{ asset('frontAssets/img/brand/02.png') }}" alt="">
                        </div>
                        <h5>Hyundai</h5>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="brand-item wow fadeInUp" data-wow-delay=".75s">
                        <div class="brand-img">
                            <img src="{{ asset('frontAssets/img/brand/03.png') }}" alt="">
                        </div>
                        <h5>Mercedes Benz</h5>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="brand-item wow fadeInUp" data-wow-delay="1s">
                        <div class="brand-img">
                            <img src="{{ asset('frontAssets/img/brand/04.png') }}" alt="">
                        </div>
                        <h5>Toyota</h5>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="brand-item wow fadeInUp" data-wow-delay="1.25s">
                        <div class="brand-img">
                            <img src="{{ asset('frontAssets/img/brand/05.png') }}" alt="">
                        </div>
                        <h5>BMW</h5>
                    </a>
                </div>
                <div class="col-6 col-md-3 col-lg-2">
                    <a href="#" class="brand-item wow fadeInUp" data-wow-delay="1.50s">
                        <div class="brand-img">
                            <img src="{{ asset('frontAssets/img/brand/06.png') }}" alt="">
                        </div>
                        <h5>Nissan</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- car brand end-->
@endsection

@section('script')
    <script></script>
@endsection
