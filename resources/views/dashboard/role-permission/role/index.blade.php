@extends('layouts.master')

@section('title', __('Roles'))

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
    <li class="breadcrumb-item active">{{ __('Roles') }}</li>
@endsection

@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="mb-1">{{ __('Roles List') }}</h4>

        <p class="mb-6">
            {{ __('A role provided access to predefined menus and features so that depending on') }} <br />
            {{ __('assigned role an administrator can have access to what user needs.') }}
        </p>
        <!-- Role cards -->
        <div class="row g-6">
            @if (isset($adminRoles) && count($adminRoles) > 0)
                @foreach ($adminRoles as $adminRole)
                    <div class="col-xl-4 col-lg-6 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h6 class="fw-normal mb-0 text-body">{{ __('Total') }} {{ count($adminRole->users) }} {{ __('users') }}</h6>
                                    <ul class="list-unstyled d-flex align-items-center avatar-group mb-0">
                                        <!-- Add the avatar image here based on role data -->
                                        @if (isset($adminRole->users) && count($adminRole->users))
                                            @foreach ($adminRole->users as $adminUser)
                                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom"
                                                    data-bs-placement="top" title="{{ $adminUser->name }}"
                                                    class="avatar pull-up">
                                                    <img class="rounded-circle"
                                                        src="{{ asset($adminUser->profile->profile_image ?? 'assets/img/default/user.png') }}"
                                                        alt="Avatar" />
                                                </li>
                                            @endforeach
                                        @endif
                                    </ul>
                                </div>
                                <div class="d-flex justify-content-between align-items-end">
                                    <div class="role-heading">
                                        <h5 class="mb-1">{{ Str::title(str_replace('-', ' ', $adminRole->name)) }}</h5>
                                        @can(['update role'])
                                            <a href="javascript:;" data-bs-toggle="modal" data-bs-target="#editRoleModal"
                                            class="role-edit-modal" data-role-id="{{ $adminRole->id }}"><span>{{ __('Edit Role') }}</span></a>
                                        @endcan
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
            @can(['create role'])
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <div class="card h-100">
                        <div class="row h-100">
                            <div class="col-sm-5">
                                <div class="d-flex align-items-end h-100 justify-content-center mt-sm-0 mt-4">
                                    <img src="{{ asset('assets/img/illustrations/add-new-roles.png') }}"
                                        class="img-fluid mt-sm-4 mt-md-0" alt="add-new-roles" width="83" />
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="card-body text-sm-end text-center ps-sm-0">
                                    <button data-bs-target="#addRoleModal" data-bs-toggle="modal"
                                        class="btn btn-sm btn-primary mb-4 text-nowrap add-new-role">
                                        {{ __('Add New Role') }}
                                    </button>
                                    <p class="mb-0">
                                        {{ __('Add new role,') }} <br />
                                        {{ __("if it doesn't exist.") }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endcan
            <div class="col-12">
                <h4 class="mt-6 mb-1">{{ __('Total Roles') }}</h4>
                <p class="mb-0">{{ __('Find all of your company’s roles.') }}</p>
            </div>
            <div class="col-12">
                <!-- Role Table -->
                <div class="card">
                    <div class="card-datatable table-responsive">
                        <table class="datatables-users table border-top custom-datatables">
                            <thead>
                                <tr>
                                    <th>{{ __('Sr.') }}</th>
                                    <th>{{ __('Role') }}</th>
                                    <th>{{ __('Created Date') }}</th>
                                    @canany(['delete role', 'update role'])<th>{{ __('Action') }}</th>@endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allRoles as $index => $allRole)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ Str::title(str_replace('-', ' ', $allRole->name)) }}</td>
                                        <td>{{ $allRole->created_at->format('Y-m-d') }}</td>
                                        @canany(['delete role', 'update role'])
                                            <td class="d-flex">
                                                @canany(['delete role'])
                                                    @if(!($allRole->name == "admin" || $allRole->name == "super-admin"))
                                                        <form action="{{ route('dashboard.roles.destroy', $allRole->id) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <a href="#" type="submit" class="btn btn-icon btn-text-danger waves-effect waves-light rounded-pill delete-record delete_confirmation">
                                                                <i class="ti ti-trash ti-md"></i>
                                                            </a>
                                                        </form>
                                                    @endif
                                                @endcan
                                                @canany(['update role'])
                                                    <span class="text-nowrap"><button class="btn btn-icon btn-text-success waves-effect waves-light rounded-pill me-1" data-bs-target="#editRoleModal" data-bs-toggle="modal" data-bs-dismiss="modal" data-role-id="{{ $allRole->id }}"><i class="ti ti-edit ti-md"></i></button>
                                                @endcan
                                            </td>
                                        @endcan
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <!--/ Role Table -->
            </div>
        </div>
        <!--/ Role cards -->

        <!-- Add Role Modal -->
        @include('dashboard.role-permission.role.sections.add-modal')
        <!--/ Add Role Modal -->

        <!-- Edit Role Modal -->
        @include('dashboard.role-permission.role.sections.edit-modal')
        <!-- / Edit Role Modal -->
    </div>
@endsection

@section('script')
    <script src="{{ asset('assets/js/modal-add-role.js') }}"></script>
    <script src="{{ asset('assets/js/modal-edit-role.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('.edit-loader').hide();
            $('#editRoleForm').show();
            // Event listener for edit modal opening
            $('#editRoleModal').on('show.bs.modal', function (event) {
                $('.edit-loader').show();
                $('#editRoleForm').hide();
                var button = $(event.relatedTarget);
                var roleId = button.data('role-id');
                fetchRoleData(roleId);
            });
            var editRoleRoute = "{{ route('dashboard.roles.edit', ':roleId') }}";
            var updateRoleRoute = "{{ route('dashboard.roles.update', ':roleId') }}";
    
            function fetchRoleData(roleId) {
                var url = editRoleRoute.replace(':roleId', roleId);
                $.ajax({
                    url: url, // Adjust API URL as necessary
                    type: 'GET',
                    success: function(data) {
                        if (data.success) {
                            var role = data.role;
                            var rolePermissions = Object.values(data.rolePermissions); // Convert to array if necessary
                            $('#edit_role_name').val(
                                role.name ? role.name.replace(/-/g, ' ').replace(/\b\w/g, c => c.toUpperCase()) : ''
                            );

                            $('input[name="edit_permission[]"]').prop('checked', false);

                            rolePermissions.forEach(function(permissionId) {
                                $('input[name="edit_permission[]"][value="' + permissionId + '"]').prop('checked', true);
                            });
                            $('.edit-loader').hide();
                            $('#editRoleForm').show();

                            // ✅ Set form action dynamically using the route variable
                            var updateUrl = updateRoleRoute.replace(':roleId', role.id);
                            $('#editRoleForm').attr('action', updateUrl);
                        }
                    },
                    error: function(xhr, status, error) {
                        $('.edit-loader').hide();
                        $('#editRoleForm').show();
                        console.error('Error fetching role data:', error);
                    }
                });
            }
        });
    </script>
    

@endsection
