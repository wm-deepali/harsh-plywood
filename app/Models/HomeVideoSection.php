<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeVideoSection extends Model
{
    protected $fillable = [
        'subtitle',
        'title',
        'background_image',
        'video_url',
    ];
}