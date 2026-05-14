<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{
    public function index()
    {
        $brands = Brand::latest()->paginate(10);

        return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'brand_name' => 'required|max:255',
            'image'      => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'

        ]);

        $image = null;

        if($request->hasFile('image')) {

            $image = $request->file('image')
                ->store('brands', 'public');

        }

        Brand::create([

            'brand_name'     => $request->brand_name,
            'image'          => $image,
            'show_home'      => $request->show_home ? 1 : 0,
            'show_brand_page'=> $request->show_brand_page ? 1 : 0,
            'status'         => $request->status ? 1 : 0

        ]);

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Brand Added Successfully');
    }

    public function edit($id)
    {
        $brand = Brand::findOrFail($id);

        return view('admin.brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);

        $request->validate([

            'brand_name' => 'required|max:255',
            'image'      => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'

        ]);

        $image = $brand->image;

        if($request->hasFile('image')) {

            if($brand->image) {

                Storage::disk('public')
                    ->delete($brand->image);

            }

            $image = $request->file('image')
                ->store('brands', 'public');

        }

        $brand->update([

            'brand_name'      => $request->brand_name,
            'image'           => $image,
            'show_home'       => $request->show_home ? 1 : 0,
            'show_brand_page' => $request->show_brand_page ? 1 : 0,
            'status'          => $request->status ? 1 : 0

        ]);

        return redirect()
            ->route('admin.brands.index')
            ->with('success', 'Brand Updated Successfully');
    }

    public function destroy($id)
    {
        $brand = Brand::findOrFail($id);

        if($brand->image) {

            Storage::disk('public')
                ->delete($brand->image);

        }

        $brand->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}