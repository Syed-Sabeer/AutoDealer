@extends('frontend.layouts.master')

@section('title', __('Edit Listing'))
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
        'title' => 'Edit Listing',
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('frontend.dashboard')],
            ['label' => 'Edit Listing'],
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
                            <h4 class="user-profile-card-title">Edit Listing</h4>
                            <div class="col-lg-12">
                                <div class="add-listing-form">
                                    <h6 class="mb-1">Basic Information</h6>
                                    <form action="{{ route('frontend.car-listings.update', $carListing->id) }}"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <div class="row align-items-center">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="title">Listing Title <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" name="title" id="title"
                                                        class="form-control @error('title') is-invalid @enderror"
                                                        placeholder="Enter title" required
                                                        value="{{ old('title', $carListing->title) }}">
                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="condition">Condition <span
                                                            class="text-danger">*</span></label>
                                                    <select class="select" name="condition" required>
                                                        <option selected disabled>Choose</option>
                                                        <option value="new"
                                                            {{ old('condition', $carListing->condition) == 'new' ? 'selected' : '' }}>
                                                            New</option>
                                                        <option value="used"
                                                            {{ old('condition', $carListing->condition) == 'used' ? 'selected' : '' }}>
                                                            Used</option>
                                                        <option value="certified"
                                                            {{ old('condition', $carListing->condition) == 'certified' ? 'selected' : '' }}>
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
                                                                    {{ old('car_body_type_id', $carListing->car_body_type_id) == $bodyType->id ? 'selected' : '' }}>
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
                                                                    {{ old('car_brand_id', $carListing->car_brand_id) == $brand->id ? 'selected' : '' }}>
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
                                                    <label for="price">Price (USD) <span
                                                            class="text-danger">*</span></label>
                                                    <input type="number" name="price" id="price"
                                                        class="form-control @error('price') is-invalid @enderror"
                                                        placeholder="Enter price" required
                                                        value="{{ old('price', $carListing->price) }}">
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
                                                    <select class="select" name="year" id="year" required>
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
                                                            {{ old('drive_type', $carListing->drive_type) == '2WD' ? 'selected' : '' }}>
                                                            2WD</option>
                                                        <option value="4WD"
                                                            {{ old('drive_type', $carListing->drive_type) == '4WD' ? 'selected' : '' }}>
                                                            4WD</option>
                                                        <option value="AWD"
                                                            {{ old('drive_type', $carListing->drive_type) == 'AWD' ? 'selected' : '' }}>
                                                            AWD</option>
                                                        <option value="RWD"
                                                            {{ old('drive_type', $carListing->drive_type) == 'RWD' ? 'selected' : '' }}>
                                                            RWD</option>
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
                                                            {{ old('transmission', $carListing->transmission) == 'automatic' ? 'selected' : '' }}>
                                                            Automatic</option>
                                                        <option value="manual"
                                                            {{ old('transmission', $carListing->transmission) == 'manual' ? 'selected' : '' }}>
                                                            Manual</option>
                                                        <option value="semi-automatic"
                                                            {{ old('transmission', $carListing->transmission) == 'semi-automatic' ? 'selected' : '' }}>
                                                            Semi-Automatic</option>
                                                        <option value="cvt"
                                                            {{ old('transmission', $carListing->transmission) == 'cvt' ? 'selected' : '' }}>
                                                            CVT</option>
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
                                                                    {{ old('car_fuel_type_id', $carListing->car_fuel_type_id) == $fuelType->id ? 'selected' : '' }}>
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
                                                        value="{{ old('mileage', $carListing->mileage) }}">
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
                                                        value="{{ old('engine_capacity', $carListing->engine_capacity) }}">
                                                    @error('engine_capacity')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="fuel_efficiency">Fuel Efficiency per Litre (KM) </label>
                                                    <input type="number" step="any" name="fuel_efficiency"
                                                        id="fuel_efficiency"
                                                        class="form-control @error('fuel_efficiency') is-invalid @enderror"
                                                        placeholder="i.e 12.5"
                                                        value="{{ old('fuel_efficiency', $carListing->fuel_efficiency) }}">
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
                                                        value="{{ old('cylenders', $carListing->cylenders) }}">
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
                                                        value="{{ old('color', $carListing->color) }}">
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
                                                        value="{{ old('doors', $carListing->doors) }}">
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
                                                        value="{{ old('seats', $carListing->seats) }}">
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
                                                        placeholder="Enter horsepower"
                                                        value="{{ old('horsepower', $carListing->horsepower) }}">
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
                                                        placeholder="Enter VIN"
                                                        value="{{ old('vin', $carListing->vin) }}">
                                                    @error('vin')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="main_image">Main Image</label>
                                                    <input type="file" accept="image/*" name="main_image"
                                                        id="main_image"
                                                        class="form-control @error('main_image') is-invalid @enderror">
                                                    @error('main_image')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                    @if($carListing->main_image)
                                                        <img src="{{ asset($carListing->main_image) }}" alt="main image" class="mt-2" width="120">
                                                    @endif
                                                </div>
                                            </div>
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
                                                    @if (isset($carListingImages) && count($carListingImages) > 0)
                                                        <div class="row mt-2">
                                                            @foreach ($carListingImages as $carListingImage)
                                                                <div class="col-auto position-relative mb-2 image-wrapper" id="image-{{ $carListingImage->id }}">
                                                                    <img src="{{ asset($carListingImage->image_url) }}" alt="image" width="120" class="img-thumbnail">
                                                                    <button type="button" class="btn btn-sm btn-danger position-absolute top-0 end-0 delete-image-btn"
                                                                            data-id="{{ $carListingImage->id }}"
                                                                            style="transform: translate(50%,-50%); border-radius: 50%; padding: 0 6px;">
                                                                        &times;
                                                                    </button>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endif
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
                                                        value="{{ old('address', $carListing->address) }}">
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
                                                        placeholder="Enter city" required
                                                        value="{{ old('city', $carListing->city) }}">
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
                                                        placeholder="Enter state" required
                                                        value="{{ old('state', $carListing->state) }}">
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
                                                        value="{{ old('zip_code', $carListing->zip_code) }}">
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
                                                        placeholder="Write description" cols="30" rows="5" required>{{ old('description', $carListing->description) }}</textarea>
                                                    @error('description')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <h6 class="fw-bold my-4">Features</h6>
                                            @if (isset($carFeatures) && count($carFeatures) > 0)
                                                @php
                                                    // Decode features JSON only if it's a string
                                                    $savedFeatures = is_array(old('feature'))
                                                        ? old('feature')
                                                        : (is_array($carListing->features)
                                                            ? $carListing->features
                                                            : json_decode($carListing->features ?? '[]', true));
                                                @endphp

                                                @foreach ($carFeatures as $feature)
                                                    <div class="col-6 col-md-4">
                                                        <div class="form-check">
                                                            <input class="form-check-input" name="feature[]"
                                                                type="checkbox" value="{{ $feature->name }}"
                                                                id="feature{{ $feature->id }}"
                                                                {{ in_array($feature->name, $savedFeatures) ? 'checked' : '' }}>
                                                            <label class="form-check-label" for="feature{{ $feature->id }}">
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
                                                        value="{{ old('contact_name', $carListing->contact_name) }}">
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
                                                        value="{{ old('contact_email', $carListing->contact_email) }}">
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
                                                        value="{{ old('contact_phone', $carListing->contact_phone) }}">
                                                    @error('contact_phone')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12 my-4">
                                                <button type="submit" class="theme-btn"><span
                                                        class="far fa-save"></span> Update Listing</button>
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
            let options = '<option selected disabled>Choose</option>';

            for (let year = currentYear; year >= startYear; year--) {
                options += `<option value="${year}">${year}</option>`;
            }

            $('#year').html(options); // update the HTML

            const selectedYear = @json(old('year', $carListing->year));

            $('#year').val(selectedYear);

            // Re-initialize niceSelect properly
            if ($.fn.niceSelect) {
                $('#year').niceSelect('destroy');
                $('#year').niceSelect();
            }
            let selectedBrandId = @json($carListing->car_brand_id);
            let selectedModelId = @json($carListing->car_model_id);
            if (selectedBrandId) {
                $.ajax({
                    url: '/get-models-by-brand/' + selectedBrandId,
                    type: 'GET',
                    success: function(response) {
                        let options = '<option selected disabled>Choose</option>';
                        $.each(response.models, function(index, model) {
                            let selected = model.id == selectedModelId ? 'selected' : '';
                            options += `<option value="${model.id}" ${selected}>${model.name}</option>`;
                        });

                        $('#car_model_id').html(options);

                        // If you're using niceSelect or another plugin
                        if ($('.select').hasClass('nice-select')) {
                            $('.select').niceSelect('update');
                        }
                    },
                    error: function() {
                        $('#car_model_id').empty().append(
                            '<option selected disabled>Error loading models</option>'
                        );
                    }
                });
            }
            $('#car_brand_id').on('change', function() {
                var brandId = $(this).val();
                $('#car_model_id').empty().append('<option selected disabled>Loading...</option>');

                if (brandId) {
                    $.ajax({
                        url: '/get-models-by-brand/' + brandId,
                        type: 'GET',
                        success: function(response) {
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

            $('.delete-image-btn').click(function () {
                const imageId = $(this).data('id');
                const wrapper = $('#image-' + imageId);

                if (confirm('Are you sure you want to delete this image?')) {
                    $.ajax({
                        url: '/car-listings/delete-car-image/' + imageId, // adjust the route as needed
                        type: 'GET',
                        success: function (response) {
                            toastr.success(response.message);
                            wrapper.remove();
                        },
                        error: function () {
                            toastr.error(response.message);
                        }
                    });
                }
            });
        });
    </script>
@endsection

@section('script')
@endsection
