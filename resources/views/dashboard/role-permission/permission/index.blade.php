@extends('layouts.master')

@section('title', __('Permissions'))

@section('css')
@endsection


@section('breadcrumb-items')
    <li class="breadcrumb-item active">{{ __('Permissions') }}</li>
@endsection

@section('content')
    <div class="card">
        <div class="card-datatable table-responsive">
            <table class="datatables-permissions table border-top custom-datatables">
                <thead>
                    <tr>
                        <th></th>
                        <th>{{ __('Sr.') }}</th>
                        <th>{{ __('Name') }}</th>
                        <th>{{ __('Assigned To') }}</th>
                        <th>{{ __('Created Date') }}</th>
                        {{-- <th>Actions</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $index => $permission)
                        <tr>
                            <td></td>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $permission->name }}</td>
                            <td>
                                @if ($permission->roles->isNotEmpty())
                                    @foreach ($permission->roles as $role)
                                        <span class="badge me-4 bg-label-primary">{{ Str::title(str_replace('-', ' ', $role->name)) }}</span>
                                    @endforeach
                                @else
                                    <span class="badge bg-secondary">{{ __('No Roles Assigned') }}</span>
                                @endif
                            </td>
                            <td>{{ $permission->created_at->format('Y-m-d') }}</td>
                            {{-- <td>
                                <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editPermissionModal">
                                    Edit
                                </button>
                                <button class="btn btn-sm btn-danger delete-permission" data-id="{{ $permission->id }}">
                                    Delete
                                </button>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
@endsection
