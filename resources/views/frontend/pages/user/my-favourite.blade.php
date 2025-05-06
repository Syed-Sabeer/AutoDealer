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
                            <div class="row">
                                <div class="col-md-6 col-lg-4">
                                    <div class="car-item">
                                        <div class="car-img">
                                            <span class="car-status status-1">Used</span>
                                            <img src="{{ asset('frontAssets/img/car/01.jpg') }}" alt="">
                                            <div class="car-btns">
                                                <a href="#"><i class="far fa-xmark"></i></a>
                                                <a href="#"><i class="far fa-heart"></i></a>
                                                <a href="#"><i class="far fa-arrows-repeat"></i></a>
                                            </div>
                                        </div>
                                        <div class="car-content">
                                            <div class="car-top">
                                                <h4><a href="#">Mercedes Benz Car</a></h4>
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
                                                <li><i class="far fa-steering-wheel"></i>Automatic</li>
                                                <li><i class="far fa-car"></i>Model: 2023</li>
                                                <li><i class="far fa-road"></i>10.15km / 1-litre</li>
                                                <li><i class="far fa-gas-pump"></i>Hybrid</li>
                                            </ul>
                                            <div class="car-footer">
                                                <span class="car-price">$45,620</span>
                                                <a href="#" class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="car-item">
                                        <div class="car-img">
                                            <img src="{{ asset('frontAssets/img/car/02.jpg') }}" alt="">
                                            <div class="car-btns">
                                                <a href="#"><i class="far fa-xmark"></i></a>
                                                <a href="#"><i class="far fa-heart"></i></a>
                                                <a href="#"><i class="far fa-arrows-repeat"></i></a>
                                            </div>
                                        </div>
                                        <div class="car-content">
                                            <div class="car-top">
                                                <h4><a href="#">Yellow Ferrari 458</a></h4>
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
                                                <li><i class="far fa-steering-wheel"></i>Automatic</li>
                                                <li><i class="far fa-car"></i>Model: 2023</li>
                                                <li><i class="far fa-road"></i>10.15km / 1-litre</li>
                                                <li><i class="far fa-gas-pump"></i>Hybrid</li>
                                            </ul>
                                            <div class="car-footer">
                                                <span class="car-price">$90,250</span>
                                                <a href="#" class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="car-item">
                                        <div class="car-img">
                                            <img src="{{ asset('frontAssets/img/car/03.jpg') }}" alt="">
                                            <div class="car-btns">
                                                <a href="#"><i class="far fa-xmark"></i></a>
                                                <a href="#"><i class="far fa-heart"></i></a>
                                                <a href="#"><i class="far fa-arrows-repeat"></i></a>
                                            </div>
                                        </div>
                                        <div class="car-content">
                                            <div class="car-top">
                                                <h4><a href="#">Black Audi Q7</a></h4>
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
                                                <li><i class="far fa-steering-wheel"></i>Automatic</li>
                                                <li><i class="far fa-car"></i>Model: 2023</li>
                                                <li><i class="far fa-road"></i>10.15km / 1-litre</li>
                                                <li><i class="far fa-gas-pump"></i>Hybrid</li>
                                            </ul>
                                            <div class="car-footer">
                                                <span class="car-price">$44,350</span>
                                                <a href="#" class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="car-item">
                                        <div class="car-img">
                                            <span class="car-status status-2">New</span>
                                            <img src="{{ asset('frontAssets/img/car/04.jpg') }}" alt="">
                                            <div class="car-btns">
                                                <a href="#"><i class="far fa-xmark"></i></a>
                                                <a href="#"><i class="far fa-heart"></i></a>
                                                <a href="#"><i class="far fa-arrows-repeat"></i></a>
                                            </div>
                                        </div>
                                        <div class="car-content">
                                            <div class="car-top">
                                                <h4><a href="#">BMW Sports Car</a></h4>
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
                                                <li><i class="far fa-steering-wheel"></i>Automatic</li>
                                                <li><i class="far fa-car"></i>Model: 2023</li>
                                                <li><i class="far fa-road"></i>10.15km / 1-litre</li>
                                                <li><i class="far fa-gas-pump"></i>Hybrid</li>
                                            </ul>
                                            <div class="car-footer">
                                                <span class="car-price">$78,760</span>
                                                <a href="#" class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="car-item">
                                        <div class="car-img">
                                            <span class="car-status status-1">Used</span>
                                            <img src="{{ asset('frontAssets/img/car/05.jpg') }}" alt="">
                                            <div class="car-btns">
                                                <a href="#"><i class="far fa-xmark"></i></a>
                                                <a href="#"><i class="far fa-heart"></i></a>
                                                <a href="#"><i class="far fa-arrows-repeat"></i></a>
                                            </div>
                                        </div>
                                        <div class="car-content">
                                            <div class="car-top">
                                                <h4><a href="#">White Tesla Car</a></h4>
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
                                                <li><i class="far fa-steering-wheel"></i>Automatic</li>
                                                <li><i class="far fa-car"></i>Model: 2023</li>
                                                <li><i class="far fa-road"></i>10.15km / 1-litre</li>
                                                <li><i class="far fa-gas-pump"></i>Hybrid</li>
                                            </ul>
                                            <div class="car-footer">
                                                <span class="car-price">$64,230</span>
                                                <a href="#" class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <div class="car-item">
                                        <div class="car-img">
                                            <span class="car-status status-2">New</span>
                                            <img src="{{ asset('frontAssets/img/car/06.jpg') }}" alt="">
                                            <div class="car-btns">
                                                <a href="#"><i class="far fa-xmark"></i></a>
                                                <a href="#"><i class="far fa-heart"></i></a>
                                                <a href="#"><i class="far fa-arrows-repeat"></i></a>
                                            </div>
                                        </div>
                                        <div class="car-content">
                                            <div class="car-top">
                                                <h4><a href="#">White Nissan Car</a></h4>
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
                                                <li><i class="far fa-steering-wheel"></i>Automatic</li>
                                                <li><i class="far fa-car"></i>Model: 2023</li>
                                                <li><i class="far fa-road"></i>10.15km / 1-litre</li>
                                                <li><i class="far fa-gas-pump"></i>Hybrid</li>
                                            </ul>
                                            <div class="car-footer">
                                                <span class="car-price">$34,540</span>
                                                <a href="#" class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- pagination -->
                            <div class="pagination-area">
                                <div aria-label="Page navigation example">
                                    <ul class="pagination my-3">
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true"><i class="far fa-angle-double-left"></i></span>
                                            </a>
                                        </li>
                                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                                        <li class="page-item">
                                            <a class="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true"><i class="far fa-angle-double-right"></i></span>
                                            </a>
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
    <!-- user-profile end -->
@endsection

@section('script')
    <script></script>
@endsection
