<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HeaderFooterSetting;
use Illuminate\Support\Facades\Storage;

class HeaderFooterSettingController extends Controller
{
    public function edit()
    {
        $data = HeaderFooterSetting::first();

        return view(
            'admin.settings.header_footer',
            compact('data')
        );
    }

    public function update(Request $request)
    {
        $request->validate([

            'header_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'footer_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'whatsapp' => 'nullable|string|max:20',

            'mobile' => 'nullable|string|max:20',

            'address' => 'nullable|string',

            'short_content' => 'nullable|string',

            'copyright' => 'nullable|string|max:255',

        ]);

        $data = HeaderFooterSetting::first();

        if (!$data) {
            $data = new HeaderFooterSetting();
        }

        // Header Logo
        if ($request->hasFile('header_logo')) {

            if (
                $data->header_logo &&
                Storage::disk('public')->exists($data->header_logo)
            ) {
                Storage::disk('public')->delete($data->header_logo);
            }

            $file = $request->file('header_logo');

            $filename =
                'header-logo-' . time() . '.' . $file->extension();

            $data->header_logo = $file->storeAs(
                'settings',
                $filename,
                'public'
            );
        }

        // Footer Logo
        if ($request->hasFile('footer_logo')) {

            if (
                $data->footer_logo &&
                Storage::disk('public')->exists($data->footer_logo)
            ) {
                Storage::disk('public')->delete($data->footer_logo);
            }

            $file = $request->file('footer_logo');

            $filename =
                'footer-logo-' . time() . '.' . $file->extension();

            $data->footer_logo = $file->storeAs(
                'settings',
                $filename,
                'public'
            );
        }

        $data->whatsapp = $request->whatsapp;

        $data->mobile = $request->mobile;

        $data->address = $request->address;

        $data->short_content = $request->short_content;

        $data->copyright = $request->copyright;

        $data->save();

        return back()->with(
            'success',
            'Header & Footer Settings Updated Successfully'
        );
    }
}