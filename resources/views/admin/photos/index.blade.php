@extends('layouts.admin')

@section('content')
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped table-hover table-borderless table-secondary align-middle mt-3">
                <thead class="table-light">
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Category</th>
                        <th>Featured</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">
                    @forelse ($photos as $photo)
                        <tr class="">
                            <td scope="row">
                                img
                            </td>
                            <td>{{ $photo->name }}</td>
                            <td>{{ $photo->language }}</td>
                            <td>{{ $photo->slug }}</td>
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
