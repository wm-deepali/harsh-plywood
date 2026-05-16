<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {
        return view('admin.about.index');
    }

    /*
    |--------------------------------------------------------------------------
    | INTRODUCTION
    |--------------------------------------------------------------------------
    */

    public function editIntroduction()
    {
        $section = AboutSection::firstOrCreate([
            'type' => 'introduction'
        ]);

        return view(
            'admin.about.introduction.edit',
            compact('section')
        );
    }

    public function updateIntroduction(Request $request)
    {
        $request->validate([

            'heading' => 'nullable|string|max:255',

            'sub_heading' => 'nullable|string|max:255',

            'content' => 'nullable|string',

            'experience_year' => 'nullable|string|max:50',

            'experience_text' => 'nullable|string|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        $section = AboutSection::firstOrCreate([
            'type' => 'introduction'
        ]);

        $image = $section->image;

        if ($request->hasFile('image')) {

            if (
                $section->image &&
                \Storage::disk('public')->exists($section->image)
            ) {
                \Storage::disk('public')->delete($section->image);
            }

            $file = $request->file('image');

            $filename = time() . '-' . $file->getClientOriginalName();

            $image = $file->storeAs(
                'about',
                $filename,
                'public'
            );
        }

        $section->update([

            'heading' => $request->heading,

            'sub_heading' => $request->sub_heading,

            'content' => $request->content,

            'experience_year' => $request->experience_year,

            'experience_text' => $request->experience_text,

            'image' => $image,

        ]);

        return redirect()
            ->route('admin.about.index')
            ->with(
                'success',
                'Introduction Updated Successfully'
            );
    }
    /*
    |--------------------------------------------------------------------------
    | HISTORY
    |--------------------------------------------------------------------------
    */

    public function editHistory()
    {
        $section = AboutSection::firstOrCreate([
            'type' => 'history'
        ]);

        return view(
            'admin.about.history.edit',
            compact('section')
        );
    }

    public function updateHistory(Request $request)
    {
        $request->validate([

            'year' => 'nullable|string|max:50',

            'heading' => 'nullable|string|max:255',

            'content' => 'nullable|string',

            'icon' => 'nullable|string|max:255',

        ]);

        $section = AboutSection::firstOrCreate([
            'type' => 'history'
        ]);

        $section->update([

            'year' => $request->year,

            'heading' => $request->heading,

            'content' => $request->content,

            'icon' => $request->icon,

        ]);

        return redirect()
            ->route('admin.about.index')
            ->with(
                'success',
                'History Updated Successfully'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | VISION
    |--------------------------------------------------------------------------
    */

    public function editVision()
    {
        $section = AboutSection::firstOrCreate([
            'type' => 'vision'
        ]);

        return view(
            'admin.about.vision.edit',
            compact('section')
        );
    }

    public function updateVision(Request $request)
    {
        $request->validate([

            'heading' => 'nullable|string|max:255',

            'content' => 'nullable|string',

            'icon' => 'nullable|string|max:255',

            'point_1' => 'nullable|string|max:255',

            'point_2' => 'nullable|string|max:255',

            'point_3' => 'nullable|string|max:255',

        ]);

        $section = AboutSection::firstOrCreate([
            'type' => 'vision'
        ]);

        $section->update([

            'heading' => $request->heading,

            'content' => $request->content,

            'icon' => $request->icon,

            'point_1' => $request->point_1,

            'point_2' => $request->point_2,

            'point_3' => $request->point_3,

        ]);

        return redirect()
            ->route('admin.about.index')
            ->with(
                'success',
                'Vision Updated Successfully'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | MISSION
    |--------------------------------------------------------------------------
    */

    public function editMission()
    {
        $section = AboutSection::firstOrCreate([
            'type' => 'mission'
        ]);

        return view(
            'admin.about.mission.edit',
            compact('section')
        );
    }

    public function updateMission(Request $request)
    {
        $request->validate([

            'heading' => 'nullable|string|max:255',

            'content' => 'nullable|string',

            'icon' => 'nullable|string|max:255',

            'point_1' => 'nullable|string|max:255',

            'point_2' => 'nullable|string|max:255',

            'point_3' => 'nullable|string|max:255',

        ]);

        $section = AboutSection::firstOrCreate([
            'type' => 'mission'
        ]);

        $section->update([

            'heading' => $request->heading,

            'content' => $request->content,

            'icon' => $request->icon,

            'point_1' => $request->point_1,

            'point_2' => $request->point_2,

            'point_3' => $request->point_3,

        ]);

        return redirect()
            ->route('admin.about.index')
            ->with(
                'success',
                'Mission Updated Successfully'
            );
    }
}