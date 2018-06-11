<?php

namespace App\Data\Models;

use Illuminate\Database\Eloquent\Model;

class Edition extends Model
{
    protected $fillable = [
        'year',
        'month',
        'number',
        'published_at',
    ];
}
