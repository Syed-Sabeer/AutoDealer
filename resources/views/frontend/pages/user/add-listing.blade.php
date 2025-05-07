@extends('frontend.layouts.master')

@section('title', __('Add Listing'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
<style>
    .nice-select ul{
        height: 150px; 
        overflow-y: auto !important;
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
                                    <form action="{{ route('frontend.car-listings.store') }}" method="POST">
                                        @csrf
                                        <div class="row align-items-center">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="title">Listing Title <span class="text-danger">*</span></label>
                                                    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
                                                        placeholder="Enter title" required>
                                                    @error('title')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="condition">Condition <span class="text-danger">*</span></label>
                                                    <select class="select" name="condition" required>
                                                        <option selected disabled>Choose</option>
                                                        <option value="new" {{ old('condition') == 'new' ? 'selected' : '' }}>New</option>
                                                        <option value="used" {{ old('condition') == 'used' ? 'selected' : '' }}>Used</option>
                                                        <option value="certified" {{ old('condition') == 'certified' ? 'selected' : '' }}>Certified</option>
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
                                                    <label for="car_body_type_id">Body Type <span class="text-danger">*</span></label>
                                                    <select class="select" name="car_body_type_id" id="car_body_type_id" required>
                                                        <option selected disabled>Choose</option>
                                                        @if (isset($carBodyTypes) && count($carBodyTypes) > 0)
                                                            @foreach ($carBodyTypes as $bodyType)
                                                                <option value="{{ $bodyType->id }}" {{ old('car_body_type_id') == $bodyType->id ? 'selected' : '' }}>
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
                                                    <label for="car_brand_id">Brand/Make <span class="text-danger">*</span></label>
                                                    <select class="select" name="car_brand_id" id="car_brand_id" required>
                                                        <option selected disabled>Choose</option>
                                                        @if (isset($carBrands) && count($carBrands) > 0)
                                                            @foreach ($carBrands as $brand)
                                                                <option value="{{ $brand->id }}" {{ old('car_brand_id') == $brand->id ? 'selected' : '' }}>
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
                                                    <label for="car_model_id">Model <span class="text-danger">*</span></label>
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
                                                    <label for="price">Price (USD) <span class="text-danger">*</span></label>
                                                    <input type="number" name="price" id="price" class="form-control @error('price') is-invalid @enderror"
                                                        placeholder="Enter price" required>
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
                                                        <option selected disabled >Choose</option>
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
                                                    <label for="drive_type">Drive Type <span class="text-danger">*</span></label>
                                                    <select class="select" name="drive_type" required>
                                                        <option selected disabled>Choose</option>
                                                        <option value="2WD" {{ old('drive_type') == '2WD' ? 'selected' : '' }}>2WD</option>
                                                        <option value="4WD" {{ old('drive_type') == '4WD' ? 'selected' : '' }}>4WD</option>
                                                        <option value="AWD" {{ old('drive_type') == 'AWD' ? 'selected' : '' }}>AWD</option>
                                                        <option value="RWD" {{ old('drive_type') == 'RWD' ? 'selected' : '' }}>RWD</option>
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
                                                    <label for="transmission">Transmission <span class="text-danger">*</span></label>
                                                    <select class="select" name="transmission" required>
                                                        <option selected disabled>Choose</option>
                                                        <option value="automatic" {{ old('transmission') == 'automatic' ? 'selected' : '' }}>Automatic</option>
                                                        <option value="manual" {{ old('transmission') == 'manual' ? 'selected' : '' }}>Manual</option>
                                                        <option value="semi-automatic" {{ old('transmission') == 'semi-automatic' ? 'selected' : '' }}>Semi-Automatic</option>
                                                        <option value="cvt" {{ old('transmission') == 'cvt' ? 'selected' : '' }}>CVT</option>
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
                                                    <label for="car_fuel_type_id">Fuel Type <span class="text-danger">*</span></label>
                                                    <select class="select" name="car_fuel_type_id" id="car_fuel_type_id" required>
                                                        <option selected disabled>Choose</option>
                                                        @if (isset($carFuelTypes) && count($carFuelTypes) > 0)
                                                            @foreach ($carFuelTypes as $fuelType)
                                                                <option value="{{ $fuelType->id }}" {{ old('car_fuel_type_id') == $fuelType->id ? 'selected' : '' }}>
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
                                                    <label for="mileage">Mileage (Mi) <span class="text-danger">*</span></label>
                                                    <input type="number" name="mileage" id="mileage" class="form-control @error('mileage') is-invalid @enderror"
                                                        placeholder="Enter mileage" required>
                                                    @error('mileage')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="engine_capacity">Engine Capacity (CC) <span class="text-danger">*</span></label>
                                                    <input type="number" name="engine_capacity" id="engine_capacity" class="form-control @error('engine_capacity') is-invalid @enderror"
                                                        placeholder="Enter engine capacity" required>
                                                    @error('engine_capacity')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="cylenders">Cylenders <span class="text-danger">*</span></label>
                                                    <input type="number" name="cylenders" id="cylenders" class="form-control @error('cylenders') is-invalid @enderror"
                                                        placeholder="Enter no of cylenders" required>
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
                                                    <input type="text" name="color" id="color" class="form-control @error('color') is-invalid @enderror"
                                                        placeholder="Enter color name" required>
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
                                                    <input type="number" name="doors" id="doors" class="form-control @error('doors') is-invalid @enderror"
                                                        placeholder="Enter no of doors" required>
                                                    @error('doors')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label for="vin">VIN <span class="text-danger">*</span></label>
                                                    <input type="text" name="vin" id="vin" class="form-control @error('vin') is-invalid @enderror"
                                                        placeholder="Enter VIN" required>
                                                    @error('vin')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label for="main_image">Main Image <span class="text-danger">*</span></label>
                                                    <input type="file" accept="image/*" name="main_image" id="main_image" class="form-control @error('main_image') is-invalid @enderror"
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
                                            <h6 class="fw-bold mt-4 mb-1">Upload Gallery Images</h6>
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
    <script>
        $(document).ready(function () {
            const currentYear = new Date().getFullYear();
            const startYear = 1955;
            let options = '<option selected disabled>Choose</option>';

            for (let year = currentYear; year >= startYear; year--) {
                options += `<option value="${year}">${year}</option>`;
            }

            $('#year').html(options); // update the HTML

            // Re-initialize niceSelect properly
            if ($.fn.niceSelect) {
                $('#year').niceSelect('destroy');
                $('#year').niceSelect();
            }
            $('#car_brand_id').on('change', function () {
                var brandId = $(this).val();
                $('#car_model_id').empty().append('<option selected disabled>Loading...</option>');

                if (brandId) {
                    $.ajax({
                        url: '/get-models-by-brand/' + brandId,
                        type: 'GET',
                        success: function (response) {
                            let options = '<option selected disabled>Choose</option>';
                            $.each(response.models, function (index, model) {
                                options += '<option value="' + model.id + '">' + model.name + '</option>';
                            });

                            $('#car_model_id').html(options);

                            // Force refresh if using custom select plugin
                            if ($('.select').hasClass('nice-select')) {
                                $('.select').niceSelect('update');
                            }
                        },

                        error: function () {
                            $('#car_model_id').empty().append('<option selected disabled>Error loading models</option>');
                        }
                    });
                } else {
                    $('#car_model_id').empty().append('<option selected disabled>Choose</option>');
                }
            });
        });
    </script>
@endsection
