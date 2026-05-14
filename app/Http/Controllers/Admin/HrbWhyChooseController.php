<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HrbWhyChoose;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HrbWhyChooseController extends Controller
{
    public function index()
    {
        $items = HrbWhyChoose::latest()->paginate(10);

        return view('admin.hrb-why-choose.index', compact('items'));
    }

    public function create()
    {
        return view('admin.hrb-why-choose.create');
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
                ->store('hrb-why-choose', 'public');

        }

        HrbWhyChoose::create([

            'title' => $request->title,

            'short_content' => $request->short_content,

            'icon' => $request->icon,

            'image' => $image,

            'status' => $request->status ? 1 : 0

        ]);

        return redirect()
            ->route('admin.hrb-why-choose.index')
            ->with('success', 'Data Added Successfully');
    }

    public function edit($id)
    {
        $item = HrbWhyChoose::findOrFail($id);

        return view('admin.hrb-why-choose.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = HrbWhyChoose::findOrFail($id);

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
                ->store('hrb-why-choose', 'public');

        }

        $item->update([

            'title' => $request->title,

            'short_content' => $request->short_content,

            'icon' => $request->icon,

            'image' => $image,

            'status' => $request->status ? 1 : 0

        ]);

        return redirect()
            ->route('admin.hrb-why-choose.index')
            ->with('success', 'Data Updated Successfully');
    }

    public function destroy($id)
    {
        $item = HrbWhyChoose::findOrFail($id);

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