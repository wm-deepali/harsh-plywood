<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyChooseFeature;
use App\Models\WhyChooseSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WhyChooseController extends Controller
{
    public function index()
    {
        $section = WhyChooseSection::first();

        $features = WhyChooseFeature::latest()->get();

        return view(
            'admin.why_choose.index',
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

            'main_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'small_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        try {

            $section = WhyChooseSection::first();

            if (!$section) {

                $section = new WhyChooseSection();

            }

            $mainImage = $section->main_image;

            if ($request->hasFile('main_image')) {

                if (
                    $section->main_image &&
                    Storage::disk('public')->exists($section->main_image)
                ) {

                    Storage::disk('public')->delete($section->main_image);

                }

                $mainImage = $request->file('main_image')
                    ->store('why-choose', 'public');
            }

            $smallImage = $section->small_image;

            if ($request->hasFile('small_image')) {

                if (
                    $section->small_image &&
                    Storage::disk('public')->exists($section->small_image)
                ) {

                    Storage::disk('public')->delete($section->small_image);

                }

                $smallImage = $request->file('small_image')
                    ->store('why-choose', 'public');
            }

            WhyChooseSection::updateOrCreate(
                ['id' => $section->id ?? null],
                [

                    'sub_heading' => $request->sub_heading,

                    'heading' => $request->heading,

                    'description' => $request->description,

                    'main_image' => $mainImage,

                    'small_image' => $smallImage,

                ]
            );

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Section Updated Successfully'
                );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong. Please try again later.'
                );
        }
    }

    public function storeFeature(Request $request)
    {
        $request->validate([

            'position' => 'required',

            'title' => 'required|string|max:255',

            'description' => 'nullable|string',

            'icon' => 'nullable|string|max:255',

        ]);

        try {

            WhyChooseFeature::create([

                'position' => $request->position,

                'title' => $request->title,

                'description' => $request->description,

                'icon' => $request->icon,

                'status' => $request->has('status') ? 1 : 0

            ]);

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Feature Added Successfully'
                );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong. Please try again later.'
                );
        }
    }

    public function updateFeature(Request $request, $id)
    {
        $request->validate([

            'position' => 'required',

            'title' => 'required|string|max:255',

            'description' => 'nullable|string',

            'icon' => 'nullable|string|max:255',

        ]);

        try {

            $feature = WhyChooseFeature::findOrFail($id);

            $feature->update([

                'position' => $request->position,

                'title' => $request->title,

                'description' => $request->description,

                'icon' => $request->icon,

                'status' => $request->has('status') ? 1 : 0

            ]);

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Feature Updated Successfully'
                );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong. Please try again later.'
                );
        }
    }

    public function deleteFeature($id)
    {
        try {

            $feature = WhyChooseFeature::findOrFail($id);

            $feature->delete();

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