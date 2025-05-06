<div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasAddUser" aria-labelledby="offcanvasAddUserLabel">
    <div class="offcanvas-header border-bottom">
        <h5 id="offcanvasAddUserLabel" class="offcanvas-title">{{ __('Add User') }}</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body mx-0 flex-grow-0 p-6 h-100">
        <form class="add-new-user pt-0" id="addNewUserForm" method="POST" action="{{route('dashboard.user.store')}}">
            @csrf
            <div class="mb-6">
                <label class="form-label" for="first_name">{{ __('First Name') }}</label>
                <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" placeholder="i.e. John" name="first_name"
                    aria-label="John Doe" required/>
                @error('first_name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-6">
                <label class="form-label" for="last_name">{{ __('Last Name') }}</label>
                <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" placeholder="i.e. Doe" name="last_name"
                    aria-label="John Doe" required/>
                @error('last_name')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-6">
                <label class="form-label" for="email">{{ __('Email') }}</label>
                <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="i.e. john.doe@example.com"
                    aria-label="john.doe@example.com" name="email" required/>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-6 form-password-toggle">
                <label class="form-label" for="password">{{ __('Password') }}</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password" required/>
                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                </div>
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-6 form-password-toggle">
                <label class="form-label" for="confirm-password">{{ __('Confirm Password') }}</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="confirm-password" class="form-control @error('confirm-password') is-invalid @enderror" name="confirm-password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="confirm-password" required/>
                    <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                </div>
                @error('confirm-password')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            <div class="mb-6">
                <label class="form-label" for="user-role">{{ __('User Role') }}</label>
                <select id="user-role" name="role" class="select2 form-select @error('role') is-invalid @enderror" required>
                    <option value="" selected disabled>{{ __('Select Role') }}</option>
                    @if (isset($roles) && count($roles) > 0)
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}">{{ Str::title(str_replace('-', ' ', $role->name)) }}
                            </option>
                        @endforeach
                    @endif
                </select>
                @error('role')
                    <span class="invalid-feedback" role="alert">
                        {{ $message }}
                    </span>
                @enderror
            </div>
            @canany(['create user'])
                <button id="addUserBtn" type="submit" class="btn btn-primary me-3 data-submit">
                    <span id="addUserText">
                        <span id="addUserLoader" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span> 
                        {{ __('Submit') }}
                    </span>
                </button>
            @endcan
            <button type="reset" class="btn btn-label-danger" data-bs-dismiss="offcanvas">{{ __('Cancel') }}</button>
        </form>
    </div>
</div>
