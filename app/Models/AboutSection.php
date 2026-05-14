<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AboutSection extends Model
{
    protected $fillable = [
        'type',
        'heading',
        'sub_heading',
        'content',
        'image',
        'title',
        'designation'
    ];
}