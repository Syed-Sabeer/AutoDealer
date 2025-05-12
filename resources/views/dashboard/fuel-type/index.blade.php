@extends('layouts.master')

@section('title', __('Car Fuel Types'))

@section('css')
@endsection


@section('breadcrumb-items')
    <li class="breadcrumb-item active">{{ __('Car Fuel Types') }}</li>
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Car Fuel Types List Table -->
        <div class="card">
            <div class="card-header">
                @canany(['create fuel type'])
                    <a href="{{route('dashboard.fuel-types.create')}}" class="add-new btn btn-primary waves-effect waves-light">
                        <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span
                            class="d-none d-sm-inline-block">{{ __('Add New Car Fuel type') }}</span>
                    </a>
                @endcan
            </div>
            <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top custom-datatables">
                    <thead>
                        <tr>
                            <th>{{ __('Sr.') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Image') }}</th>
                            <th>{{ __('Feature') }}</th>
                            <th>{{ __('Status') }}</th>
                            @canany(['delete fuel type', 'update fuel type'])<th>{{ __('Action') }}</th>@endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carFuelTypes as $index => $type)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $type->name }}</td>
                                <td>
                                    @if (isset($type->logo))
                                        <img src="{{ asset($type->logo) }}" alt="{{ $type->name }}"
                                            height="35px" width="35px">
                                    @else
                                        {{ __('No Image') }}
                                    @endif
                                </td>
                                <td>
                                    <span class="badge me-4 bg-label-{{ $type->is_featured == '1' ? 'success' : 'danger' }}">{{ $type->is_featured == '1' ? 'Featured' : 'Not Featured' }}</span>
                                </td>
                                <td>
                                    <span class="badge me-4 bg-label-{{ $type->is_active == 'active' ? 'success' : 'danger' }}">{{ ucfirst($type->is_active) }}</span>
                                </td>
                                @canany(['delete fuel type', 'update fuel type'])
                                    <td class="d-flex">
                                        @canany(['delete fuel type'])
                                            <form action="{{ route('dashboard.fuel-types.destroy', $type->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a href="#" type="submit"
                                                    class="btn btn-icon btn-text-danger waves-effect waves-light rounded-pill delete-record delete_confirmation"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ __('Delete Car Fuel Type') }}">
                                                    <i class="ti ti-trash ti-md"></i>
                                                </a>
                                            </form>
                                        @endcan
                                        @canany(['update fuel type'])
                                            <span class="text-nowrap">
                                                <a href="{{ route('dashboard.fuel-types.edit', $type->id) }}"
                                                    class="btn btn-icon btn-text-primary waves-effect waves-light rounded-pill me-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ __('Edit Car Fuel Type') }}">
                                                    <i class="ti ti-edit ti-md"></i>
                                                </a>
                                            </span>
                                            <span class="text-nowrap">
                                                <a href="{{ route('dashboard.fuel-types.status.update', $type->id) }}"
                                                    class="btn btn-icon btn-text-primary waves-effect waves-light rounded-pill me-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ $type->is_active == 'active' ? __('Deactivate Car Fuel Type') : __('Activate Car Fuel Type') }}">
                                                    @if ($type->is_active == 'active')
                                                        <i class="ti ti-toggle-right ti-md text-success"></i>
                                                    @else
                                                        <i class="ti ti-toggle-left ti-md text-danger"></i>
                                                    @endif
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
