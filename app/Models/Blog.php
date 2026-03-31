<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'image',
        'short_description',
        'content',
        'show_home',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($blog) {

            // ✅ Auto slug
            if (empty($blog->slug)) {
                $blog->slug = Str::slug($blog->title);
            }

            // ✅ SEO fallback
            if (empty($blog->meta_title)) {
                $blog->meta_title = $blog->title;
            }

            if (empty($blog->meta_description)) {
                $blog->meta_description = Str::limit(strip_tags($blog->content), 150);
            }
        });
    }
}