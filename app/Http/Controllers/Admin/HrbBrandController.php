<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HrbBrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HrbBrandController extends Controller
{
    public function index()
    {
        $brands = HrbBrand::latest()->paginate(10);

        return view(
            'admin.hrb-brand.index',
            compact('brands')
        );
    }

    public function create()
    {
        return view('admin.hrb-brand.create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'brand_name' => 'required|string|max:255',

            'brand_logo' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048'

        ], [

            'brand_name.required' =>
                'Brand name is required.',

            'brand_name.max' =>
                'Brand name may not be greater than 255 characters.',

            'brand_logo.required' =>
                'Brand logo is required.',

            'brand_logo.image' =>
                'Brand logo must be an image.',

            'brand_logo.mimes' =>
                'Brand logo must be JPG, JPEG, PNG or WEBP.',

            'brand_logo.max' =>
                'Brand logo size must be less than 2MB.'

        ]);

        try {

            $logo = null;

            // LOGO UPLOAD
            if ($request->hasFile('brand_logo')) {

                $logo = $request->file('brand_logo')
                    ->store('hrb-brands', 'public');

            }

            HrbBrand::create([

                'brand_name' => $request->brand_name,

                'brand_logo' => $logo,

                'status' => $request->status ? 1 : 0

            ]);

            return redirect()
                ->route('admin.hrb-brands.index')
                ->with(
                    'success',
                    'Brand Added Successfully.'
                );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong: ' . $e->getMessage()
                );

        }
    }

    /*
    |--------------------------------------------------------------------------
    | EDIT
    |--------------------------------------------------------------------------
    */

    public function edit($id)
    {
        $brand = HrbBrand::findOrFail($id);

        return view(
            'admin.hrb-brand.edit',
            compact('brand')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $brand = HrbBrand::findOrFail($id);

        $request->validate([

            'brand_name' => 'required|string|max:255',

            'brand_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'

        ], [

            'brand_name.required' =>
                'Brand name is required.',

            'brand_name.max' =>
                'Brand name may not be greater than 255 characters.',

            'brand_logo.image' =>
                'Brand logo must be an image.',

            'brand_logo.mimes' =>
                'Brand logo must be JPG, JPEG, PNG or WEBP.',

            'brand_logo.max' =>
                'Brand logo size must be less than 2MB.'

        ]);

        try {

            $logo = $brand->brand_logo;

            // LOGO UPLOAD
            if ($request->hasFile('brand_logo')) {

                // DELETE OLD LOGO
                if (
                    !empty($brand->brand_logo) &&
                    Storage::disk('public')->exists($brand->brand_logo)
                ) {

                    Storage::disk('public')
                        ->delete($brand->brand_logo);

                }

                $logo = $request->file('brand_logo')
                    ->store('hrb-brands', 'public');

            }

            $brand->update([

                'brand_name' => $request->brand_name,

                'brand_logo' => $logo,

                'status' => $request->status ? 1 : 0

            ]);

            return redirect()
                ->route('admin.hrb-brands.index')
                ->with(
                    'success',
                    'Brand Updated Successfully.'
                );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong: ' . $e->getMessage()
                );

        }
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE
    |--------------------------------------------------------------------------
    */

    public function destroy($id)
    {
        try {

            $brand = HrbBrand::findOrFail($id);

            // DELETE LOGO
            if (
                !empty($brand->brand_logo) &&
                Storage::disk('public')->exists($brand->brand_logo)
            ) {

                Storage::disk('public')
                    ->delete($brand->brand_logo);

            }

            $brand->delete();

            return response()->json([

                'status' => true,

                'message' => 'Deleted Successfully'

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'status' => false,

                'message' => 'Something went wrong.'

            ], 500);

        }
    }
}