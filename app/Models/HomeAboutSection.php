<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeAboutSection extends Model
{
    protected $fillable = [

        'sub_heading',

        'heading',

        'description',

        'image',
        
        'award_title',

        'award_icon'

    ];
}