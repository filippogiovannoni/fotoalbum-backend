@extends('layouts.admin')

@section('content')
    <div class="container mt-4">
        @include('partials.message')
        <a href="{{ route('admin.photos.create') }}" class="btn btn-primary">
            <i class="fa fa-plus-circle" aria-hidden="true"></i> Photo
        </a>

        <div class="table-responsive">
            <table class="table table-striped table-hover table-borderless table-primary align-middle mt-3 border">
                <thead class="table-dark">
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
                        <tr>
                            <td>{{ $photo->id }}</td>
                            <td><strong>
                                    {{ $photo->title }}
                                </strong></td>
                            <td><em>{!! $photo->description ?? '<em>No Description Available</em>' !!}</em></td>
                            <td scope="row">
                                <img style="aspect-ratio:1; object-fit:cover" width="150"
                                    src="{{ asset('storage/' . $photo->image_url) }}" alt="">
                            </td>
                            <td class="text-center">{{ $photo->featured == null ? 'No' : 'Yes' }}</td>
                            <td class="text-center">
                                <a class="btn btn-primary btn-sm mb-1" href="{{ route('admin.photos.show', $photo) }}"><i
                                        class="fa fa-eye"></i></a>
                                <a class="btn btn-secondary btn-sm mb-1" href="{{ route('admin.photos.edit', $photo) }}"><i
                                        class="fa fa-pencil"></i></a>

                                @include('partials.modal-delete')
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
        {{ $photos->links('vendor.pagination.bootstrap-5') }}
    </div>
@endsection
