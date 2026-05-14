<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductCategoryController extends Controller
{
    public function index()
    {
        $categories = ProductCategory::latest()->paginate(10);

        return view('admin.product_categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.product_categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'heading' => 'nullable|string|max:255',
            'sub_heading' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename = Str::slug($request->name)
                . '-' . time()
                . '.' . $file->extension();

            $imageName = $file->storeAs(
                'product-categories',
                $filename,
                'public'
            );
        }

        ProductCategory::create([
            'name' => $request->name,

            'slug' => $request->slug
                ? Str::slug($request->slug)
                : Str::slug($request->name),

            'heading' => $request->heading,

            'sub_heading' => $request->sub_heading,

            'short_description' => $request->short_description,

            'image' => $imageName,

            'meta_title' => $request->meta_title ?? $request->name,

            'meta_description' => $request->meta_description,

            'status' => $request->has('status') ? 1 : 0
        ]);

        return redirect()
            ->route('admin.product-categories.index')
            ->with('success', 'Category Created Successfully');
    }

    public function edit($id)
    {
        $category = ProductCategory::findOrFail($id);

        return view('admin.product_categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = ProductCategory::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255',
            'heading' => 'nullable|string|max:255',
            'sub_heading' => 'nullable|string|max:255',
            'short_description' => 'nullable|string',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        $imageName = $category->image;

        if ($request->hasFile('image')) {

            if (
                $category->image &&
                Storage::disk('public')->exists($category->image)
            ) {
                Storage::disk('public')->delete($category->image);
            }

            $file = $request->file('image');

            $filename = Str::slug($request->name)
                . '-' . time()
                . '.' . $file->extension();

            $imageName = $file->storeAs(
                'product-categories',
                $filename,
                'public'
            );
        }

        $category->update([
            'name' => $request->name,

            'slug' => $request->slug
                ? Str::slug($request->slug)
                : Str::slug($request->name),

            'heading' => $request->heading,

            'sub_heading' => $request->sub_heading,

            'short_description' => $request->short_description,

            'image' => $imageName,

            'meta_title' => $request->meta_title ?? $request->name,

            'meta_description' => $request->meta_description,

            'status' => $request->has('status') ? 1 : 0
        ]);

        return redirect()
            ->route('admin.product-categories.index')
            ->with('success', 'Category Updated Successfully');
    }

    public function destroy($id)
    {
        $category = ProductCategory::findOrFail($id);

        if (
            $category->image &&
            Storage::disk('public')->exists($category->image)
        ) {
            Storage::disk('public')->delete($category->image);
        }

        $category->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}