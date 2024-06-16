<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Photo;

class PhotoController extends Controller
{

    public function index(Request $request)
    {
        if ($request->has('category_id')) {
            $photos = Photo::with(['category', 'user'])->where('category_id', $request->category_id)->orderByDesc('id')->paginate();

            return response()->json([
                'success' => true,
                'results' => $photos,
            ]);
        }

        $photos =  Photo::with(['category', 'user'])->orderByDesc('id')->paginate();

        return response()->json([
            'success' => true,
            'results' => $photos,
        ]);
    }

    public function show($id)
    {
        $photo = Photo::with(['user', 'category'])->where('id', $id)->first();

        if ($photo) {
            return response()->json([
                'success' => true,
                'results' => $photo,
            ]);
        } else {
            return response()->json([
                'success' => false,
                'result' => 'Error 404 no result found.',
            ]);
        }
    }
}
