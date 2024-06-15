@extends('layouts.admin')

@section('content')
    <header class="bg-dark text-white py-4">
        <div class="container d-flex justify-content-between align-items-center">
            <h1>
                {{ $photo->title }}
            </h1>
            <a class="btn btn-primary" href="{{ route('admin.photos.index') }}">
                <i class="fas fa-chevron-left fa-sm fa-fw"></i> All Photos</a>
        </div>
    </header>


    <div class="container mt-5">

        <div class="row">
            <div class="col-7">
                <img width="500px" style="aspect-ratio : 1; object-fit:cover" loading="lazy"
                    src="{{ asset('storage/' . $photo->image_url) }}">
            </div>
            <div class="col-5">
                <em>Category:</em>
                <span class="badge text-bg-info mb-3">{{ $photo->category ? $photo->category->name : 'No category' }}</span>
                <div>{!! $photo->description ?? '<em>No Description Available</em>' !!}</div>

            </div>

        </div>
    @endsection
