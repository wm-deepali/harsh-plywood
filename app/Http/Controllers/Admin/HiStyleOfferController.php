<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HiStyleOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HiStyleOfferController extends Controller
{
    /**
     * Display all offers
     */
    public function index()
    {
        $offers = HiStyleOffer::latest()->paginate(10);

        return view('admin.hi_style_offers.index', compact('offers'));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('admin.hi_style_offers.create');
    }

    /**
     * Store new offer
     */
    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|string|max:255',

            'short_content' => 'nullable|string',

            'icon' => 'nullable|string|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ], [

            'title.required' => 'Title field is required.',

            'title.max' => 'Title may not exceed 255 characters.',

            'image.image' => 'Please upload a valid image file.',

            'image.mimes' => 'Image must be jpg, jpeg, png or webp format.',

            'image.max' => 'Image size must not exceed 2MB.',

        ]);

        try {

            $image = null;

            if ($request->hasFile('image')) {

                $image = $request->file('image')
                    ->store('hi_style_offers', 'public');
            }

            HiStyleOffer::create([

                'title' => $request->title,

                'short_content' => $request->short_content,

                'icon' => $request->icon,

                'image' => $image,

                'status' => $request->status ? 1 : 0

            ]);

            return redirect()
                ->route('admin.hi-style-offers.index')
                ->with('success', 'Offer Added Successfully');
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong while adding the offer.');
        }
    }

    /**
     * Show edit form
     */
    public function edit($id)
    {
        try {

            $offer = HiStyleOffer::findOrFail($id);

            return view('admin.hi_style_offers.edit', compact('offer'));

        } catch (\Exception $e) {

            return redirect()
                ->route('admin.hi-style-offers.index')
                ->with('error', 'Offer not found.');
        }
    }

    /**
     * Update existing offer
     */
    public function update(Request $request, $id)
    {
        try {

            $offer = HiStyleOffer::findOrFail($id);

            $request->validate([

                'title' => 'required|string|max:255',

                'short_content' => 'nullable|string',

                'icon' => 'nullable|string|max:255',

                'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            ], [

                'title.required' => 'Title field is required.',

                'title.max' => 'Title may not exceed 255 characters.',

                'image.image' => 'Please upload a valid image file.',

                'image.mimes' => 'Image must be jpg, jpeg, png or webp format.',

                'image.max' => 'Image size must not exceed 2MB.',

            ]);

            $image = $offer->image;

            if ($request->hasFile('image')) {

                // Delete old image
                if ($offer->image && Storage::disk('public')->exists($offer->image)) {

                    Storage::disk('public')->delete($offer->image);
                }

                // Upload new image
                $image = $request->file('image')
                    ->store('hi_style_offers', 'public');
            }

            $offer->update([

                'title' => $request->title,

                'short_content' => $request->short_content,

                'icon' => $request->icon,

                'image' => $image,

                'status' => $request->status ? 1 : 0

            ]);

            return redirect()
                ->route('admin.hi-style-offers.index')
                ->with('success', 'Offer Updated Successfully');

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong while updating the offer.');
        }
    }

    /**
     * Delete offer
     */
    public function destroy($id)
    {
        try {

            $offer = HiStyleOffer::findOrFail($id);

            // Delete image
            if ($offer->image && Storage::disk('public')->exists($offer->image)) {

                Storage::disk('public')->delete($offer->image);
            }

            $offer->delete();

            return response()->json([

                'status' => true,

                'message' => 'Offer Deleted Successfully'

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'status' => false,

                'message' => 'Something went wrong while deleting.'

            ], 500);
        }
    }
}