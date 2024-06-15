@extends('layouts.admin')

@section('content')
    <header class="bg-dark text-white py-4">
        <div class="container d-flex justify-content-between align-items-center">
            <h3>
                Editing photo: {{ $photo->title }}
            </h3>
            <a class="btn btn-primary" href="{{ route('admin.photos.index') }}">
                <i class="fas fa-chevron-left fa-sm fa-fw"></i> All Photos</a>
        </div>
    </header>
    <div class="container">
        @include('partials.errors')
        <form action="{{ route('admin.photos.update', $photo) }}" method="post" enctype="multipart/form-data" id="formEdit">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelper"
                    placeholder="My weekend" value="{{ old('title', $photo->title) }}" />
                <small id="titleHelper" class="form-text text-muted">Insert the photo title</small>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3">{{ old('description', $photo->description) }}</textarea>
                <small id="descriptionHelper" class="form-text text-muted">Insert the photo description</small>
            </div>

            <div class="my-3 d-flex gap-3">
                <div>
                    <img width="100" src="{{ asset('storage/' . $photo->image_url) }}" alt="">
                </div>
                <div class="w-100">
                    <label for="image_url" class="form-label">Current Image</label>
                    <input type="file" class="form-control" name="image_url" id="image_url"
                        aria-describedby="coverImageHelper">

                    <small id="image_urlHelper" class="form-text text-muted">Insert the new image</small>
                </div>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select form-select-md" name="category_id" id="category_id">
                    <option selected disabled>Select one</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $category->id == old('category_id', $photo->category->id) ? 'selected' : '' }}>
                            {{ $category->name }}</option>
                    @endforeach
                </select>
            </div>

            <span>Featured</span>
            <div class="mb-3">
                <label class="pe-2">
                    <input type="radio" name="featured" id="featured" value="1"
                        {{ old('featured', $photo->featured) == 1 ? 'checked' : '' }}> Yes
                </label>
                <label>
                    <input type="radio" name="featured" id="featured" value="0"
                        {{ old('featured', $photo->featured) == 0 ? 'checked' : '' }}> No
                </label>
            </div>

            <button class="btn btn-primary" type="submit">
                Edit ✍🏻
            </button>

        </form>
    </div>
@endsection
