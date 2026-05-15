<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeoSetting extends Model
{
    protected $fillable = [
        'page_name',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'schema_script',
    ];
}