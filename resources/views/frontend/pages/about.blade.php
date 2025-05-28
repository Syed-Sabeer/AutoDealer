@extends('frontend.layouts.master')

@section('title', __('About'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
@endsection

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

@section('content')
    <!-- about area -->
    @include('frontend.sections.about-area')
    <!-- about area end -->


    <!-- counter area -->
    {{-- @include('frontend.sections.counter-area') --}}
    <!-- counter area end -->


    <!-- testimonial area -->
    {{-- @include('frontend.sections.testimonials') --}}
    <!-- testimonial area end -->


    <!-- team-area -->
    @include('frontend.sections.team')
    <!-- team-area end -->


    <!-- car brand -->
    @include('frontend.sections.car-brands')
    <!-- car brand end-->
@endsection

@section('script')
    <script></script>
@endsection
