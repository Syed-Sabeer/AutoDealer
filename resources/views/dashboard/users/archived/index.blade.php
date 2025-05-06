@extends('layouts.master')

@section('title', __('Archived Users'))

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
    <li class="breadcrumb-item active">{{ __('Archived Users') }}</li>
@endsection
{{-- @dd($totalArchivedUsers) --}}
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <!-- Users List Table -->
        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-users table border-top custom-datatables">
                    <thead>
                        <tr>
                            <th>{{ __('Sr.') }}</th>
                            <th>{{ __('Name') }}</th>
                            <th>{{ __('Email') }}</th>
                            <th>{{ __('Role') }}</th>
                            <th>{{ __('Deletion Date') }}</th>
                            <th>{{ __('Status') }}</th>
                            @canany(['delete archived user', 'restore archived user'])<th>{{ __('Action') }}</th>@endcan
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($archivedUsers as $index => $user)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ Str::title(str_replace('-', ' ', $user->getRoleNames()->first())) }}</td>
                                <td>{{ $user->deleted_at->format('Y-m-d') }}</td>
                                <td>
                                    <span class="badge me-4 bg-label-{{ $user->is_active == 'active' ? 'success' : 'danger' }}">{{ ucfirst($user->is_active) }}</span>
                                </td>
                                @canany(['delete archived user', 'restore archived user'])
                                    <td class="d-flex">
                                        @can(['delete archived user'])
                                            @if (!($user->getRoleNames()->first() == 'admin' || $user->getRoleNames()->first() == 'super-admin'))
                                                <form action="{{ route('dashboard.archived-user.destroy', $user->id) }}" method="POST">
                                                    @method('DELETE')
                                                    @csrf
                                                    <a href="#" type="submit"
                                                        class="btn btn-icon btn-text-danger waves-effect waves-light rounded-pill delete-record delete_confirmation" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Permanent Delete') }}">
                                                        <i class="ti ti-trash-x ti-md"></i>
                                                    </a>
                                                </form>
                                            @endif
                                        @endcan
                                        @can(['update archived user'])
                                            <span class="text-nowrap">
                                                <a href="{{route('dashboard.archived-user.restore', $user->id)}}" class="btn btn-icon btn-text-primary waves-effect waves-light rounded-pill me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="{{ __('Restore User') }}">
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
