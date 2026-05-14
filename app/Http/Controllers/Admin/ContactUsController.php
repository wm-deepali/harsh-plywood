<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $contacts = ContactUs::latest()->paginate(10);

        return view('admin.contact-us.index', compact('contacts'));
    }

    public function create()
    {
        return view('admin.contact-us.create');
    }

    public function store(Request $request)
    {
        $request->validate([

            'type'        => 'required|max:255',
            'title'       => 'required|max:255',
            'description' => 'nullable',
            'address'     => 'required',
            'phone'       => 'required|max:20',
            'email'       => 'required|email',
            'timing'      => 'nullable|max:255',
            'map_iframe'  => 'nullable'

        ]);

        ContactUs::create([

            'type'        => $request->type,
            'title'       => $request->title,
            'description' => $request->description,
            'address'     => $request->address,
            'phone'       => $request->phone,
            'email'       => $request->email,
            'timing'      => $request->timing,
            'map_iframe'  => $request->map_iframe,
            'status'      => $request->status ? 1 : 0

        ]);

        return redirect()
            ->route('admin.contact-us.index')
            ->with('success', 'Contact Added Successfully');
    }

    public function edit($id)
    {
        $contact = ContactUs::findOrFail($id);

        return view('admin.contact-us.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = ContactUs::findOrFail($id);

        $request->validate([

            'type'        => 'required|max:255',
            'title'       => 'required|max:255',
            'description' => 'nullable',
            'address'     => 'required',
            'phone'       => 'required|max:20',
            'email'       => 'required|email',
            'timing'      => 'nullable|max:255',
            'map_iframe'  => 'nullable'

        ]);

        $contact->update([

            'type'        => $request->type,
            'title'       => $request->title,
            'description' => $request->description,
            'address'     => $request->address,
            'phone'       => $request->phone,
            'email'       => $request->email,
            'timing'      => $request->timing,
            'map_iframe'  => $request->map_iframe,
            'status'      => $request->status ? 1 : 0

        ]);

        return redirect()
            ->route('admin.contact-us.index')
            ->with('success', 'Contact Updated Successfully');
    }

    public function destroy($id)
    {
        $contact = ContactUs::findOrFail($id);

        $contact->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }
}