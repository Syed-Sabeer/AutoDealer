<div class="card mb-6">
    <!-- Account -->
    <div class="card-body pt-4">
        <form id="formAccountSettings" method="POST" action="{{ route('profile.update', $profile->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="d-flex align-items-start align-items-sm-center gap-6 mb-5">
                <img src="{{ asset($profile->profile_image ?? 'assets/img/default/user.png') }}" alt="user-avatar"
                    class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                <div class="button-wrapper">
                    <label for="upload"
                        class="btn btn-primary me-3 mb-4 @error('profile_image') is-invalid @enderror">
                        <span class="d-none d-sm-block">{{ __('Upload new photo') }}</span>
                        <i class="ti ti-upload d-block d-sm-none"></i>
                        <input type="file" id="upload" class="account-file-input" name="profile_image" hidden
                            accept="image/png, image/jpeg" />
                    </label>
                    <button type="button" class="btn btn-label-secondary account-image-reset mb-4">
                        <i class="ti ti-refresh-dot d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">{{ __('Reset') }}</span>
                    </button>
                    <div>{{ __('Allowed JPG, JPEG, or PNG. Max size of') }} {{ \App\Helpers\Helper::getMaxUploadSize() }}</div>
                    @error('profile_image')
                        <span class="text-danger d-block">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="row">
                <div class="mb-4 col-md-6">
                    <label for="firstName" class="form-label">{{ __('First Name') }}</label><span class="text-danger">*</span>
                    <input class="form-control @error('first_name') is-invalid @enderror" type="text" id="firstName" name="first_name"
                        value="{{ $profile->first_name }}" placeholder="{{ __('Enter your first name') }}" autofocus required/>
                    @error('first_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-6">
                    <label for="lastName" class="form-label">{{ __('Last Name') }}</label>
                    <input class="form-control @error('last_name') is-invalid @enderror" type="text" name="last_name" id="lastName"
                        value="{{ $profile->last_name }}" placeholder="{{ __('Enter your last name') }}" />
                    @error('last_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-6">
                    <label for="dob" class="form-label">{{ __('Date of Birth') }}</label>
                    <input type="date" class="form-control @error('dob') is-invalid @enderror" id="dob" name="dob"
                        value="{{ !empty($profile->dob) ? date('Y-m-d', strtotime($profile->dob)) : '' }}" placeholder="{{ __('Enter your date of birth') }}" />
                    @error('dob')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-6">
                    <label class="form-label" for="phone_number">{{ __('Phone Number') }}</label>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text phone_code">US (+1)</span>
                        <input type="text" id="phone_number" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror"
                            value="{{ $profile->phone_number }}" placeholder="i.e. 202 555 0111" />
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
                                <option value="{{ $country->id }}"
                                    {{ $country->id == $profile->country_id ? 'selected' : '' }}>{{ $country->name }}
                                </option>
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
                    <input class="form-control @error('city') is-invalid @enderror" type="text" id="city" name="city"
                        value="{{ $profile->city }}" placeholder="i.e. California" />
                    @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-4">
                    <label for="zip" class="form-label">{{ __('Zip Code') }}</label>
                    <input type="text" class="form-control @error('zip') is-invalid @enderror" id="zip" name="zip"
                        value="{{ $profile->zip }}" placeholder="i.e. 231465" maxlength="6" />
                    @error('zip')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-12">
                    <label for="street" class="form-label">{{ __('Street') }}</label>
                    <input type="text" class="form-control @error('street') is-invalid @enderror" id="street" name="street"
                        value="{{ $profile->street }}" placeholder="{{ __('i.e. Beacon Main St. #55') }}" />
                    @error('street')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-4">
                    <label class="form-label" for="language_id">{{ __('Language') }}</label>
                    <select id="language_id" name="language_id" class="select2 form-select @error('language_id') is-invalid @enderror">
                        <option value="" selected disabled>{{ __('Select Language') }}</option>
                        @if (isset($languages) && count($languages) > 0)
                            @foreach ($languages as $language)
                                <option value="{{ $language->id }}"
                                    {{ $language->id == $profile->language_id ? 'selected' : '' }}>
                                    {{ $language->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('language_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-4">
                    <label class="form-label" for="gender_id">{{ __('Gender') }}</label>
                    <select id="gender_id" name="gender_id" class="select2 form-select @error('gender_id') is-invalid @enderror">
                        <option value="" selected disabled>{{ __('Select Gender') }}</option>
                        @if (isset($genders) && count($genders) > 0)
                            @foreach ($genders as $gender)
                                <option value="{{ $gender->id }}"
                                    {{ $gender->id == $profile->gender_id ? 'selected' : '' }}>{{ $gender->name }}
                                </option>
                            @endforeach
                        @endif
                    </select>
                    @error('gender_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-4">
                    <label class="form-label" for="marital_status_id">{{ __('Marital Status') }}</label>
                    <select id="marital_status_id" name="marital_status_id" class="select2 form-select @error('marital_status_id') is-invalid @enderror">
                        <option value="" selected disabled>{{ __('Select Marital Status') }}</option>
                        @if (isset($maritalStatuses) && count($maritalStatuses) > 0)
                            @foreach ($maritalStatuses as $maritalStatus)
                                <option value="{{ $maritalStatus->id }}"
                                    {{ $maritalStatus->id == $profile->marital_status_id ? 'selected' : '' }}>
                                    {{ $maritalStatus->name }}</option>
                            @endforeach
                        @endif
                    </select>
                    @error('marital_status_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-12">
                    <label for="bio" class="form-label">{{ __('Bio') }}</label>
                    <input type="text" class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio"
                        value="{{ $profile->bio }}" placeholder="{{ __('i.e. A Modern UI designer') }}" />
                    @error('bio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-12">
                    <label class="form-label" for="facebook_url">{{ __('Social Links') }}</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fab fa-facebook fa-lg"></i></span>
                        <input type="text" id="facebook_url" name="facebook_url" class="form-control @error('facebook_url') is-invalid @enderror"
                            value="{{ $profile->facebook_url }}" placeholder="i.e. https://facebook.com/" />
                        @error('facebook_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fab fa-linkedin fa-lg"></i></span>
                        <input type="text" id="linkedin_url" name="linkedin_url" class="form-control @error('linkedin_url') is-invalid @enderror"
                            value="{{ $profile->linkedin_url }}" placeholder="i.e. https://linkedin.com/" />
                        @error('linkedin_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fab fa-skype fa-lg"></i></span>
                        <input type="text" id="skype_url" name="skype_url" class="form-control @error('skype_url') is-invalid @enderror"
                            value="{{ $profile->skype_url }}" placeholder="i.e. https://skype.com/" />
                        @error('skype_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fab fa-instagram fa-lg"></i></span>
                        <input type="text" id="instagram_url" name="instagram_url" class="form-control @error('instagram_url') is-invalid @enderror"
                            value="{{ $profile->instagram_url }}" placeholder="i.e. https://instagram.com/" />
                        @error('instagram_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <span class="input-group-text"><i class="fab fa-github fa-lg"></i></span>
                        <input type="text" id="github_url" name="github_url" class="form-control @error('github_url') is-invalid @enderror"
                            value="{{ $profile->github_url }}" placeholder="i.e. https://github.com/" />
                        @error('github_url')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-3">{{ __('Save changes') }}</button>
            </div>
        </form>
    </div>
    <!-- /Account -->
</div>
<div class="card">
    <h5 class="card-header">{{ __('Deactivate Account') }}</h5>
    <div class="card-body">
        <div class="mb-6 col-12 mb-0">
            <div class="alert alert-warning">
                <h5 class="alert-heading mb-1">{{ __('Are you sure you want to deactivate your account?') }}</h5>
                <p class="mb-0">{{ __('Once you deactivate your account, there is no going back. Please be certain.') }}</p>
            </div>
        </div>
        <form id="formAccountDeactivation" method="POST"
            action="{{ route('account.deactivate', $profile->user->id) }}">
            @csrf
            <div class="form-check my-8">
                <input class="form-check-input" type="checkbox" name="accountActivation" id="accountActivation" />
                <label class="form-check-label" for="accountActivation">{{ __('I confirm my account deactivation') }}</label>
            </div>
            <button class="btn btn-danger deactivate-account" disabled>
                {{ __('Deactivate Account') }}
            </button>
        </form>
    </div>
</div>
