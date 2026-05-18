<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HiStyleIntroFeature;
use App\Models\HiStylePage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HiStyleController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | INDEX
    |--------------------------------------------------------------------------
    */

    public function index()
    {
        return view('admin.hi_style.index');
    }

    /*
    |--------------------------------------------------------------------------
    | HERO SECTION
    |--------------------------------------------------------------------------
    */

    public function heroEdit()
    {
        $hi_style = HiStylePage::first();

        return view('admin.hi_style.hero-edit', compact('hi_style'));
    }

    public function heroUpdate(Request $request)
    {
        $request->validate([

            'hero_heading' =>
                'nullable|string|max:255',

            'hero_sub_heading' =>
                'nullable|string|max:255',

            'hero_description' =>
                'nullable|string',

            'hero_button_text' =>
                'nullable|string|max:255',

            'hero_button_link' =>
                'nullable|string|max:255',

            'hero_button_2_text' => 'nullable|string|max:255',

            'hero_button_2_link' => 'nullable|string|max:255',

            'hero_image' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'

        ], [

            'hero_heading.max' =>
                'Hero heading may not be greater than 255 characters.',

            'hero_sub_heading.max' =>
                'Hero sub heading may not be greater than 255 characters.',

            'hero_button_text.max' =>
                'Button text may not be greater than 255 characters.',

            'hero_button_link.max' =>
                'Button link may not be greater than 255 characters.',

            'hero_button_2_text.max' => 'Button 2 text may not be greater than 255 characters.',

            'hero_button_2_link.max' => 'Button 2 link may not be greater than 255 characters.',

            'hero_image.image' =>
                'Hero image must be an image.',

            'hero_image.mimes' =>
                'Hero image must be JPG, JPEG, PNG or WEBP.',

            'hero_image.max' =>
                'Hero image size must be less than 2MB.'

        ]);

        try {

            $hi_style = HiStylePage::first();

            if (!$hi_style) {

                $hi_style = new HiStylePage();

            }

            $heroImage = $hi_style->hero_image;

            /*
            |--------------------------------------------------------------------------
            | HERO IMAGE
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('hero_image')) {

                // DELETE OLD IMAGE
                if (
                    !empty($hi_style->hero_image) &&
                    Storage::disk('public')->exists($hi_style->hero_image)
                ) {

                    Storage::disk('public')
                        ->delete($hi_style->hero_image);

                }

                $heroImage = $request->file('hero_image')
                    ->store('hi_style', 'public');

            }

            /*
            |--------------------------------------------------------------------------
            | UPDATE DATA
            |--------------------------------------------------------------------------
            */

            HiStylePage::updateOrCreate(

                ['id' => $hi_style->id ?? null],

                [

                    'hero_heading' =>
                        $request->hero_heading,

                    'hero_sub_heading' =>
                        $request->hero_sub_heading,

                    'hero_description' =>
                        $request->hero_description,

                    'hero_button_text' =>
                        $request->hero_button_text,

                    'hero_button_link' =>
                        $request->hero_button_link,

                    'hero_button_2_text' => $request->hero_button_2_text,

                    'hero_button_2_link' => $request->hero_button_2_link,

                    'hero_image' =>
                        $heroImage

                ]

            );

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Hero Section Updated Successfully.'
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
    | INTRO SECTION
    |--------------------------------------------------------------------------
    */


    public function introEdit()
    {
        $hi_style = HiStylePage::first();

        $features = HiStyleIntroFeature::latest()->get();

        return view('admin.hi_style.intro-edit', compact(
            'hi_style',
            'features'
        ));
    }

    public function introUpdate(Request $request)
    {
        $request->validate([

            'intro_sub_title' =>
                'nullable|string|max:255',

            'intro_heading' =>
                'nullable|string|max:255',

            'intro_content' =>
                'nullable|string',

            'intro_image_1' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',

            'intro_image_2' =>
                'nullable|image|mimes:jpg,jpeg,png,webp|max:2048'

        ], [

            'intro_sub_title.max' =>
                'Sub title may not be greater than 255 characters.',

            'intro_heading.max' =>
                'Heading may not be greater than 255 characters.',

            'intro_image_1.image' =>
                'Image 1 must be an image.',

            'intro_image_1.mimes' =>
                'Image 1 must be JPG, JPEG, PNG or WEBP.',

            'intro_image_1.max' =>
                'Image 1 size must be less than 2MB.',

            'intro_image_2.image' =>
                'Image 2 must be an image.',

            'intro_image_2.mimes' =>
                'Image 2 must be JPG, JPEG, PNG or WEBP.',

            'intro_image_2.max' =>
                'Image 2 size must be less than 2MB.'

        ]);

        try {

            $hi_style = HiStylePage::first();

            if (!$hi_style) {

                $hi_style = new HiStylePage();

            }

            $image1 = $hi_style->intro_image_1;
            $image2 = $hi_style->intro_image_2;

            /*
            |--------------------------------------------------------------------------
            | IMAGE 1
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('intro_image_1')) {

                // DELETE OLD IMAGE
                if (
                    !empty($hi_style->intro_image_1) &&
                    Storage::disk('public')->exists($hi_style->intro_image_1)
                ) {

                    Storage::disk('public')
                        ->delete($hi_style->intro_image_1);

                }

                $image1 = $request->file('intro_image_1')
                    ->store('hi_style', 'public');

            }

            /*
            |--------------------------------------------------------------------------
            | IMAGE 2
            |--------------------------------------------------------------------------
            */

            if ($request->hasFile('intro_image_2')) {

                // DELETE OLD IMAGE
                if (
                    !empty($hi_style->intro_image_2) &&
                    Storage::disk('public')->exists($hi_style->intro_image_2)
                ) {

                    Storage::disk('public')
                        ->delete($hi_style->intro_image_2);

                }

                $image2 = $request->file('intro_image_2')
                    ->store('hi_style', 'public');

            }

            /*
            |--------------------------------------------------------------------------
            | UPDATE DATA
            |--------------------------------------------------------------------------
            */

            HiStylePage::updateOrCreate(

                ['id' => $hi_style->id ?? null],

                [

                    'intro_sub_title' =>
                        $request->intro_sub_title,

                    'intro_heading' =>
                        $request->intro_heading,

                    'intro_content' =>
                        $request->intro_content,

                    'intro_image_1' =>
                        $image1,

                    'intro_image_2' =>
                        $image2

                ]

            );

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Introduction Section Updated Successfully.'
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
| INTRO FEATURES
|--------------------------------------------------------------------------
*/

    public function introFeatureStore(Request $request)
    {
        $request->validate([

            'title' => 'required|max:255',

            'icon' => 'nullable|max:255'

        ]);

        HiStyleIntroFeature::create([

            'title' => $request->title,

            'icon' => $request->icon,

            'status' => 1

        ]);

        return redirect()
            ->back()
            ->with('success', 'Feature Added Successfully');
    }

    public function introFeatureDelete($id)
    {
        $feature = HiStyleIntroFeature::findOrFail($id);

        $feature->delete();

        return response()->json([
            'message' => 'Deleted Successfully'
        ]);
    }

    /*
    |--------------------------------------------------------------------------
    | CONTACT SECTION
    |--------------------------------------------------------------------------
    */

    public function contactEdit()
    {
        $hi_style = HiStylePage::first();

        return view('admin.hi_style.contact-edit', compact('hi_style'));
    }

    public function contactUpdate(Request $request)
    {
        $request->validate([

            'contact_heading' =>
                'nullable|string|max:255',

            'contact_description' =>
                'nullable|string',

            'contact_phone' =>
                'nullable|string|max:255',

            'contact_email' =>
                'nullable|email|max:255'

        ], [

            'contact_heading.max' =>
                'Contact heading may not be greater than 255 characters.',

            'contact_phone.max' =>
                'Phone number may not be greater than 255 characters.',

            'contact_email.email' =>
                'Please enter a valid email address.',

            'contact_email.max' =>
                'Email may not be greater than 255 characters.'

        ]);

        try {

            $hi_style = HiStylePage::first();

            if (!$hi_style) {

                $hi_style = new HiStylePage();

            }

            /*
            |--------------------------------------------------------------------------
            | UPDATE CONTACT SECTION
            |--------------------------------------------------------------------------
            */

            HiStylePage::updateOrCreate(

                ['id' => $hi_style->id ?? null],

                [

                    'contact_heading' =>
                        $request->contact_heading,

                    'contact_description' =>
                        $request->contact_description,

                    'contact_phone' =>
                        $request->contact_phone,

                    'contact_email' =>
                        $request->contact_email

                ]

            );

            return redirect()
                ->back()
                ->with(
                    'success',
                    'Contact Section Updated Successfully.'
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