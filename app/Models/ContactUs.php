<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactUs extends Model
{
    protected $table = 'contact_us';

    protected $fillable = [

        'type',
        'title',
        'description',
        'address',
        'phone',
        'email',
        'timing',
        'map_iframe',
        'status'

    ];
}