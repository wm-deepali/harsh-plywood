<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HiStyleBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HiStyleBrandController extends Controller
{
    public function index()
    {
        $brands = HiStyleBrand::latest()->paginate(10);

        return view('admin.hi_style_brand.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.hi_style_brand.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'brand_name' => 'required|max:255',

            'brand_logo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'

        ]);

        $logo = null;

        if($request->hasFile('brand_logo')) {

            $logo = $request->file('brand_logo')
                ->store('hi_style_brand', 'public');

        }

        HiStyleBrand::create([

            'brand_name' => $request->brand_name,

            'brand_logo' => $logo,

            'status' => $request->status ? 1 : 0

        ]);

        return redirect()
            ->route('admin.hi_style_brand.index')
            ->with('success', 'Brand Added Successfully');
    }

    public function edit($id)
    {
        $brand = HiStyleBrand::findOrFail($id);

        return view('admin.hi_style_brand.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = HiStyleBrand::findOrFail($id);

        $request->validate([

            'brand_name' => 'required|max:255',

            'brand_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'

        ]);

        $logo = $brand->brand_logo;

        if($request->hasFile('brand_logo')) {

            if($brand->brand_logo) {

                Storage::disk('public')
                    ->delete($brand->brand_logo);

            }

            $logo = $request->file('brand_logo')
                ->store('hi_style_brand', 'public');

        }

        $brand->update([

            'brand_name' => $request->brand_name,

            'brand_logo' => $logo,

            'status' => $request->status ? 1 : 0

        ]);

        return redirect()
            ->route('admin.hi_style_brand.index')
            ->with('success', 'Brand Updated Successfully');
    }

    public function destroy($id)
    {
        $brand = HiStyleBrand::findOrFail($id);

        if($brand->brand_logo) {

            Storage::disk('public')
                ->delete($brand->brand_logo);

        }

        $brand->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}