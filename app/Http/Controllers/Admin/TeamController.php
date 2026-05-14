<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::latest()->paginate(10);

        return view('admin.teams.index', compact('teams'));
    }

    public function create()
    {
        return view('admin.teams.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'name' => 'required|max:255',

            'designation' => 'nullable|max:255',

            'short_content' => 'nullable',

            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'

        ]);

        $image = null;

        if($request->hasFile('image')) {

            $image = $request->file('image')
                ->store('teams', 'public');

        }

        Team::create([

            'name' => $request->name,
            'designation' => $request->designation,
            'short_content' => $request->short_content,

            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,

            'image' => $image,

            'status' => $request->status ? 1 : 0

        ]);

        return redirect()
            ->route('admin.teams.index')
            ->with('success', 'Team Member Added Successfully');
    }

    public function edit($id)
    {
        $team = Team::findOrFail($id);

        return view('admin.teams.edit', compact('team'));
    }

    public function update(Request $request, $id)
    {
        $team = Team::findOrFail($id);

        $request->validate([

            'name' => 'required|max:255',

            'designation' => 'nullable|max:255',

            'short_content' => 'nullable',

            'facebook' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'twitter' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'

        ]);

        $image = $team->image;

        if($request->hasFile('image')) {

            if($team->image) {

                Storage::disk('public')
                    ->delete($team->image);

            }

            $image = $request->file('image')
                ->store('teams', 'public');

        }

        $team->update([

            'name' => $request->name,
            'designation' => $request->designation,
            'short_content' => $request->short_content,

            'facebook' => $request->facebook,
            'linkedin' => $request->linkedin,
            'twitter' => $request->twitter,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,

            'image' => $image,

            'status' => $request->status ? 1 : 0

        ]);

        return redirect()
            ->route('admin.teams.index')
            ->with('success', 'Team Member Updated Successfully');
    }

    public function destroy($id)
    {
        $team = Team::findOrFail($id);

        if($team->image) {

            Storage::disk('public')
                ->delete($team->image);

        }

        $team->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}