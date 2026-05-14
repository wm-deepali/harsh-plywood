<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::latest()->get();

        return view('admin.blogs.index', compact('blogs'));
    }

    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:blogs,slug',
            'short_description' => 'nullable|string|max:1000',
            'content' => 'required|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $slug = $request->slug
            ? Str::slug($request->slug)
            : Str::slug($request->title);

        if (empty($slug)) {
            $slug = str_replace(' ', '-', $request->title);
        }

        $imageName = null;

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename = Str::slug($request->title)
                . '-' . time()
                . '.' . $file->extension();

            $imageName = $file->storeAs(
                'blogs',
                $filename,
                'public'
            );
        }

        Blog::create([
            'title' => $request->title,

            'slug' => $slug,

            'meta_title' => $request->meta_title ?? $request->title,

            'meta_description' => $request->meta_description
                ?? Str::limit(strip_tags($request->content), 150),

            'image' => $imageName,

            'short_description' => $request->short_description,

            'content' => $request->content,

            'show_home' => $request->has('show_home') ? 1 : 0,

            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog Added Successfully');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);

        return view('admin.blogs.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',

            'slug' => 'nullable|string|max:255|unique:blogs,slug,' . $blog->id,

            'short_description' => 'nullable|string|max:1000',

            'content' => 'required|string',

            'meta_title' => 'nullable|string|max:255',

            'meta_description' => 'nullable|string|max:500',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $slug = $request->slug
            ? Str::slug($request->slug)
            : Str::slug($request->title);

        if (empty($slug)) {
            $slug = str_replace(' ', '-', $request->title);
        }

        $imageName = $blog->image;

        if ($request->hasFile('image')) {

            if (
                $blog->image &&
                Storage::disk('public')->exists($blog->image)
            ) {
                Storage::disk('public')->delete($blog->image);
            }

            $file = $request->file('image');

            $filename = Str::slug($request->title)
                . '-' . time()
                . '.' . $file->extension();

            $imageName = $file->storeAs(
                'blogs',
                $filename,
                'public'
            );
        }

        $blog->update([
            'title' => $request->title,

            'slug' => $slug,

            'meta_title' => $request->meta_title ?? $request->title,

            'meta_description' => $request->meta_description
                ?? Str::limit(strip_tags($request->content), 150),

            'image' => $imageName,

            'short_description' => $request->short_description,

            'content' => $request->content,

            'show_home' => $request->has('show_home') ? 1 : 0,

            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.blogs.index')
            ->with('success', 'Blog Updated Successfully');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if (
            $blog->image &&
            Storage::disk('public')->exists($blog->image)
        ) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return response()->json([
            'message' => 'Blog Deleted Successfully'
        ]);
    }
}