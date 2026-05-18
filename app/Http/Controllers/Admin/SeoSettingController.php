<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SeoSetting;
use Illuminate\Http\Request;

class SeoSettingController extends Controller
{
    public function index()
    {
        $pages = [
            'Home',
            'About Us',
            'Awards & Certifications',
            'Testimonial',
            'HRB Plywood',
            'Hi Style Plywood',
            'Category Page',
            'Product Listing Page',
            'Contact Us',
            'FAQ',
            'Blog',
            'Gallery',
            'Brands',
        ];

        foreach ($pages as $page) {

            SeoSetting::firstOrCreate(
                ['page_name' => $page],
                [
                    'meta_title' => null,
                    'meta_keywords' => null,
                    'meta_description' => null,
                    'schema_script' => null,
                ]
            );
        }

        $seoSettings = SeoSetting::latest()->get();

        return view('admin.seo-settings.index', compact('seoSettings'));
    }

    public function edit($id)
    {
        $seoSetting = SeoSetting::findOrFail($id);

        return view('admin.seo-settings.edit', compact('seoSetting'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([

            'meta_title' => 'nullable|string|max:255',

            'meta_keywords' => 'nullable|string',

            'meta_description' => 'nullable|string',

            'schema_script' => 'nullable|string',

        ], [

            'meta_title.string' => 'Meta title must be a valid text.',

            'meta_title.max' => 'Meta title may not be greater than 255 characters.',

            'meta_keywords.string' => 'Meta keywords must be valid text.',

            'meta_description.string' => 'Meta description must be valid text.',

            'schema_script.string' => 'Schema script must be valid text.',

        ]);

        $seoSetting = SeoSetting::findOrFail($id);

        $seoSetting->meta_title = $request->meta_title;
        $seoSetting->meta_keywords = $request->meta_keywords;
        $seoSetting->meta_description = $request->meta_description;
        $seoSetting->schema_script = $request->schema_script;

        $seoSetting->save();

        return redirect()
            ->route('admin.settings.seo-settings.index')
            ->with('success', 'SEO Settings Updated Successfully');
    }
}