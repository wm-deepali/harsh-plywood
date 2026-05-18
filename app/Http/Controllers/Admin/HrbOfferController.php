<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HrbOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HrbOfferController extends Controller
{
    public function index()
    {
        $offers = HrbOffer::latest()->paginate(10);

        return view(
            'admin.hrb-offers.index',
            compact('offers')
        );
    }

    public function create()
    {
        return view('admin.hrb-offers.create');
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
                    ->store('hrb-offers', 'public');

            }

            HrbOffer::create([

                'title' => $request->title,

                'short_content' => $request->short_content,

                'icon' => $request->icon,

                'image' => $image,

                'status' => $request->status ? 1 : 0

            ]);

            return redirect()
                ->route('admin.hrb-offers.index')
                ->with(
                    'success',
                    'Offer Added Successfully.'
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
        $offer = HrbOffer::findOrFail($id);

        return view(
            'admin.hrb-offers.edit',
            compact('offer')
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE
    |--------------------------------------------------------------------------
    */

    public function update(Request $request, $id)
    {
        $offer = HrbOffer::findOrFail($id);

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

            $image = $offer->image;

            // IMAGE UPLOAD
            if ($request->hasFile('image')) {

                // DELETE OLD IMAGE
                if (
                    !empty($offer->image) &&
                    Storage::disk('public')->exists($offer->image)
                ) {

                    Storage::disk('public')
                        ->delete($offer->image);

                }

                $image = $request->file('image')
                    ->store('hrb-offers', 'public');

            }

            $offer->update([

                'title' => $request->title,

                'short_content' => $request->short_content,

                'icon' => $request->icon,

                'image' => $image,

                'status' => $request->status ? 1 : 0

            ]);

            return redirect()
                ->route('admin.hrb-offers.index')
                ->with(
                    'success',
                    'Offer Updated Successfully.'
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

            $offer = HrbOffer::findOrFail($id);

            // DELETE IMAGE
            if (
                !empty($offer->image) &&
                Storage::disk('public')->exists($offer->image)
            ) {

                Storage::disk('public')
                    ->delete($offer->image);

            }

            $offer->delete();

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