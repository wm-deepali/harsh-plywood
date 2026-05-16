<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WhyChooseFeature extends Model
{
    protected $fillable = [

        'position',

        'title',

        'description',

        'icon',

        'status'

    ];
}