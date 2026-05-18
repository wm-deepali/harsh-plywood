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
        try {

            $data = HeaderFooterSetting::first();

            return view(
                'admin.settings.header_footer',
                compact('data')
            );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->with(
                    'error',
                    'Something went wrong: ' . $e->getMessage()
                );

        }
    }

    public function update(Request $request)
    {
        $request->validate([

            'header_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'footer_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'whatsapp' => 'nullable|string|max:20',

            'mobile' => 'nullable|string|max:20',

            'email' => 'nullable|email',

            'address' => 'nullable|string',

            'short_content' => 'nullable|string',

            'copyright' => 'nullable|string|max:255',

        ], [

            'header_logo.image' => 'Header logo must be an image.',
            'header_logo.mimes' => 'Header logo must be JPG, JPEG, PNG or WEBP.',
            'header_logo.max' => 'Header logo max size is 2MB.',

            'footer_logo.image' => 'Footer logo must be an image.',
            'footer_logo.mimes' => 'Footer logo must be JPG, JPEG, PNG or WEBP.',
            'footer_logo.max' => 'Footer logo max size is 2MB.',

            'email.email' => 'Please enter a valid email address.',

            'whatsapp.max' => 'WhatsApp number is too long.',
            'mobile.max' => 'Mobile number is too long.',

            'copyright.max' => 'Copyright text max length is 255 characters.',

        ]);

        try {

            $data = HeaderFooterSetting::first();

            if (!$data) {

                $data = new HeaderFooterSetting();

            }

            // HEADER LOGO
            if ($request->hasFile('header_logo')) {

                if (
                    !empty($data->header_logo) &&
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

            // FOOTER LOGO
            if ($request->hasFile('footer_logo')) {

                if (
                    !empty($data->footer_logo) &&
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

            // TEXT FIELDS
            $data->whatsapp = $request->whatsapp;

            $data->mobile = $request->mobile;

            $data->email = $request->email;

            $data->address = $request->address;

            $data->short_content = $request->short_content;

            $data->copyright = $request->copyright;

            $data->save();

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Header & Footer Settings Updated Successfully.'
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
}