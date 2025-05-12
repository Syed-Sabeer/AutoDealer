@extends('layouts.master')

@section('title', __('Car Listings'))

@section('css')
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">{{ __('Car Listings') }}</li>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Car Listings List Table -->
        <div class="card">
            <div class="card-header">
                @canany(['create car listing'])
                    <a href="{{ route('dashboard.car-listings.create') }}"
                        class="add-new btn btn-primary waves-effect waves-light">
                        <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span
                            class="d-none d-sm-inline-block">{{ __('Add New Car Listing') }}</span>
                    </a>
                @endcan
            </div>
            <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top custom-datatables">
                    <thead>
                        <tr>
                            <th>{{ __('Sr.') }}</th>
                            <th>{{ __('Car Id') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Status') }}</th>
                            @canany(['delete car listing', 'update car listing'])<th>{{ __('Action') }}</th>@endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carListings as $index => $car)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $car->car_id }}</td>
                                <td>{{ $car->title }}</td>
                                <td>
                                    @if (isset($car->main_image))
                                        <img src="{{ asset($car->main_image) }}" alt="{{ $car->title }}" height="35px"
                                            width="35px">
                                    @else
                                        {{ __('No Image') }}
                                    @endif
                                </td>
                                @php
                                    $statusColors = [
                                        'draft' => 'secondary',
                                        'published' => 'success',
                                        'sold' => 'primary',
                                        'archived' => 'warning',
                                        'expired' => 'danger',
                                    ];
                                    $badgeColor = $statusColors[$car->status] ?? 'secondary';
                                @endphp

                                <td>
                                    <span class="badge me-4 bg-label-{{ $badgeColor }}">{{ ucfirst($car->status) }}</span>
                                </td>
                                @canany(['delete car listing', 'update car listing', 'view car listing'])
                                    <td class="d-flex">
                                        @canany(['delete car listing'])
                                            <form action="{{ route('dashboard.car-listings.destroy', $car->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a href="#" type="submit"
                                                    class="btn btn-icon btn-text-danger waves-effect waves-light rounded-pill delete-record delete_confirmation"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ __('Archive Car Listing') }}">
                                                    <i class="ti ti-trash ti-md"></i>
                                                </a>
                                            </form>
                                        @endcan
                                        @canany(['update car listing'])
                                            <span class="text-nowrap">
                                                <a href="{{ route('dashboard.car-listings.edit', $car->id) }}"
                                                    class="btn btn-icon btn-text-success waves-effect waves-light rounded-pill me-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ __('Edit Car Listing') }}">
                                                    <i class="ti ti-edit ti-md"></i>
                                                </a>
                                            </span>
                                        @endcan
                                        @canany(['view car listing'])
                                            <span class="text-nowrap">
                                                <a href="{{ route('dashboard.car-listings.show', $car->id) }}"
                                                    class="btn btn-icon btn-text-warning waves-effect waves-light rounded-pill me-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ __('View Car Listing details') }}">
                                                    <i class="ti ti-eye ti-md"></i>
                                                </a>
                                            </span>
                                        @endcan
                                    </td>
                                @endcan
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    {{-- <script src="{{asset('assets/js/app-user-list.js')}}"></script> --}}
    <script>
        $(document).ready(function() {
            //
        });
    </script>
@endsection
