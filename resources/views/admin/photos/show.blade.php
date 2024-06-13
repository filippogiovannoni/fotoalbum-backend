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
                <img loading="lazy" class="card-img-top w-75" src="{{ asset('storage/' . $photo->image_url) }}">
            </div>
            <div class="col-5">
                <h4>Photo Description</h4>
                <div>{{ $photo->description }}</div>

            </div>

        </div>
    @endsection
