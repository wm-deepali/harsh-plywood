<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::latest()->paginate(10);

        return view('admin.testimonials.index', compact('testimonials'));
    }

    public function create()
    {
        return view('admin.testimonials.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'feedback' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename = Str::slug($request->title) . '-' . time() . '.' . $file->extension();

            $imageName = $file->storeAs(
                'testimonials',
                $filename,
                'public'
            );
        }

        Testimonial::create([
            'title' => $request->title,
            'designation' => $request->designation,
            'image' => $imageName,
            'feedback' => $request->feedback,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial Added Successfully');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        return view('admin.testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'designation' => 'nullable|string|max:255',
            'feedback' => 'required|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imageName = $testimonial->image;

        if ($request->hasFile('image')) {

            if ($testimonial->image &&
                Storage::disk('public')->exists($testimonial->image)) {

                Storage::disk('public')->delete($testimonial->image);
            }

            $file = $request->file('image');

            $filename = Str::slug($request->title) . '-' . time() . '.' . $file->extension();

            $imageName = $file->storeAs(
                'testimonials',
                $filename,
                'public'
            );
        }

        $testimonial->update([
            'title' => $request->title,
            'designation' => $request->designation,
            'image' => $imageName,
            'feedback' => $request->feedback,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.testimonials.index')
            ->with('success', 'Testimonial Updated Successfully');
    }

    public function destroy($id)
    {
        $testimonial = Testimonial::findOrFail($id);

        if ($testimonial->image &&
            Storage::disk('public')->exists($testimonial->image)) {

            Storage::disk('public')->delete($testimonial->image);
        }

        $testimonial->delete();

        return response()->json([
            'message' => 'Testimonial Deleted Successfully'
        ]);
    }
}