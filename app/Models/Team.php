<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [

        'name',
        'designation',
        'short_content',

        'facebook',
        'linkedin',
        'twitter',
        'instagram',
        'youtube',

        'image',
        'status'

    ];
}