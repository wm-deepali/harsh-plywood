<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Page extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'meta_title',
        'meta_description',
        'content',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($page) {

            if (empty($page->slug)) {
                $page->slug = Str::slug($page->title);
            }

            if (empty($page->meta_title)) {
                $page->meta_title = $page->title;
            }

            if (empty($page->meta_description)) {
                $page->meta_description = Str::limit(strip_tags($page->content), 150);
            }
        });
    }
}