@extends('frontend.layouts.master')

@section('title', __('Profile'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
@endsection

<!-- Page Title -->
@section('breadcrumbs')
    @include('frontend.layouts.partials.breadcrumb', [
        'title' => 'Profile',
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('frontend.dashboard')],
            ['label' => 'Profile'],
        ],
    ])
@endsection

@section('content')
    <!-- user-profile -->
    <div class="user-profile py-120">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    @include('frontend.pages.user.sections.sidebar')
                </div>
                <div class="col-lg-9">
                    <div class="user-profile-wrapper">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="user-profile-card">
                                    <h4 class="user-profile-card-title">Profile Info</h4>
                                    <div class="user-profile-form">
                                        <form action="{{ route('profile.update', $user->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="first_name">First Name</label>
                                                        <input type="text" name="first_name" id="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ old('first_name', $profile->first_name) }}"
                                                            placeholder="First Name" >
                                                        @error('first_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="last_name">Last Name</label>
                                                        <input type="text" name="last_name" id="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ old('last_name', $profile->last_name) }}"
                                                            placeholder="First Name" >
                                                        @error('last_name')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Email</label>
                                                        <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}"
                                                            placeholder="Enter Email" disabled>
                                                        @error('email')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="phone_number">Phone</label>
                                                        <input type="text" name="phone_number" id="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{ old('phone_number', $profile->phone_number) }}"
                                                            placeholder="Enter Phone" >
                                                        @error('phone_number')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label for="address">Address</label>
                                                        <input type="text" name="address" id="address" class="form-control @error('address') is-invalid @enderror" value="{{ old('address', $profile->address) }}"
                                                            placeholder="Enter Address" >
                                                        @error('address')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="submit" class="theme-btn my-3"><span class="far fa-user"></span> Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="user-profile-card">
                                    <h4 class="user-profile-card-title">Change Password</h4>
                                    <div class="col-lg-12">
                                        <div class="user-profile-form">
                                            <form  action="{{route('update.password', $user->id)}}" method="POST">
                                                @csrf
                                                <div class="form-group">
                                                    <label for="currentPassword">{{ __('Current Password') }}</label>
                                                    <input class="form-control @error('currentPassword') is-invalid @enderror"
                                                        type="password" name="currentPassword" id="currentPassword"
                                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                        required
                                                    >
                                                    @error('currentPassword')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="newPassword">{{ __('New Password') }}</label>
                                                    <input class="form-control @error('newPassword') is-invalid @enderror" type="password" id="newPassword" name="newPassword"
                                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                        required
                                                    >
                                                    @error('newPassword')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="confirmPassword">{{ __('Confirm New Password') }}</label>
                                                    <input class="form-control @error('confirmPassword') is-invalid @enderror" type="password" name="confirmPassword" id="confirmPassword"
                                                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                                                        required
                                                    >
                                                    @error('confirmPassword')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                                <button type="submit" class="theme-btn my-3"><span class="far fa-key"></span> Change Password</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="col-lg-12">
                                <div class="user-profile-card profile-store">
                                    <h4 class="user-profile-card-title">Store Info</h4>
                                    <div class="col-lg-12">
                                        <div class="user-profile-form">
                                            <form action="#">
                                                <div class="form-group">
                                                    <div class="store-logo-preview">
                                                        <img src="{{ asset('frontAssets/img/store/logo.jpg') }}" alt="">
                                                    </div>
                                                    <input type="file" class="store-file">
                                                    <button type="button" class="theme-btn store-upload"><span class="far fa-upload"></span> Upload Logo</button>
                                                </div>
                                                <div class="form-group">
                                                    <div class="store-banner-preview">
                                                        <img src="{{ asset('frontAssets/img/store/banner.jpg') }}" alt="">
                                                    </div>
                                                    <input type="file" class="store-file">
                                                    <button type="button" class="theme-btn store-upload mb-4"><span class="far fa-upload"></span> Upload Banner</button>
                                                </div>
                                                <div class="form-group">
                                                    <label>Store Name</label>
                                                    <input type="text" class="form-control" value="Automotive Car"
                                                        placeholder="Store Name">
                                                </div>
                                                <div class="form-group">
                                                    <label>Contact Phone Number</label>
                                                    <input type="text" class="form-control" value="+2 123 654 7898"
                                                        placeholder="Contact Phone Number">
                                                </div>
                                                <div class="form-group">
                                                    <label>Contact Email</label>
                                                    <input type="text" class="form-control" value="antoni@example.com"
                                                        placeholder="Contact Email">
                                                </div>
                                                <button type="button" class="theme-btn my-3"><span class="far fa-save"></span> Save Changes</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- user-profile end -->
@endsection

@section('script')
    <script></script>
@endsection
