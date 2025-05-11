<!-- car category -->
<div class="car-category py-120">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 mx-auto">
                <div class="site-heading text-center">
                    <span class="site-title-tagline"><i class="flaticon-drive"></i> Car Category</span>
                    <h2 class="site-title">Car By Body <span>Types</span></h2>
                    <div class="heading-divider"></div>
                </div>
            </div>
        </div>
        <div class="row">
            @if (count(\App\Helpers\Helper::getCarBodyTypes()) > 0)
                @foreach (\App\Helpers\Helper::getCarBodyTypes() as $bodyType)
                    <div class="col-6 col-md-4 col-lg-2">
                        <form action="{{ route('frontend.inventory') }}" method="GET">
                            <input type="text" hidden name="body_types[]" value="{{ $bodyType->id }}">
                            <button type="submit" class="btn category-item wow fadeInUp" data-wow-delay=".25s">
                                <div class="category-img">
                                    <img src="{{ asset($bodyType->image) }}" alt="">
                                </div>
                                <h5>{{ $bodyType->name }}</h5>
                            </button>
                        </form>
                    </div>
                @endforeach
            @endif
            {{-- <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-delay=".50s">
                    <div class="category-img">
                        <img src="{{ asset('frontAssets/img/category/02.png') }}" alt="">
                    </div>
                    <h5>Compact</h5>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-delay=".75s">
                    <div class="category-img">
                        <img src="{{ asset('frontAssets/img/category/03.png') }}" alt="">
                    </div>
                    <h5>Convertible</h5>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-delay="1s">
                    <div class="category-img">
                        <img src="{{ asset('frontAssets/img/category/04.png') }}" alt="">
                    </div>
                    <h5>SUV</h5>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-delay="1.25s">
                    <div class="category-img">
                        <img src="{{ asset('frontAssets/img/category/05.png') }}" alt="">
                    </div>
                    <h5>Crossover</h5>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-delay="1.50s">
                    <div class="category-img">
                        <img src="{{ asset('frontAssets/img/category/06.png') }}" alt="">
                    </div>
                    <h5>Wagon</h5>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-delay=".25s">
                    <div class="category-img">
                        <img src="{{ asset('frontAssets/img/category/07.png') }}" alt="">
                    </div>
                    <h5>Sports</h5>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-delay=".50s">
                    <div class="category-img">
                        <img src="{{ asset('frontAssets/img/category/08.png') }}" alt="">
                    </div>
                    <h5>Pickup</h5>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-delay=".75s">
                    <div class="category-img">
                        <img src="{{ asset('frontAssets/img/category/09.png') }}" alt="">
                    </div>
                    <h5>Family MPV</h5>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-delay="1s">
                    <div class="category-img">
                        <img src="{{ asset('frontAssets/img/category/10.png') }}" alt="">
                    </div>
                    <h5>Coupe</h5>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-delay="1.25s">
                    <div class="category-img">
                        <img src="{{ asset('frontAssets/img/category/11.png') }}" alt="">
                    </div>
                    <h5>Electric</h5>
                </a>
            </div>
            <div class="col-6 col-md-4 col-lg-2">
                <a href="#" class="category-item wow fadeInUp" data-wow-delay="1.50s">
                    <div class="category-img">
                        <img src="{{ asset('frontAssets/img/category/12.png') }}" alt="">
                    </div>
                    <h5>Luxury</h5>
                </a>
            </div> --}}
        </div>
    </div>
</div>
<!-- car category end-->
