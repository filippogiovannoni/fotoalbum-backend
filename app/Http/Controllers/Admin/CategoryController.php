<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        // Validate
        $val_data = $request->validated();

        // Create
        Category::create($val_data);

        // Redirect
        return to_route('admin.categories.index')->with('message', 'Category added with success!');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        // Validate
        $val_data = $request->validated();

        // Update
        $category->update($val_data);

        // Redirect
        return to_route('admin.categories.index')->with('message', 'Category updated with success!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return to_route('admin.categories.index')->with('message', 'Category deleted with success!');
    }
}
