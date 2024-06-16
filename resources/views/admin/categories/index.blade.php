@extends('layouts.admin')

@section('content')
    <header>
        <div class="container">
            <h2 class="py-4">
                Categories
            </h2>
        </div>
    </header>


    <div class="container mt-4">
        @include('partials.message')
        @include('partials.errors')

        <div class="row">
            <div class="col-4">
                <form action="{{ route('admin.categories.store') }}" method="post">
                    @csrf

                    <div class="form-group">
                        <label for="name" class="form-label">Category Name</label>
                        <div class="input-group">
                            <input type="text" class="form-control" name="name" id="name" placeholder="Sport"
                                value="{{ old('name') }}">
                            <div class="input-group-append">
                                <button class="btn btn-primary mx-2" type="submit">
                                    <i class="fa fa-plus" aria-hidden="true"></i>
                                </button>
                            </div>
                        </div>
                        <small id="helpId" class="form-text text-muted">
                            Type the new category to add
                        </small>
                    </div>
                </form>
            </div>
            <div class="col-8">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-borderless table-primary align-middle mt-3 border">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Category Name</th>
                                <th class="text-center" scope="col">Posts</th>
                                <th class="text-center" scope="col">Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($categories as $category)
                                <tr>
                                    <td class="align-middle" scope="row">{{ $category->id }}</td>

                                    <td class="align-middle">

                                        <form action="{{ route('admin.categories.update', $category) }}" method="post">
                                            @csrf
                                            @method('PATCH')
                                            <div class="mb-3">
                                                <input type="text" class="form-control" name="name" id="name"
                                                    aria-describedby="helpId" placeholder=""
                                                    value="{{ $category->name }}" />
                                            </div>

                                        </form>

                                    </td>
                                    <td class="text-center">
                                        <span class="badge bg-success">
                                            {{ $category->photos->count() }}
                                        </span>
                                    </td>
                                    <td class="text-center">

                                        @include('partials.modal-category')

                                    </td>

                                </tr>
                            @empty

                                <tr class="">
                                    <td scope="row" colspan="5">No categories!</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

        </div>




    </div>
@endsection
