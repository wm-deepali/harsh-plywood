<?php

// app/Models/SocialSetting.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialSetting extends Model
{
    use HasFactory;

    protected $fillable = [

        'facebook',

        'instagram',

        'youtube',

        'google_plus',

        'linkedin',

        'twitter',

    ];
}