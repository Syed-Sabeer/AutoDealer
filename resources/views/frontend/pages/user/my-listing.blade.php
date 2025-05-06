@extends('frontend.layouts.master')

@section('title', __('My Listing'))
@section('description', '')
@section('keywords', '')
@section('author', '')

@section('css')
@endsection

<!-- Page Title -->
@section('breadcrumbs')
    @include('frontend.layouts.partials.breadcrumb', [
        'title' => 'My Listing',
        'breadcrumbs' => [
            ['label' => 'Dashboard', 'url' => route('frontend.dashboard')],
            ['label' => 'My Listing'],
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
                        <div class="user-profile-card profile-ad">
                            <div class="user-profile-card-header">
                                <h4 class="user-profile-card-title">My Listing</h4>
                                <div class="user-profile-card-header-right">
                                    <div class="user-profile-search">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Search...">
                                            <i class="far fa-search"></i>
                                        </div>
                                    </div>
                                    <a href="#" class="theme-btn"><span class="far fa-plus-circle"></span>Add Listing</a>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="table-responsive">
                                    <table class="table text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>Car Info</th>
                                                <th>Brand</th>
                                                <th>Publish</th>
                                                <th>Price</th>
                                                <th>Views</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    <div class="table-list-info">
                                                        <a href="#">
                                                            <img src="{{ asset('frontAssets/img/car/01.jpg') }}" alt="">
                                                            <div class="table-list-content">
                                                                <h6>Mercedes Benz Car</h6>
                                                                <span>Car ID: #123456</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>Ferrari</td>
                                                <td>5 days ago</td>
                                                <td>$50,650</td>
                                                <td>350k+</td>
                                                <td><span class="badge badge-success">Active</span></td>
                                                <td>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Details"><i class="far fa-eye"></i></a>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Edit"><i class="far fa-pen"></i></a>
                                                    <a href="#" class="btn btn-outline-danger btn-sm rounded-2" data-bs-toggle="tooltip" title="Delete"><i class="far fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="table-list-info">
                                                        <a href="#">
                                                            <img src="{{ asset('frontAssets/img/car/02.jpg') }}" alt="">
                                                            <div class="table-list-content">
                                                                <h6>Mercedes Benz Car</h6>
                                                                <span>Car ID: #123456</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>Ferrari</td>
                                                <td>5 days ago</td>
                                                <td>$50,650</td>
                                                <td>0</td>
                                                <td><span class="badge badge-info">Pending</span></td>
                                                <td>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Details"><i class="far fa-eye"></i></a>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Edit"><i class="far fa-pen"></i></a>
                                                    <a href="#" class="btn btn-outline-danger btn-sm rounded-2" data-bs-toggle="tooltip" title="Delete"><i class="far fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="table-list-info">
                                                        <a href="#">
                                                            <img src="{{ asset('frontAssets/img/car/03.jpg') }}" alt="">
                                                            <div class="table-list-content">
                                                                <h6>Mercedes Benz Car</h6>
                                                                <span>Car ID: #123456</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>Ferrari</td>
                                                <td>5 days ago</td>
                                                <td>$50,650</td>
                                                <td>350k+</td>
                                                <td><span class="badge badge-primary">Sold</span></td>
                                                <td>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Details"><i class="far fa-eye"></i></a>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Edit"><i class="far fa-pen"></i></a>
                                                    <a href="#" class="btn btn-outline-danger btn-sm rounded-2" data-bs-toggle="tooltip" title="Delete"><i class="far fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="table-list-info">
                                                        <a href="#">
                                                            <img src="{{ asset('frontAssets/img/car/04.jpg') }}" alt="">
                                                            <div class="table-list-content">
                                                                <h6>Mercedes Benz Car</h6>
                                                                <span>Car ID: #123456</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>Ferrari</td>
                                                <td>5 days ago</td>
                                                <td>$50,650</td>
                                                <td>0</td>
                                                <td><span class="badge badge-danger">Expired</span></td>
                                                <td>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Details"><i class="far fa-eye"></i></a>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Edit"><i class="far fa-pen"></i></a>
                                                    <a href="#" class="btn btn-outline-danger btn-sm rounded-2" data-bs-toggle="tooltip" title="Delete"><i class="far fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    <div class="table-list-info">
                                                        <a href="#">
                                                            <img src="{{ asset('frontAssets/img/car/05.jpg') }}" alt="">
                                                            <div class="table-list-content">
                                                                <h6>Mercedes Benz Car</h6>
                                                                <span>Car ID: #123456</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </td>
                                                <td>Ferrari</td>
                                                <td>5 days ago</td>
                                                <td>$50,650</td>
                                                <td>350k+</td>
                                                <td><span class="badge badge-success">Active</span></td>
                                                <td>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Details"><i class="far fa-eye"></i></a>
                                                    <a href="#" class="btn btn-outline-secondary btn-sm rounded-2" data-bs-toggle="tooltip" title="Edit"><i class="far fa-pen"></i></a>
                                                    <a href="#" class="btn btn-outline-danger btn-sm rounded-2" data-bs-toggle="tooltip" title="Delete"><i class="far fa-trash-can"></i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- pagination -->
                                <div class="pagination-area">
                                    <div aria-label="Page navigation example">
                                        <ul class="pagination my-3">
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Previous">
                                                    <span aria-hidden="true"><i class="far fa-angle-double-left"></i></span>
                                                </a>
                                            </li>
                                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item">
                                                <a class="page-link" href="#" aria-label="Next">
                                                    <span aria-hidden="true"><i class="far fa-angle-double-right"></i></span>
                                                </a>
                                            </li>
                                        </ul>
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
