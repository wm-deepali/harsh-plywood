<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HrbOffer extends Model
{
    protected $fillable = [

        'title',
        'short_content',

        'icon',
        'image',

        'status'

    ];
}