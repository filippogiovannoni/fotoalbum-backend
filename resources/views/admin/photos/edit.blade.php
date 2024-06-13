@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('partials.errors')
        <h3 class="my-2">
            Editing photo: {{ $photo->title }}
        </h3>
        <form action="{{ route('admin.photos.update', $photo) }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" name="title" id="title" aria-describedby="titleHelper"
                    placeholder="My weekend" />
                <small id="titleHelper" class="form-text text-muted">Insert the photo title</small>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="description" rows="3"></textarea>
                <small id="descriptionHelper" class="form-text text-muted">Insert the photo description</small>
            </div>

            <div class="my-3">
                <label for="image_url" class="form-label">Image</label>
                <input type="file" class="form-control" name="image_url" id="image_url"
                    aria-describedby="coverImageHelper">

                <small id="image_urlHelper" class="form-text text-muted">Insert the image</small>
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select class="form-select form-select-md" name="category" id="category">
                    <option selected disabled>Select one</option>
                    @foreach ($categories as $category)
                        <option>{{ $category }}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-check mb-3">
                <label class="form-check-label" for="featured">Featured</label>
                <input class="form-check-input" type="checkbox" value="1" id="featured" />
            </div>

            <button class="btn btn-primary" type="submit">
                Edit ✍🏻
            </button>

        </form>

    </div>
@endsection
