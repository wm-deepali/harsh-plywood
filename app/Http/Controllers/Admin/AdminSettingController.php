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

        ]);

        // Admin Login Update
        $admin = Auth::user();

        $admin->email = $request->login_email;

        if ($request->filled('password')) {

            $admin->password = Hash::make($request->password);

        }

        $admin->save();

        // Settings Update
        $data = AdminSetting::first();

        if (!$data) {
            $data = new AdminSetting();
        }

        // Profile Picture
        if ($request->hasFile('profile')) {

            if (
                $data->profile &&
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

        // Login Logo
        if ($request->hasFile('login_logo')) {

            if (
                $data->login_logo &&
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

        // Enquiry Email
        $data->enquiry_email = $request->enquiry_email;

        $data->save();

        return back()->with(
            'success',
            'Admin Settings Updated Successfully'
        );
    }
}