@extends('layouts.app')

@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3 text-center">
        <div class="container py-5">
            <h1 class="display-4 fw-bold">
                Welcome to the photo management {{ $user ? $user->name : '' }}
            </h1>
            <p class="lead">
                Organize, share, and explore your photo collection with ease.
            </p>
            <a class="btn btn-primary btn-lg" href="/admin" role="button">Get Started</a>
        </div>
    </div>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($photos as $key => $photo)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <img style="aspect-ratio: 4/3; object-fit:cover" class="d-block w-50 mx-auto"
                        src="{{ asset('storage/' . $photo->image_url) }}" alt="Photo {{ $key + 1 }}">
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{ $photo->title }}</h5>
                    </div>
                </div>
            @endforeach
        </div>
        <button style="filter: invert(100%)" class="carousel-control-prev" type="button"
            data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button style="filter: invert(100%)" class="carousel-control-next" type="button"
            data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    @if ($user && $user->id == auth()->id())
        <div class="content mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Upload Photos</h5>
                                <p class="card-text">Easily upload and manage your photo collection.</p>
                                <a href="{{ route('admin.photos.create') }}" class="btn btn-primary">Upload Now</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Explore Gallery</h5>
                                <p class="card-text">Browse through your beautiful photos.</p>
                                <a href="{{ route('admin.photos.index') }}" class="btn btn-primary">View Gallery</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title">Manage Profile</h5>
                                <p class="card-text">Update your profile and preferences.</p>
                                <a href="/profile" class="btn btn-primary">Edit Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif


    <footer class="mt-5 bg-light text-center py-3">
        <p>&copy; 2024 PhotoManager. All rights reserved.</p>
    </footer>
@endsection
