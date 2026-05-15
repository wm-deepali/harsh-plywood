<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\GalleryCategory;
use Illuminate\Http\Request;

class GalleryCategoryController extends Controller
{
    public function index()
    {
        $categories = GalleryCategory::latest()->paginate(10);

        return view(
            'admin.gallery-categories.index',
            compact('categories')
        );
    }

    public function create()
    {
        return view('admin.gallery-categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|max:255',

        ]);

        GalleryCategory::create([

            'name' => $request->name,

            'status' => $request->has('status') ? 1 : 0,

        ]);

        return redirect()
            ->route('admin.gallery-categories.index')
            ->with(
                'success',
                'Category Added Successfully'
            );
    }

    public function edit($id)
    {
        $category = GalleryCategory::findOrFail($id);

        return view(
            'admin.gallery-categories.edit',
            compact('category')
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'name' => 'required|max:255',

        ]);

        $category = GalleryCategory::findOrFail($id);

        $category->update([

            'name' => $request->name,

            'status' => $request->has('status') ? 1 : 0,

        ]);

        return redirect()
            ->route('admin.gallery-categories.index')
            ->with(
                'success',
                'Updated Successfully'
            );
    }

    public function destroy($id)
    {
        $category = GalleryCategory::findOrFail($id);

        $category->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}