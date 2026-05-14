<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HiStylePage extends Model
{
    protected $fillable = [

        /*
        HERO SECTION
        */

        'hero_heading',
        'hero_sub_heading',
        'hero_description',

        'hero_button_text',
        'hero_button_link',

        'hero_image',

        /*
        INTRO SECTION
        */

        'intro_sub_title',
        'intro_heading',
        'intro_content',

        'intro_image_1',
        'intro_image_2',

        /*
        CONTACT SECTION
        */

        'contact_heading',
        'contact_description',

        'contact_phone',
        'contact_email',

        'counter_heading',
        'counter_sub_heading'

    ];
}