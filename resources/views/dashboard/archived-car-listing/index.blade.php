@extends('layouts.master')

@section('title', __('Archived Car Listings'))

@section('css')
<style>
    .edit-loader {
        width: 100%;
    }
    .edit-loader .sk-chase {
        display: block;
        margin: 0 auto;
    }
</style>
@endsection


@section('breadcrumb-items')
    <li class="breadcrumb-item active">{{ __('Archived Car Listings') }}</li>
@endsection
{{-- @dd($totalArchivedCar Listings) --}}
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Car Listings List Table -->
        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top custom-datatables">
                    <thead>
                        <tr>
                            <th>{{ __('Sr.') }}</th>
                            <th>{{ __('Car Id') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Status') }}</th>
                            @canany(['delete archived car listing', 'update archived car listing'])<th>{{ __('Action') }}</th>@endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($archivedCarListings as $index => $car)
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
                                @canany(['delete archived car listing', 'restore archived car listing'])
                                    <td class="d-flex">
                                        @can(['delete archived car listing'])
                                            <form action="{{ route('dashboard.archived-car-listings.destroy', $car->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a href="#" type="submit"
                                                    class="btn btn-icon btn-text-danger waves-effect waves-light rounded-pill delete-record delete_confirmation" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Permanent Delete') }}">
                                                    <i class="ti ti-trash-x ti-md"></i>
                                                </a>
                                            </form>
                                        @endcan
                                        @can(['update archived car listing'])
                                            <span class="text-nowrap">
                                                <a href="{{route('dashboard.archived-car-listings.restore', $car->id)}}" class="btn btn-icon btn-text-primary waves-effect waves-light rounded-pill me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Restore Car Listing') }}">
                                                    <i class="ti ti-restore ti-md text-success"></i>
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
    <script>
    </script>
@endsection
