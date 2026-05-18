<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePackageSection extends Model
{
    protected $fillable = [

        'left_logo',
        'left_description',
        'left_contact_text',
        'left_contact_link',
        'left_whatsapp_text',
        'left_whatsapp_link',

        'middle_subtitle',
        'middle_title',

        'feature_icon_1',
        'feature_text_1',

        'feature_icon_2',
        'feature_text_2',

        'feature_icon_3',
        'feature_text_3',

        'middle_button_text',
        'middle_button_link',

        'right_logo',
        'right_description',
        'right_contact_text',
        'right_contact_link',
        'right_whatsapp_text',
        'right_whatsapp_link',
    ];
}