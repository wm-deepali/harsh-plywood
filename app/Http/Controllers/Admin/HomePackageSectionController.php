<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HomePackageSection;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HomePackageSectionController extends Controller
{
    public function index()
    {
        $section = HomePackageSection::first();

        return view(
            'admin.home-package-section.index',
            compact('section')
        );
    }

    public function update(Request $request)
    {
        $request->validate([

            // LEFT
            'left_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'left_description' => 'nullable|string',

            // MIDDLE
            'middle_subtitle' => 'nullable|string|max:255',
            'middle_title' => 'nullable|string|max:500',

            'feature_icon_1' => 'nullable|string|max:255',
            'feature_text_1' => 'nullable|string|max:255',

            'feature_icon_2' => 'nullable|string|max:255',
            'feature_text_2' => 'nullable|string|max:255',

            'feature_icon_3' => 'nullable|string|max:255',
            'feature_text_3' => 'nullable|string|max:255',

            // RIGHT
            'right_logo' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'right_description' => 'nullable|string',

        ], [

            'left_logo.image' => 'Left logo must be an image.',
            'right_logo.image' => 'Right logo must be an image.',

            'left_logo.mimes' => 'Left logo must be JPG, JPEG, PNG or WEBP.',
            'right_logo.mimes' => 'Right logo must be JPG, JPEG, PNG or WEBP.',

            'left_logo.max' => 'Left logo max size is 2MB.',
            'right_logo.max' => 'Right logo max size is 2MB.',

        ]);

        try {

            $section = HomePackageSection::first();

            if (!$section) {
                $section = new HomePackageSection();
            }

            // LEFT
            $section->left_description = $request->left_description;
            $section->left_contact_text = $request->left_contact_text;
            $section->left_contact_link = $request->left_contact_link;
            $section->left_whatsapp_text = $request->left_whatsapp_text;
            $section->left_whatsapp_link = $request->left_whatsapp_link;

            // MIDDLE
            $section->middle_subtitle = $request->middle_subtitle;
            $section->middle_title = $request->middle_title;

            $section->feature_icon_1 = $request->feature_icon_1;
            $section->feature_text_1 = $request->feature_text_1;

            $section->feature_icon_2 = $request->feature_icon_2;
            $section->feature_text_2 = $request->feature_text_2;

            $section->feature_icon_3 = $request->feature_icon_3;
            $section->feature_text_3 = $request->feature_text_3;

            $section->middle_button_text = $request->middle_button_text;
            $section->middle_button_link = $request->middle_button_link;

            // RIGHT
            $section->right_description = $request->right_description;
            $section->right_contact_text = $request->right_contact_text;
            $section->right_contact_link = $request->right_contact_link;
            $section->right_whatsapp_text = $request->right_whatsapp_text;
            $section->right_whatsapp_link = $request->right_whatsapp_link;

            // LEFT LOGO
            if ($request->hasFile('left_logo')) {

                if (
                    $section->left_logo &&
                    File::exists(public_path('storage/' . $section->left_logo))
                ) {
                    File::delete(public_path('storage/' . $section->left_logo));
                }

                $leftLogo = $request->file('left_logo');

                $leftLogoName = time() . '_left.' .
                    $leftLogo->getClientOriginalExtension();

                $leftLogo->storeAs(
                    'home-package-section',
                    $leftLogoName,
                    'public'
                );

                $section->left_logo =
                    'home-package-section/' . $leftLogoName;
            }

            // RIGHT LOGO
            if ($request->hasFile('right_logo')) {

                if (
                    $section->right_logo &&
                    File::exists(public_path('storage/' . $section->right_logo))
                ) {
                    File::delete(public_path('storage/' . $section->right_logo));
                }

                $rightLogo = $request->file('right_logo');

                $rightLogoName = time() . '_right.' .
                    $rightLogo->getClientOriginalExtension();

                $rightLogo->storeAs(
                    'home-package-section',
                    $rightLogoName,
                    'public'
                );

                $section->right_logo =
                    'home-package-section/' . $rightLogoName;
            }

            $section->save();

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Interior package section updated successfully.'
                );

        } catch (\Exception $e) {

            return redirect()
                ->back()
                ->withInput()
                ->with(
                    'error',
                    'Something went wrong. ' . $e->getMessage()
                );
        }
    }
}