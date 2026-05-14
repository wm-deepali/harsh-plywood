<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Award;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AwardController extends Controller
{
    public function index()
    {
        $awards = Award::latest()->paginate(10);

        return view('admin.awards.index', compact('awards'));
    }

    public function create()
    {
        return view('admin.awards.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'  => 'nullable|string|max:255',
            'image'  => 'required|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'nullable'
        ]);

        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('awards', 'public');
        }

        Award::create([
            'title'  => $request->title,
            'image'  => $image,
            'status' => $request->status ? 1 : 0
        ]);

        return redirect()
            ->route('admin.awards.index')
            ->with('success', 'Added');
    }

    public function edit($id)
    {
        $award = Award::findOrFail($id);

        return view('admin.awards.edit', compact('award'));
    }

    public function update(Request $request, $id)
    {
        $award = Award::findOrFail($id);

        $request->validate([
            'title'  => 'nullable|string|max:255',
            'image'  => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'status' => 'nullable'
        ]);

        $image = $award->image;

        if ($request->hasFile('image')) {

            if ($award->image) {
                Storage::disk('public')->delete($award->image);
            }

            $image = $request->file('image')->store('awards', 'public');
        }

        $award->update([
            'title'  => $request->title,
            'image'  => $image,
            'status' => $request->status ? 1 : 0
        ]);

        return redirect()
            ->route('admin.awards.index')
            ->with('success', 'Updated');
    }

    public function destroy($id)
    {
        $award = Award::findOrFail($id);

        if ($award->image) {
            Storage::disk('public')->delete($award->image);
        }

        $award->delete();

        return response()->json([
            'message' => 'Deleted'
        ]);
    }
}