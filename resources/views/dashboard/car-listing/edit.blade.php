@extends('layouts.master')

@section('title', __('Edit Car Listing'))

@section('css')
@endsection


@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.car-listings.index') }}">{{ __('Car Listings') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Edit') }}</li>
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-6">
            <!-- Account -->
            <div class="card-body pt-4">
                <form method="POST" action="{{ route('dashboard.car-listings.update', $carListing->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row p-5">
                        <h3>{{ __('Edit Car Listing') }}</h3>
                        <h6 class="text-muted">Basic Information</h6>
                        <div class="mb-4 col-md-6">
                            <label for="title" class="form-label">{{ __('Title') }}</label><span
                                class="text-danger">*</span>
                            <input class="form-control @error('title') is-invalid @enderror" type="text" id="title"
                                name="title" required placeholder="{{ __('Enter car title') }}" autofocus
                                value="{{ old('title', $carListing->title) }}" />
                            @error('title')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-6">
                            <label class="form-label" for="user_id">{{ __('Seller') }}</label>
                            <select id="user_id" name="user_id"
                                class="select2 form-select @error('user_id') is-invalid @enderror">
                                <option value="" selected disabled>{{ __('Select Seller') }}</option>
                                @if (isset($users) && count($users) > 0)
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ $user->id == old('user_id', $carListing->user_id) ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                @endif
                            </select>
                            @error('user_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-6">
                            <label class="form-label" for="car_brand_id">{{ __('Brand/Make') }}<span
                                    class="text-danger">*</span></label>
                            <select id="car_brand_id" name="car_brand_id"
                                class="select2 form-select @error('car_brand_id') is-invalid @enderror" required>
                                <option value="" selected disabled>{{ __('Select Car Brand') }}</option>
                                @if (isset($carBrands) && count($carBrands) > 0)
                                    @foreach ($carBrands as $brand)
                                        <option value="{{ $brand->id }}"
                                            {{ $brand->id == old('car_brand_id', $carListing->car_brand_id) ? 'selected' : '' }}>
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
                        <div class="mb-4 col-md-6">
                            <label class="form-label" for="car_model_id">{{ __('Model') }}<span
                                    class="text-danger">*</span></label>
                            <select id="car_model_id" name="car_model_id"
                                class="select2 form-select @error('car_model_id') is-invalid @enderror" required>
                                <option value="" selected disabled>{{ __('Select Car Model') }}</option>
                            </select>
                            @error('car_brand_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-4">
                            <label class="form-label" for="car_body_type_id">{{ __('Body Type') }}<span
                                    class="text-danger">*</span></label>
                            <select id="car_body_type_id" name="car_body_type_id"
                                class="select2 form-select @error('car_body_type_id') is-invalid @enderror" required>
                                <option value="" selected disabled>{{ __('Select Car Body Type') }}</option>
                                @if (isset($carBodyTypes) && count($carBodyTypes) > 0)
                                    @foreach ($carBodyTypes as $bodyType)
                                        <option value="{{ $bodyType->id }}"
                                            {{ $bodyType->id == old('car_body_type_id', $carListing->car_body_type_id) ? 'selected' : '' }}>
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
                        <div class="mb-4 col-md-4">
                            <label class="form-label" for="car_fuel_type_id">{{ __('Fuel Type') }}<span
                                    class="text-danger">*</span></label>
                            <select id="car_fuel_type_id" name="car_fuel_type_id"
                                class="select2 form-select @error('car_fuel_type_id') is-invalid @enderror" required>
                                <option value="" selected disabled>{{ __('Select Car Fuel Type') }}</option>
                                @if (isset($carFuelTypes) && count($carFuelTypes) > 0)
                                    @foreach ($carFuelTypes as $fuelType)
                                        <option value="{{ $fuelType->id }}"
                                            {{ $fuelType->id == old('car_fuel_type_id', $carListing->car_fuel_type_id) ? 'selected' : '' }}>
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
                        <div class="mb-4 col-md-4">
                            <label for="drive_type" class="form-label">{{ __('Drive Type') }}</label>
                            <select id="drive_type" name="drive_type"
                                class="select2 form-select @error('drive_type') is-invalid @enderror">
                                <option value="" selected disabled>{{ __('Select Drive Type') }}</option>
                                <option
                                    value="2WD"{{ old('drive_type', $carListing->drive_type) == '2WD' ? 'selected' : '' }}>
                                    {{ __('2WD') }}</option>
                                <option
                                    value="4WD"{{ old('drive_type', $carListing->drive_type) == '4WD' ? 'selected' : '' }}>
                                    {{ __('4WD') }}</option>
                                <option
                                    value="AWD"{{ old('drive_type', $carListing->drive_type) == 'AWD' ? 'selected' : '' }}>
                                    {{ __('AWD') }}</option>
                                <option
                                    value="RWD"{{ old('drive_type', $carListing->drive_type) == 'RWD' ? 'selected' : '' }}>
                                    {{ __('RWD') }}</option>
                            </select>
                            @error('drive_type')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="condition" class="form-label">{{ __('Condition') }}</label>
                            <select id="condition" name="condition"
                                class="select2 form-select @error('condition') is-invalid @enderror">
                                <option value="" selected disabled>{{ __('Select Condition') }}</option>
                                <option
                                    value="new"{{ old('condition', $carListing->condition) == 'new' ? 'selected' : '' }}>
                                    {{ __('New') }}</option>
                                <option
                                    value="used"{{ old('condition', $carListing->condition) == 'used' ? 'selected' : '' }}>
                                    {{ __('Used') }}</option>
                                <option
                                    value="certified"{{ old('condition', $carListing->condition) == 'certified' ? 'selected' : '' }}>
                                    {{ __('Certified') }}</option>
                            </select>
                            @error('condition')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="transmission" class="form-label">{{ __('Transmission') }}<span
                                    class="text-danger">*</span></label>
                            <select id="transmission" name="transmission"
                                class="select2 form-select @error('transmission') is-invalid @enderror" required>
                                <option value="" selected disabled>{{ __('Select Transmission') }}</option>
                                <option
                                    value="automatic"{{ old('transmission', $carListing->transmission) == 'automatic' ? 'selected' : '' }}>
                                    {{ __('Automatic') }}</option>
                                <option
                                    value="manual"{{ old('transmission', $carListing->transmission) == 'manual' ? 'selected' : '' }}>
                                    {{ __('Manual') }}</option>
                                <option
                                    value="semi-automatic"{{ old('transmission', $carListing->transmission) == 'semi-automatic' ? 'selected' : '' }}>
                                    {{ __('Semi Automatic') }}</option>
                                <option
                                    value="cvt"{{ old('transmission', $carListing->transmission) == 'cvt' ? 'selected' : '' }}>
                                    {{ __('CVT') }}</option>
                            </select>
                            @error('transmission')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="year" class="form-label">{{ __('Year') }}<span
                                    class="text-danger">*</span></label>
                            <select id="yearSelect" name="year"
                                class="select2 form-select @error('year') is-invalid @enderror" required>
                                <option value="" selected disabled>{{ __('Select Year') }}</option>

                            </select>
                            @error('year')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="price"
                                class="form-label">{{ __('Price') }}({{ \App\Helpers\Helper::currencySymbol() }})</label><span
                                class="text-danger">*</span>
                            <input class="form-control @error('price') is-invalid @enderror" type="number"
                                step="any" id="price" name="price" required
                                placeholder="{{ __('Enter Price') }}" value="{{ old('price', $carListing->price) }}" />
                            @error('price')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="mileage" class="form-label">{{ __('Mileage (Mi)') }}</label><span
                                class="text-danger">*</span>
                            <input class="form-control @error('mileage') is-invalid @enderror" type="number"
                                step="any" id="mileage" name="mileage" required
                                placeholder="{{ __('Enter Mileage') }}"
                                value="{{ old('mileage', $carListing->mileage) }}" />
                            @error('mileage')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="engine_capacity" class="form-label">{{ __('Engine Capacity (CC)') }}</label><span
                                class="text-danger">*</span>
                            <input class="form-control @error('engine_capacity') is-invalid @enderror" type="number"
                                step="any" id="engine_capacity" name="engine_capacity" required
                                placeholder="{{ __('Enter engine capacity') }}"
                                value="{{ old('engine_capacity', $carListing->engine_capacity) }}" />
                            @error('engine_capacity')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="fuel_efficiency"
                                class="form-label">{{ __('Fuel Efficiency per Litre (Mi)') }}</label>
                            <input class="form-control @error('fuel_efficiency') is-invalid @enderror" type="number"
                                step="any" id="fuel_efficiency" name="fuel_efficiency"
                                placeholder="{{ __('Enter fuel efficiency') }}"
                                value="{{ old('fuel_efficiency', $carListing->fuel_efficiency) }}" />
                            @error('fuel_efficiency')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="cylenders" class="form-label">{{ __('Cylenders') }}</label>
                            <input class="form-control @error('cylenders') is-invalid @enderror" type="number"
                                step="any" id="cylenders" name="cylenders"
                                placeholder="{{ __('Enter no of cylenders') }}"
                                value="{{ old('cylenders', $carListing->cylenders) }}" />
                            @error('cylenders')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="vin" class="form-label">{{ __('VIN') }}</label>
                            <input class="form-control @error('vin') is-invalid @enderror" type="text" id="vin"
                                name="vin" placeholder="{{ __('Enter vin') }}"
                                value="{{ old('vin', $carListing->vin) }}" />
                            @error('vin')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-3">
                            <label for="color" class="form-label">{{ __('Color') }}<span
                                    class="text-danger">*</span></label>
                            <input class="form-control @error('color') is-invalid @enderror" type="text"
                                id="color" name="color" placeholder="{{ __('Enter color') }}"
                                value="{{ old('color', $carListing->color) }}" required />
                            @error('color')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-3">
                            <label for="doors" class="form-label">{{ __('Doors') }}<span
                                    class="text-danger">*</span></label>
                            <input class="form-control @error('doors') is-invalid @enderror" type="number"
                                id="doors" name="doors" placeholder="{{ __('Enter no of doors') }}"
                                value="{{ old('doors', $carListing->doors) }}" required />
                            @error('doors')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-3">
                            <label for="seats" class="form-label">{{ __('Seats') }}<span
                                    class="text-danger">*</span></label>
                            <input class="form-control @error('seats') is-invalid @enderror" type="number"
                                id="seats" name="seats" placeholder="{{ __('Enter no of seats') }}"
                                value="{{ old('seats', $carListing->seats) }}" required />
                            @error('seats')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-3">
                            <label for="horsepower" class="form-label">{{ __('Horsepower (HP)') }}</label>
                            <input class="form-control @error('horsepower') is-invalid @enderror" type="number"
                                step="any" id="horsepower" name="horsepower"
                                placeholder="{{ __('Enter horsepower') }}"
                                value="{{ old('horsepower', $carListing->horsepower) }}" />
                            @error('horsepower')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr>
                        <h6 class="text-muted">Images</h6>
                        <div class="mb-4 col-md-12">
                            <label for="main_image" class="form-label">{{ __('Main Image') }}</label>
                            <input class="form-control @error('main_image') is-invalid @enderror" type="file"
                                id="main_image" name="main_image" accept="image/*" />
                            @error('main_image')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if ($carListing->main_image)
                                <img src="{{ asset($carListing->main_image) }}" alt="main image" class="mt-2"
                                    width="120">
                            @endif
                        </div>
                        <div class="mb-4 col-md-12">
                            <label for="images" class="form-label">{{ __('Gallery Images') }}</label>
                            <input class="form-control @error('images') is-invalid @enderror" type="file"
                                id="images" name="images[]" accept="image/*" multiple />
                            @error('images')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            @if (isset($carListingImages) && count($carListingImages) > 0)
                                <div class="row mt-2">
                                    @foreach ($carListingImages as $carListingImage)
                                        <div class="col-auto position-relative mb-2 image-wrapper"
                                            id="image-{{ $carListingImage->id }}">
                                            <img src="{{ asset($carListingImage->image_url) }}" alt="image"
                                                width="120" class="img-thumbnail">
                                            <button type="button"
                                                class="btn btn-sm btn-danger position-absolute top-0 end-0 delete-image-btn"
                                                data-id="{{ $carListingImage->id }}"
                                                style="transform: translate(50%,-50%); border-radius: 50%; padding: 0 6px;">
                                                &times;
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <hr>
                        <h6 class="text-muted">Location</h6>
                        <div class="mb-4 col-md-12">
                            <label for="address" class="form-label">{{ __('Address') }}</label><span
                                class="text-danger">*</span>
                            <input class="form-control @error('address') is-invalid @enderror" type="text"
                                id="address" name="address" required placeholder="{{ __('Enter address') }}"
                                value="{{ old('address', $carListing->address) }}" />
                            @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="city" class="form-label">{{ __('City') }}</label><span
                                class="text-danger">*</span>
                            <input class="form-control @error('city') is-invalid @enderror" type="text"
                                id="city" name="city" required placeholder="{{ __('Enter city') }}"
                                value="{{ old('city', $carListing->city) }}" />
                            @error('city')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="state" class="form-label">{{ __('County') }}</label><span
                                class="text-danger">*</span>
                            <input class="form-control @error('state') is-invalid @enderror" type="text"
                                id="state" name="state" required placeholder="{{ __('Enter county') }}"
                                value="{{ old('state', $carListing->state) }}" />
                            @error('state')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="zip_code" class="form-label">{{ __('Post Code') }}</label><span
                                class="text-danger">*</span>
                            <input class="form-control @error('zip_code') is-invalid @enderror" type="text"
                                id="zip_code" name="zip_code" required placeholder="{{ __('Enter post code') }}"
                                value="{{ old('zip_code', $carListing->zip_code) }}" />
                            @error('zip_code')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <hr>
                        <h6 class="text-muted">Detailed Information</h6>

                        <div class="mb-4 col-md-12">
                            <label for="description" class="form-label">{{ __('Description') }}</label>
                            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                                placeholder="{{ __('Enter description') }}" cols="30" rows="10">{{ old('description', $carListing->description) }}</textarea>
                            @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <hr>
                        <h6 class="text-muted">Features</h6>
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
                                        <input class="form-check-input" name="feature[]" type="checkbox"
                                            value="{{ $feature->name }}" id="feature{{ $feature->id }}"
                                            {{ in_array($feature->name, $savedFeatures) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="feature{{ $feature->id }}">
                                            {{ $feature->name }}
                                        </label>
                                    </div>
                                </div>
                            @endforeach
                        @endif

                        <hr>
                        <h6 class="text-muted">Contact Information</h6>
                        <div class="mb-4 col-md-4">
                            <label for="contact_name" class="form-label">{{ __('Name') }}</label><span
                                class="text-danger">*</span>
                            <input class="form-control @error('contact_name') is-invalid @enderror" type="text"
                                id="contact_name" name="contact_name" required placeholder="{{ __('Enter name') }}"
                                value="{{ old('contact_name', $carListing->contact_name) }}" />
                            @error('contact_name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="contact_email" class="form-label">{{ __('Email') }}</label><span
                                class="text-danger">*</span>
                            <input class="form-control @error('contact_email') is-invalid @enderror" type="email"
                                id="contact_email" name="contact_email" required placeholder="{{ __('Enter email') }}"
                                value="{{ old('contact_email', $carListing->contact_email) }}" />
                            @error('contact_email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="mb-4 col-md-4">
                            <label for="contact_phone" class="form-label">{{ __('Phone') }}</label><span
                                class="text-danger">*</span>
                            <input class="form-control @error('contact_phone') is-invalid @enderror" type="number"
                                id="contact_phone" name="contact_phone" required
                                placeholder="{{ __('Enter phone number') }}"
                                value="{{ old('contact_phone', $carListing->contact_phone) }}" />
                            @error('contact_phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-2">
                        <button type="submit" class="btn btn-primary me-3">{{ __('Update Car Listing') }}</button>
                    </div>
                </form>
            </div>
            <!-- /Account -->
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
            const currentYear = new Date().getFullYear();
            const startYear = 1955;
            let options = '<option selected disabled>Select Year</option>';

            for (let year = currentYear; year >= startYear; year--) {
                options += `<option value="${year}">${year}</option>`;
            }

            // console.log(options);

            $('#yearSelect').html(options); // update the HTML

            const selectedYear = @json(old('year', $carListing->year));

            $('#yearSelect').val(selectedYear);

            // Re-initialize niceSelect properly
            if ($.fn.niceSelect) {
                $('#yearSelect').niceSelect('destroy');
                $('#yearSelect').niceSelect();
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
                            options +=
                                `<option value="${model.id}" ${selected}>${model.name}</option>`;
                        });

                        $('#car_model_id').html(options);
                        $('#car_model_id').select2();

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
                            // console.log(response);
                            let options = '<option selected disabled>Select Car Model</option>';
                            $.each(response.models, function(index, model) {
                                options += '<option value="' + model.id + '">' + model
                                    .name + '</option>';
                            });

                            $('#car_model_id').html(options);
                            $('#car_model_id').select2();

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

            $('.delete-image-btn').click(function() {
                const imageId = $(this).data('id');
                const wrapper = $('#image-' + imageId);

                Swal.fire({
                    title: '{{ __('Are you sure?') }}',
                    text: '{{ __('You won’t be able to revert this!') }}',
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: '{{ __('Cancel') }}',
                    confirmButtonText: '{{ __('Yes, delete it!') }}',
                    customClass: {
                        confirmButton: 'btn btn-primary me-3 waves-effect waves-light',
                        cancelButton: 'btn btn-label-secondary waves-effect waves-light'
                    },
                    buttonsStyling: false
                }).then(function(result) {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '/car-listings/delete-car-image/' + imageId,
                            type: 'GET',
                            success: function(response) {
                                Swal.fire({
                                    title: '{{__("Success!")}}',
                                    text: response.message,
                                    icon: 'success',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                                wrapper.remove();
                            },
                            error: function() {
                                Swal.fire({
                                    title: '{{__("Error!")}}',
                                    text: "An error occurred while deleting the image.",
                                    icon: 'error',
                                    timer: 2000,
                                    showConfirmButton: false
                                });
                            }
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        Swal.fire({
                            title: "{{ __('Your image is safe!') }}",
                            icon: "info",
                            timer: 2000,
                            showConfirmButton: false
                        });
                    }
                });
            });

        });
    </script>
@endsection
