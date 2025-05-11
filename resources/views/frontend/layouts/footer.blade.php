<!-- footer area -->
<footer class="footer-area">
    <div class="footer-widget">
        <div class="container">
            <div class="row footer-widget-wrapper pt-100 pb-70">
                <div class="col-md-6 col-lg-4">
                    <div class="footer-widget-box about-us">
                        <a href="#" class="footer-logo">
                            <img src="{{ asset(\App\Helpers\Helper::getLogoLight()) }}" alt="{{ env('APP_NAME') }}">
                        </a>
                        <p class="mb-3">
                            {{ \App\Helpers\Helper::getCompanyAbout() }}
                        </p>
                        <ul class="footer-contact">
                            <li><a href="tel:{{ \App\Helpers\Helper::getCompanyPhone() }}"><i
                                        class="far fa-phone"></i>{{ \App\Helpers\Helper::getCompanyPhone() }}</a></li>
                            <li><i class="far fa-map-marker-alt"></i>{{ \App\Helpers\Helper::getCompanyAddress() }},
                                {{ \App\Helpers\Helper::getCompanyCity() }} {{ \App\Helpers\Helper::getCompanyZip() }},
                                {{ \App\Helpers\Helper::getCompanyCountry() }}</li>
                            <li><a href="mailto:{{ \App\Helpers\Helper::getCompanyEmail() }}">
                                    <i class="far fa-envelope"></i>
                                    <span>{{ \App\Helpers\Helper::getCompanyEmail() }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">Quick Links</h4>
                        <ul class="footer-list">
                            <li><a href="{{ route('frontend.home') }}"><i class="fas fa-caret-right"></i> Home</a></li>
                            <li><a href="{{ route('frontend.about') }}"><i class="fas fa-caret-right"></i> About Us</a>
                            </li>
                            <li><a href="{{ route('frontend.contact') }}"><i class="fas fa-caret-right"></i> Contact
                                    Us</a></li>
                            <li><a href="{{ route('frontend.inventory') }}"><i class="fas fa-caret-right"></i>
                                    Inventory</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Terms Of Service</a></li>
                            <li><a href="#"><i class="fas fa-caret-right"></i> Privacy policy</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">Trusted Brands</h4>
                        <ul class="footer-list">
                            @if (count(\App\Helpers\Helper::getFeaturedBrands()) > 0)
                                @foreach (\App\Helpers\Helper::getFeaturedBrands() as $brand)
                                    <li>
                                        <a href="#" type="submit"
                                            onclick="event.preventDefault(); document.getElementById('brandForm{{ $brand->id }}').submit();">
                                            <i class="fas fa-caret-right"></i> {{ $brand->name }}
                                        </a>
                                    </li>
                                    <form id="brandForm{{ $brand->id }}" action="{{ route('frontend.inventory') }}"
                                        method="GET" hidden>
                                        <input type="text" hidden name="brands[]" value="{{ $brand->id }}">
                                    </form>
                                @endforeach
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="footer-widget-box list">
                        <h4 class="footer-widget-title">Newsletter</h4>
                        <div class="footer-newsletter">
                            <p>Subscribe Our Newsletter To Get Latest Update And News</p>
                            <div class="subscribe-form">
                                <form action="#">
                                    <input type="email" class="form-control" placeholder="Your Email">
                                    <button class="theme-btn" type="submit">
                                        Subscribe Now <i class="far fa-paper-plane"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-6 align-self-center">
                    <p class="copyright-text">
                        © {{ date('Y') }}
                        , {{ \App\Helpers\Helper::getfooterText() }}
                    </p>
                </div>
                <div class="col-md-6 align-self-center">
                    <ul class="footer-social">
                        @if (\App\Helpers\Helper::getCompanyFacebook() !== null)
                            <li><a href="{{ \App\Helpers\Helper::getCompanyFacebook() }}"><i
                                        class="fab fa-facebook-f"></i></a></li>
                        @endif
                        @if (\App\Helpers\Helper::getCompanyInstagram() !== null)
                            <li><a href="{{ \App\Helpers\Helper::getCompanyInstagram() }}"><i
                                        class="fab fa-instagram"></i></a></li>
                        @endif
                        @if (\App\Helpers\Helper::getCompanyTwitter() !== null)
                            <li><a href="{{ \App\Helpers\Helper::getCompanyTwitter() }}"><i
                                        class="fab fa-twitter"></i></a></li>
                        @endif
                        @if (\App\Helpers\Helper::getCompanyLinkedin() !== null)
                            <li><a href="{{ \App\Helpers\Helper::getCompanyLinkedin() }}"><i
                                        class="fab fa-linkedin-in"></i></a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- footer area end -->
