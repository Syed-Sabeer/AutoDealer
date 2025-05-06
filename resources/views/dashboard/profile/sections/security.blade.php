<!-- Change Password -->
<div class="card mb-6">
    <h5 class="card-header">{{ __('Change Password') }}</h5>
    <div class="card-body pt-1">
        <form id="formAccountSecurity" method="POST" action="{{route('update.password', $profile->user->id)}}">
            @csrf
            <div class="row">
                <div class="mb-6 col-md-6 form-password-toggle">
                    <label class="form-label" for="currentPassword">{{ __('Current Password') }}</label><span class="text-danger">*</span>
                    <div class="input-group input-group-merge">
                        <input class="form-control @error('currentPassword') is-invalid @enderror" type="password" name="currentPassword" id="currentPassword"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required/>
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                    @error('currentPassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="mb-6 col-md-6 form-password-toggle">
                    <label class="form-label" for="newPassword">{{ __('New Password') }}</label><span class="text-danger">*</span>
                    <div class="input-group input-group-merge">
                        <input class="form-control @error('newPassword') is-invalid @enderror" type="password" id="newPassword" name="newPassword"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required/>
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                    @error('newPassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="mb-6 col-md-6 form-password-toggle">
                    <label class="form-label" for="confirmPassword">{{ __('Confirm New Password') }}</label><span class="text-danger">*</span>
                    <div class="input-group input-group-merge">
                        <input class="form-control @error('confirmPassword') is-invalid @enderror" type="password" name="confirmPassword" id="confirmPassword"
                            placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" required/>
                        <span class="input-group-text cursor-pointer"><i class="ti ti-eye-off"></i></span>
                    </div>
                    @error('confirmPassword')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <h6 class="text-body">{{ __('Password Requirements') }}:</h6>
            <ul class="ps-4 mb-0">
                <li class="mb-4">{{ __('Minimum 8 characters long - the more, the better') }}</li>
                <li class="mb-4">{{ __('At least one lowercase character') }}</li>
                <li>{{ __('At least one number, symbol, or whitespace character') }}</li>
            </ul>
            <div class="mt-6">
                <button type="submit" class="btn btn-primary me-3">{{ __('Save changes') }}</button>
                <button type="reset" class="btn btn-label-secondary">{{ __('Reset') }}</button>
            </div>
        </form>
    </div>
</div>
<!--/ Change Password -->
