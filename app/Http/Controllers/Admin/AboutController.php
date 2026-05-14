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
        $intro = AboutSection::where('type', 'introduction')->first();

        $history = AboutSection::where('type', 'history')->first();

        $vision = AboutSection::where('type', 'vision')->first();

        $mission = AboutSection::where('type', 'mission')->first();

        $team = AboutSection::where('type', 'team')
            ->latest()
            ->get();

        return view(
            'admin.about.index',
            compact(
                'intro',
                'history',
                'vision',
                'mission',
                'team'
            )
        );
    }

    public function updateSection(Request $request, $type)
    {
        $request->validate([

            'heading' => 'nullable|string|max:255',

            'sub_heading' => 'nullable|string|max:255',

            'content' => 'nullable|string',

        ]);

        $section = AboutSection::firstOrCreate([
            'type' => $type
        ]);

        $section->update([

            'heading' => $request->heading,

            'sub_heading' => $request->sub_heading,

            'content' => $request->content,

        ]);

        return back()->with(
            'success',
            ucfirst($type) . ' Updated Successfully'
        );
    }

    // TEAM STORE
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

    // TEAM DELETE
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