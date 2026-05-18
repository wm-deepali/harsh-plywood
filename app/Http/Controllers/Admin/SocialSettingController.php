<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SocialSetting;

class SocialSettingController extends Controller
{
    public function edit()
    {
        try {

            $data = SocialSetting::first();

            return view(
                'admin.settings.social',
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

            'facebook' => 'nullable|url',

            'instagram' => 'nullable|url',

            'youtube' => 'nullable|url',

            'google_plus' => 'nullable|url',

            'linkedin' => 'nullable|url',

            'twitter' => 'nullable|url',

        ], [

            'facebook.url' => 'Please enter a valid Facebook URL.',

            'instagram.url' => 'Please enter a valid Instagram URL.',

            'youtube.url' => 'Please enter a valid Youtube URL.',

            'google_plus.url' => 'Please enter a valid Google Plus URL.',

            'linkedin.url' => 'Please enter a valid LinkedIn URL.',

            'twitter.url' => 'Please enter a valid Twitter/X URL.',

        ]);

        try {

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

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Social Media Links Updated Successfully.'
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