<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialSetting;

class SocialSettingController extends Controller
{
    public function edit()
    {
        $data = SocialSetting::first();

        return view(
            'admin.settings.social',
            compact('data')
        );
    }

    public function update(Request $request)
    {
        $request->validate([

            'facebook' => 'nullable|url',

            'instagram' => 'nullable|url',

            'youtube' => 'nullable|url',

            'google_plus' => 'nullable|url',

            'linkedin' => 'nullable|url',

            'twitter' => 'nullable|url',

        ]);

        SocialSetting::updateOrCreate(

            ['id' => 1],

            [

                'facebook' => $request->facebook,

                'instagram' => $request->instagram,

                'youtube' => $request->youtube,

                'google_plus' => $request->google_plus,

                'linkedin' => $request->linkedin,

                'twitter' => $request->twitter,

            ]

        );

        return back()->with(
            'success',
            'Social Media Links Updated Successfully'
        );
    }
}