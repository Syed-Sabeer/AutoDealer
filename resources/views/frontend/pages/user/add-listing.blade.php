@extends('frontend.layouts.master')

@section('title', __('Add Listing'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
    <style>
        .nice-select ul {
            height: 150px;
            overflow-y: auto !important;
        }

        .list-upload-wrapper {
            position: relative;
            border: 2px dashed #ddd;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: border-color 0.3s ease;
        }

        .list-upload-wrapper:hover {
            border-color: #0d6efd;
        }

        .list-img-upload {
            color: #6c757d;
            cursor: pointer;
        }

        .list-img-file {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            opacity: 0;
            cursor: pointer;
        }

        .image-preview-container .img-thumbnail {
            height: 120px;
            object-fit: cover;
        }

        .image-preview-container .btn-danger {
            padding: 0.25rem 0.5rem;
            transform: translate(-50%, -60%);
        }
    </style>
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
                                    <form action="{{ route('frontend.car-listings.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <div class="row align-items-center">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="title">Listing Title <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="title" id="title"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        placeholder="Enter title" required value="{{ old('title') }}">
                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="condition">Condition </label>
                                                    <select class="select" name="condition">
                                                        <option selected disabled>Choose</option>
                                                        <option value="new"
                                                            {{ old('condition') == 'new' ? 'selected' : '' }}>New</option>
                                                        <option value="used"
                                                            {{ old('condition') == 'used' ? 'selected' : '' }}>Used</option>
                                                        <option value="certified"
                                                            {{ old('condition') == 'certified' ? 'selected' : '' }}>
                                                            Certified</option>
                                                    </select>
                                                    @error('condition')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="car_body_type_id">Body Type <span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="car_body_type_id" id="car_body_type_id"
                                                        required>
                                                        <option selected disabled>Choose</option>
                                                        @if (isset($carBodyTypes) && count($carBodyTypes) > 0)
                                                            @foreach ($carBodyTypes as $bodyType)
                                                                <option value="{{ $bodyType->id }}"
                                                                    {{ old('car_body_type_id') == $bodyType->id ? 'selected' : '' }}>
                                                                    {{ $bodyType->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @error('car_body_type_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="car_brand_id">Brand/Make <span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="car_brand_id" id="car_brand_id" required>
                                                        <option selected disabled>Choose</option>
                                                        @if (isset($carBrands) && count($carBrands) > 0)
                                                            @foreach ($carBrands as $brand)
                                                                <option value="{{ $brand->id }}"
                                                                    {{ old('car_brand_id') == $brand->id ? 'selected' : '' }}>
                                                                    {{ $brand->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @error('car_brand_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="car_model_id">Model <span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="car_model_id" id="car_model_id" required>
                                                        <option selected disabled>Choose</option>
                                                    </select>
                                                    @error('car_model_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="price">Price
                                                        ({{ \App\Helpers\Helper::currencySymbol() }}) <span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" name="price" id="price"
                                                        class="form-control @error('price') is-invalid @enderror"
                                                        placeholder="Enter price" required value="{{ old('price') }}">
                                                    @error('price')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="year">Year</label>
                                                    <select class="select" name="year" id="yearSelect" required>
                                                        <option selected disabled>Choose</option>
                                                    </select>
                                                    @error('year')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="drive_type">Drive Type </label>
                                                    <select class="select" name="drive_type">
                                                        <option selected disabled>Choose</option>
                                                        <option value="2WD"
                                                            {{ old('drive_type') == '2WD' ? 'selected' : '' }}>2WD</option>
                                                        <option value="4WD"
                                                            {{ old('drive_type') == '4WD' ? 'selected' : '' }}>4WD</option>
                                                        <option value="AWD"
                                                            {{ old('drive_type') == 'AWD' ? 'selected' : '' }}>AWD</option>
                                                        <option value="RWD"
                                                            {{ old('drive_type') == 'RWD' ? 'selected' : '' }}>RWD</option>
                                                    </select>
                                                    @error('drive_type')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="transmission">Transmission <span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="transmission" required>
                                                        <option selected disabled>Choose</option>
                                                        <option value="automatic"
                                                            {{ old('transmission') == 'automatic' ? 'selected' : '' }}>
                                                            Automatic</option>
                                                        <option value="manual"
                                                            {{ old('transmission') == 'manual' ? 'selected' : '' }}>Manual
                                                        </option>
                                                        <option value="semi-automatic"
                                                            {{ old('transmission') == 'semi-automatic' ? 'selected' : '' }}>
                                                            Semi-Automatic</option>
                                                        <option value="cvt"
                                                            {{ old('transmission') == 'cvt' ? 'selected' : '' }}>CVT
                                                        </option>
                                                    </select>
                                                    @error('transmission')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="car_fuel_type_id">Fuel Type <span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="car_fuel_type_id" id="car_fuel_type_id"
                                                        required>
                                                        <option selected disabled>Choose</option>
                                                        @if (isset($carFuelTypes) && count($carFuelTypes) > 0)
                                                            @foreach ($carFuelTypes as $fuelType)
                                                                <option value="{{ $fuelType->id }}"
                                                                    {{ old('car_fuel_type_id') == $fuelType->id ? 'selected' : '' }}>
                                                                    {{ $fuelType->name }}
                                                                </option>
                                                            @endforeach
                                                        @endif
                                                    </select>
                                                    @error('car_fuel_type_id')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="mileage">Mileage (Mi) <span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" name="mileage" id="mileage"
                                                        class="form-control @error('mileage') is-invalid @enderror"
                                                        placeholder="Enter mileage" required
                                                        value="{{ old('mileage') }}">
                                                    @error('mileage')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="engine_capacity">Engine Capacity (CC) <span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" name="engine_capacity" id="engine_capacity"
                                                        class="form-control @error('engine_capacity') is-invalid @enderror"
                                                        placeholder="Enter engine capacity" required
                                                        value="{{ old('engine_capacity') }}">
                                                    @error('engine_capacity')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="fuel_efficiency">Fuel Efficiency per Litre (Mi) </label>
                                                    <input type="number" step="any" name="fuel_efficiency"
                                                        id="fuel_efficiency"
                                                        class="form-control @error('fuel_efficiency') is-invalid @enderror"
                                                        placeholder="i.e 12.5" value="{{ old('fuel_efficiency') }}">
                                                    @error('fuel_efficiency')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="cylenders">Cylenders </label>
                                                    <input type="number" name="cylenders" id="cylenders"
                                                        class="form-control @error('cylenders') is-invalid @enderror"
                                                        placeholder="Enter no of cylenders"
                                                        value="{{ old('cylenders') }}">
                                                    @error('cylenders')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="color">Color <span class="text-danger">*</span></label>
                                                    <input type="text" name="color" id="color"
                                                        class="form-control @error('color') is-invalid @enderror"
                                                        placeholder="Enter color name" required
                                                        value="{{ old('color') }}">
                                                    @error('color')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="doors">Doors <span class="text-danger">*</span></label>
                                                    <input type="number" name="doors" id="doors"
                                                        class="form-control @error('doors') is-invalid @enderror"
                                                        placeholder="Enter no of doors" required
                                                        value="{{ old('doors') }}">
                                                    @error('doors')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="seats">Seats <span class="text-danger">*</span></label>
                                                    <input type="number" name="seats" id="seats"
                                                        class="form-control @error('seats') is-invalid @enderror"
                                                        placeholder="Enter no of seats" required
                                                        value="{{ old('seats') }}">
                                                    @error('seats')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="horsepower">Horsepower (HP) </label>
                                                    <input type="number" name="horsepower" id="horsepower"
                                                        class="form-control @error('horsepower') is-invalid @enderror"
                                                        placeholder="Enter horsepower" value="{{ old('horsepower') }}">
                                                    @error('horsepower')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="vin">VIN </label>
                                                    <input type="text" name="vin" id="vin"
                                                        class="form-control @error('vin') is-invalid @enderror"
                                                        placeholder="Enter VIN" value="{{ old('vin') }}">
                                                    @error('vin')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="main_image">Main Image <span
                                                            class="text-danger">*</span></label>
                                                    <input type="file" accept="image/*" name="main_image"
                                                        id="main_image"
                                                        class="form-control @error('main_image') is-invalid @enderror"
                                                        required>
                                                    @error('main_image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            {{-- <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label>Tags or keyword</label>
                                                    <input type="text" class="form-control"
                                                        placeholder="Enter tags ex: car,red">
                                                </div>
                                            </div> --}}
                                            {{-- <h6 class="fw-bold mt-4 mb-1">Upload Gallery Images</h6>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="list-upload-wrapper">
                                                        <div class="list-img-upload">
                                                            <span><i class="far fa-images"></i> Upload Listing
                                                                Images</span>
                                                        </div>
                                                        <input type="file" name="images[]" accept="image/*" class="list-img-file" multiple>
                                                    </div>
                                                </div>
                                            </div> --}}
                                            <h6 class="fw-bold mt-4 mb-1">Upload Gallery Images</h6>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <div class="list-upload-wrapper">
                                                        <div class="list-img-upload">
                                                            <span><i class="far fa-images"></i> Upload Listing
                                                                Images</span>
                                                        </div>
                                                        <input type="file" name="images[]" accept="image/*"
                                                            class="list-img-file" multiple>
                                                        <div class="image-preview-container row g-2 mt-2"></div>
                                                    </div>
                                                    @error('images')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <h6 class="fw-bold mt-4 mb-1">Location</h6>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="address">Address <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="address" id="address"
                                                        class="form-control @error('address') is-invalid @enderror"
                                                        placeholder="Enter address" required
                                                        value="{{ old('address') }}">
                                                    @error('address')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="city">City <span class="text-danger">*</span></label>
                                                    <input type="text" name="city" id="city"
                                                        class="form-control @error('city') is-invalid @enderror"
                                                        placeholder="Enter city" required value="{{ old('city') }}">
                                                    @error('city')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="state">State <span class="text-danger">*</span></label>
                                                    <input type="text" name="state" id="state"
                                                        class="form-control @error('state') is-invalid @enderror"
                                                        placeholder="Enter state" required value="{{ old('state') }}">
                                                    @error('state')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label for="zip_code">Zip Code <span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" name="zip_code" id="zip_code"
                                                        class="form-control @error('zip_code') is-invalid @enderror"
                                                        placeholder="Enter zip code" required
                                                        value="{{ old('zip_code') }}">
                                                    @error('zip_code')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <h6 class="fw-bold mt-4 mb-1">Detailed Information</h6>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="description">Description <span
                                                            class="text-danger">*</span></label>
                                                    <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror"
                                                        placeholder="Write description" cols="30" rows="5" required>{{ old('description') }}</textarea>
                                                    @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <h6 class="fw-bold my-4">Features</h6>
                                            @if (isset($carFeatures) && count($carFeatures) > 0)
                                                @foreach ($carFeatures as $feature)
                                                    <div class="col-6 col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="feature[]"
                                                                type="checkbox" value="{{ $feature->name }}"
                                                                id="feature{{ $feature->id }}"
                                                                {{ is_array(old('feature')) && in_array($feature->name, old('feature')) ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="feature{{ $feature->id }}">
                                                                {{ $feature->name }}
                                                            </label>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @endif
                                            <h6 class="fw-bold mt-4 mb-1">Contact Information</h6>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="contact_name">Name <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="contact_name" id="contact_name"
                                                        class="form-control @error('contact_name') is-invalid @enderror"
                                                        placeholder="Enter contact name" required
                                                        value="{{ old('contact_name', Auth::user()->name) }}">
                                                    @error('contact_name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="contact_email">Email <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="contact_email" id="contact_email"
                                                        class="form-control @error('contact_email') is-invalid @enderror"
                                                        placeholder="Enter contact email" required
                                                        value="{{ old('contact_email', Auth::user()->email) }}">
                                                    @error('contact_email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="contact_phone">Phone <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="contact_phone" id="contact_phone"
                                                        class="form-control @error('contact_phone') is-invalid @enderror"
                                                        placeholder="Enter contact number" required
                                                        value="{{ old('contact_phone') }}">
                                                    @error('contact_phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-12 mt-4">
                                                <div class="form-check">
                                                    <input class="form-check-input @error('agree') is-invalid @enderror"
                                                        name="agree" type="checkbox" id="agree"
                                                        {{ old('agree') ? 'selected' : '' }} required>
                                                    <label class="form-check-label" for="agree">
                                                        I Agree With Your Terms Of Services And Privacy Policy.
                                                    </label>
                                                    @error('agree')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.querySelector('.list-img-file');
            const previewContainer = document.querySelector('.image-preview-container');
            let currentFiles = [];

            input.addEventListener('change', function(e) {
                const newFiles = Array.from(e.target.files);
                currentFiles = [...currentFiles, ...newFiles];
                updatePreviews();
                updateInputFiles();
            });

            function updatePreviews() {
                previewContainer.innerHTML = '';
                currentFiles.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.createElement('div');
                        preview.className = 'col-3 mb-3 position-relative';
                        preview.innerHTML = `
                    <img src="${e.target.result}" class="img-thumbnail w-100" alt="${file.name}">
                    <button type="button" class="btn btn-danger btn-sm position-absolute rounded-circle"
                        onclick="removeImage(${index})">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                        previewContainer.appendChild(preview);
                    };
                    reader.readAsDataURL(file);
                });
            }

            window.removeImage = function(index) {
                currentFiles.splice(index, 1);
                updatePreviews();
                updateInputFiles();
            };

            function updateInputFiles() {
                const dataTransfer = new DataTransfer();
                currentFiles.forEach(file => dataTransfer.items.add(file));
                input.files = dataTransfer.files;
            }
        });
        $(document).ready(function() {
            const currentYear = new Date().getFullYear();
            const startYear = 1955;
            let options = '<option selected disabled>All Year</option>';

            for (let year = currentYear; year >= startYear; year--) {
                options += `<option value="${year}">${year}</option>`;
            }

            // console.log(options);

            $('#yearSelect').html(options); // update the HTML

            // Re-initialize niceSelect properly
            if ($.fn.niceSelect) {
                $('#yearSelect').niceSelect('destroy');
                $('#yearSelect').niceSelect();
            }
            $('#car_brand_id').on('change', function() {
                var brandId = $(this).val();
                $('#car_model_id').empty().append('<option selected disabled>Loading...</option>');

                if (brandId) {
                    $.ajax({
                        url: '/get-models-by-brand/' + brandId,
                        type: 'GET',
                        success: function(response) {
                            // console.log(response);
                            let options = '<option selected disabled>Choose</option>';
                            $.each(response.models, function(index, model) {
                                options += '<option value="' + model.id + '">' + model
                                    .name + '</option>';
                            });

                            $('#car_model_id').html(options);

                            // Force refresh if using custom select plugin
                            if ($('.select').hasClass('nice-select')) {
                                $('.select').niceSelect('update');
                            }
                        },

                        error: function() {
                            $('#car_model_id').empty().append(
                                '<option selected disabled>Error loading models</option>');
                        }
                    });
                } else {
                    $('#car_model_id').empty().append('<option selected disabled>Choose</option>');
                }
            });
        });
    </script>
@endsection

{{-- @section('script')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const input = document.querySelector('.list-img-file');
            const previewContainer = document.querySelector('.image-preview-container');
            let currentFiles = [];

            input.addEventListener('change', function(e) {
                const newFiles = Array.from(e.target.files);
                currentFiles = [...currentFiles, ...newFiles];
                updatePreviews();
                updateInputFiles();
            });

            function updatePreviews() {
                previewContainer.innerHTML = '';
                currentFiles.forEach((file, index) => {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const preview = document.createElement('div');
                        preview.className = 'col-3 mb-3 position-relative';
                        preview.innerHTML = `
                    <img src="${e.target.result}" class="img-thumbnail w-100" alt="${file.name}">
                    <button type="button" class="btn btn-danger btn-sm position-absolute rounded-circle"
                        onclick="removeImage(${index})">
                        <i class="fas fa-times"></i>
                    </button>
                `;
                        previewContainer.appendChild(preview);
                    };
                    reader.readAsDataURL(file);
                });
            }

            window.removeImage = function(index) {
                currentFiles.splice(index, 1);
                updatePreviews();
                updateInputFiles();
            };

            function updateInputFiles() {
                const dataTransfer = new DataTransfer();
                currentFiles.forEach(file => dataTransfer.items.add(file));
                input.files = dataTransfer.files;
            }
        });
        $(document).ready(function() {
            const currentYear = new Date().getFullYear();
            const startYear = 1955;
            let options = '<option selected disabled>All Year</option>';

            for (let year = currentYear; year >= startYear; year--) {
                options += `<option value="${year}">${year}</option>`;
            }

            console.log(options);

            $('#yearSelect').html(options); // update the HTML

            // Re-initialize niceSelect properly
            if ($.fn.niceSelect) {
                $('#yearSelect').niceSelect('destroy');
                $('#yearSelect').niceSelect();
            }
            $('#car_brand_id').on('change', function() {
                var brandId = $(this).val();
                $('#car_model_id').empty().append('<option selected disabled>Loading...</option>');

                if (brandId) {
                    $.ajax({
                        url: '/get-models-by-brand/' + brandId,
                        type: 'GET',
                        success: function(response) {
                            console.log(response);
                            let options = '<option selected disabled>Choose</option>';
                            $.each(response.models, function(index, model) {
                                options += '<option value="' + model.id + '">' + model
                                    .name + '</option>';
                            });

                            $('#car_model_id').html(options);

                            // Force refresh if using custom select plugin
                            if ($('.select').hasClass('nice-select')) {
                                $('.select').niceSelect('update');
                            }
                        },

                        error: function() {
                            $('#car_model_id').empty().append(
                                '<option selected disabled>Error loading models</option>');
                        }
                    });
                } else {
                    $('#car_model_id').empty().append('<option selected disabled>Choose</option>');
                }
            });
        });
    </script>
@endsection --}}
