<div class="card mb-6">
    <div class="card-header">
        <button data-bs-toggle="modal" data-bs-target="#modalCenter" class="btn btn-warning me-3 float-end">
            {{ __('Send Test Mail') }}
        </button>
    </div>
    <!-- Account -->
    <div class="card-body pt-4">
        <form id="formEmailSettings" method="POST"
            action="{{ route('dashboard.setting.email.update', $emailSetting->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row p-5">
                <h3>{{ __('Email Settings') }}</h3>
                <div class="mb-4 col-md-4">
                    <label for="mail_driver" class="form-label">{{ __('Mail Driver') }}</label><span class="text-danger">*</span>
                    <input class="form-control @error('mail_driver') is-invalid @enderror" type="text"
                        id="mail_driver" name="mail_driver"
                        value="{{ old('mail_driver', $emailSetting->mail_driver ?? '') }}" placeholder="i.e. smtp"
                        required />
                    @error('mail_driver')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-4">
                    <label for="mail_host" class="form-label">{{ __('Mail Host') }}</label><span class="text-danger">*</span>
                    <input class="form-control @error('mail_host') is-invalid @enderror" type="text" id="mail_host"
                        name="mail_host" value="{{ old('mail_host', $emailSetting->mail_host ?? '') }}"
                        placeholder="i.e. smtp.mailtrap.io" required />
                    @error('mail_host')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-4">
                    <label for="mail_port" class="form-label">{{ __('Mail Port') }}</label><span class="text-danger">*</span>
                    <input class="form-control @error('mail_port') is-invalid @enderror" type="text" id="mail_port"
                        name="mail_port" value="{{ old('mail_port', $emailSetting->mail_port ?? '') }}"
                        placeholder="i.e. 2525" required />
                    @error('mail_port')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-6">
                    <label for="mail_username" class="form-label">{{ __('Mail Username') }}</label><span
                        class="text-danger">*</span>
                    <input class="form-control @error('mail_username') is-invalid @enderror" type="text"
                        id="mail_username" name="mail_username"
                        value="{{ old('mail_username', $emailSetting->mail_username ?? '') }}"
                        placeholder="{{ __('Enter your mail username') }}" required />
                    @error('mail_username')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-6">
                    <label for="mail_password" class="form-label">{{ __('Mail Password') }}</label><span
                        class="text-danger">*</span>
                    <input class="form-control @error('mail_password') is-invalid @enderror" type="text"
                        id="mail_password" name="mail_password"
                        value="{{ old('mail_password', $emailSetting->mail_password ?? '') }}"
                        placeholder="{{ __('Enter your mail password') }}" required />
                    @error('mail_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-4">
                    <label for="mail_encryption" class="form-label">{{ __('Mail Encryption') }}</label><span
                        class="text-danger">*</span>
                    <input class="form-control @error('mail_encryption') is-invalid @enderror" type="text"
                        id="mail_encryption" name="mail_encryption"
                        value="{{ old('mail_encryption', $emailSetting->mail_encryption ?? '') }}"
                        placeholder="i.e. tls, ssl" required />
                    @error('mail_encryption')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-4">
                    <label for="mail_from_address" class="form-label">{{ __('From Mail') }}</label><span
                        class="text-danger">*</span>
                    <input class="form-control @error('mail_from_address') is-invalid @enderror" type="email"
                        id="mail_from_address" name="mail_from_address"
                        value="{{ old('mail_from_address', $emailSetting->mail_from_address ?? '') }}"
                        placeholder="i.e. test@gmail.com" required />
                    @error('mail_from_address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-4">
                    <label for="mail_from_name" class="form-label">{{ __('From Name') }}</label><span class="text-danger">*</span>
                    <input class="form-control @error('mail_from_name') is-invalid @enderror" type="text"
                        id="mail_from_name" name="mail_from_name"
                        value="{{ old('mail_from_name', $emailSetting->mail_from_name ?? '') }}"
                        placeholder="{{ __('Enter name to show as from mail') }}" required />
                    @error('mail_from_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="mb-4 col-md-6">
                    <label for="is_enabled" class="form-label">{{ __('Enable Status') }}</label><span
                        class="text-danger">*</span>
                    <div class="form-check mt-4">
                        <input class="form-check-input" type="radio" name="is_enabled" value="1"
                            id="defaultRadio3"
                            {{ old('is_enabled', $emailSetting->is_enabled == '1' ? 'checked' : '') }}>
                        <label class="form-check-label" for="defaultRadio3"> {{ __('Enable Mails') }} </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" name="is_enabled" type="radio" value="0"
                            id="defaultRadio4"
                            {{ old('is_enabled', $emailSetting->is_enabled == '0' ? 'checked' : '') }}>
                        <label class="form-check-label" for="defaultRadio4"> {{ __('Disable Mails') }} </label>
                    </div>
                    @error('is_enabled')
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

<!-- Modal -->
<div class="modal fade" id="modalCenter" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCenterTitle">{{ __('Enter email where you want to receive test mail.') }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="testMailForm" method="POST"
                    action="{{ route('dashboard.setting.send_test_mail') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <small
                        class="fw-medium">{{ __("Please check your spam or junk folder if you don't see the test email in your inbox.") }}</small>
                    <div class="row g-4">
                        <div class="col mb-0">
                            <label for="test_mail" class="form-label">{{ __('Email') }}</label><span
                                class="text-danger">*</span>
                            <input type="email" id="emailWithTitle"
                                class="form-control @error('test_mail') is-invalid @enderror" placeholder="xxxx@xxx.xx"
                                required name="test_mail" id="test_mail"/>
                            @error('test_mail')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mt-4 g-4">
                        <div class="col mb-0">
                            <button type="button" class="btn btn-label-secondary" data-bs-dismiss="modal">
                                {{ __('Close') }}
                            </button>
                            <button type="submit" class="btn btn-primary" id="sendTestMailBtn">
                                <span id="sendTestMailText">
                                    <span id="sendTestMailLoader" class="spinner-border spinner-border-sm d-none" role="status" aria-hidden="true"></span> 
                                    {{ __('Send Mail') }}
                                </span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
