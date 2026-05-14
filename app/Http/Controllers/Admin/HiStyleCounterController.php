<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HiStyleCounter;
use App\Models\HiStylePage;
use Illuminate\Http\Request;

class HiStyleCounterController extends Controller
{
    public function index()
    {
        $hi_style = HiStylePage::first();

        $counters = HiStyleCounter::latest()->get();

        return view('admin.hi_style.counter-edit', compact(
            'hi_style',
            'counters'
        ));
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE SECTION
    |--------------------------------------------------------------------------
    */

    public function update(Request $request)
    {
        $request->validate([

            'counter_heading' => 'nullable|max:255',

            'counter_sub_heading' => 'nullable|max:255'

        ]);

        $hi_style = HiStylePage::first();

        if(!$hi_style) {

            $hi_style = new HiStylePage();

        }

        HiStylePage::updateOrCreate(

            ['id' => $hi_style->id ?? null],

            [

                'counter_heading' => $request->counter_heading,

                'counter_sub_heading' => $request->counter_sub_heading

            ]

        );

        return redirect()
            ->back()
            ->with('success', 'Counter Section Updated Successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | STORE COUNTER
    |--------------------------------------------------------------------------
    */

    public function storeCounter(Request $request)
    {
        $request->validate([

            'counter_title' => 'required|max:255',

            'counter_value' => 'required|max:255',

            'icon' => 'nullable|max:255'

        ]);

        HiStyleCounter::create([

            'counter_title' => $request->counter_title,

            'counter_value' => $request->counter_value,

            'icon' => $request->icon,

            'status' => 1

        ]);

        return redirect()
            ->back()
            ->with('success', 'Counter Added Successfully');
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE COUNTER
    |--------------------------------------------------------------------------
    */

    public function deleteCounter($id)
    {
        $counter = HiStyleCounter::findOrFail($id);

        $counter->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}