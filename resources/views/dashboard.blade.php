@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="row justify-content-center">


            <div class="pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Dashboard</h1>
            </div>

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="card-title">Upload Photos</h5>
                                    <p class="card-text">Easily upload and manage your photo collection.</p>
                                    <a href="{{ route('admin.photos.create') }}" class="btn btn-primary"> <i
                                            class="bi bi-cloud-arrow-up pe-2"></i>Upload Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="card-title">Explore Gallery</h5>
                                    <p class="card-text">Browse through your beautiful photos.</p>
                                    <a href="{{ route('admin.photos.index') }}" class="btn btn-success"><i
                                            class="bi bi-images pe-2"></i>View
                                        Gallery</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <div>
                                    <h5 class="card-title">Manage Profile</h5>
                                    <p class="card-text">Update your profile and preferences.</p>
                                    <a href="/profile" class="btn btn-warning"><i class="bi bi-person pe-2"></i>Edit
                                        Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
