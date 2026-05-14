<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')
            ->latest()
            ->paginate(10);

        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        $categories = ProductCategory::where('status', 1)->get();

        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([

            'category_id' => 'required|exists:product_categories,id',

            'name' => 'required|string|max:255',

            'product_info' => 'nullable|string',

            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        $product = Product::create([

            'category_id' => $request->category_id,

            'name' => $request->name,

            'product_info' => $request->product_info,

            'status' => $request->status ? 1 : 0

        ]);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $file) {

                if (!$file) {
                    continue;
                }

                $filename =
                    Str::slug($request->name)
                    . '-' . time()
                    . '-' . rand(1000,9999)
                    . '.' . $file->extension();

                $path = $file->storeAs(
                    'products',
                    $filename,
                    'public'
                );

                ProductImage::create([

                    'product_id' => $product->id,

                    'image' => $path

                ]);
            }
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product Created Successfully');
    }

    public function edit($id)
    {
        $product = Product::with('images')->findOrFail($id);

        $categories = ProductCategory::where('status', 1)->get();

        return view(
            'admin.products.edit',
            compact('product', 'categories')
        );
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([

            'category_id' => 'required|exists:product_categories,id',

            'name' => 'required|string|max:255',

            'product_info' => 'nullable|string',

            'images.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        $product->update([

            'category_id' => $request->category_id,

            'name' => $request->name,

            'product_info' => $request->product_info,

            'status' => $request->status ? 1 : 0

        ]);

        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $file) {

                if (!$file) {
                    continue;
                }

                $filename =
                    Str::slug($request->name)
                    . '-' . time()
                    . '-' . rand(1000,9999)
                    . '.' . $file->extension();

                $path = $file->storeAs(
                    'products',
                    $filename,
                    'public'
                );

                ProductImage::create([

                    'product_id' => $product->id,

                    'image' => $path

                ]);
            }
        }

        return redirect()
            ->route('admin.products.index')
            ->with('success', 'Product Updated Successfully');
    }

    public function destroy($id)
    {
        $product = Product::with('images')->findOrFail($id);

        foreach ($product->images as $img) {

            if (
                $img->image &&
                Storage::disk('public')->exists($img->image)
            ) {
                Storage::disk('public')->delete($img->image);
            }

            $img->delete();
        }

        $product->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }

    public function deleteImage($id)
    {
        $image = ProductImage::findOrFail($id);

        if (
            $image->image &&
            Storage::disk('public')->exists($image->image)
        ) {
            Storage::disk('public')->delete($image->image);
        }

        $image->delete();

        return response()->json([
            'message' => 'Image deleted successfully'
        ]);
    }
}