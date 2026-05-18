<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomeVideoSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomeVideoSectionController extends Controller
{
    public function index()
    {
        $videoSection = HomeVideoSection::first();

        return view(
            'admin.home-video-section.index',
            compact('videoSection')
        );
    }

    public function update(Request $request)
    {
        $request->validate([
            'subtitle' => 'required|string|max:255',
            'title' => 'required|string|max:1000',

            'background_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'video_url' => [
                'required',
                'url',
            ],
        ], [

            'subtitle.required' => 'Subtitle is required.',
            'title.required' => 'Title is required.',

            'background_image.image' => 'Please upload a valid image.',
            'background_image.mimes' => 'Image must be jpg, jpeg, png or webp.',
            'background_image.max' => 'Image size must be less than 2MB.',

            'video_url.required' => 'Video URL is required.',
            'video_url.url' => 'Please enter a valid URL.',

        ]);

        try {

            $videoSection = HomeVideoSection::first();

            if (!$videoSection) {
                $videoSection = new HomeVideoSection();
            }

            $videoSection->subtitle = $request->subtitle;
            $videoSection->title = $request->title;
            $videoSection->video_url = $request->video_url;

            if ($request->hasFile('background_image')) {

                // delete old image
                if (
                    $videoSection->background_image &&
                    File::exists(
                        public_path(
                            'storage/' . $videoSection->background_image
                        )
                    )
                ) {
                    File::delete(
                        public_path(
                            'storage/' . $videoSection->background_image
                        )
                    );
                }

                $image = $request->file('background_image');

                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $image->storeAs(
                    'home-video-section',
                    $imageName,
                    'public'
                );

                $videoSection->background_image =
                    'home-video-section/' . $imageName;
            }

            $videoSection->save();

            return redirect()
                ->back()
                ->with('success', 'Video section updated successfully.');
        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with('error', 'Something went wrong. ' . $e->getMessage());
        }
    }
}