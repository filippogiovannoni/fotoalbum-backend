@extends('layouts.admin')

@section('content')
    <header class="bg-dark text-white py-4">
        <div class="container d-flex justify-content-between align-items-center">
            <h3>
                Adding photo
            </h3>
            <a class="btn btn-primary" href="{{ route('admin.photos.index') }}">
                <i class="fas fa-chevron-left fa-sm fa-fw"></i> All Photos</a>
        </div>
    </header>



    <div class="container">
        @include('partials.errors')
        <form action="{{ route('admin.photos.store') }}" method="post" enctype="multipart/form-data">
            @csrf
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

            <div class="form-group form-check mb-3">
                <input type="checkbox" class="form-check-input" id="featured" name="featured" value="1"
                    {{ old('featured') ? 'checked' : '' }}>
                <label class="form-check-label" for="featured">Featured</label>
            </div>

            <button class="btn btn-primary" type="submit">
                Add 📷
            </button>

        </form>

    </div>
@endsection
