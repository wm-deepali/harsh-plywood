<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HiStyleBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HiStyleBrandController extends Controller
{
    /**
     * Display all brands
     */
    public function index()
    {
        $brands = HiStyleBrand::latest()->paginate(10);

        return view('admin.hi_style_brand.index', compact('brands'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.hi_style_brand.create');
    }

    /**
     * Store new brand
     */
    public function store(Request $request)
    {
        $request->validate([

            'brand_name' => 'required|string|max:255',

            'brand_logo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

        ], [

            'brand_name.required' => 'Brand name is required.',

            'brand_logo.required' => 'Brand logo is required.',

            'brand_logo.image' => 'Please upload a valid image.',

            'brand_logo.mimes' => 'Logo must be jpg, jpeg, png or webp format.',

            'brand_logo.max' => 'Logo size must not exceed 2MB.',

        ]);

        try {

            $logo = null;

            if ($request->hasFile('brand_logo')) {

                $logo = $request->file('brand_logo')
                    ->store('hi_style_brand', 'public');
            }

            HiStyleBrand::create([

                'brand_name' => $request->brand_name,

                'brand_logo' => $logo,

                'status' => $request->status ? 1 : 0

            ]);

            return redirect()
                ->route('admin.hi-style-brands.index')
                ->with('success', 'Brand Added Successfully');

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong while adding the brand.');
        }
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        try {

            $brand = HiStyleBrand::findOrFail($id);

            return view('admin.hi_style_brand.edit', compact('brand'));

        } catch (\Exception $e) {

            return redirect()
                ->route('admin.hi-style-brands.index')
                ->with('error', 'Brand not found.');
        }
    }

    /**
     * Update brand
     */
    public function update(Request $request, $id)
    {
        try {

            $brand = HiStyleBrand::findOrFail($id);

            $request->validate([

                'brand_name' => 'required|string|max:255',

                'brand_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            ], [

                'brand_name.required' => 'Brand name is required.',

                'brand_logo.image' => 'Please upload a valid image.',

                'brand_logo.mimes' => 'Logo must be jpg, jpeg, png or webp format.',

                'brand_logo.max' => 'Logo size must not exceed 2MB.',

            ]);

            $logo = $brand->brand_logo;

            if ($request->hasFile('brand_logo')) {

                // Delete old logo
                if ($brand->brand_logo && Storage::disk('public')->exists($brand->brand_logo)) {

                    Storage::disk('public')->delete($brand->brand_logo);
                }

                // Upload new logo
                $logo = $request->file('brand_logo')
                    ->store('hi_style_brand', 'public');
            }

            $brand->update([

                'brand_name' => $request->brand_name,

                'brand_logo' => $logo,

                'status' => $request->status ? 1 : 0

            ]);

            return redirect()
                ->route('admin.hi-style-brands.index')
                ->with('success', 'Brand Updated Successfully');

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong while updating the brand.');
        }
    }

    /**
     * Delete brand
     */
    public function destroy($id)
    {
        try {

            $brand = HiStyleBrand::findOrFail($id);

            // Delete logo
            if ($brand->brand_logo && Storage::disk('public')->exists($brand->brand_logo)) {

                Storage::disk('public')->delete($brand->brand_logo);
            }

            $brand->delete();

            return response()->json([

                'status' => true,

                'message' => 'Brand Deleted Successfully'

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'status' => false,

                'message' => 'Something went wrong while deleting.'

            ], 500);
        }
    }
}