<div class="card mb-6">
    <!-- Account -->
    <div class="card-body pt-4">
        <form id="formSystemSettings" method="POST"
            action="{{ route('dashboard.setting.system.update', $systemSetting->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row p-5">
                <h3>{{ __('Storage Settings') }}</h3>
                <div class="mb-4 col-md-12">
                    <label for="max_upload_size" class="form-label">{{ __('Max Upload Size') }}</label>
                    <small class="fw-medium text-primary">({{ __('Size must be in KBs') }})</small><span class="text-danger">*</span>
                    <input class="form-control @error('max_upload_size') is-invalid @enderror" type="number"
                        id="max_upload_size" name="max_upload_size"
                        value="{{ old('max_upload_size', $systemSetting->max_upload_size ?? '') }}"
                        placeholder="i.e. 2048" autofocus required/>
                    @error('max_upload_size')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <h3>{{ __('Currency Settings') }}</h3>
                <div class="mb-4 col-md-6">
                    <label for="currency_symbol" class="form-label">{{ __('Currency Symbol') }}</label><span class="text-danger">*</span>
                    <input class="form-control @error('currency_symbol') is-invalid @enderror" type="text"
                        id="currency_symbol" name="currency_symbol"
                        value="{{ old('currency_symbol', $systemSetting->currency_symbol ?? '') }}"
                        placeholder="i.e. $" required/>
                    @error('currency_symbol')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-6">
                    <label for="currency_symbol_position" class="form-label">{{ __('Currency Symbol Position') }}</label><span class="text-danger">*</span>
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="radio"
                            name="currency_symbol_position" value="prefix" id="defaultRadio1"
                            {{ old('currency_symbol_position', $systemSetting->currency_symbol_position == 'prefix' ? 'checked' : '') }}>
                        <label class="form-check-label" for="defaultRadio1"> {{ __('Prefix') }} <small class="fw-medium text-primary">(i.e. $10)</small></label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="currency_symbol_position"
                            type="radio" value="postfix" id="defaultRadio2"
                            {{ old('currency_symbol_position', $systemSetting->currency_symbol_position == 'postfix' ? 'checked' : '') }}>
                        <label class="form-check-label" for="defaultRadio2"> {{ __('Postfix') }} <small class="fw-medium text-primary">(i.e. 10$)</small> </label>
                    </div>
                    @error('currency_symbol_position')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <h3>{{ __('Other Settings') }}</h3>
                <div class="mb-4 col-md-6">
                    <label class="form-label" for="language_id">{{ __('Language') }}</label>
                    <select id="language_id" name="language_id" class="select2 form-select @error('language_id') is-invalid @enderror">
                        <option value="" selected disabled>{{ __('Select Language') }}</option>
                        @if (isset($languages) && count($languages) > 0)
                            @foreach ($languages as $language)
                                <option value="{{ $language->id }}" {{$language->id == $systemSetting->language_id ? 'selected' : ''}}>{{ $language->name }} ({{ $language->native_name }})</option>
                            @endforeach
                        @endif
                    </select>
                    @error('language_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-6">
                    <label class="form-label" for="timezone_id">{{ __('Timezone') }}</label>
                    <select id="timezone_id" name="timezone_id" class="select2 form-select @error('timezone_id') is-invalid @enderror">
                        <option value="" selected disabled>{{ __('Select Timezone') }}</option>
                        @if (isset($timezones) && count($timezones) > 0)
                            @foreach ($timezones as $timezone)
                                <option value="{{ $timezone->id }}" {{$timezone->id == $systemSetting->timezone_id ? 'selected' : ''}}>{{ $timezone->name }} ({{ $timezone->offset }})</option>
                            @endforeach
                        @endif
                    </select>
                    @error('timezone_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-12">
                    <label for="footer_text" class="form-label">{{ __('Footer Text') }}</label><span class="text-danger">*</span>
                    <input class="form-control @error('footer_text') is-invalid @enderror" type="text"
                        id="footer_text" name="footer_text"
                        value="{{ old('footer_text', $systemSetting->footer_text ?? '') }}"
                        placeholder="i.e. All CopyRights Reserved" required/>
                    @error('footer_text')
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
