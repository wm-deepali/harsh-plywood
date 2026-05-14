<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HrbSection extends Model
{
    protected $fillable = [
        'type',
        'heading',
        'sub_heading',
        'short_description',
        'content',
        'button_text',
        'image',
        'title',
        'page'
    ];
}