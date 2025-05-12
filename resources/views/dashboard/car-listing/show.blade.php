@extends('layouts.master')

@section('title', __('Car Listing Details'))

@section('css')
@endsection


@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.car-listings.index') }}">{{ __('Car Listings') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Details') }}</li>
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row invoice-preview">
            <!-- Invoice -->
            <div class="col-xl-9 col-md-8 col-12 mb-md-0 mb-6">
                <div class="card invoice-preview-card p-sm-12 p-6">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h4 class="mb-0">
                            <i class="ti ti-car me-2"></i>{{ $carListing->title }}
                            <small class="text-muted ms-2">({{ $carListing->car_id }})</small>
                        </h4>
                        <span class="badge bg-label-{{ $carListing->status === 'published' ? 'success' : ($carListing->status === 'draft' ? 'warning' : 'secondary') }}">
                            <i class="ti ti-activity me-1"></i> {{ ucfirst($carListing->status) }}
                        </span>
                    </div>
            
                    <div class="row gy-4">
                        <!-- Left Column -->
                        <div class="col-md-6">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><strong>Brand:</strong> {{ $carListing->carBrand->name }}</li>
                                <li class="mb-2"><strong>Model:</strong> {{ $carListing->carModel->name }}</li>
                                <li class="mb-2"><strong>Year:</strong> {{ $carListing->year ?? 'N/A' }}</li>
                                <li class="mb-2"><strong>Condition:</strong> {{ $carListing->condition ? ucfirst($carListing->condition) : 'N/A' }}</li>
                                <li class="mb-2"><strong>Price:</strong> ${{ number_format($carListing->price, 2) }}</li>
                                <li class="mb-2"><strong>Drive Type:</strong> {{ $carListing->drive_type ?? 'N/A' }}</li>
                                <li class="mb-2"><strong>Transmission:</strong> {{ ucfirst($carListing->transmission) }}</li>
                                <li class="mb-2"><strong>Mileage:</strong> {{ $carListing->mileage ?? 'N/A' }}</li>
                                <li class="mb-2"><strong>Fuel Type:</strong> {{ $carListing->carFuelType->name }}</li>
                                <li class="mb-2"><strong>Fuel Efficiency:</strong> {{ $carListing->fuel_efficiency ?? 'N/A' }} mi/l</li>
                            </ul>
                        </div>
                    
                        <!-- Right Column -->
                        <div class="col-md-6">
                            <ul class="list-unstyled mb-0">
                                <li class="mb-2"><strong>Horsepower:</strong> {{ $carListing->horsepower ?? 'N/A' }}</li>
                                <li class="mb-2"><strong>Engine Capacity:</strong> {{ $carListing->engine_capacity ?? 'N/A' }}</li>
                                <li class="mb-2"><strong>Cylinders:</strong> {{ $carListing->cylenders ?? 'N/A' }}</li>
                                <li class="mb-2"><strong>Seats:</strong> {{ $carListing->seats ?? 'N/A' }}</li>
                                <li class="mb-2"><strong>Doors:</strong> {{ $carListing->doors ?? 'N/A' }}</li>
                                <li class="mb-2"><strong>Color:</strong> {{ $carListing->color ?? 'N/A' }}</li>
                                <li class="mb-2"><strong>VIN:</strong> {{ $carListing->vin ?? 'N/A' }}</li>
                                <li class="mb-2"><strong>Location:</strong> {{ $carListing->address ?? '' }}, {{ $carListing->city }}, {{ $carListing->state ?? '' }} - {{ $carListing->zip_code }}</li>
                            </ul>
                        </div>
                    </div>
                    
            
                    <hr>
            
                    <div class="mb-3">
                        <h5><i class="ti ti-file-description me-2"></i>Description</h5>
                        <p>{{ $carListing->description ?? 'No description provided.' }}</p>
                    </div>
            
                    @if ($carListing->features)
                    <div class="mb-3">
                        <h5><i class="ti ti-checklist me-2"></i>Features</h5>
                        <ul class="list-inline">
                            @foreach (json_decode($carListing->features) as $feature)
                                <li class="badge bg-primary me-1 mb-1">{{ $feature }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
            
                    <div class="mb-3">
                        <h5><i class="ti ti-user-circle me-2"></i>Contact Information</h5>
                        <ul class="list-unstyled">
                            <li><strong>Name:</strong> {{ $carListing->contact_name }}</li>
                            <li><strong>Phone:</strong> {{ $carListing->contact_phone }}</li>
                            <li><strong>Email:</strong> {{ $carListing->contact_email ?? 'N/A' }}</li>
                        </ul>
                    </div>
            
                    <div class="mb-3">
                        <h5><i class="ti ti-user me-2"></i>Listed By</h5>
                        <p>{{ $carListing->user->name }} ({{ $carListing->user->email }})</p>
                    </div>
            
                    @if ($carListingImages->count())
                    <div class="mb-3">
                        <h5><i class="ti ti-photo me-2"></i>Images</h5>
                        <div class="row">
                            @foreach ($carListingImages as $image)
                                <div class="col-md-3 mb-3">
                                    <img src="{{ asset('storage/' . $image->image_path) }}" class="img-fluid rounded" alt="Car Image">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    @endif
            
                </div>
            </div>
            <!-- /Invoice -->

            <!-- Invoice Actions -->
            <div class="col-xl-3 col-md-4 col-12 invoice-actions">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('dashboard.car-listings.status.update', $carListing->id) }}"
                            method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="mb-4 col-md-12">
                                    <label for="status" class="form-label">{{ __('Status') }}</label>
                                    <select id="status" name="status" class="select2 form-select @error('status') is-invalid @enderror">
                                        <option value="draft" {{ old('status', $carListing->status) == 'draft' ? 'selected' : '' }}>{{__('Draft')}}</option>
                                        <option value="published" {{ old('status', $carListing->status) == 'published' ? 'selected' : '' }}>{{__('Published')}}</option>
                                        <option value="sold" {{ old('status', $carListing->status) == 'sold' ? 'selected' : '' }}>{{__('Sold')}}</option>
                                        <option value="archived" {{ old('status', $carListing->status) == 'archived' ? 'selected' : '' }}>{{__('Archived')}}</option>
                                        <option value="expired" {{ old('status', $carListing->status) == 'expired' ? 'selected' : '' }}>{{__('Expired')}}</option>
                                    </select>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success d-grid w-100">
                                <span class="d-flex align-items-center justify-content-center text-nowrap">
                                    <i class="icon-base ti ti-activity icon-xs me-2"></i>
                                    Update Status
                                </span>
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /Invoice Actions -->
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        });
    </script>
@endsection
