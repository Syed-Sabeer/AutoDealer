<!-- car brand -->
<div class="car-brand py-120">
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
            @if (count(\App\Helpers\Helper::getFeaturedBrands()) > 0)
                @foreach (\App\Helpers\Helper::getFeaturedBrands() as $brand)
                    <div class="col-6 col-md-3 col-lg-2">
                        <form action="{{ route('frontend.inventory') }}" method="GET">
                            <button type="submit" class="btn brand-item wow fadeInUp" data-wow-delay=".25s">
                                <input type="text" hidden name="brands[]" value="{{ $brand->id }}">
                                <div class="brand-img">
                                    <img style="max-height: 80px !important;" src="{{ asset($brand->logo ?? 'frontAssets/img/default-img.jpg') }}" alt="{{ $brand->name }}">
                                </div>
                                <h5>{{ $brand->name }}</h5>
                            </button>
                        </form>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</div>
<!-- car brand end-->
