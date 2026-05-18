<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class QuoteInquiry extends Model
{
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'message'
    ];
}