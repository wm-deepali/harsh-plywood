<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeroSlider;
use Illuminate\Support\Facades\Storage;

class HeroSliderController extends Controller
{
    public function index()
    {
        $sliders = HeroSlider::latest()
            ->paginate(10);

        return view(
            'admin.hero-sliders.index',
            compact('sliders')
        );
    }

    public function create()
    {
        return view('admin.hero-sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'subtitle' => 'nullable|max:255',

            'heading' => 'required|max:255',

            'description' => 'nullable',

            'button_text' => 'nullable|max:255',

            'button_link' => 'nullable|max:255',

            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',

            'sort_order' => 'nullable|integer',

        ]);

        $image = null;

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename =
                'hero-slider-' .
                time() .
                '.' .
                $file->extension();

            $image = $file->storeAs(
                'hero-sliders',
                $filename,
                'public'
            );
        }

        HeroSlider::create([

            'subtitle' => $request->subtitle,

            'heading' => $request->heading,

            'description' => $request->description,

            'button_text' => $request->button_text,

            'button_link' => $request->button_link,

            'image' => $image,

            'sort_order' => $request->sort_order ?? 0,

            'status' => $request->has('status') ? 1 : 0,

        ]);

        return redirect()
            ->route('admin.hero-sliders.index')
            ->with(
                'success',
                'Slider Added Successfully'
            );
    }

    public function edit($id)
    {
        $slider = HeroSlider::findOrFail($id);

        return view(
            'admin.hero-sliders.edit',
            compact('slider')
        );
    }

    public function update(Request $request, $id)
    {
        $slider = HeroSlider::findOrFail($id);

        $request->validate([

            'subtitle' => 'nullable|max:255',

            'heading' => 'required|max:255',

            'description' => 'nullable',

            'button_text' => 'nullable|max:255',

            'button_link' => 'nullable|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',

            'sort_order' => 'nullable|integer',

        ]);

        $image = $slider->image;

        if ($request->hasFile('image')) {

            if (
                $slider->image &&
                Storage::disk('public')->exists($slider->image)
            ) {

                Storage::disk('public')->delete($slider->image);
            }

            $file = $request->file('image');

            $filename =
                'hero-slider-' .
                time() .
                '.' .
                $file->extension();

            $image = $file->storeAs(
                'hero-sliders',
                $filename,
                'public'
            );
        }

        $slider->update([

            'subtitle' => $request->subtitle,

            'heading' => $request->heading,

            'description' => $request->description,

            'button_text' => $request->button_text,

            'button_link' => $request->button_link,

            'image' => $image,

            'sort_order' => $request->sort_order ?? 0,

            'status' => $request->has('status') ? 1 : 0,

        ]);

        return redirect()
            ->route('admin.hero-sliders.index')
            ->with(
                'success',
                'Slider Updated Successfully'
            );
    }

    public function destroy($id)
    {
        $slider = HeroSlider::findOrFail($id);

        if (
            $slider->image &&
            Storage::disk('public')->exists($slider->image)
        ) {

            Storage::disk('public')->delete($slider->image);
        }

        $slider->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}