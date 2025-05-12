@extends('frontend.layouts.master')

@section('title', __('Inventory Details'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
@endsection

<!-- Page Title -->
@section('breadcrumbs')
    @include('frontend.layouts.partials.breadcrumb', [
        'title' => 'Details',
        'breadcrumbs' => [['label' => 'Inventory', 'url' => route('frontend.inventory')], ['label' => 'Details']],
    ])
@endsection
<!-- End Page Title -->

@section('content')
    <!-- car single -->
    <div class="car-item-single bg py-120">
        <div class="container">
            <div class="car-single-wrapper">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="car-single-details">
                            <div class="car-single-widget">
                                <div class="car-single-top">
                                    <span class="car-status status-1">{{ ucfirst($carListing->condition) }}</span>
                                    <h3 class="car-single-title">{{ ucfirst($carListing->title) }}</h3>
                                    <ul class="car-single-meta">
                                        <li><i class="far fa-clock"></i> Listed On: Sat,
                                            {{ $carListing->created_at->format('M d, Y') }}</li>
                                        {{-- <li><i class="far fa-eye"></i> Views: 850</li> --}}
                                    </ul>
                                </div>
                                <div class="car-single-slider">
                                    <div class="item-gallery">
                                        <div class="flexslider-thumbnails">
                                            <ul class="slides">
                                                @if (isset($carListingImages) && count($carListingImages) > 0)
                                                    @foreach ($carListingImages as $image)
                                                        <li data-thumb="{{ asset($image->image_url) }}">
                                                            <img src="{{ asset($image->image_url) }}" alt="#">
                                                        </li>
                                                    @endforeach
                                                @else
                                                    <li data-thumb="{{ asset($carListing->main_image) }}">
                                                        <img src="{{ asset($carListing->main_image) }}" alt="#">
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="car-single-widget">
                                <h4 class="mb-4">Key Information</h4>
                                <div class="car-key-info">
                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-drive"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Body Type</span>
                                                    <h6>{{ ucfirst($carListing->carBodyType->name) }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-drive"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Condition</span>
                                                    <h6>{{ ucfirst($carListing->condition) }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-speedometer"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Mileage</span>
                                                    <h6>{{ $carListing->mileage }} (Mi)</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-settings"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Transmission</span>
                                                    <h6>{{ ucfirst($carListing->transmission) }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-drive"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Year</span>
                                                    <h6>{{ $carListing->year }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-gas-station"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Fuel Type</span>
                                                    <h6>{{ ucfirst($carListing->carFuelType->name) }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-drive"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Color</span>
                                                    <h6>{{ $carListing->color }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-drive"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Doors</span>
                                                    <h6>{{ $carListing->doors }} Doors</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-drive"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Cylinders</span>
                                                    <h6>{{ $carListing->cylenders }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-drive"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>Engine Size</span>
                                                    <h6>{{ $carListing->engine_capacity }} (cc)</h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 col-md-4 col-6">
                                            <div class="car-key-item">
                                                <div class="car-key-icon">
                                                    <i class="flaticon-drive"></i>
                                                </div>
                                                <div class="car-key-content">
                                                    <span>VIN</span>
                                                    <h6>{{ $carListing->vin }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="car-single-widget">
                                <div class="car-single-overview">
                                    <h4 class="mb-3">Description</h4>
                                    <div class="mb-4">
                                        <p>{!! $carListing->description !!}</p>
                                    </div>
                                    <h4 class="mb-3">Car Features</h4>
                                    <div class="row mb-3">
                                        @foreach (json_decode($carListing->features ?? '[]') as $feature)
                                            <div class="col-lg-4">
                                                <ul class="car-single-list">
                                                    <li><i class="far fa-check-circle"></i> {{ $feature }}</li>
                                                </ul>
                                            </div>
                                        @endforeach
                                    </div>
                                    {{-- <h4 class="mb-4">Vehicle History</h4>
                                    <div class="mb-4">
                                        <ul class="car-single-list">
                                            <li><i class="far fa-check-circle"></i> It is a long established fact that a
                                                reader will be distracted </li>
                                            <li><i class="far fa-check-circle"></i> Sed perspic unde omnis iste natus sit
                                                voluptatem accusantium</li>
                                            <li><i class="far fa-check-circle"></i> Explain to you how all this mistaken
                                                idea of denouncing pleasure</li>
                                            <li><i class="far fa-check-circle"></i> Praising pain was born will give account
                                                of the system</li>
                                        </ul>
                                    </div> --}}
                                    <h4 class="mb-4">Location</h4>
                                    <div class="car-single-map">
                                        <div class="contact-map">
                                            @php
                                                $fullAddress = urlencode(trim("{$carListing->address}, {$carListing->city}, {$carListing->state} {$carListing->zip_code}"));
                                            @endphp

                                            <iframe
                                                width="100%"
                                                height="450"
                                                frameborder="0"
                                                style="border:0"
                                                src="https://www.google.com/maps?q={{ $fullAddress }}&output=embed"
                                                allowfullscreen
                                                loading="lazy">
                                            </iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="car-single-widget">
                                <div class="car-single-review">
                                    <div class="blog-comments mb-0">
                                        <h4>Reviews (05)</h4>
                                        <div class="blog-comments-wrapper">
                                            <div class="blog-comments-single">
                                                <img src="{{ asset('frontAssets/img/blog/com-1.jpg') }}" alt="thumb">
                                                <div class="blog-comments-content">
                                                    <h5>Jesse Sinkler</h5>
                                                    <span><i class="far fa-clock"></i> January 31, 2023</span>
                                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                                        blanditiis praesentium voluptatum deleniti atque corrupti quos
                                                        dolores et quas molestias excepturi sint occaecati cupiditate non
                                                        provident.</p>
                                                    <a href="#"><i class="far fa-reply"></i> Reply</a>
                                                </div>
                                            </div>
                                            <div class="blog-comments-single">
                                                <img src="{{ asset('frontAssets/img/blog/com-2.jpg') }}" alt="thumb">
                                                <div class="blog-comments-content">
                                                    <h5>Daniel Wellman</h5>
                                                    <span><i class="far fa-clock"></i> January 31, 2023</span>
                                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                                        blanditiis praesentium voluptatum deleniti atque corrupti quos
                                                        dolores et quas molestias excepturi sint occaecati cupiditate non
                                                        provident.</p>
                                                    <a href="#"><i class="far fa-reply"></i> Reply</a>
                                                </div>
                                            </div>
                                            <div class="blog-comments-single">
                                                <img src="{{ asset('frontAssets/img/blog/com-3.jpg') }}" alt="thumb">
                                                <div class="blog-comments-content">
                                                    <h5>Kenneth Evans</h5>
                                                    <span><i class="far fa-clock"></i> January 31, 2023</span>
                                                    <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui
                                                        blanditiis praesentium voluptatum deleniti atque corrupti quos
                                                        dolores et quas molestias excepturi sint occaecati cupiditate non
                                                        provident.</p>
                                                    <a href="#"><i class="far fa-reply"></i> Reply</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="blog-comments-form">
                                            <h4>Leave A Review</h4>
                                            <form action="#">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group car-review-rating">
                                                            <label>Your Rating</label>
                                                            <div>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                                <i class="far fa-star"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="text" class="form-control"
                                                                placeholder="Your Name*">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <input type="email" class="form-control"
                                                                placeholder="Your Email*">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <textarea class="form-control" rows="5" placeholder="Your Comment*"></textarea>
                                                        </div>
                                                        <button type="submit" class="theme-btn"><span
                                                                class="far fa-paper-plane"></span> Submit Review</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="car-single-widget">
                            <h4 class="car-single-price">{{ \App\Helpers\Helper::formatCurrency($carListing->price) }}</h4>
                            <ul class="car-single-meta">
                                <li><i class="fa-regular fa-gauge-high"></i> {{ $carListing->mileage }} Miles</li>
                                <li><i class="far fa-location-dot"></i> {{ $carListing->address }}, {{ $carListing->city }}</li>
                            </ul>
                        </div>
                        <div class="car-single-widget">
                            <div class="car-single-author">
                                <img src="{{ asset($carListing->user->profile->profile_image ?? 'assets/img/default/user.png') }}" alt="">
                                <div class="car-single-author-content">
                                    <h5>{{ $carListing->user->name }}</h5>
                                    <span>{{ Str::title(str_replace('-', ' ', $carListing->user->getRoleNames()->first())) }}</span>
                                    <div class="car-single-author-social">
                                        @if ($carListing->user->profile->facebook_url)
                                            <a href="{{$carListing->user->profile->facebook_url}}"><i class="fab fa-facebook"></i></a>
                                        @endif
                                        @if ($carListing->user->profile->linkedin_url)
                                            <a href="{{$carListing->user->profile->linkedin_url}}"><i class="fab fa-linkedin"></i></a>
                                        @endif
                                        @if ($carListing->user->profile->instagram_url)
                                            <a href="{{$carListing->user->profile->instagram_url}}"><i class="fab fa-instagram"></i></a>
                                        @endif
                                        @if ($carListing->user->profile->github_url)
                                            <a href="{{$carListing->user->profile->github_url}}"><i class="fab fa-github"></i></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="car-single-widget">
                            <h5 class="mb-3">Contact Details</h5>
                            <div class="car-single-form">
                                <form action="#">
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Name">
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control" placeholder="Enter Email">
                                    </div>
                                    <div class="form-group">
                                        <textarea class="form-control" rows="3" placeholder="Write Message"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="theme-btn">Send Now<i
                                                class="fas fa-arrow-right-long"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="car-single-related mt-5">
                    <h3 class="mb-30">Related Listing</h3>
                    <div class="row">
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="car-item">
                                <div class="car-img">
                                    <span class="car-status status-1">Used</span>
                                    <img src="{{ asset('frontAssets/img/car/01.jpg') }}" alt="">
                                    <div class="car-btns">
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
                                        <li><i class="far fa-road"></i>10.15km / 1-litre</li>
                                        <li><i class="far fa-car"></i>Model: 2023</li>
                                        <li><i class="far fa-gas-pump"></i>Hybrid</li>
                                    </ul>
                                    <div class="car-footer">
                                        <span class="car-price">$45,620</span>
                                        <a href="#" class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="car-item">
                                <div class="car-img">
                                    <img src="{{ asset('frontAssets/img/car/02.jpg') }}" alt="">
                                    <div class="car-btns">
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
                                        <li><i class="far fa-road"></i>10.15km / 1-litre</li>
                                        <li><i class="far fa-car"></i>Model: 2023</li>
                                        <li><i class="far fa-gas-pump"></i>Hybrid</li>
                                    </ul>
                                    <div class="car-footer">
                                        <span class="car-price">$90,250</span>
                                        <a href="#" class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="car-item">
                                <div class="car-img">
                                    <img src="{{ asset('frontAssets/img/car/03.jpg') }}" alt="">
                                    <div class="car-btns">
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
                                        <li><i class="far fa-road"></i>10.15km / 1-litre</li>
                                        <li><i class="far fa-car"></i>Model: 2023</li>
                                        <li><i class="far fa-gas-pump"></i>Hybrid</li>
                                    </ul>
                                    <div class="car-footer">
                                        <span class="car-price">$44,350</span>
                                        <a href="#" class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="car-item">
                                <div class="car-img">
                                    <span class="car-status status-2">New</span>
                                    <img src="{{ asset('frontAssets/img/car/04.jpg') }}" alt="">
                                    <div class="car-btns">
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
                                        <li><i class="far fa-road"></i>10.15km / 1-litre</li>
                                        <li><i class="far fa-car"></i>Model: 2023</li>
                                        <li><i class="far fa-gas-pump"></i>Hybrid</li>
                                    </ul>
                                    <div class="car-footer">
                                        <span class="car-price">$78,760</span>
                                        <a href="#" class="theme-btn"><span class="far fa-eye"></span>Details</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- car single end -->
@endsection

@section('script')
    <script>
        //
    </script>
@endsection
