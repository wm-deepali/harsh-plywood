<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseSection extends Model
{
    protected $fillable = [

        'sub_heading',

        'heading',

        'description',

        'main_image',

        'small_image'

    ];
}