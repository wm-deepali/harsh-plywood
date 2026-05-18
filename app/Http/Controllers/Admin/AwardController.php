<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AwardController extends Controller
{
    public function index()
    {
        $awards = Award::latest()->paginate(10);

        return view(
            'admin.awards.index',
            compact('awards')
        );
    }

    public function create()
    {
        return view('admin.awards.create');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE
    |--------------------------------------------------------------------------
    */

    public function store(Request $request)
    {
        $request->validate([

            'title' =>
                'nullable|string|max:255',

            'image' =>
                'required|image|mimes:jpg,jpeg,png,webp|max:2048',

            'status' =>
                'nullable'

        ], [

            'title.max' =>
                'Title may not be greater than 255 characters.',

            'image.required' =>
                'Image is required.',

            'image.image' =>
                'Uploaded file must be an image.',

            'image.mimes' =>
                'Image must be JPG, JPEG, PNG or WEBP format.',

            'image.max' =>
                'Image size must be less than 2MB.'

        ]);

        try {

            $image = null;

            // IMAGE UPLOAD
            if ($request->hasFile('image')) {

                $image = $request->file('image')
                    ->store('awards', 'public');

            }

            Award::create([

                'title' => $request->title,

                'image' => $image,

                'status' => $request->status ? 1 : 0

            ]);

            return redirect()
                ->route('admin.awards.index')
                ->with(
                    'success',
                    'Award Added Successfully.'
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
        $award = Award::findOrFail($id);

        return view(
            'admin.awards.edit',
            compact('award')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $award = Award::findOrFail($id);

        $request->validate([

            'title' =>
                'nullable|string|max:255',

            'image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'status' =>
                'nullable'

        ], [

            'title.max' =>
                'Title may not be greater than 255 characters.',

            'image.image' =>
                'Uploaded file must be an image.',

            'image.mimes' =>
                'Image must be JPG, JPEG, PNG or WEBP format.',

            'image.max' =>
                'Image size must be less than 2MB.'

        ]);

        try {

            $image = $award->image;

            // IMAGE UPDATE
            if ($request->hasFile('image')) {

                // DELETE OLD IMAGE
                if (
                    !empty($award->image) &&
                    Storage::disk('public')->exists($award->image)
                ) {

                    Storage::disk('public')
                        ->delete($award->image);

                }

                $image = $request->file('image')
                    ->store('awards', 'public');

            }

            $award->update([

                'title' => $request->title,

                'image' => $image,

                'status' => $request->status ? 1 : 0

            ]);

            return redirect()
                ->route('admin.awards.index')
                ->with(
                    'success',
                    'Award Updated Successfully.'
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

            $award = Award::findOrFail($id);

            // DELETE IMAGE
            if (
                !empty($award->image) &&
                Storage::disk('public')->exists($award->image)
            ) {

                Storage::disk('public')
                    ->delete($award->image);

            }

            $award->delete();

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