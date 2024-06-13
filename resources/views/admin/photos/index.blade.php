@extends('layouts.admin')

@section('content')
    <div class="container">
        @include('partials.message')
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
                            <td>{!! $photo->description ?? '<em>No Description Available</em>' !!}</td>
                            <td scope="row">
                                <img width="100" src="{{ asset('storage/' . $photo->image_url) }}" alt="">
                            </td>
                            <td>{{ $photo->featured == null ? 'No' : 'Yes' }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('admin.photos.show', $photo) }}"><i
                                        class="fa fa-eye"></i></a>
                                <a class="btn btn-secondary btn-sm" href="{{ route('admin.photos.edit', $photo) }}"><i
                                        class="fa fa-pencil"></i></a>
                            </td>
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
