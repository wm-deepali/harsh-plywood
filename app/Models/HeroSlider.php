<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlider extends Model
{
    protected $fillable = [

        'subtitle',

        'heading',

        'description',

        'button_text',

        'button_link',

        'image',

        'sort_order',

        'status',

    ];
}