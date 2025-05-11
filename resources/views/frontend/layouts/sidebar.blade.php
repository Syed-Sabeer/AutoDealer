<!-- sidebar-popup -->
<div class="sidebar-popup">
    <div class="sidebar-wrapper">
        <div class="sidebar-content">
            <button type="button" class="close-sidebar-popup"><i class="far fa-xmark"></i></button>
            <div class="sidebar-logo">
                <img src="{{ asset(\App\Helpers\Helper::getLogoDark()) }}" alt="{{ env('APP_NAME') }}">
            </div>
            <div class="sidebar-about">
                <h4>About Us</h4>
                <p>{{ \App\Helpers\Helper::getCompanyAbout() }}</p>
            </div>
            <div class="sidebar-contact">
                <h4>Contact Info</h4>
                <ul>
                    <li>
                        <h6>Email</h6>
                        <a href="mailto:{{ \App\Helpers\Helper::getCompanyEmail() }}"><i
                                class="far fa-envelope"></i><span>{{ \App\Helpers\Helper::getCompanyEmail() }}</span></a>
                    </li>
                    <li>
                        <h6>Phone</h6>
                        <a href="tel:{{ \App\Helpers\Helper::getCompanyPhone() }}"><i
                                class="far fa-phone"></i>{{ \App\Helpers\Helper::getCompanyPhone() }}</a>
                    </li>
                    <li>
                        <h6>Address</h6>
                        <a href="#"><i
                                class="far fa-location-dot"></i>{{ \App\Helpers\Helper::getCompanyAddress() }},
                            {{ \App\Helpers\Helper::getCompanyCity() }} {{ \App\Helpers\Helper::getCompanyZip() }},
                            {{ \App\Helpers\Helper::getCompanyCountry() }}
                        </a>
                    </li>
                </ul>
            </div>
            <div class="sidebar-social">
                <h4>Follow Us</h4>
                @if (\App\Helpers\Helper::getCompanyFacebook() !== null)
                    <a href="{{ \App\Helpers\Helper::getCompanyFacebook() }}">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                @endif
                @if (\App\Helpers\Helper::getCompanyInstagram() !== null)
                    <a href="{{ \App\Helpers\Helper::getCompanyInstagram() }}">
                        <i class="fab fa-instagram"></i>
                    </a>
                @endif
                @if (\App\Helpers\Helper::getCompanyTwitter() !== null)
                    <a href="{{ \App\Helpers\Helper::getCompanyTwitter() }}">
                        <i class="fab fa-twitter"></i>
                    </a>
                @endif
                @if (\App\Helpers\Helper::getCompanyLinkedin() !== null)
                    <a href="{{ \App\Helpers\Helper::getCompanyLinkedin() }}">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- sidebar-popup end -->
