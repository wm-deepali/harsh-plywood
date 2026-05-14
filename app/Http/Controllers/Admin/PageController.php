<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Page;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::latest()->paginate(10);

        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:pages,slug',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:500',
            'content' => 'nullable|string',
        ]);

        Page::create([
            'title' => $request->title,

            'slug' => $request->slug
                ? Str::slug($request->slug)
                : Str::slug($request->title),

            'meta_title' => $request->meta_title ?? $request->title,

            'meta_description' => $request->meta_description
                ?? Str::limit(strip_tags($request->content), 150),

            'content' => $request->content,

            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page Created Successfully');
    }

    public function edit($id)
    {
        $page = Page::findOrFail($id);

        return view('admin.pages.edit', compact('page'));
    }

    public function update(Request $request, $id)
    {
        $page = Page::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',

            'slug' => 'nullable|string|max:255|unique:pages,slug,' . $page->id,

            'meta_title' => 'nullable|string|max:255',

            'meta_description' => 'nullable|string|max:500',

            'content' => 'nullable|string',
        ]);

        $page->update([
            'title' => $request->title,

            'slug' => $request->slug
                ? Str::slug($request->slug)
                : Str::slug($request->title),

            'meta_title' => $request->meta_title ?? $request->title,

            'meta_description' => $request->meta_description
                ?? Str::limit(strip_tags($request->content), 150),

            'content' => $request->content,

            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()
            ->route('admin.pages.index')
            ->with('success', 'Page Updated Successfully');
    }

    public function destroy($id)
    {
        Page::findOrFail($id)->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}