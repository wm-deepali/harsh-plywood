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

        return view(
            'admin.hi_style.counter-edit',
            compact(
                'hi_style',
                'counters'
            )
        );
    }

    /*
    |--------------------------------------------------------------------------
    | UPDATE SECTION
    |--------------------------------------------------------------------------
    */

    public function update(Request $request)
    {
        $request->validate([

            'counter_heading' =>
                'nullable|string|max:255',

            'counter_sub_heading' =>
                'nullable|string|max:255'

        ], [

            'counter_heading.max' =>
                'Counter heading may not be greater than 255 characters.',

            'counter_sub_heading.max' =>
                'Counter sub heading may not be greater than 255 characters.'

        ]);

        try {

            $hi_style = HiStylePage::first();

            if (!$hi_style) {

                $hi_style = new HiStylePage();

            }

            /*
            |--------------------------------------------------------------------------
            | UPDATE SECTION
            |--------------------------------------------------------------------------
            */

            HiStylePage::updateOrCreate(

                ['id' => $hi_style->id ?? null],

                [

                    'counter_heading' =>
                        $request->counter_heading,

                    'counter_sub_heading' =>
                        $request->counter_sub_heading

                ]

            );

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Counter Section Updated Successfully.'
                );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong: ' . $e->getMessage()
                );

        }
    }

    /*
    |--------------------------------------------------------------------------
    | STORE COUNTER
    |--------------------------------------------------------------------------
    */

    public function storeCounter(Request $request)
    {
        $request->validate([

            'counter_title' =>
                'required|string|max:255',

            'counter_value' =>
                'required|string|max:255',

            'icon' =>
                'nullable|string|max:255'

        ], [

            'counter_title.required' =>
                'Counter title is required.',

            'counter_title.max' =>
                'Counter title may not be greater than 255 characters.',

            'counter_value.required' =>
                'Counter value is required.',

            'counter_value.max' =>
                'Counter value may not be greater than 255 characters.',

            'icon.max' =>
                'Icon class may not be greater than 255 characters.'

        ]);

        try {

            HiStyleCounter::create([

                'counter_title' =>
                    $request->counter_title,

                'counter_value' =>
                    $request->counter_value,

                'icon' =>
                    $request->icon,

                'status' => 1

            ]);

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Counter Added Successfully.'
                );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong: ' . $e->getMessage()
                );

        }
    }

    /*
    |--------------------------------------------------------------------------
    | DELETE COUNTER
    |--------------------------------------------------------------------------
    */

    public function deleteCounter($id)
    {
        try {

            $counter = HiStyleCounter::findOrFail($id);

            $counter->delete();

            return response()->json([

                'status' => true,

                'message' => 'Deleted Successfully'

            ]);

        } catch (\Exception $e) {

            return response()->json([

                'status' => false,

                'message' => 'Something went wrong.'

            ], 500);

        }
    }
}