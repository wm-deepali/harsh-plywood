<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'heading',
        'sub_heading',
        'short_description',
        'image',
        'meta_title',
        'meta_description',
        'status'
    ];
}
