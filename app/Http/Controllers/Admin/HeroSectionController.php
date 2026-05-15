<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSection;
use Illuminate\Http\Request;

class HeroSectionController extends Controller
{
    public function index()
    {
        $pages = [
            'About Us',
            'Awards & Certifications',
            'Testimonial',
            'HRB Plywood',
            'Category Page',
            'Product Listing Page',
            'Contact Us',
            'FAQ',
            'Blog',
            'Blog Detail',
            'Gallery',
            'Brands',
        ];

        foreach ($pages as $page) {

            HeroSection::firstOrCreate(
                ['page_name' => $page],
                [
                    'heading' => $page,
                    'sub_heading' => null,
                ]
            );
        }

        $heroSections = HeroSection::latest()->get();

        return view('admin.hero-sections.index', compact('heroSections'));
    }

    public function edit($id)
    {
        $heroSection = HeroSection::findOrFail($id);

        return view('admin.hero-sections.edit', compact('heroSection'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'heading' => 'required|max:255',
            'sub_heading' => 'nullable',
        ]);

        $heroSection = HeroSection::findOrFail($id);

        $heroSection->update([
            'heading' => $request->heading,
            'sub_heading' => $request->sub_heading,
        ]);

        return redirect()->route('admin.settings.hero-sections.index')
            ->with('success', 'Hero Section Updated Successfully');
    }
}