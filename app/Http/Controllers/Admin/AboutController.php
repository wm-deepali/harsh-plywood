<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

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

        ]);

        $section = AboutSection::firstOrCreate([
            'type' => 'introduction'
        ]);

        $section->update([

            'heading' => $request->heading,

            'sub_heading' => $request->sub_heading,

            'content' => $request->content,

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

            'heading' => 'nullable|string|max:255',

            'content' => 'nullable|string',

        ]);

        $section = AboutSection::firstOrCreate([
            'type' => 'history'
        ]);

        $section->update([

            'heading' => $request->heading,

            'content' => $request->content,

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

        ]);

        $section = AboutSection::firstOrCreate([
            'type' => 'vision'
        ]);

        $section->update([

            'heading' => $request->heading,

            'content' => $request->content,

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

        ]);

        $section = AboutSection::firstOrCreate([
            'type' => 'mission'
        ]);

        $section->update([

            'heading' => $request->heading,

            'content' => $request->content,

        ]);

        return redirect()
            ->route('admin.about.index')
            ->with(
                'success',
                'Mission Updated Successfully'
            );
    }

    /*
    |--------------------------------------------------------------------------
    | TEAM
    |--------------------------------------------------------------------------
    */

    public function teamIndex()
    {
        $team = AboutSection::where('type', 'team')
            ->latest()
            ->get();

        return view(
            'admin.about.team.index',
            compact('team')
        );
    }

    public function storeTeam(Request $request)
    {
        $request->validate([

            'title' => 'required|string|max:255',

            'designation' => 'nullable|string|max:255',

            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',

        ]);

        $image = null;

        if ($request->hasFile('image')) {

            $file = $request->file('image');

            $filename =
                Str::slug($request->title)
                . '-' . time()
                . '.' . $file->extension();

            $image = $file->storeAs(
                'about',
                $filename,
                'public'
            );
        }

        AboutSection::create([

            'type' => 'team',

            'title' => $request->title,

            'designation' => $request->designation,

            'image' => $image

        ]);

        return back()->with(
            'success',
            'Team Member Added Successfully'
        );
    }

    public function deleteTeam($id)
    {
        $team = AboutSection::findOrFail($id);

        if (
            $team->image &&
            Storage::disk('public')->exists($team->image)
        ) {
            Storage::disk('public')->delete($team->image);
        }

        $team->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}