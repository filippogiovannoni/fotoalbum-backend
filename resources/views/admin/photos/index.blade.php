@extends('layouts.admin')

@section('content')
    <div class="container">
        <a href="{{ route('admin.photos.create') }}" class="btn btn-primary">
            Add Photo
        </a>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-borderless table-secondary align-middle mt-3">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Featured</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($photos as $photo)
                        <tr class="">
                            <td>{{ $photo->id }}</td>
                            <td>{{ $photo->title }}</td>
                            <td>{{ $photo->description }}</td>
                            <td scope="row">
                                img
                            </td>
                            <td>{{ $photo->featured == null ? 'No' : 'Yes' }}</td>
                            <td>Create / Edit / Delete</td>
                        </tr>

                    @empty
                        <tr class="">
                            <td> No photos yet!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
