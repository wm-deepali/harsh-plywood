<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HiStyleWhyChoose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HiStyleWhyChooseController extends Controller
{
    public function index()
    {
        $items = HiStyleWhyChoose::latest()->paginate(10);

        return view('admin.hi_style_why_choose.index', compact('items'));
    }

    public function create()
    {
        return view('admin.hi_style_why_choose.create');
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
                ->store('hi_style_why_choose', 'public');

        }

        HiStyleWhyChoose::create([

            'title' => $request->title,

            'short_content' => $request->short_content,

            'icon' => $request->icon,

            'image' => $image,

            'status' => $request->status ? 1 : 0

        ]);

        return redirect()
            ->route('admin.hi_style_why_choose.index')
            ->with('success', 'Data Added Successfully');
    }

    public function edit($id)
    {
        $item = HiStyleWhyChoose::findOrFail($id);

        return view('admin.hi_style_why_choose.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = HiStyleWhyChoose::findOrFail($id);

        $request->validate([

            'title' => 'required|max:255',

            'short_content' => 'nullable',

            'icon' => 'nullable|max:255',

            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'

        ]);

        $image = $item->image;

        if($request->hasFile('image')) {

            if($item->image) {

                Storage::disk('public')
                    ->delete($item->image);

            }

            $image = $request->file('image')
                ->store('hi_style_why_choose', 'public');

        }

        $item->update([

            'title' => $request->title,

            'short_content' => $request->short_content,

            'icon' => $request->icon,

            'image' => $image,

            'status' => $request->status ? 1 : 0

        ]);

        return redirect()
            ->route('admin.hi_style_why_choose.index')
            ->with('success', 'Data Updated Successfully');
    }

    public function destroy($id)
    {
        $item = HiStyleWhyChoose::findOrFail($id);

        if($item->image) {

            Storage::disk('public')
                ->delete($item->image);

        }

        $item->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}