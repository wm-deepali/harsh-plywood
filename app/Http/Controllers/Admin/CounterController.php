<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Counter;
use Illuminate\Http\Request;

class CounterController extends Controller
{
    public function index()
    {
        $counters = Counter::latest()
            ->get();

        return view(
            'admin.counters.index',
            compact('counters')
        );
    }

    public function create()
    {
        return view('admin.counters.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'title' => 'required|string|max:255',

            'counter_value' => 'required',

            'counter_suffix' => 'nullable|string|max:20',

            'icon' => 'nullable|string|max:255',

        ]);

        try {

            Counter::create([

                'title' => $request->title,

                'counter_value' => $request->counter_value,

                'counter_suffix' => $request->counter_suffix,

                'icon' => $request->icon,

                'status' => $request->has('status') ? 1 : 0

            ]);

            return redirect()
                ->route('admin.counters.index')
                ->with(
                    'success',
                    'Counter Added Successfully'
                );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong. Please try again later.'
                );
        }
    }

    public function edit($id)
    {
        $counter = Counter::findOrFail($id);

        return view(
            'admin.counters.edit',
            compact('counter')
        );
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'title' => 'required|string|max:255',

            'counter_value' => 'required',

            'counter_suffix' => 'nullable|string|max:20',

            'icon' => 'nullable|string|max:255',

        ]);

        try {

            $counter = Counter::findOrFail($id);

            $counter->update([

                'title' => $request->title,

                'counter_value' => $request->counter_value,

                'counter_suffix' => $request->counter_suffix,

                'icon' => $request->icon,

                'status' => $request->has('status') ? 1 : 0

            ]);

            return redirect()
                ->route('admin.counters.index')
                ->with(
                    'success',
                    'Counter Updated Successfully'
                );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong. Please try again later.'
                );
        }
    }

    public function destroy($id)
    {
        try {

            $counter = Counter::findOrFail($id);

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