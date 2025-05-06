<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasEditUser" aria-labelledby="offcanvasEditUserLabel">
    <div class="offcanvas-header border-bottom">
        <h5 id="offcanvasEditUserLabel" class="offcanvas-title">{{ __('Edit User') }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0 p-6 h-100">
        <div class="edit-loader">
            <div class="sk-chase sk-primary">
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
                <div class="sk-chase-dot"></div>
            </div>
        </div>
        <form class="add-new-user pt-0" id="editUserForm" method="POST" action="">
            @csrf
            @method('PUT')
            <div class="mb-6">
                <label class="form-label" for="edit_first_name">{{ __('First Name') }}</label>
                <input type="text" class="form-control @error('edit_first_name') is-invalid @enderror" id="edit_first_name" placeholder="i.e. John" name="edit_first_name"
                    aria-label="John Doe" />
                @error('edit_first_name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-6">
                <label class="form-label" for="edit_last_name">{{ __('Last Name') }}</label>
                <input type="text" class="form-control @error('edit_last_name') is-invalid @enderror" id="edit_last_name" placeholder="i.e. Doe" name="edit_last_name"
                    aria-label="John Doe" />
                @error('edit_last_name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-6">
                <label class="form-label" for="edit_email">{{ __('Email') }}</label>
                <input type="email" id="edit_email" class="form-control" placeholder="i.e. john.doe@example.com"
                    aria-label="john.doe@example.com" disabled/>
            </div>
            <div class="mb-6">
                <label class="form-label" for="user-role">{{ __('User Role') }}</label>
                <select id="edit-user-role" name="edit_role" class="select2 form-select @error('edit_role') is-invalid @enderror">
                    <option value="" selected disabled>{{ __('Select Role') }}</option>
                    @if (isset($roles) && count($roles) > 0)
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ Str::title(str_replace('-', ' ', $role->name)) }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('edit_role')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            @canany(['update user'])
                <button id="editUserBtn" type="submit" class="btn btn-primary me-3 data-submit">
                    <span id="editUserText">
                        <span id="editUserLoader" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span> 
                        {{ __('Submit') }}
                    </span>
                </button>
            @endcan
            <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">{{ __('Cancel') }}</button>
        </form>
    </div>
</div>
