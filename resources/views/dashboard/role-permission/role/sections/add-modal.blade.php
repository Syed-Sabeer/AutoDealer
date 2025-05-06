<div class="modal fade" id="addRoleModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-simple modal-dialog-centered modal-add-new-role">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-6">
                    <h4 class="role-title mb-2">{{ __('Add New Role') }}</h4>
                    <p>{{ __('Set role permissions') }}</p>
                </div>
                <!-- Add role form -->
                <form id="addRoleForm" class="row g-6" method="POST" action="{{route('dashboard.roles.store')}}">
                    @csrf
                    <div class="col-12">
                        <label class="form-label" for="role_name">{{ __('Role Name') }}</label>
                        <input type="text" id="role_name" name="role_name" class="form-control @error('role_name') is-invalid @enderror"
                            placeholder="{{ __('Enter role name') }}" tabindex="-1" required/>
                        @error('role_name')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="col-12">
                        <h5 class="mb-6">{{ __('Role Permissions') }}</h5>
                        <!-- Permission table -->
                        <div class="table-responsive">
                            <table class="table table-flush-spacing">
                                <tbody>
                                    <tr>
                                        <td class="text-nowrap fw-medium text-heading">
                                            {{ __('Administrator Access') }}
                                            <i class="ti ti-info-circle" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="{{ __('Allows a full access to the system') }}"></i>
                                        </td>
                                        <td>
                                            <div class="d-flex justify-content-end">
                                                <div class="form-check mb-0">
                                                    <input class="form-check-input" type="checkbox" id="selectAll" />
                                                    <label class="form-check-label" for="selectAll"> {{ __('Select All') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    @if (isset($permissions) && count($permissions) > 0)
                                        @php
                                            $groupedPermissions = $permissions->groupBy(function ($item) {
                                                $parts = explode(' ', $item->name);
                                                return implode(' ', array_slice($parts, 1));
                                            });
                                        @endphp
                                        @foreach ($groupedPermissions as $entity => $entityPermissions)
                                            <tr>
                                                <td class="text-nowrap fw-medium text-heading">
                                                    {{ __(ucfirst($entity)) }}</td>

                                                <td>
                                                    <div class="d-flex justify-content-end">
                                                        @foreach (['view', 'create', 'update', 'delete'] as $action)
                                                            @php
                                                                $permission = $entityPermissions->firstWhere(
                                                                    'name',
                                                                    "{$action} {$entity}",
                                                                );
                                                            @endphp
                                                            @if ($permission)
                                                                <div class="form-check mb-0 me-4 me-lg-12">
                                                                    <input class="form-check-input" type="checkbox"
                                                                        id="userManagement-{{ $permission->id }}"  name="permission[]" value="{{ $permission->name }}"/>
                                                                    <label class="form-check-label"
                                                                        for="userManagement-{{ $permission->id }}"> {{ __(ucfirst($action)) }}
                                                                    </label>
                                                                </div>
                                                            @else
                                                                <div class="custom-control custom-checkbox">
                                                                    <!-- No permission available for this action -->
                                                                </div>
                                                            @endif
                                                        @endforeach
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <!-- Permission table -->
                    </div>
                    <div class="col-12 text-center">
                        @canany(['create role'])<button type="submit" class="btn btn-primary me-3">{{ __('Submit') }}</button>@endcan
                        <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal"
                            aria-label="Close">
                            {{ __('Cancel') }}
                        </button>
                    </div>
                </form>
                <!--/ Add role form -->
            </div>
        </div>
    </div>
</div>
