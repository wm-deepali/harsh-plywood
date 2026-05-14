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

        return view('admin.hrb-offers.index', compact('offers'));
    }

    public function create()
    {
        return view('admin.hrb-offers.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|max:255',

            'short_content' => 'nullable',

            'icon' => 'nullable|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'

        ]);

        $image = null;

        if($request->hasFile('image')) {

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
            ->with('success', 'Offer Added Successfully');
    }

    public function edit($id)
    {
        $offer = HrbOffer::findOrFail($id);

        return view('admin.hrb-offers.edit', compact('offer'));
    }

    public function update(Request $request, $id)
    {
        $offer = HrbOffer::findOrFail($id);

        $request->validate([

            'title' => 'required|max:255',

            'short_content' => 'nullable',

            'icon' => 'nullable|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'

        ]);

        $image = $offer->image;

        if($request->hasFile('image')) {

            if($offer->image) {

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
            ->with('success', 'Offer Updated Successfully');
    }

    public function destroy($id)
    {
        $offer = HrbOffer::findOrFail($id);

        if($offer->image) {

            Storage::disk('public')
                ->delete($offer->image);

        }

        $offer->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}