<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminSettingController extends Controller
{
    public function edit()
    {
        $data = AdminSetting::first();

        $admin = Auth::user();

        return view(
            'admin.settings.admin',
            compact('data', 'admin')
        );
    }

    public function update(Request $request)
    {
        $request->validate([

            // Login
            'login_email' => 'required|email',

            'password' => 'nullable|min:6|confirmed',

            // Settings
            'enquiry_email' => 'nullable|email',

            'profile' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'login_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

        ], [

            'login_email.required' => 'Admin email is required.',
            'login_email.email' => 'Please enter valid admin email.',

            'password.min' => 'Password must be at least 6 characters.',
            'password.confirmed' => 'Password confirmation does not match.',

            'enquiry_email.email' => 'Please enter valid enquiry email.',

            'profile.image' => 'Profile must be an image.',
            'profile.mimes' => 'Profile image must be JPG, JPEG, PNG or WEBP.',
            'profile.max' => 'Profile image max size is 2MB.',

            'login_logo.image' => 'Logo must be an image.',
            'login_logo.mimes' => 'Logo must be JPG, JPEG, PNG or WEBP.',
            'login_logo.max' => 'Logo image max size is 2MB.',

        ]);

        try {

            // ADMIN UPDATE
            $admin = Auth::user();

            if (!$admin) {

                return back()->with(
                    'error',
                    'Admin not authenticated.'
                );

            }

            $admin->email = $request->login_email;

            if ($request->filled('password')) {

                $admin->password = Hash::make($request->password);

            }

            $admin->save();

            // SETTINGS
            $data = AdminSetting::first();

            if (!$data) {

                $data = new AdminSetting();

            }

            // PROFILE IMAGE
            if ($request->hasFile('profile')) {

                // Delete old image
                if (
                    !empty($data->profile) &&
                    Storage::disk('public')->exists($data->profile)
                ) {

                    Storage::disk('public')->delete($data->profile);

                }

                $file = $request->file('profile');

                $filename =
                    'profile-' . time() . '.' . $file->extension();

                $data->profile = $file->storeAs(
                    'settings',
                    $filename,
                    'public'
                );

            }

            // LOGIN LOGO
            if ($request->hasFile('login_logo')) {

                // Delete old logo
                if (
                    !empty($data->login_logo) &&
                    Storage::disk('public')->exists($data->login_logo)
                ) {

                    Storage::disk('public')->delete($data->login_logo);

                }

                $file = $request->file('login_logo');

                $filename =
                    'logo-' . time() . '.' . $file->extension();

                $data->login_logo = $file->storeAs(
                    'settings',
                    $filename,
                    'public'
                );

            }

            // ENQUIRY EMAIL
            $data->enquiry_email = $request->enquiry_email;

            $data->save();

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Admin Settings Updated Successfully.'
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