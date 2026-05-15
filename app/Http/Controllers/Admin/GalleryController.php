<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use App\Models\GalleryCategory;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::with('category')
            ->latest()
            ->paginate(10);

        return view(
            'admin.galleries.index',
            compact('galleries')
        );
    }

    public function create()
    {
        $categories = GalleryCategory::where('status', 1)
            ->latest()
            ->get();

        return view(
            'admin.galleries.create',
            compact('categories')
        );
    }

    public function store(Request $request)
    {
        $request->validate([

            'gallery_category_id' => 'required|exists:gallery_categories,id',

            'title' => 'nullable|string|max:255',

            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        $file = $request->file('image');

        $filename =
            'gallery-' .
            time() .
            '.' .
            $file->extension();

        $image = $file->storeAs(
            'galleries',
            $filename,
            'public'
        );

        Gallery::create([

            'gallery_category_id' => $request->gallery_category_id,

            'title' => $request->title,

            'image' => $image,

            'status' => $request->has('status') ? 1 : 0,

        ]);

        return redirect()
            ->route('admin.galleries.index')
            ->with(
                'success',
                'Image Added Successfully'
            );
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);

        $categories = GalleryCategory::where('status', 1)
            ->latest()
            ->get();

        return view(
            'admin.galleries.edit',
            compact(
                'gallery',
                'categories'
            )
        );
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([

            'gallery_category_id' => 'required|exists:gallery_categories,id',

            'title' => 'nullable|string|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        $image = $gallery->image;

        if ($request->hasFile('image')) {

            if (
                $gallery->image &&
                Storage::disk('public')->exists($gallery->image)
            ) {

                Storage::disk('public')->delete($gallery->image);
            }

            $file = $request->file('image');

            $filename =
                'gallery-' .
                time() .
                '.' .
                $file->extension();

            $image = $file->storeAs(
                'galleries',
                $filename,
                'public'
            );
        }

        $gallery->update([

            'gallery_category_id' => $request->gallery_category_id,

            'title' => $request->title,

            'image' => $image,

            'status' => $request->has('status') ? 1 : 0,

        ]);

        return redirect()
            ->route('admin.galleries.index')
            ->with(
                'success',
                'Updated Successfully'
            );
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if (
            $gallery->image &&
            Storage::disk('public')->exists($gallery->image)
        ) {

            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}