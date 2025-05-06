<div class="card mb-6">
    <!-- Account -->
    <div class="card-body pt-4">
        <form id="formRecaptchaSettings" method="POST"
            action="{{ route('dashboard.setting.recaptcha.update', $recaptchaSetting->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row p-5">
                <h3>{{ __('ReCaptcha Settings') }}</h3>
                <div class="mb-4 col-md-12">
                    <label class="form-label" for="google_recaptcha_type">{{ __('Google ReCaptcha Type') }}</label><span class="text-danger">*</span>
                    <select id="google_recaptcha_type" name="google_recaptcha_type" required class="select2 form-select @error('google_recaptcha_type') is-invalid @enderror">
                        <option value="" selected disabled>{{ __('Select Recaptcha type') }}</option>
                        <option value="v2" {{ old('google_recaptcha_type', $recaptchaSetting->google_recaptcha_type ?? '') === 'v2' ? 'selected' : '' }}>{{ __('reCAPTCHA V2') }}</option>
                        <option value="v3" {{ old('google_recaptcha_type', $recaptchaSetting->google_recaptcha_type ?? '') === 'v3' ? 'selected' : '' }}>{{ __('reCAPTCHA V3') }}</option>
                        <option value="no_captcha" {{ old('google_recaptcha_type', $recaptchaSetting->google_recaptcha_type ?? '') === 'no_captcha' ? 'selected' : '' }}>{{ __('No Captcha') }}</option>
                    </select>
                    @error('google_recaptcha_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-12">
                    <label for="google_recaptcha_key" id="google_recaptcha_key_label" class="form-label">{{ __('Google ReCaptcha Key') }}</label>
                    <input class="form-control @error('google_recaptcha_key') is-invalid @enderror" type="text" id="google_recaptcha_key" name="google_recaptcha_key" value="{{ old('google_recaptcha_key', $recaptchaSetting->google_recaptcha_key ?? '') }}" placeholder="{{ __('Enter google recaptcha key') }}" autofocus />
                    @error('google_recaptcha_key')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-12">
                    <label for="google_recaptcha_secret" id="google_recaptcha_secret_label" class="form-label">{{ __('Google ReCaptcha Secret') }}</label>
                    <input class="form-control @error('google_recaptcha_secret') is-invalid @enderror" type="text" id="google_recaptcha_secret" name="google_recaptcha_secret" value="{{ old('google_recaptcha_secret', $recaptchaSetting->google_recaptcha_secret ?? '') }}" placeholder="{{ __('Enter google recaptcha secret') }}" />
                    @error('google_recaptcha_secret')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            @canany(['create setting', 'update setting'])
                <div class="mt-2">
                    <button type="submit" class="btn btn-primary me-3">{{ __('Save changes') }}</button>
                </div>
            @endcan
        </form>
    </div>
    <!-- /Account -->
</div>


