<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HiStyleCounter extends Model
{
    protected $fillable = [

        'counter_title',
        'counter_value',
        'icon',
        'status'

    ];
}