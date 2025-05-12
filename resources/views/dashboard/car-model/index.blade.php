@extends('layouts.master')

@section('title', __('Car Models'))

@section('css')
@endsection


@section('breadcrumb-items')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.car-brands.index') }}">{{ __('Car Brands') }}</a></li>
    <li class="breadcrumb-item active">{{ __('Car Models') }}</li>
@endsection
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Car Models List Table -->
        <div class="card">
            <div class="card-header">
                @canany(['create car model'])
                    <a href="{{route('dashboard.car-models.create', $carBrand->id)}}" class="add-new btn btn-primary waves-effect waves-light">
                        <i class="ti ti-plus me-0 me-sm-1 ti-xs"></i><span
                            class="d-none d-sm-inline-block">{{ __('Add New Car Model') }}</span>
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
                            <th>{{ __('Status') }}</th>
                            @canany(['delete car model', 'update car model'])<th>{{ __('Action') }}</th>@endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($carModels as $index => $model)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $model->name }}</td>
                                <td>
                                    @if (isset($model->image))
                                        <img src="{{ asset($model->image) }}" alt="{{ $model->name }}"
                                            height="35px" width="35px">
                                    @else
                                        {{ __('No Image') }}
                                    @endif
                                </td>
                                <td>
                                    <span class="badge me-4 bg-label-{{ $model->is_active == 'active' ? 'success' : 'danger' }}">{{ ucfirst($model->is_active) }}</span>
                                </td>
                                @canany(['delete car model', 'update car model'])
                                    <td class="d-flex">
                                        @canany(['delete car model'])
                                            <form action="{{ route('dashboard.car-models.destroy', $model->id) }}" method="POST">
                                                @method('DELETE')
                                                @csrf
                                                <a href="#" type="submit"
                                                    class="btn btn-icon btn-text-danger waves-effect waves-light rounded-pill delete-record delete_confirmation"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ __('Delete Car Model') }}">
                                                    <i class="ti ti-trash ti-md"></i>
                                                </a>
                                            </form>
                                        @endcan
                                        @canany(['update car model'])
                                            <span class="text-nowrap">
                                                <a href="{{ route('dashboard.car-models.edit', $model->id) }}"
                                                    class="btn btn-icon btn-text-primary waves-effect waves-light rounded-pill me-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ __('Edit Car model') }}">
                                                    <i class="ti ti-edit ti-md"></i>
                                                </a>
                                            </span>
                                            <span class="text-nowrap">
                                                <a href="{{ route('dashboard.car-models.status.update', $model->id) }}"
                                                    class="btn btn-icon btn-text-primary waves-effect waves-light rounded-pill me-1"
                                                    data-bs-toggle="tooltip" data-bs-placement="top"
                                                    title="{{ $model->is_active == 'active' ? __('Deactivate Car Model') : __('Activate Car Model') }}">
                                                    @if ($model->is_active == 'active')
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
