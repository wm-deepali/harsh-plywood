<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Gallery;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    public function index()
    {
        $galleries = Gallery::latest()->paginate(10);

        return view('admin.galleries.index', compact('galleries'));
    }

    public function create()
    {
        return view('admin.galleries.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $file = $request->file('image');

        $filename = 'gallery-' . time() . '.' . $file->extension();

        $image = $file->storeAs(
            'galleries',
            $filename,
            'public'
        );

        Gallery::create([
            'title' => $request->title,
            'image' => $image,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Image Added Successfully');
    }

    public function edit($id)
    {
        $gallery = Gallery::findOrFail($id);

        return view('admin.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, $id)
    {
        $gallery = Gallery::findOrFail($id);

        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $image = $gallery->image;

        if ($request->hasFile('image')) {

            if ($gallery->image &&
                Storage::disk('public')->exists($gallery->image)) {

                Storage::disk('public')->delete($gallery->image);
            }

            $file = $request->file('image');

            $filename = 'gallery-' . time() . '.' . $file->extension();

            $image = $file->storeAs(
                'galleries',
                $filename,
                'public'
            );
        }

        $gallery->update([
            'title' => $request->title,
            'image' => $image,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.galleries.index')
            ->with('success', 'Updated Successfully');
    }

    public function destroy($id)
    {
        $gallery = Gallery::findOrFail($id);

        if ($gallery->image &&
            Storage::disk('public')->exists($gallery->image)) {

            Storage::disk('public')->delete($gallery->image);
        }

        $gallery->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}