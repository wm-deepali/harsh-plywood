<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HrbCounter extends Model
{
    protected $fillable = [

        'counter_title',
        'counter_value',
        'icon',
        'status'

    ];
}