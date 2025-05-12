@extends('layouts.master')

@section('title', __('Car Features'))

@section('css')
@endsection

@section('breadcrumb-items')
    <li class="breadcrumb-item active">{{ __('Car Features') }}</li>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Car Features List Table -->
        <div class="card">
            <div class="card-header">
                @canany(['create feature'])
                    <a href="{{route('dashboard.features.create')}}" class="add-new btn btn-primary waves-effect waves-light">
                        <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span
                            class="d-none d-sm-inline-block">{{ __('Add New Car Feature') }}</span>
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
                            @canany(['delete feature', 'update feature'])<th>{{ __('Action') }}</th>@endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carFeatures as $index => $feature)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $feature->name }}</td>
                                <td>
                                    @if (isset($feature->logo))
                                        <img src="{{ asset($feature->logo) }}" alt="{{ $feature->name }}"
                                            height="35px" width="35px">
                                    @else
                                        {{ __('No Image') }}
                                    @endif
                                </td>
                                <td>
                                    <span class="badge me-4 bg-label-{{ $feature->is_featured == '1' ? 'success' : 'danger' }}">{{ $feature->is_featured == '1' ? 'Featured' : 'Not Featured' }}</span>
                                </td>
                                <td>
                                    <span class="badge me-4 bg-label-{{ $feature->is_active == 'active' ? 'success' : 'danger' }}">{{ ucfirst($feature->is_active) }}</span>
                                </td>
                                @canany(['delete feature', 'update feature'])
                                    <td class="d-flex">
                                        @canany(['delete feature'])
                                            <form action="{{ route('dashboard.features.destroy', $feature->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a href="#" type="submit"
                                                    class="btn btn-icon btn-text-danger waves-effect waves-light rounded-pill delete-record delete_confirmation"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ __('Delete Car Feature') }}">
                                                    <i class="ti ti-trash ti-md"></i>
                                                </a>
                                            </form>
                                        @endcan
                                        @canany(['update feature'])
                                            <span class="text-nowrap">
                                                <a href="{{ route('dashboard.features.edit', $feature->id) }}"
                                                    class="btn btn-icon btn-text-primary waves-effect waves-light rounded-pill me-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ __('Edit Car Feature') }}">
                                                    <i class="ti ti-edit ti-md"></i>
                                                </a>
                                            </span>
                                            <span class="text-nowrap">
                                                <a href="{{ route('dashboard.features.status.update', $feature->id) }}"
                                                    class="btn btn-icon btn-text-primary waves-effect waves-light rounded-pill me-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ $feature->is_active == 'active' ? __('Deactivate Car Feature') : __('Activate Car Feature') }}">
                                                    @if ($feature->is_active == 'active')
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
