<div class="card mb-6">
    <!-- Account -->
    <div class="card-body pt-4">
        <form id="formCompanySettings" method="POST"
            action="{{ route('dashboard.setting.company.update', $companySetting->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row p-5">
                <h3>{{ __('Company Settings') }}</h3>
                <div class="mb-4 col-md-4">
                    <div class="d-flex align-items-start align-items-sm-center gap-6 mb-5">
                        <img src="{{ asset($companySetting->light_logo ?? 'assets/img/default/img.png') }}"
                            alt="light-logo" class="d-block w-px-100 h-px-100 rounded" id="uploadedLightLogo" />
                        <div class="button-wrapper">
                            <label for="upload1" class="btn btn-primary me-3 mb-4 @error('light_logo') is-invalid @enderror">
                                <span class="d-none d-sm-block">{{ __('Upload light logo') }}</span>
                                <i class="ti ti-upload d-block d-sm-none"></i>
                                <input type="file" id="upload1" class="account-file-input" name="light_logo" hidden
                                    accept="image/png, image/jpeg" />
                            </label>
                            <button type="button" id="reset1"
                                class="btn btn-label-secondary account-image-reset mb-4">
                                <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">{{ __('Reset') }}</span>
                            </button>
                            <div>{{ __('Allowed JPG, JPEG, SVG or PNG. Max size of') }} {{\App\Helpers\Helper::getMaxUploadSize()}}</div>
                            @error('light_logo')
                                <span class="text-danger d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-md-4">
                    <div class="d-flex align-items-start align-items-sm-center gap-6 mb-5">
                        <img src="{{ asset($companySetting->dark_logo ?? 'assets/img/default/img.png') }}"
                            alt="dark-logo" class="d-block w-px-100 h-px-100 rounded" id="uploadedDarkLogo" />
                        <div class="button-wrapper">
                            <label for="upload2" class="btn btn-primary me-3 mb-4 @error('dark_logo') is-invalid @enderror">
                                <span class="d-none d-sm-block">{{ __('Upload dark logo') }}</span>
                                <i class="ti ti-upload d-block d-sm-none"></i>
                                <input type="file" id="upload2" class="account-file-input" name="dark_logo" hidden
                                    accept="image/png, image/jpeg" />
                            </label>
                            <button type="button" id="reset2"
                                class="btn btn-label-secondary account-image-reset mb-4">
                                <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">{{ __('Reset') }}</span>
                            </button>
                            <div>{{ __('Allowed JPG, JPEG, SVG or PNG. Max size of') }} {{\App\Helpers\Helper::getMaxUploadSize()}}</div>
                            @error('dark_logo')
                                <span class="text-danger d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-md-4">
                    <div class="d-flex align-items-start align-items-sm-center gap-6 mb-5">
                        <img src="{{ asset($companySetting->favicon ?? 'assets/img/default/img.png') }}"
                            alt="favicon" class="d-block w-px-100 h-px-100 rounded" id="uploadedFavicon" />
                        <div class="button-wrapper">
                            <label for="upload3" class="btn btn-primary me-3 mb-4 @error('favicon') is-invalid @enderror">
                                <span class="d-none d-sm-block">{{ __('Upload favicon') }}</span>
                                <i class="ti ti-upload d-block d-sm-none"></i>
                                <input type="file" id="upload3" class="account-file-input" name="favicon" hidden
                                    accept="image/png, image/jpeg" />
                            </label>
                            <button type="button" id="reset3"
                                class="btn btn-label-secondary account-image-reset mb-4">
                                <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">{{ __('Reset') }}</span>
                            </button>
                            <div>{{ __('Allowed JPG, JPEG, SVG or PNG. Max size of') }} {{\App\Helpers\Helper::getMaxUploadSize()}}</div>
                            @error('favicon')
                                <span class="text-danger d-block">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="mb-4 col-md-4">
                    <label for="company_name" class="form-label">{{ __('Company Name') }}</label><span class="text-danger">*</span>
                    <input class="form-control @error('company_name') is-invalid @enderror" type="text" id="company_name" name="company_name" required value="{{$companySetting->company_name}}" placeholder="{{ __('Enter your company name') }}" autofocus />
                    @error('company_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-4">
                    <label for="email" class="form-label">{{ __('Company Email') }}</label>
                    <input class="form-control @error('email') is-invalid @enderror" type="email" id="email" name="email" value="{{$companySetting->email}}" placeholder="{{ __('Enter your company email') }}" autofocus />
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-4">
                    <label class="form-label" for="phone_number">{{ __('Phone Number') }}</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text">US (+1)</span>
                        <input type="text" id="phone_number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{$companySetting->phone_number}}" placeholder="i.e. 202 555 0111" />
                        @error('phone_number')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
                <div class="mb-4 col-md-4">
                    <label class="form-label" for="country">{{ __('Country') }}</label>
                    <select id="country" name="country_id" class="select2 form-select @error('country_id') is-invalid @enderror">
                        <option value="" selected disabled>{{ __('Select Country') }}</option>
                        @if (isset($countries) && count($countries) > 0)
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}" {{$country->id == $companySetting->country_id ? 'selected' : ''}}>{{ $country->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('country_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-4">
                    <label for="city" class="form-label">{{ __('City') }}</label>
                    <input class="form-control @error('city') is-invalid @enderror" type="text" id="city" name="city" value="{{$companySetting->city}}" placeholder="i.e. California" />
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-4">
                    <label for="zip" class="form-label">{{ __('Zip Code') }}</label>
                    <input type="text" class="form-control @error('zip') is-invalid @enderror" id="zip" name="zip" value="{{$companySetting->zip}}" placeholder="i.e. 231465" maxlength="6" />
                    @error('zip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-12">
                    <label for="address" class="form-label">{{ __('Address') }}</label>
                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="address" name="address" value="{{$companySetting->address}}" placeholder="{{ __('i.e. Beacon Main St. #55') }}" />
                    @error('address')
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


