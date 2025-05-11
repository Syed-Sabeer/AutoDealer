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
            @if (count(\App\Helpers\Helper::getTestimonials()) > 0)
                @foreach (\App\Helpers\Helper::getTestimonials() as $testimonial)
                    <div class="testimonial-single">
                        <div class="testimonial-content">
                            <div class="testimonial-author-img">
                                <img src="{{ asset($testimonial->image ?? 'assets/img/default/user.png') }}"
                                    alt="{{ $testimonial->name }}">
                            </div>
                            <div class="testimonial-author-info">
                                <h4>{{ $testimonial->name }}</h4>
                                <p>{{ $testimonial->designation }}</p>
                            </div>
                        </div>
                        <div class="testimonial-quote">
                            <span class="testimonial-quote-icon"><i class="flaticon-quote"></i></span>
                            <p>{{ $testimonial->review }}</p>
                        </div>
                        <div class="testimonial-rate">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="fas fa-star"></i>
                            @endfor
                        </div>
                    </div>
                @endforeach
            @else
                <p>No Testimonials</p>
            @endif
        </div>
    </div>
</div>
<!-- testimonial area end -->
