@extends('frontend.layouts.master')

@section('title', __('Add Listing'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
@endsection

<!-- Page Title -->
@section('breadcrumbs')
    @include('frontend.layouts.partials.breadcrumb', [
        'title' => 'Add Listing',
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('frontend.dashboard')],
            ['label' => 'Add Listing'],
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
                        <div class="user-profile-card">
                            <h4 class="user-profile-card-title">Add New Listing</h4>
                            <div class="col-lg-12">
                                <div class="add-listing-form">
                                    <h6 class="mb-1">Basic Information</h6>
                                    <form action="#">
                                        <div class="row align-items-center">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Listing Title</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter title">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Condition</label>
                                                    <select class="select">
                                                        <option value="">Choose</option>
                                                        <option value="1">New</option>
                                                        <option value="2">Used</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Body Type</label>
                                                    <select class="select">
                                                        <option value="">Choose</option>
                                                        <option value="1">Sedan</option>
                                                        <option value="2">Compact</option>
                                                        <option value="3">Coupe</option>
                                                        <option value="4">Wagon</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Make/Brand</label>
                                                    <select class="select">
                                                        <option value="">Choose</option>
                                                        <option value="1">BMW</option>
                                                        <option value="2">Ferrari</option>
                                                        <option value="3">Marcediz Benz</option>
                                                        <option value="4">Hyundai</option>
                                                        <option value="5">Nissan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Model</label>
                                                    <select class="select">
                                                        <option value="">Choose</option>
                                                        <option value="1">A3</option>
                                                        <option value="2">A4</option>
                                                        <option value="3">A6</option>
                                                        <option value="4">Q4</option>
                                                        <option value="5">Q7</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Price (USD)</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter price">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Year</label>
                                                    <select class="select">
                                                        <option value="">Choose</option>
                                                        <option value="1">2023</option>
                                                        <option value="2">2022</option>
                                                        <option value="3">2021</option>
                                                        <option value="4">2020</option>
                                                        <option value="5">2019</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Drive Type</label>
                                                    <select class="select">
                                                        <option value="">Choose</option>
                                                        <option value="1">Automatic</option>
                                                        <option value="2">Semi Auto</option>
                                                        <option value="3">Manual</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Transmission</label>
                                                    <select class="select">
                                                        <option value="">Choose</option>
                                                        <option value="1">Automatic</option>
                                                        <option value="2">Manual</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Fuel Type</label>
                                                    <select class="select">
                                                        <option value="">Choose</option>
                                                        <option value="1">Diesel</option>
                                                        <option value="2">Petrol</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Mileage</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter mileage">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Engine Size</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter engine size">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Cylenders</label>
                                                    <select class="select">
                                                        <option value="">Choose</option>
                                                        <option value="1">4</option>
                                                        <option value="2">6</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Color</label>
                                                    <select class="select">
                                                        <option value="">Choose</option>
                                                        <option value="1">Red</option>
                                                        <option value="2">White</option>
                                                        <option value="3">Black</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Doors</label>
                                                    <select class="select">
                                                        <option value="">Choose</option>
                                                        <option value="1">2</option>
                                                        <option value="2">4</option>
                                                        <option value="3">6</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>VIN</label>
                                                    <input type="text" class="form-control" placeholder="Enter VIN">
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Tags or keyword</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter tags ex: car,red">
                                                </div>
                                            </div>
                                            <h6 class="fw-bold mt-4 mb-1">Upload Images</h6>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="list-upload-wrapper">
                                                        <div class="list-img-upload">
                                                            <span><i class="far fa-images"></i> Upload Listing
                                                                Images</span>
                                                        </div>
                                                        <input type="file" class="list-img-file" multiple>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="fw-bold mt-4 mb-1">Location</h6>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Address</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter address">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>City</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter city">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>State</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter state">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label>Zip Code</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter zip code">
                                                </div>
                                            </div>
                                            <h6 class="fw-bold mt-4 mb-1">Detailed Information</h6>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <textarea class="form-control" placeholder="Write description"
                                                        cols="30" rows="5"></textarea>
                                                </div>
                                            </div>
                                            <h6 class="fw-bold my-4">Features</h6>
                                            <div class="col-6 col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="feature"
                                                        type="checkbox" value="" id="feature1">
                                                    <label class="form-check-label" for="feature1">
                                                        Multi-zone A/C
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="feature"
                                                        type="checkbox" value="" id="feature2">
                                                    <label class="form-check-label" for="feature2">
                                                        Adaptive Cruise Control
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="feature"
                                                        type="checkbox" value="" id="feature3">
                                                    <label class="form-check-label" for="feature3">
                                                        Sunroof
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="feature"
                                                        type="checkbox" value="" id="feature4">
                                                    <label class="form-check-label" for="feature4">
                                                        Heated front seats
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="feature"
                                                        type="checkbox" value="" id="feature5">
                                                    <label class="form-check-label" for="feature5">
                                                        Cooled Seats
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="feature"
                                                        type="checkbox" value="" id="feature6">
                                                    <label class="form-check-label" for="feature6">
                                                        Panoramic roof
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="feature"
                                                        type="checkbox" value="" id="feature7">
                                                    <label class="form-check-label" for="feature7">
                                                        Navigation system
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="feature"
                                                        type="checkbox" value="" id="feature8">
                                                    <label class="form-check-label" for="feature8">
                                                        Keyles Start
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="feature"
                                                        type="checkbox" value="" id="feature9">
                                                    <label class="form-check-label" for="feature9">
                                                        Bluetooth
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="feature"
                                                        type="checkbox" value="" id="feature10">
                                                    <label class="form-check-label" for="feature10">
                                                        Antilock brakes
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-6 col-md-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="feature"
                                                        type="checkbox" value="" id="feature11">
                                                    <label class="form-check-label" for="feature11">
                                                        Android Auto
                                                    </label>
                                                </div>
                                            </div>
                                            <h6 class="fw-bold mt-4 mb-1">Contact Information</h6>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Name</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter name">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Email</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter email">
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label>Phone</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter phone">
                                                </div>
                                            </div>
                                            <div class="col-12 mt-4">
                                                <div class="form-check">
                                                    <input class="form-check-input" name="agree" type="checkbox"
                                                        value="" id="agree">
                                                    <label class="form-check-label" for="agree">
                                                        I Agree With Your Terms Of Services And Privacy Policy.
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 my-4">
                                                <button type="submit" class="theme-btn"><span
                                                        class="far fa-save"></span> Save & Publish Listing</button>
                                            </div>
                                        </div>
                                    </form>
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
