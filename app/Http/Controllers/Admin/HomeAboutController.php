<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeAboutFeature;
use App\Models\HomeAboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeAboutController extends Controller
{
    public function index()
    {
        $section = HomeAboutSection::first();

        $features = HomeAboutFeature::latest()
            ->get();

        return view(
            'admin.home_about.index',
            compact(
                'section',
                'features'
            )
        );
    }

    public function update(Request $request)
    {
        $request->validate([

            'sub_heading' => 'nullable|string|max:255',

            'heading' => 'nullable|string|max:255',

            'description' => 'nullable|string',

            'award_title' => 'nullable|string|max:255',

            'award_icon' => 'nullable|string|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        $section = HomeAboutSection::first();

        if (!$section) {

            $section = new HomeAboutSection();

        }

        $image = $section->image;

        if ($request->hasFile('image')) {

            if (
                $section->image &&
                Storage::disk('public')->exists($section->image)
            ) {
                Storage::disk('public')->delete($section->image);
            }

            $file = $request->file('image');

            $filename =
                time() . '-' .
                $file->getClientOriginalName();

            $image = $file->storeAs(
                'home-about',
                $filename,
                'public'
            );
        }

        $section->updateOrCreate(
            ['id' => $section->id ?? null],
            [

                'sub_heading' => $request->sub_heading,

                'heading' => $request->heading,

                'description' => $request->description,

                'award_title' => $request->award_title,

                'award_icon' => $request->award_icon,

                'image' => $image,

            ]
        );

        return redirect()
            ->back()
            ->with(
                'success',
                'Home About Section Updated Successfully'
            );
    }

    public function storeFeature(Request $request)
    {
        $request->validate([

            'title' => 'required|string|max:255',

            'icon' => 'nullable|string|max:255',

        ]);

        HomeAboutFeature::create([

            'title' => $request->title,

            'icon' => $request->icon,

            'status' => $request->has('status') ? 1 : 0

        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Feature Added Successfully'
            );
    }

    public function updateFeature(Request $request, $id)
    {
        $request->validate([

            'title' => 'required|string|max:255',

            'icon' => 'nullable|string|max:255',

        ]);

        $feature = HomeAboutFeature::findOrFail($id);

        $feature->update([

            'title' => $request->title,

            'icon' => $request->icon,

            'status' => $request->has('status') ? 1 : 0

        ]);

        return redirect()
            ->back()
            ->with(
                'success',
                'Feature Updated Successfully'
            );
    }

    public function deleteFeature($id)
    {
        $feature = HomeAboutFeature::findOrFail($id);

        $feature->delete();

        return response()->json([

            'message' => 'Deleted Successfully'

        ]);
    }
}