<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HrbSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HrbController extends Controller
{
    public function index()
    {
        $hero = HrbSection::where('type', 'hero')->first();
        $detail = HrbSection::where('type', 'detail')->first();
        $detail2 = HrbSection::where('type', 'detail2')->first();
        $affiliations = HrbSection::where('type', 'affiliation')->get();

        return view('admin.hrb.index', compact('hero', 'detail', 'detail2', 'affiliations'));
    }

    public function updateSection(Request $request, $type)
    {
        $section = HrbSection::firstOrCreate(['type' => $type]);

        $data = $request->only(['heading', 'sub_heading', 'short_description', 'content', 'button_text']);

        if ($request->hasFile('image')) {

            if ($section->image) {
                Storage::disk('public')->delete($section->image);
            }

            $data['image'] = $request->file('image')->store('hrb', 'public');
        }

        $section->update($data);

        return back()->with('success', 'Updated');
    }

    // affiliation add
    public function storeAffiliation(Request $request)
    {
        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('hrb', 'public');
        }

        HrbSection::create([
            'type' => 'affiliation',
            'title' => $request->title,
            'image' => $image
        ]);

        return back()->with('success', 'Added');
    }

    // delete affiliation
    public function deleteAffiliation($id)
    {
        $item = HrbSection::findOrFail($id);

        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return response()->json(['message' => 'Deleted']);
    }

    public function hiStyle()
    {
        $hero = HrbSection::where('page', 'hi_style')->where('type', 'hero')->first();
        $detail = HrbSection::where('page', 'hi_style')->where('type', 'detail')->first();
        $detail2 = HrbSection::where('page', 'hi_style')->where('type', 'detail2')->first();
        $affiliations = HrbSection::where('page', 'hi_style')->where('type', 'affiliation')->get();

        return view('admin.hi_style.index', compact('hero', 'detail', 'detail2', 'affiliations'));
    }

    public function updateHiStyle(Request $request, $type)
    {
        $section = HrbSection::firstOrCreate([
            'page' => 'hi_style',
            'type' => $type
        ]);

        $data = $request->only(['heading', 'sub_heading', 'short_description', 'content', 'button_text']);

        if ($request->hasFile('image')) {

            if ($section->image) {
                Storage::disk('public')->delete($section->image);
            }

            $data['image'] = $request->file('image')->store('hi_style', 'public');
        }

        $section->update($data);

        return back()->with('success', 'Updated');
    }

    public function storeHiStyleAff(Request $request)
    {
        $image = null;

        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('hi_style', 'public');
        }

        HrbSection::create([
            'page' => 'hi_style',
            'type' => 'affiliation',
            'title' => $request->title,
            'image' => $image
        ]);

        return back()->with('success', 'Added');
    }

    public function deleteHiStyleAff($id)
    {
        $item = HrbSection::findOrFail($id);

        if ($item->image) {
            Storage::disk('public')->delete($item->image);
        }

        $item->delete();

        return response()->json(['message' => 'Deleted']);
    }

}