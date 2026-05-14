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

        return view('admin.hrb-brands.index', compact('brands'));
    }

    public function create()
    {
        return view('admin.hrb-brands.create');
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
                ->store('hrb-brands', 'public');

        }

        HrbBrand::create([

            'brand_name' => $request->brand_name,

            'brand_logo' => $logo,

            'status' => $request->status ? 1 : 0

        ]);

        return redirect()
            ->route('admin.hrb-brands.index')
            ->with('success', 'Brand Added Successfully');
    }

    public function edit($id)
    {
        $brand = HrbBrand::findOrFail($id);

        return view('admin.hrb-brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = HrbBrand::findOrFail($id);

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
                ->store('hrb-brands', 'public');

        }

        $brand->update([

            'brand_name' => $request->brand_name,

            'brand_logo' => $logo,

            'status' => $request->status ? 1 : 0

        ]);

        return redirect()
            ->route('admin.hrb-brands.index')
            ->with('success', 'Brand Updated Successfully');
    }

    public function destroy($id)
    {
        $brand = HrbBrand::findOrFail($id);

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