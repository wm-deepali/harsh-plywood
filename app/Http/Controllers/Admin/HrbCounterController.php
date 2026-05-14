<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HrbCounter;
use App\Models\HrbPage;
use Illuminate\Http\Request;

class HrbCounterController extends Controller
{
    public function index()
    {
        $hrb = HrbPage::first();

        $counters = HrbCounter::latest()->get();

        return view('admin.hrb.counter-edit', compact(
            'hrb',
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

        $hrb = HrbPage::first();

        if(!$hrb) {

            $hrb = new HrbPage();

        }

        HrbPage::updateOrCreate(

            ['id' => $hrb->id ?? null],

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

        HrbCounter::create([

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
        $counter = HrbCounter::findOrFail($id);

        $counter->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}