@extends('frontend.layouts.master')

@section('title', __('Settings'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
@endsection

<!-- Page Title -->
@section('breadcrumbs')
    @include('frontend.layouts.partials.breadcrumb', [
        'title' => 'Settings',
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('frontend.dashboard')],
            ['label' => 'Settings'],
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
                        <div class="user-profile-card profile-setting">
                            <h4 class="user-profile-card-title">Settings</h4>
                            <div class="row">
                                <div class="col-lg-6">
                                    <h6 class="mb-3">Privacy Setting</h6>
                                    <div class="profile-privacy-setting">
                                        <form action="#">
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="privacy-setting" value="1" type="checkbox" role="switch" id="privacy-setting-1" checked>
                                                <label class="form-check-label" for="privacy-setting-1">Enable Messages</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="privacy-setting" value="2" type="checkbox" role="switch" id="privacy-setting-2">
                                                <label class="form-check-label" for="privacy-setting-2">I Want To Receive Email Notify</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="privacy-setting" value="3" type="checkbox" role="switch" id="privacy-setting-3" checked>
                                                <label class="form-check-label" for="privacy-setting-3">Hide My Phone Number From Public</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="privacy-setting" value="4" type="checkbox" role="switch" id="privacy-setting-4">
                                                <label class="form-check-label" for="privacy-setting-4">I Want To Receive Message</label>
                                            </div>
                                            <div class="form-check form-switch">
                                                <input class="form-check-input" name="privacy-setting" value="5" type="checkbox" role="switch" id="privacy-setting-5" checked>
                                                <label class="form-check-label" for="privacy-setting-5">Make My Profile Private</label>
                                            </div>
                                            <div class="my-4">
                                                <button type="submit" class="theme-btn"><span class="far fa-gear"></span>Update Settings</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <h6 class="mb-3">Delete Account</h6>
                                    <div class="user-profile-form">
                                        <form action="#">
                                            <div class="form-group">
                                                <select class="select mb-4">
                                                    <option value="">Choose Reason</option>
                                                    <option value="1">Reason One</option>
                                                    <option value="2">Reason Two</option>
                                                    <option value="3">Reason Three</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <textarea class="form-control" cols="30" rows="4" placeholder="Describe Your Reason"></textarea>
                                            </div>
                                            <div class="my-4">
                                                <button type="submit" class="theme-btn"><span class="far fa-trash-can"></span>Delete Account</button>
                                            </div>
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
    <!-- user-profile end -->
@endsection

@section('script')
    <script></script>
@endsection
