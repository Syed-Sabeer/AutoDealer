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
                                        <form action="#">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>First Name</label>
                                                        <input type="text" class="form-control" value="Antoni"
                                                            placeholder="First Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Last Name</label>
                                                        <input type="text" class="form-control" value="Jonson"
                                                            placeholder="Last Name">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Email</label>
                                                        <input type="text" class="form-control"
                                                            value="antoni@example.com" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Phone</label>
                                                        <input type="text" class="form-control"
                                                            value="+2 134 562 458" placeholder="Phone">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group">
                                                        <label>Address</label>
                                                        <input type="text" class="form-control"
                                                            value="New York, USA" placeholder="Address">
                                                    </div>
                                                </div>
                                            </div>
                                            <button type="button" class="theme-btn my-3"><span class="far fa-user"></span> Save Changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5">
                                <div class="user-profile-card">
                                    <h4 class="user-profile-card-title">Change Password</h4>
                                    <div class="col-lg-12">
                                        <div class="user-profile-form">
                                            <form action="#">
                                                <div class="form-group">
                                                    <label>Old Password</label>
                                                    <input type="password" class="form-control"
                                                        placeholder="Old Password">
                                                </div>
                                                <div class="form-group">
                                                    <label>New Password</label>
                                                    <input type="password" class="form-control"
                                                        placeholder="New Password">
                                                </div>
                                                <div class="form-group">
                                                    <label>Re-Type Password</label>
                                                    <input type="password" class="form-control"
                                                        placeholder="Re-Type Password">
                                                </div>
                                                <button type="button" class="theme-btn my-3"><span class="far fa-key"></span> Change Password</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
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
                            </div>
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
