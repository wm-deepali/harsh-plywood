<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HrbWhyChoose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HrbWhyChooseController extends Controller
{
    public function index()
    {
        $items = HrbWhyChoose::latest()->paginate(10);

        return view(
            'admin.hrb-why-choose.index',
            compact('items')
        );
    }

    public function create()
    {
        return view('admin.hrb-why-choose.create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|string|max:255',

            'short_content' => 'nullable|string',

            'icon' => 'nullable|string|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'

        ], [

            'title.required' =>
                'Title is required.',

            'title.max' =>
                'Title may not be greater than 255 characters.',

            'icon.max' =>
                'Icon class may not be greater than 255 characters.',

            'image.image' =>
                'Image must be an image.',

            'image.mimes' =>
                'Image must be JPG, JPEG, PNG or WEBP.',

            'image.max' =>
                'Image size must be less than 2MB.'

        ]);

        try {

            $image = null;

            // IMAGE UPLOAD
            if ($request->hasFile('image')) {

                $image = $request->file('image')
                    ->store('hrb-why-choose', 'public');

            }

            HrbWhyChoose::create([

                'title' => $request->title,

                'short_content' => $request->short_content,

                'icon' => $request->icon,

                'image' => $image,

                'status' => $request->status ? 1 : 0

            ]);

            return redirect()
                ->route('admin.hrb-why-choose.index')
                ->with(
                    'success',
                    'Data Added Successfully.'
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
        $item = HrbWhyChoose::findOrFail($id);

        return view(
            'admin.hrb-why-choose.edit',
            compact('item')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $item = HrbWhyChoose::findOrFail($id);

        $request->validate([

            'title' => 'required|string|max:255',

            'short_content' => 'nullable|string',

            'icon' => 'nullable|string|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'

        ], [

            'title.required' =>
                'Title is required.',

            'title.max' =>
                'Title may not be greater than 255 characters.',

            'icon.max' =>
                'Icon class may not be greater than 255 characters.',

            'image.image' =>
                'Image must be an image.',

            'image.mimes' =>
                'Image must be JPG, JPEG, PNG or WEBP.',

            'image.max' =>
                'Image size must be less than 2MB.'

        ]);

        try {

            $image = $item->image;

            // IMAGE UPLOAD
            if ($request->hasFile('image')) {

                // DELETE OLD IMAGE
                if (
                    !empty($item->image) &&
                    Storage::disk('public')->exists($item->image)
                ) {

                    Storage::disk('public')
                        ->delete($item->image);

                }

                $image = $request->file('image')
                    ->store('hrb-why-choose', 'public');

            }

            $item->update([

                'title' => $request->title,

                'short_content' => $request->short_content,

                'icon' => $request->icon,

                'image' => $image,

                'status' => $request->status ? 1 : 0

            ]);

            return redirect()
                ->route('admin.hrb-why-choose.index')
                ->with(
                    'success',
                    'Data Updated Successfully.'
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

            $item = HrbWhyChoose::findOrFail($id);

            // DELETE IMAGE
            if (
                !empty($item->image) &&
                Storage::disk('public')->exists($item->image)
            ) {

                Storage::disk('public')
                    ->delete($item->image);

            }

            $item->delete();

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