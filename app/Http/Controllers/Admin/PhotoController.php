<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StorePhotoRequest;
use App\Http\Requests\UpdatePhotoRequest;
use App\Models\Photo;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $photos = Photo::all();

        return view('admin.photos.index', compact('photos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = [];
        return view('admin.photos.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePhotoRequest $request)
    {
        // Save validated data from request
        $val_data = $request->validated();

        // Add cover image
        $val_data['image_url'] = Storage::put('uploads', $request->image_url);

        // Create
        Photo::create($val_data);
        // dd($val_data);


        // redirect
        return to_route('admin.photos.index')->with('message', 'Photo added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Photo $photo)
    {
        return view('admin.photos.show', compact('photo'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Photo $photo)
    {
        $categories = [];
        return view('admin.photos.edit', compact('photo', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePhotoRequest $request, Photo $photo)
    {

        // Validate
        $val_data = $request->validated();

        if ($request->has('image_url')) {

            Storage::delete($photo->image_url);

            // Upload the new photo
            $val_data['image_url'] = Storage::put('uploads', $request->image_url);
        }

        // Update the photo
        $photo->update($val_data);

        // Redirect
        return to_route('admin.photos.index')->with('message', 'Photo updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Photo $photo)
    {
        // Delete the photo from the storage that is required
        Storage::delete($photo->image_url);

        $photo->delete();

        return to_route('admin.photos.index')->with('message', 'Photo deleted with success!');
    }
}
