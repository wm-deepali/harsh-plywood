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
        'icon',
        'point_1',
        'point_2',
        'point_3',
        'year',
        'experience_year',
        'experience_text'
    ];
}