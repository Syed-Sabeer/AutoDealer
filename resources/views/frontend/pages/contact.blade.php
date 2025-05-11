@extends('frontend.layouts.master')

@section('title', __('Contact'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
@endsection

<!-- Page Title -->
@section('breadcrumbs')
    @include('frontend.layouts.partials.breadcrumb', [
        'title' => 'Contact',
        'breadcrumbs' => [
            // ['label' => 'Home', 'url' => route('frontend.home')],
            ['label' => 'Contact'],
        ],
    ])
@endsection
<!-- End Page Title -->

@section('content')
    <!-- contact area -->
    <div class="contact-area py-120">
        <div class="container">
            <div class="contact-content">
                <div class="row">
                    <div class="col-md-3">
                        <div class="contact-info">
                            <div class="contact-info-icon">
                                <i class="fal fa-map-location-dot"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Office Address</h5>
                                <p>25/B Milford, New York, USA</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="contact-info">
                            <div class="contact-info-icon">
                                <i class="fal fa-phone-volume"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Call Us</h5>
                                <p>+2 123 4565 789</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="contact-info">
                            <div class="contact-info-icon">
                                <i class="fal fa-envelopes"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Email Us</h5>
                                <p><a href="">test@gmail.com</a></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="contact-info">
                            <div class="contact-info-icon">
                                <i class="fal fa-alarm-clock"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Open Time</h5>
                                <p>Mon - Sat (10.00AM - 05.30PM)</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contact-wrapper">
                <div class="row">
                    <div class="col-lg-6 align-self-center">
                        <div class="contact-img">
                            <img src="{{ asset('frontAssets/img/contact/01.jpg') }}" alt="contact image">
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <div class="contact-form">
                            <div class="contact-form-header">
                                <h2>Get In Touch</h2>
                                <p>It is a long established fact that a reader will be distracted by the readable
                                    content of a page randomised words which don't look even slightly when looking at its layout. </p>
                            </div>
                            <form method="post" action="" id="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name"
                                                placeholder="Your Name" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" class="form-control" name="email"
                                                placeholder="Your Email" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="subject"
                                        placeholder="Your Subject" required>
                                </div>
                                <div class="form-group">
                                    <textarea name="message" cols="30" rows="5" class="form-control"
                                        placeholder="Write Your Message"></textarea>
                                </div>
                                <button type="submit" class="theme-btn">Send
                                    Message <i class="far fa-paper-plane"></i></button>
                                <div class="col-md-12 mt-3">
                                    <div class="form-messege text-success"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end contact area -->

    <!-- map -->
    <div class="contact-map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96708.34194156103!2d-74.03927096447748!3d40.759040329405195!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x4a01c8df6fb3cb8!2sSolomon%20R.%20Guggenheim%20Museum!5e0!3m2!1sen!2sbd!4v1619410634508!5m2!1sen!2s"
            style="border:0;" allowfullscreen="" loading="lazy"></iframe>
    </div>
@endsection

@section('script')
    <script></script>
@endsection
